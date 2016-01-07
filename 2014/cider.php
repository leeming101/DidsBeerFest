<?php 
include 'header.php'
?>
<body>
<?php
include 'navigation.php'
?>
<div style="width:100%; padding-left:15px; padding-right:15px; background-color: #ee3e7f; min-height: 40px; text-align:center;"><span style="line-height:3" class="mediumfont helvMed">Cider List</span></div>
    <div class="main container" style="width:100%">
	    <div class="row">
	    <div class="col-xs-12" style="padding-top: 10px; padding-bottom:10px; text-align: center;">
		    <span>
		    	Cider and Perry-Go-Round – A Guide<br><br><br>
All cider is made of apple. All perry is made from pear.<br><br> 
Most ciders and perries are rather strong – dear drinkers please beware!<br><br> 
Some ciders have forest fruits added. Some ciders are dry as dust.<br><br>
But tasting a sample of many Is a real and absolute must<br><br>
 All cider bar workers taste all ciders and perries to ensure that all advice given is true.<br><br>
 All cider bar workers are called Eileen.<br><br>
 Even the men.  Yes there are one or two<br><br>
In fact one we would struggle without – a toast the cider bar begs<br><br>
To the man who supplies all our nectar...John Reek of old Merrylegs<br><br>
Cheers!<br>
Eileen s (plural)</span>
	    </div>
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
            pageSize: 12,                //Initial pagesize
            transition: 'slide',       //Type of transition when paging (bounce, fade, flip, rotate, scroll, slide).Requires https://github.com/daneden/animate.css.
            transitionDuration: 0.3,    //Duration of transition in seconds.
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
            name: {
                index: 1,
                type: "string",
                friendly: "Name",
                filterTooltip: "Type here to filter by name", //Show some additional info about column
                placeHolder: "Type here to filter by name..", //Overrides default placeholder and placeholder specified in data types(row 34).
                tooltip: "Click any column name to toggle ascending/descending order"
                },
            brewer:{
	            index: 2,
                type: "string",
                friendly: "Brewer",               
                filterTooltip: "Type here to filter by brewer", //Show some additional info about column
                placeHolder: "Filter.." //Overrides default placeholder and placeholder specified in data types(row 34).
            },
            type: {
                index: 3,
                type: "string",
                friendly: "Type",               
                filterTooltip: "Type here to filter by type", //Show some additional info about column
                placeHolder: "Filter.." //Overrides default placeholder and placeholder specified in data types(row 34).
            },
            abv: {
                index: 4,
                type: "string",
                friendly: "ABV",
                filterTooltip: "Type here to filter by strength", //Show some additional info about column
                placeHolder: "Filter.." //Overrides default placeholder and placeholder specified in data types(row 34).
            },
            taste: {
                index: 5,
                type: "string",
                friendly: "Taste",               
                filterTooltip: "Type here to filter by taste", //Show some additional info about column
                placeHolder: "Filter.." //Overrides default placeholder and placeholder specified in data types(row 34).
            },
            notes: {
                index: 6,
                type: "string",
                sorting: false,
                friendly: "Tasting Notes",
                filter:false
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
        name: "Autumn Scrumpy",
        brewer: "Winkleigh Cider Co",
        type: "Cider",
        taste: "Medium Dry",
        abv:"7.5%",
        notes:"Awaiting tasting notes from brewer"
      },
      {
        name: "Bristol Port",
        brewer: "Broad Oak Cider",
        type: "Port",
        taste: "",
        abv:"6.0%",
        notes:"A fruity plum-coloured cider with an apple aroma"
      },
      {
        name: "Bristol Scrumpy",
        brewer: "Broad Oak Cider",
        type: "Cider",
        taste: "",
        abv:"6.0%",
        notes:"Awaiting tasting notes from brewer"
      },
      {
        name: "Moonshine",
        brewer: "Broadoak Cider",
        type: "Cider",
        taste: "",
        abv:"7.5%",
        notes:"A classic cider skilfully blended with a crisp refreshing taste."
      },
      {
        name: "Premium Perry",
        brewer: "Broadoak Cider",
        type: "Perry",
        taste: "",
        abv:"7.5%",
        notes:"Broadoak Premium Perry 7.5% - Medium Made just from pears this is a smooth delicately sweet drink. A CAMRA gold award winner in 2009"
      },
      {
        name: "Pheasant Plucker ",
        brewer: "Broadoak Cider",
        type: "Cider",
        taste: "",
        abv:"4.5%",
        notes:"A medium to light bodied yet still farmhouse-style cider"
      },
      {
        name: "Crossmans Dry cider",
        brewer: "Crossmans",
        type: "Cider",
        taste: "Dry",
        abv:"6.0%",
        notes:"A stiil dry cider made with a blend of apple varieties"
      },
      {
        name: "Cherry",
        brewer: "Double Vision Cider Co",
        type: "Cider",
        taste: "",
        abv:"5.2%",
        notes:"Awaiting tasting notes from brewer"
      },
      {
        name: "Medium Cider",
        brewer: "Double Vision Cider Co",
        type: "Cider",
        taste: "",
        abv:"7.4%",
        notes:"From famous Kentish cider maker Double Vision in Marlpit Farm near Maidstone Kent. This dry cider is unfiltered clear pale yellow in colour sugary aroma with sweet cooking apples"
      },
      {
        name: "Impeared Vision Perry",
        brewer: "Double Vision Cider Co",
        type: "Perry",
        taste: "",
        abv:"7.4%",
        notes:""
      },
      {
        name: "Strawberry",
        brewer: "Double Vision Cider Co",
        type: "Cider",
        taste: "Medium",
        abv:"5.3%",
        notes:"Medium sweet Cider made with Strawberrys for a wonderful sweet taste to complement the Apple. Made in Kent"
      },
      {
        name: "Dry Organic Cider",
        brewer: "Dunkertons",
        type: "Cider",
        taste: "Dry",
        abv:"7.0%",
        notes:"Awaiting tasting notes from brewer"
      },
      {
        name: "Elderflower Perry",
        brewer: "",
        type: "Perry",
        taste: "",
        abv:"",
        notes:""
      },
      {
        name: "Strawberry Cider",
        brewer: "Green Valley",
        type: "Cider",
        taste: "",
        abv:"4.0%",
        notes:"Strawberry fruit cider"
      },
      {
        name: "Game Cock",
        brewer: "Gwatkin Cider",
        type: "Cider",
        taste: "Sweet",
        abv:"4.5%",
        notes:"Awaiting tasting notes from brewer"
      },
      {
        name: "No Bull",
        brewer: "Gwatkin Cider",
        type: "Cider",
        taste: "Dry",
        abv:"4.5%",
        notes:"Hereford bulls and local cider two great prides of our country. Like the bull this cider is full of character and rich in flavor and accompanies a nice Herefordshire steak. taste the heritage of our county in this medium sweet fine cider"
      },
      {
        name: "Silly Ewe",
        brewer: "Gwatkin Cider",
        type: "Cider",
        taste: "Medium",
        abv:"4.5%",
        notes:"It's no secret sheep are not known for their intelligence. This dry crisp cider mixes well with all farm meats especially lamb"
      },
      {
        name: "Squeal Pig",
        brewer: "Gwatkin Cider",
        type: "Perry",
        taste: "Medium",
        abv:"4.5%",
        notes:"Medium sweet traditional perry made locally in Hereford from pure fruit juices"
      },
      {
        name: "Autumn Harvest Blackberry",
        brewer: "Gwynt y Ddraig",
        type: "Cider",
        taste: "",
        abv:"4.0%",
        notes:"Blackberry Fruit cider"
      },
      {
        name: "Black Dragon",
        brewer: "Gwynt y Ddraig",
        type: "Cider",
        taste: "",
        abv:"7.2%",
        notes:"Matured in oak barrels to produce a cider rich in colour body and flavour with a fresh fruity aroma. Cider with the strength of wine"
      },
      {
        name: "Perry Vale",        
        brewer: "Gwynt y Ddraig",
        type: "Perry",
        taste: "",
        abv:"4.5%",
        notes:"Our Perry is a blend of three varieties of freshly pressed pears that have been allowed to ferment and mature slowly.Perry Vale has a refreshing crisp flavour with an abundant pear aroma and a taste that lingers on the palate cooling the taste buds"
      },
      {
        name: "Kingston Black",
        brewer: "Hecks",
        type: "Cider",
        taste: "",
        abv:"6.5%",
        notes:"Single variety sparkling medium cider made from the famous Kingston Black apple by sixth generation cider-makers the Hecks family in Street"
      },
      {
        name: "Hecks Port Wine of Glastonbury",
        brewer: "Hecks",
        type: "Port",
        taste: "",
        abv:"6.5%",
        notes:"Produced from the port wine apples grown in the orchards overlooked by Glastonbury Tor to produce a traditional medium sweet cider"
      },
      {
        name: "May's Cider",
        brewer: "May's",
        type: "Cider",
        taste: "",
        abv:"5.5%",
        notes:"Awaiting tasting notes from brewer"
      },
      {
        name: "Moores Perry",
        brewer: "",
        type: "Perry",
        taste: "Medium",
        abv:"6.0%",
        notes:""
      },
      {
        name: "Moss Cider",
        brewer: "",
        type: "Cider",
        taste: "",
        abv:"",
        notes:""
      },
      {
        name: "Once upon a Tree Tumpy Ground",
        brewer: "",
        type: "",
        taste: "",
        abv:"7.0%",
        notes:""
      },
      {
        name: "Parsons Choice Dry",
        brewer: "Parsons Choice",
        type: "Cider",
        taste: "Dry",
        abv:"6.0%",
        notes:"An unclear light golden cider with no head. The aroma is sweet apple combined with light notes of acidity and wood"
      },
      {
        name: "Rich's Farmhouse Cider",
        brewer: "Richs Cider",
        type: "Cider",
        taste: "Medium",
        abv:"6.0%",
        notes:"Very easy drinking medium farmhouse cider from Rich's"
      },
      {
        name: "Legbender",
        brewer: "Richs Cider",
        type: "Cider",
        taste: "",
        abv:"6.0%",
        notes:"Awaiting tasting notes from brewer"
      },
      {
        name: "Traditional Farmhouse Dry Still Cider",
        brewer: "Ross on Wye Cider & Perry",
        type: "Cider",
        taste: "Dry",
        abv:"6.0%",
        notes:"Dry Still Cider"
      },
      {
        name: "Traditional Farmhouse Medium Sweet Still Perry",
        brewer: "Ross on Wye Cider & Perry",
        type: "Perry",
        taste: "Medium",
        abv:"4.0%",
        notes:"Medium - A true Farmhouse Perry unpasteurised aged in oak and full of rich flavours."
      },
      {
        name: "Sheppy's Farmhouse Draught Cider",
        brewer: "Sheppy's Cider Ltd",
        type: "Cider",
        taste: "Sweet or Medium",
        abv:"6.0%",
        notes:"A fine traditional Somerset farmhouse scrumpy cider available in dry medium and sweet."
      },
      {
        name: "Tumbledown",
        brewer: "Snailsbank Cider",
        type: "Cider",
        taste: "Sweet",
        abv:"5.2%",
        notes:"A slightly more challenging drink & also our best seller. It retains plenty of apple flavour tempered by the natural tannins that occur in traditional cider fruit"
      },
      {
        name: "Summer Fruits",
        brewer: "Snailsbank Cider",
        type: "Cider",
        taste: "",
        abv:"6.0%",
        notes:"An easy drinking mix of summer fruits and medium cider"
      },
      {
        name: "Twist Winter Spice",
        brewer: "Westons Cider",
        type: "Cider",
        taste: "",
        abv:"4.0%",
        notes:"A traditional still cider laced with winter mulling spices to be served chilled or warm"
      },
      {
        name: "Twist Raspberry",
        brewer: "Westons Cider",
        type: "Cider",
        taste: "Medium",
        abv:"4.0%",
        notes:"This medium-dry still cider is a limited-edition blend of traditional westons cider with a refreshing raspberry juice twist"
      },
      {
        name: "Westons Country Perry",
        brewer: "Westons Cider",
        type: "Perry",
        taste: "",
        abv:"4.5%",
        notes:"English perry made in Herefordshire.  Fermented and fully matured in old oak vats to develop an exquisite delicate light and fruity character.  Softly floral with a clear natural pale straw colour."
      },
      {
        name: "Twist Mulled Cider",
        brewer: "Westons Cider",
        type: "Cider",
        taste: "",
        abv:"4.0%",
        notes:"Ideal for cold winter dats Westons Twist Mulled Cider can be served hot or cold"
      },
      {
        name: "Old Rosie",
        brewer: "Westons Cider",
        type: "",
        taste: "",
        abv:"7.3%",
        notes:""
      },
      {
        name: "Rosies Pig",
        brewer: "Westons Cider",
        type: "Cider",
        taste: "",
        abv:"4.8%",
        notes:"An easy drinking traditional cloudy medium dry cider blended to give a fresh apple flavour with hints of citrus and spice"
      },
      {
        name: "Farmhouse Dry",
        brewer: "Wilkins Cider",
        type: "",
        taste: "Dry",
        abv:"6.0%",
        notes:"Awaiting tasting notes from brewer"
      },
      {
        name: "Sams",
        brewer: "Winkleigh Cider Co",
        type: "",
        taste: "Medium",
        abv:"6.0%",
        notes:""
      }];

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
