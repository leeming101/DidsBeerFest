<?php 
include 'header.php'
?>
<body>
<?php
include 'navigation.php'
?>
    <div class="main container" style="width:100%">
	    <div class="row">
	    <div class="tableContainer" style="width:100%; overflow-x:scroll;">
	    	<div id="div1"></div>
	    </div>
			<?php
			include 'sponsors.php'
			?>
	    </div>
    </div>
    
<?php 
include 'footer.php'
?>
<script type="text/javascript">
$(document).ready(function(){
var waTable = $('#div1').WATable({
            debug:true,                 //Prints some debug info to console
            pageSize: 10,                //Initial pagesize
            transition: 'fade',       //Type of transition when paging (bounce, fade, flip, rotate, scroll, slide).Requires https://github.com/daneden/animate.css.
            transitionDuration: 0.6,    //Duration of transition in seconds.
            filter: true,               //Show filter fields
            sorting: true,              //Enable sorting
            sortEmptyLast:true,         //Empty values will be shown last
            pageSizes: [5,10,25,50,100],  //Set custom pageSizes. Leave empty array to hide button.
            hidePagerOnEmpty: true,     //Removes the pager if data is empty.
            checkboxes: false,           //Make rows checkable. (Note. You need a column with the 'unique' property)
            checkAllToggle:true,        //Show the check-all toggle
            preFill: true,              //Initially fills the table with empty rows (as many as the pagesize).
            //url: '/cider.json',    //Url to a webservice if not setting data manually as we do in this example
            //urlData: { report:1 }     //Any data you need to pass to the webservice
            //urlPost: true             //Use POST httpmethod to webservice. Default is GET.
            tableCreated: function(data) {    //Fires when the table is created / recreated. Use it if you want to manipulate the table in any way.
                console.log('table created'); //data.table holds the html table element.
                console.log(data);            //'this' keyword also holds the html table element.
            },
            rowClicked: function(data) {      //Fires when a row is clicked (Note. You need a column with the 'unique' property).
                console.log('row clicked');   //data.event holds the original jQuery event.
                console.log(data);            //data.row holds the underlying row you supplied.
                                              //data.column holds the underlying column you supplied.
                                              //data.checked is true if row is checked.
                                              //'this' keyword holds the clicked element.
                if ( $(this).hasClass('userId') ) {
                  data.event.preventDefault();
                  alert('You clicked userId: ' + data.row.userId);
                }
            },
            columnClicked: function(data) {    //Fires when a column is clicked
              console.log('column clicked');  //data.event holds the original jQuery event
              console.log(data);              //data.column holds the underlying column you supplied
                                              //data.descending is true when sorted descending (duh)
            },
            pageChanged: function(data) {      //Fires when manually changing page
              console.log('page changed');    //data.event holds the original jQuery event
              console.log(data);              //data.page holds the new page index
            },
            pageSizeChanged: function(data) {  //Fires when manually changing pagesize
              console.log('pagesize changed');//data.event holds teh original event
              console.log(data);              //data.pageSize holds the new pagesize
            }
        }).data('WATable');  //This step reaches into the html data property to get the actual WATable object. Important if you want a reference to it as we want here.
                  
        var data = getData();
        waTable.setData(data); 
        
        function getData() {

        //First define the columns
        var cols = {
            brewer:{
	            index: 1,
                type: "string",
                friendly: "Brewer",               
                filterTooltip: "Type here to filter by brewer", //Show some additional info about column
                placeHolder: "Filter..", //Overrides default placeholder and placeholder specified in data types(row 34).
                format:"<span style='white-space:normal;'>{0}</span>"

            },
            name: {
                index: 2,
                type: "string",
                friendly: "Name",
                filterTooltip: "Type here to filter by name", //Show some additional info about column
                placeHolder: "Type here to filter by name..", //Overrides default placeholder and placeholder specified in data types(row 34).
                tooltip: "Click any column name to toggle ascending/descending order",
                format:"<span style='white-space:normal;'>{0}</span>"

                },
            type: {
                index: 3,
                type: "string",
                friendly: "Type",               
                filterTooltip: "Type here to filter by type", //Show some additional info about column
                placeHolder: "Filter..", //Overrides default placeholder and placeholder specified in data types(row 34).
                format:"<span style='white-space:normal;'>{0}</span>"

            },
            abv: {
                index: 4,
                type: "string",
                friendly: "ABV&nbsp;&nbsp;&nbsp;&nbsp;",
                filterTooltip: "Type here to filter by strength", //Show some additional info about column
                placeHolder: "Filter..", //Overrides default placeholder and placeholder specified in data types(row 34).
                filter:false,
                format:"<span style='white-space:normal;'>{0}</span>"

            },
            notes: {
                index: 5,
                type: "string",
                sorting: false,
                friendly: "Tasting Notes",
                filter:false,
                format:"<span style='white-space:normal;'>{0}</span>"

            }        
            };

        /*
          Create the actual data.
          Whats worth mentioning is that you can use a 'format' property just as in the column definition,
          but on a row level. See below on how we create a weightFormat property. This will be used when rendering the weight column.
          Also, you can pre-check rows with the 'checked' property and prevent rows from being checkable with the 'checkable' property.
        */
        var rows = [
  {
    "name":"Bag in a Box Strong Kentish Cider",
    "brewer":"Biddenden",
    "type":"Cider",
    "abv":8,
    "notes":"Filled with its famous strong Kentish cider Biddenden`s 20ltr Bag in a Box comes in Dry Medium and Bushels. Biddenden`s renowned cider is still and smooth with an exceptionally refreshing apple taste. Created using the traditional Barnes` family recipe all Biddenden`s ciders are produced from a delicious blend of farm-pressed quality Kentish culinary and dessert apples. At 8% ABV the Dry and Medium remain a popular choice and at 6% ABV the Bushels provides a less strong alternative. The Bag in a Box ciders can be kept for 3 months and once opened as long as they are kept chilled they will last around 3 weeks."
  },
  {
    "name":"Pheasant Plucker",
    "brewer":"Broad Oak Cider",
    "type":"Cider",
    "abv":4.5,
    "notes":"A medium to light bodied yet still farmhouse-style cider."
  },
  {
    "name":"Bristol Port",
    "brewer":"Broad Oak Cider",
    "type":"Cider",
    "abv":6,
    "notes":"a fruity plum-coloured cider with an apple aroma."
  },
  {
    "name":"Moonshine",
    "brewer":"Broad Oak Cider",
    "type":"Cider",
    "abv":7.5,
    "notes":"A classic cider skilfully blended with a crisp refreshing taste."
  },
  {
    "name":"Ruby Tuesday",
    "brewer":"Celtic Marches",
    "type":"Cider",
    "abv":4,
    "notes":"Produced by Celtic Marches in Herefordshire Abrahalls Ruby Tuesday is a delicious combination of apple and British raspberry juice and at 4% ABV it makes perfect refreshing drinking during summer days and nights."
  },
  {
    "name":"Lily the Pink",
    "brewer":"Celtic Marches",
    "type":"Cider",
    "abv":4.5,
    "notes":"A medium fruity cider  gorgeous pink colour  made from 100% cider apples on our Herefordshire farm  intense fruity aroma  very drinkable."
  },
  {
    "name":"Thundering Molly",
    "brewer":"Celtic Marches",
    "type":"Cider",
    "abv":5.2,
    "notes":"Thundering Molly 5.2% vol is a well rounded medium cider.Fresh and fruity with a lovely apple aroma.Gorgeous golden colour and a well balanced finish.Made on our Herefordshire farm from 100% cider apples"
  },
  {
    "name":"Farmhouse Dry",
    "brewer":"Countryman",
    "type":"cider",
    "abv":6.5,
    "notes":"Crisp dry cider from Devon"
  },
  {
    "name":"Dry Cider",
    "brewer":"Crossman",
    "type":"cider",
    "abv":6,
    "notes":"Somerset cider. Dry!"
  },
  {
    "name":"Cherry",
    "brewer":"Double Vision Cider Co",
    "type":"Cider",
    "abv":5.3,
    "notes":"traditional Kentish cider flavoured with locally grown cherries."
  },
  {
    "name":"Strawberry",
    "brewer":"Double Vision Cider Co",
    "type":"Cider",
    "abv":5.3,
    "notes":"Medium sweet Cider made with Strawberrys for a wonderful sweet taste to complement the Apple. Made in Kent."
  },
  {
    "name":"Medium Cider",
    "brewer":"Double Vision Cider Co",
    "type":"Cider",
    "abv":7.4,
    "notes":"From famous Kentish cider maker Double Vision in Marlpit Farm near Maidstone Kent. This dry cider is unfiltered clear pale yellow in colour sugary aroma with sweet cooking apples."
  },
  {
    "name":"Impeared Vision Elderflower perry ",
    "brewer":"Double Vision Cider Co. ",
    "type":"Perry",
    "abv":5.3,
    "notes":"Award winning perry flavoured with elderflower"
  },
  {
    "name":"Dry Organic Cider",
    "brewer":"Dunkertons Cider",
    "type":"Cider",
    "abv":7,
    "notes":"Pale golden dry cider  from Herefordshire"
  },
  {
    "name":"Autumn Magic",
    "brewer":"Gwynt Y Ddraig",
    "type":"Cider",
    "abv":4,
    "notes":"Autumn Magic Cider & Blackberry bursts with a fruity aroma reminiscent of them good old autumn days."
  },
  {
    "name":"Celtic Warrior",
    "brewer":"Gwynt Y Ddraig",
    "type":"Cider",
    "abv":5.5,
    "notes":"An exquisite rich and golden colour with a crisp medium/sweet taste"
  },
  {
    "name":"Black Dragon",
    "brewer":"Gwynt Y Ddraig",
    "type":"Cider",
    "abv":7.2,
    "notes":"Matured in oak barrels to producea cider rich in colour body and flavour with a fresh fruity aroma. Cider with the strength of wine."
  },
  {
    "name":"Black Dragon",
    "brewer":"Gwynt Y Ddraig",
    "type":"cider",
    "abv":7.2,
    "notes":"Renowned and award winning�cider rich in colour, body and flavour with a fresh, fruity aroma."
  },
  {
    "name":"Hecks Port Wine of Glastonbury",
    "brewer":"Hecks",
    "type":"Cider",
    "abv":6.5,
    "notes":"Produced from the port wine apples grown in the orchards overlooked by Glastonbury Tor to produce a traditional medium sweet cider"
  },
  {
    "name":"Kingston Black",
    "brewer":"Hecks",
    "type":"Cider",
    "abv":6.5,
    "notes":"Single variety sparkling medium cider made from the famous Kingston Black apple by sixth generation cider-makers the Hecks family in Street."
  },
  {
    "name":"May's Medium Cider",
    "brewer":"May's Cider ",
    "type":"cider",
    "abv":5.5,
    "notes":"A full flavoured medium cider with a wonderful fruity aroma and well balanced taste rich in apple flavours. Made from 100% fresh pressed cider apple juice with no added concentrate. Lightly carbonated. Suitable for vegetarians, vegans and coeliacs."
  },
  {
    "name":"Perry",
    "brewer":"Moore's",
    "type":"Perry",
    "abv":6,
    "notes":"Light and fruity easy-drinking Gloucestershire perry"
  },
  {
    "name":"Tumpy Ground",
    "brewer":"Once Upon A Tree",
    "type":"Cider",
    "abv":7,
    "notes":"This still cider is clear & golden in colour medium in style and made from a blend of cider varieties (Somerset Redstreak Dabinett Ellis Bitter & Browns Apple).  Aromas of blackberry leaf melon and pineapple following onto the palate with rich mouth-filling apple a hint of tropical fruits and a full body.  Plentiful soft tannins and a gentle sweetness to the finish.  An unusual and distinctive cider."
  },
  {
    "name":"Medium",
    "brewer":"Parson's Choice",
    "type":"cider",
    "abv":6,
    "notes":"Gorgeous initial apple taste, long lingering dryness and a sharp edge to it. "
  },
  {
    "name":"Legbender",
    "brewer":"Rich's Cider",
    "type":"Cider",
    "abv":6,
    "notes":"Sweet Cider produced from local Somerset Apples aged in oak vats."
  },
  {
    "name":"Medium Dry Perry",
    "brewer":"Ross On Wye Cider & Perry",
    "type":"Perry",
    "abv":7,
    "notes":"A floral and fruity perry� with a mellow medium dry flavour"
  },
  {
    "name":"Traditional Farmhouse Medium Dry Still Cider",
    "brewer":"Ross On Wye Cider & Perry",
    "type":"Cider",
    "abv":6.5,
    "notes":"Medium Dry - A true Farmhouse cider unpasteurised aged in oak and full of rich flavours."
  },
  {
    "name":"Sheppy's Raspberry Cider",
    "brewer":"Sheppy's Cider Ltd",
    "type":"Cider",
    "abv":4,
    "notes":"A refreshing fruity cider based on a traditional cider blend with a hint of raspberry.  Medium-sweet. "
  },
  {
    "name":"Sheppy's Farmhouse Draught Cider",
    "brewer":"Sheppy's Cider Ltd",
    "type":"Cider",
    "abv":6,
    "notes":"A fine traditional Somerset farmhouse scrumpy cider available in dry medium and sweet."
  },
  {
    "name":"Sheppys cider with blackberry & elderflower 4.0%",
    "brewer":"Sheppy's Cider Ltd",
    "type":"cider ",
    "abv":4,
    "notes":"A refreshing fruity cider  with blackberry and elderflower.  Medium-sweet. "
  },
  {
    "name":"Summer Fruits",
    "brewer":"Snailsbank Cider",
    "type":"Cider",
    "abv":4,
    "notes":"An easy drinking mix of summer fruits and medium cider"
  },
  {
    "name":"Tumbledown",
    "brewer":"Snailsbank Cider",
    "type":"Cider",
    "abv":5.2,
    "notes":"A slightly more challenging drink & also our best seller. It retains plenty of apple flavour tempered by the natural tannins that occur in traditional cider fruit."
  },
  {
    "name":"Pig Squeal",
    "brewer":"Snailsbank Cider",
    "type":"cider",
    "abv":7,
    "notes":"A rich bronze cider that is smooth as it is tasty. Beautifully balanced with a satisfyingly rounded finish."
  },
  {
    "name":"Pig Ginger",
    "brewer":"Snailsbank Cider",
    "type":"Cider",
    "abv":4,
    "notes":"A clear and refreshing medium cider pepped up with freshly ground root ginger for a fiery kick!!"
  },
  {
    "name":"Fruit Bat",
    "brewer":"Snailsbank Cider",
    "type":"Cider",
    "abv":4,
    "notes":"A sweet, lively cider that blends traditional bitter sweet apples with a more contemporary Russet apple to make a light, refreshing and quaffable cider."
  },
  {
    "name":"Very Perry",
    "brewer":"Snailsbank Cider",
    "type":"Perry",
    "abv":5.1,
    "notes":"�Fruity medium Perry with a complex yet balanced flavor only found in real perry; made from Stinking Bishop Perry pears�"
  },
  {
    "name":"Tumbledown",
    "brewer":"Snailsbank Cider",
    "type":"Cider",
    "abv":5.2,
    "notes":"A slightly more challenging drink & also our best seller. It retains plenty of apple flavour tempered by the natural tannins that occur in traditional cider fruit."
  },
  {
    "name":"Cheddar Valley",
    "brewer":"Thatchers",
    "type":"Cider",
    "abv":6,
    "notes":"Naturally cloudy cider with a robust and distinctive taste From Sandford Somerset."
  },
  {
    "name":"Janet's Jungle Juice",
    "brewer":"Westcroft",
    "type":"Cider",
    "abv":6,
    "notes":"Rich full bodied medium sweet cider. Made from 100% Somerset cider apple varieties."
  },
  {
    "name":"Old rosie with elderflower",
    "brewer":"Westons Cider",
    "type":"Cider",
    "abv":4,
    "notes":"medium sweet with a muscat finish and an infusion of elderflower "
  },
  {
    "name":"Old Rosie With Rhubarb",
    "brewer":"Westons Cider",
    "type":"Cider",
    "abv":4,
    "notes":"Cloudy cider with a refreshing infusion of rhubarb light pink in colour medium sweet with a tart finish"
  },
  {
    "name":"Twist Ginger",
    "brewer":"Westons Cider",
    "type":"Cider",
    "abv":4,
    "notes":"A delicious fusion of lightly sparkling cider with ginger flavour for a tantalising zingy taste. Suitable for vegetarians vegans and coeliacs."
  },
  {
    "name":"Twist Mulled Cider",
    "brewer":"Westons Cider",
    "type":"Cider",
    "abv":4,
    "notes":"Westons twist cider infused with traditional mulling spices served cold."
  },
  {
    "name":"Twist Raspberry",
    "brewer":"Westons Cider",
    "type":"Cider",
    "abv":4,
    "notes":"This medium-dry still cider is a limited-edition blend of traditional westons cider with a refreshing raspberry juice twist."
  },
  {
    "name":"Country Perry",
    "brewer":"Westons Cider",
    "type":"Perry",
    "abv":4.5,
    "notes":"English perry made in Herefordshire.  Fermented and fully matured in old oak vats to develop an exquisite delicate light and fruity character.  Softly floral with a clear natural pale straw colour."
  },
  {
    "name":"Rosie's Pig",
    "brewer":"Westons Cider",
    "type":"Cider",
    "abv":4.8,
    "notes":"An easy drinking traditional cloudy medium dry cider blended to give a fresh apple flavour with hints of citrus and spice"
  },
  {
    "name":"Old Rosie",
    "brewer":"Westons Cider",
    "type":"Cider",
    "abv":7.3,
    "notes":"This still cider is allowed to settle out naturally after fermentation resulting in a truly old fashioned full flavoured appley cloudy scrumpy with a well balanced medium dry character"
  },
  {
    "name":"Farmhouse Dry",
    "brewer":"Wilkins Cider",
    "type":"Cider",
    "abv":6,
    "notes":"Pale golden dry cider with a mellow aftertaste"
  },
  {
    "name":"Autumn Scrumpy",
    "brewer":"Winkleigh Cider Co",
    "type":"Cider",
    "abv":7.5,
    "notes":"Bright in colour,  well balanced on the palate and releases a wonderful apple aroma. "
  },
  {
    "name":"Sam's Cider with Blackcurrant",
    "brewer":"Winkleigh Cider Co",
    "type":"Cider",
    "abv":4,
    "notes":"Made from a combination of our finest Sam�s Cider and blackcurrants, the cider adds balance to the blackcurrants acidity and sweetness which leaves an after taste which is fresh and sharply cleansing to the palate."
  },
  {
    "name":"Moss",
    "brewer":"Moss Cider",
    "type":"Cider",
    "abv":"",
    "notes":"Moss Side project taking donated apples and turning them into (sometimes) award winning cider."
  }
];

        var data = {
            cols: cols,
            rows: rows
        };

        return data;
    }
        
        });
</script>

</body>
</html>
