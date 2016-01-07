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
        brewer: {
                index: 1,
                type: "string",
                friendly: "Brewer",
                filterTooltip: "Type here to filter by brewer", //Show some additional info about column
                placeHolder: "Filter..", //Overrides default placeholder and placeholder specified in data types(row 34).
                tooltip: "Click any column name to toggle ascending/descending order",
                format:"<span style='white-space:normal;'>{0}</span>"
                },
            name: {
                index: 2,
                type: "string",
                friendly: "Name",
                filterTooltip: "Type here to filter by name", //Show some additional info about column
                placeHolder: "Filter..", //Overrides default placeholder and placeholder specified in data types(row 34).
                tooltip: "Click any column name to toggle ascending/descending order",
                format:"<span style='white-space:normal;'>{0}</span>"

                
            },
            type: {
                index: 3,
                type: "string",
                friendly: "Category",               
                filterTooltip: "Type here to filter by category", //Show some additional info about column
                placeHolder: "Filter..", //Overrides default placeholder and placeholder specified in data types(row 34).
                format:"<span style='white-space:normal;'>{0}</span>"
            },
            abv: {
                index: 4,
                type: "string",
                friendly: "ABV&nbsp;&nbsp;&nbsp;&nbsp;",
                filter:false,
                placeHolder: "Filter..", //Overrides default placeholder and placeholder specified in data types(row 34).
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
        "brewer": "Abbeydale Brewery",
        "name": "Moonshine",
        "type": "Pale",
        "abv": "4.3",
        "notes": "A beautifully balanced pale straw-coloured premium bitter with a distinctive floral aroma leading to a predominantly citrus taste with grapefruit and lemons to the fore and a quenching bitter finish."
    },
    {
        "brewer": "Abbeydale Brewery",
        "name": "Daily Bread",
        "type": "Malty",
        "abv": "3.8",
        "notes": "A classic English bitter. Well-balanced copper colored beer with malt flavors and a smooth bitter finish. Subtle hop characteristics from traditional Fuggles hops. Brewed originally for our own pub and now released into the trade."
    },
    {
        "brewer": "Abbeydale Brewery",
        "name": "Black Magic",
        "type": "Stout",
        "abv": "",
        "notes": "Awaiting tasting notes from brewer."
    },
    {
        "brewer": "Abbeydale Brewery",
        "name": "Absolution",
        "type": "Pale",
        "abv": "5.3",
        "notes": "Mid-straw coloured beer with aromas of tropical fruit particularly mangoes. The beer  is sweet all the way through balanced by bitterness at the finish. Flavours are fruity with toffee-apples and bananas. A clean tasting beer sweetish but not cloying. Very drinkable."
    },
    {
        "brewer": "Abbeydale Brewery",
        "name": "Dr Morton's chicken vindaloo",
        "type": "Amber",
        "abv": "4.1",
        "notes": "Pale, blonde session beer. Crisp, earthy & spicy aromas from the use of English hops. English hops for an English dish! "
    },
    {
        "brewer": "Abbeydale Brewery",
        "name": "Brimstone",
        "type": "Malty",
        "abv": "3.9",
        "notes": "Russet brown beer made with Amarillo hops. It has aromas of malt loaf marmalade and apricots with some burnt toast coming through from the dark malt. Flavours are of coffee toffee and liquorice with underlying spices especially cloves. "
    },
    {
        "brewer": "Black Jack Beers",
        "name": "Double Bluff ",
        "type": "Amber",
        "abv": "4.8",
        "notes": "A pleasantly hopped amber ale."
    },
    {
        "brewer": "Black Jack Beers",
        "name": "New Deck",
        "type": "Golden",
        "abv": "4.2",
        "notes": "Traditional golden bitter"
    },
    {
        "brewer": "Blackedge Brewing Company Ltd",
        "name": "IPA",
        "type": "IPA",
        "abv": "4.7",
        "notes": "Award Winning IPA. Generously hopped using 4 varieties of American hops. Full flavoured and well balanced hoppy & intensly citrus with grapefruit aroma."
    },
    {
        "brewer": "Blackedge Brewing Company Ltd",
        "name": "American",
        "type": "Pale",
        "abv": "4.2",
        "notes": "Clean crisp full bodied American style pale ale well hopped with 5 varities of US Pacific West Coast Hops. Citrus grapefruit and spicy flavours & aromas"
    },
    {
        "brewer": "Blackedge Brewing Company Ltd",
        "name": "Dark RUM",
        "type": "Porter",
        "abv": "4.6",
        "notes": "Rich ebony porter with subtle hints of chocolate and liquorice with a sweet rum finish."
    },
    {
        "brewer": "Boggart Hole Clough",
        "name": "DARK MILD",
        "type": "Mild",
        "abv": "4.0",
        "notes": "A classic dark mild."
    },
    {
        "brewer": "Boggart Hole Clough",
        "name": "Red Ltd",
        "type": "Amber",
        "abv": "",
        "notes": "Awaiting tasting notes from brewer."
    },
    {
        "brewer": "Bollington Brewing Company",
        "name": "Bollington Best",
        "type": "Golden",
        "abv": "4.2",
        "notes": "A delightfully hoppy bitter. Clean & crisp with a light golden colour and a refreshing bitter aftertaste. "
    },
    {
        "brewer": "Bollington Brewing Company",
        "name": "Oat Mill Stout",
        "type": "Stout",
        "abv": "5.0",
        "notes": "An Oatmeal Stout with a twist. A hoppy bitter taste keeps the sweetness in check and allows for a great dark beer. "
    },
    {
        "brewer": "Bollington Brewing Company",
        "name": "Dinner Ale",
        "type": "Amber",
        "abv": "4.3",
        "notes": "Deep copper coloured beer with a fresh slightly fruity nose a traditional style bitter with a dry hoppy finish. "
    },
    {
        "brewer": "Bollington Brewing Company",
        "name": "Long Hop",
        "type": "Pale",
        "abv": "3.9",
        "notes": "Pale lager style bitter with fruity refreshing hops. Summer special brewed for cricket lovers all year round."
    },
    {
        "brewer": "Bollington Brewing Company",
        "name": "White Nancy",
        "type": "Pale",
        "abv": "4.1",
        "notes": "Very pale light bitter with a good hoppiness and light body."
    },
    {
        "brewer": "Brewsmith Beer",
        "name": "Bitter",
        "type": "Golden",
        "abv": "3.9",
        "notes": "A pale session bitter. Moderate bitterness pronounced floral/citrus hop aromas."
    },
    {
        "brewer": "Brewsmith Beer",
        "name": "Pale ",
        "type": "Pale",
        "abv": "4.2",
        "notes": "A refreshingly bitter and hoppy pale ale.  Big floral hop aroma medium body long dry bitter finish."
    },
    {
        "brewer": "Brewsmith Beer",
        "name": "Gold",
        "type": "Golden",
        "abv": "4.2",
        "notes": "Awaiting tasting notes from brewer."
    },
    {
        "brewer": "Brewsmith Beer",
        "name": "Anvil Ale",
        "type": "Dark",
        "abv": "4.5",
        "notes": "Hoppy darker bitter with Green Bullet Chinook Challenger Calypso and Galaxy hops."
    },
    {
        "brewer": "Brightside Brewing Company",
        "name": "Manchester Skyline",
        "type": "Golden",
        "abv": "4.6",
        "notes": "A full bodied Golden Ale with a greater depth of colour and not as dry as most"
    },
    {
        "brewer": "Brightside Brewing Company",
        "name": "Odin",
        "type": "Blonde",
        "abv": "3.8",
        "notes": "A refreshing light bodied blonde ale made from a blend of three fruity American hops with the addition of wheat - so it will have a slight haze."
    },
    {
        "brewer": "Brightside Brewing Company",
        "name": "Kiwi",
        "type": "Amber",
        "abv": "4.6",
        "notes": "NZ hopped Dark Amber Ale -A rich, flavoursome amber ale brewed with lots of caramel malt and roast barley, and lifted by a refreshing and distinctive blend of four New Zealand hops."
    },
    {
        "brewer": "Brightside Brewing Company",
        "name": "Topaz",
        "type": "Amber",
        "abv": "5.0",
        "notes": "Single Hop American Style IPA -  Expect light grassy and resinous aromas with light tropical fruit flavours – many think it’s the Aussie equivalent to Amarillo!"
    },
    {
        "brewer": "Chantry Brewery",
        "name": "New York Pale",
        "type": "Pale",
        "abv": "3.8",
        "notes": "A pale session bitter with a refreshing citrus taste and a crisp bitter finish. Brewed using the flavoursome cascade and centennial American hops and finest Maris Otter malt."
    },
    {
        "brewer": "Chantry Brewery",
        "name": "Mighty millers",
        "type": "Amber",
        "abv": "",
        "notes": "Awaiting tasting notes from brewer."
    },
    {
        "brewer": "Chantry Brewery",
        "name": "Special Reserve",
        "type": "Strong",
        "abv": "",
        "notes": "Awaiting tasting notes from brewer."
    },
    {
        "brewer": "Chantry Brewery",
        "name": "Iron & Steel",
        "type": "Amber",
        "abv": "4.1",
        "notes": "Chestnut coloured, complex spicy flavours of dark fruits with a clean finish. An easy drinking true Yorkshire session bitter."
    },
    {
        "brewer": "Chantry Brewery",
        "name": "DBF 8",
        "type": "Pale",
        "abv": "3.5",
        "notes": "Brewed especially for our festival at a very reasonable price.  This is a unque, light but fresh tasting beer. Try some today."
    },
    {
        "brewer": "Chantry Brewery",
        "name": "Diamond Black Stout",
        "type": "Stout",
        "abv": "4.5",
        "notes": "Full bodied dry stout with a bitter finish spicy with hints of liquorice and dark berries. Brewed using the finest Yorkshire malts and roast barley.aiting tasting notes from brewer."
    },
    {
        "brewer": "Chop House",
        "name": "Albert's",
        "type": "Amber",
        "abv": "4.2",
        "notes": "a Moorish  traditional English ale with a fine amber coloured that has full flavour, which lingers on the pallet, with a lovely floral aroma from the fragrant hop East Kent Goldings and Styrian Goldings."
    },
    {
        "brewer": "Cloudwater",
        "name": "Pale",
        "type": "Pale",
        "abv": "3.9",
        "notes": "Light, hoppy and refreshing Pale"
    },
    {
        "brewer": "Cloudwater",
        "name": "Amber",
        "type": "Amber",
        "abv": "4.3",
        "notes": "A hoppy bitter"
    },
    {
        "brewer": "Cloudwater",
        "name": "Porter",
        "type": "Porter",
        "abv": "6.0",
        "notes": "A smooth rich Porter with a hint of smoke"
    },
    {
        "brewer": "Cloudwater",
        "name": "Red Ale",
        "type": "Red Ale",
        "abv": "4.8",
        "notes": "A session strength Red Ale with US aroma hops"
    },
    {
        "brewer": "Cloudwater Brew Co",
        "name": "Autumn Pale",
        "type": "IPA",
        "abv": "3.9",
        "notes": "Bright dry and easy drinking with an assertive bitterness."
    },
    {
        "brewer": "Coniston Brewery",
        "name": "Bluebird Bitter",
        "type": "Pale",
        "abv": "3.6",
        "notes": "It is exceedingly pale  with just a hint of colour in its cheeks from the dash of crystal malt. It has a massive orange fruit aroma from the challengers balanced bybiscuity malt."
    },
    {
        "brewer": "Coniston Brewery",
        "name": "Old Man Ale",
        "type": "Amber",
        "abv": "4.2",
        "notes": "This radically different beer has roast barley added to the pale and crystal malts. It has a deep burnished copper colour a rich port wine aroma a big chocolate and creamy malt palate and a dry grainy roasty finish balanced by hop bitterness and tart fruit. "
    },
    {
        "brewer": "Cumbrian",
        "name": "Loweswater Gold",
        "type": "Golden",
        "abv": "4.3",
        "notes": "A true golden ale it is brewed using three malts including lager and Maris Otter together with German hops. Bursting with tropical flavour it is an outstanding beer."
    },
    {
        "brewer": "Cumbrian",
        "name": "American Pale Ale",
        "type": "Pale",
        "abv": "4.5",
        "notes": "Dry Hopped Pale Ale "
    },
    {
        "brewer": "Cumbrian",
        "name": "Langdale",
        "type": "Pale",
        "abv": "4.0",
        "notes": "Fruity refreshing 4% bitter with an amazing orange citrus flavour."
    },
    {
        "brewer": "Dark Star Brewery",
        "name": "Blockhead",
        "type": "Ruby",
        "abv": "4.0",
        "notes": "A beer brewed with the legendary Blockheads. A nod on our very own Hophead but taken to the dark side through a use of specialty malts and a little stronger hopefully giving drinkers a reason to be cheerful."
    },
    {
        "brewer": "Dark Star Brewery",
        "name": "Espresso",
        "type": "Stout",
        "abv": "4.2",
        "notes": "A black beer brewed with roasted barley malt and challenger hops with freshly ground espresso coffee beans also added to the copper for a few minutes to provide a rich and complementary coffee aroma"
    },
    {
        "brewer": "Dark Star Brewery",
        "name": "Sunburst",
        "type": "Pale",
        "abv": "4.8",
        "notes": "A hint of initial sweetness adds to the fruitiness of this summer ale without detracting from it's clean flavour and rich hop aroma."
    },
    {
        "brewer": "Dark Star Brewery",
        "name": "Hophead",
        "type": "Pale",
        "abv": "3.8",
        "notes": "An extremely clean-drinking pale gold coloured ale with a strong floral aroma and elderflower notes. "
    },
    {
        "brewer": "Dunham Massey",
        "name": "Treacle Treat",
        "type": "Dark",
        "abv": "4.1",
        "notes": "A classic dark English bitter with a hint of treacle."
    },
    {
        "brewer": "Dunham Massey",
        "name": "Cheshire IPA",
        "type": "IPA",
        "abv": "4.7",
        "notes": "A strong pale hoppy bitter beer based on the IPA's of old."
    },
    {
        "brewer": "Dunham Massey",
        "name": "Chocolate Cherry Mild",
        "type": "Mild",
        "abv": "3.8",
        "notes": "Chocolate Cherry Mild has all the class of \"Dunham Dark\" with a dry hint of cherry that cuts through the beer."
    },
    {
        "brewer": "Dunham Massey",
        "name": "Deer Beer",
        "type": "Malty",
        "abv": "4.5",
        "notes": "Dunham Massey Deer Beer is a strong malty bitter. It is a clean full bodied English ale with a slight hint of toffee and is very moreish."
    },
    {
        "brewer": "Dunham Massey",
        "name": "Landlady",
        "type": "Amber",
        "abv": "4.0",
        "notes": "Landlady is a light refreshing biscuity dry ale with a spicy hop finish"
    },
    {
        "brewer": "Elland Brewery Ltd",
        "name": "1872 Porter",
        "type": "Porter",
        "abv": "6.5",
        "notes": "CAMRA Champion Beer of Britain 2013 and International Award Winning Porter rich complex and dark based on an original 1872 recipe with an old port nose and coffee and bitter chocolate flavours on the palate."
    },
    {
        "brewer": "Ennerdale",
        "name": "Darkest",
        "type": "Dark",
        "abv": "4.2",
        "notes": "A dark bitter it is a more potent brew than our other beers but it remains remarkably quaffable. With a rich velvety texture a definite chocolate flavour and a creamy head this beer has converted hundreds of \"light beer\" drinkers to the \"dark side\"."
    },
    {
        "brewer": "Ennerdale",
        "name": "Blonde",
        "type": "Blonde",
        "abv": "3.8",
        "notes": "A fruity golden beer with a heady burst of floral hop aroma and a satisfying clean bitterness. Blonde was first brewed as a summer special` but it proved so popular that it is now one of our permanent beers. A blonde for bitter drinkers it`s our best-seller."
    },
    {
        "brewer": "Ennerdale",
        "name": "Wild Ennerdale",
        "type": "Amber",
        "abv": "4.2",
        "notes": "An amber coloured beer well-hopped with two varieties of English grown hops yielding a good hop aroma and well rounded bitterness"
    },
    {
        "brewer": "Ennerdale",
        "name": "Maple",
        "type": "Amber",
        "abv": "",
        "notes": "Awaiting tasting notes from brewer."
    },
    {
        "brewer": "Firebrand Brewing Co",
        "name": "Big Hop Little Beer",
        "type": "Golden",
        "abv": "3.6",
        "notes": "A golden malt body provides the base for this low ABV explosion of hop flavour. Columbus Nugget and Amarillo combine for a fruit-filled aroma and flavour with a moderate lingering refreshing finish."
    },
    {
        "brewer": "Firebrand Brewing Co",
        "name": "Graffiti IPA",
        "type": "IPA",
        "abv": "5.0",
        "notes": "Smooth malty body from the finest English malt hopped profusely with Cascade & Centennial hops before being dry hopped with bags of Centennial & Motueka. Loads of fruity hoppy flavour with an easy quaffability."
    },
    {
        "brewer": "Geeves",
        "name": "Aurelian",
        "type": "Golden",
        "abv": "4.2",
        "notes": "A quintessentially English golden ale. Fresh leafy English hops dominate with flavours of sweet tangy orange and a refreshingly sweet and bitter finish"
    },
    {
        "brewer": "Greenfield",
        "name": "Silver Owl",
        "type": "Blonde",
        "abv": "4.3",
        "notes": "Pale beer made with powerful hops for a fruity finish"
    },
    {
        "brewer": "Greenfield",
        "name": "Pretty Eclectic",
        "type": "Pale",
        "abv": "4.6",
        "notes": "Super pale, hoppy finish, NZ hops"
    },
    {
        "brewer": "Greenfield",
        "name": "Black Chew Grain",
        "type": "Black",
        "abv": "4.2",
        "notes": "Black bitter with oats"
    },
    {
        "brewer": "Hawkshead",
        "name": "Cumbrian Five Hop ",
        "type": "Golden",
        "abv": "5.0",
        "notes": "A strong golden pale ale with a highly hopped aroma of tropical fruit and a blend of traditional and modern hops giving a full flavour and long dry finish."
    },
    {
        "brewer": "Hawkshead",
        "name": "Dry Stone Stout",
        "type": "Stout",
        "abv": "4.5",
        "notes": "A traditional dry oatmeal stout & as dark as lakeland slate. Named in celebration of one of the defining features of The Lake District landscape - dry stone walls."
    },
    {
        "brewer": "Hawkshead",
        "name": "Lakeland Gold",
        "type": "Golden",
        "abv": "4.4",
        "notes": "Golden Ale. Hoppy and uncompromisingly bitter with complex fruit flavours from the blending of a modern English hop First Gold with the outrageously fruity American hop Cascade.A hopheads' beer... with balance."
    },
    {
        "brewer": "Hawkshead",
        "name": "Windermere Pale",
        "type": "Pale",
        "abv": "3.5",
        "notes": "Summer ale low gravity very pale just slips down. Maris Otter Pale Ale malt with a bit of wheat. Loads of fruity hop flavours from a medley of traditional and modern hops. Not as bitter as our other pale beers."
    },
    {
        "brewer": "Hornbeam",
        "name": "White Swan",
        "type": "Wheat",
        "abv": "4.6",
        "notes": "Wheat beer with a subtle addition of lavender. A tantalising Aroma, spiciness and distinctive floral finish."
    },
    {
        "brewer": "Hornbeam",
        "name": "Lemon Blossom",
        "type": "Pale",
        "abv": "3.7",
        "notes": "A delicious light ale with an aroma of crisp citrus lemon. Perfectly balanced sweetness with delicate bitterness to finish. An exceptional pale ale that leaves you wanting another."
    },
    {
        "brewer": "Hornbeam",
        "name": "Top Hop Best Bitter",
        "type": "Malty",
        "abv": "4.2",
        "notes": "This superb palatable ale is full bodied with malt appeal and ample bitterness. An excellent bright premium bitter."
    },
    {
        "brewer": "Liverpool Organic Brewery Ltd",
        "name": "William Roscoe",
        "type": "Amber",
        "abv": "4.3",
        "notes": "A copper coloured easy drinking beer with a nod towards tradition."
    },
    {
        "brewer": "Liverpool Organic Brewery Ltd",
        "name": "Honey Blond",
        "type": "Golden",
        "abv": "4.5",
        "notes": "A morish beer with moderate hops and organic wild flower honey: one pint is n ever enough."
    },
    {
        "brewer": "Liverpool Organic Brewery Ltd",
        "name": "Cambrinus St Anthonys",
        "type": "Pale",
        "abv": "5.2",
        "notes": "Awaiting tasting notes from brewer."
    },
    {
        "brewer": "Liverpool Organic Brewery Ltd",
        "name": "Bier Head",
        "type": "Golden",
        "abv": "4.1",
        "notes": "Bitter spice with floral notes and a pale malt undertoneTaste: Sharp hoppy fortaste with complex spice and crisp malt tones building to a rich mellow aftertaste"
    },
    {
        "brewer": "Liverpool Organic Brewery Ltd",
        "name": "Best Bitter",
        "type": "Amber",
        "abv": "4.2",
        "notes": "A hoppy beer with citrus notes"
    },
    {
        "brewer": "Liverpool Organic Brewery Ltd",
        "name": "Joseph Williamson",
        "type": "Amber",
        "abv": "4.0",
        "notes": "A traditional bitter with First Gold and Fuggles hops"
    },
    {
        "brewer": "Liverpool Organic Brewery Ltd",
        "name": "Kitty Wilkinson",
        "type": "Stout",
        "abv": "4.5",
        "notes": "Chocolate and Vanilla stout"
    },
    {
        "brewer": "Liverpool Organic Brewery Ltd",
        "name": "Stone Cutter",
        "type": "Pale",
        "abv": "3.7",
        "notes": "A fusion of Maris Otter malts and Pilot and Fuggles hops explode on the palate as biscuit and juicy fruit flavours give way to citrus and berry hops good hop aroma and hoppy after taste. A superb summer beer."
    },
    {
        "brewer": "Lymestone",
        "name": "Foundation Stone",
        "type": "Pale",
        "abv": "4.5",
        "notes": "A glorious golden pale ale crafted from the finest pale and crystal malts. Faint biscuit and chewy juicy citrus fruits burst onto the palate then spicy Boadicea and Pilot hops pepper the taste buds leaving a pleasing long and dry bitter finish."
    },
    {
        "brewer": "Lymestone",
        "name": "Ein Stein",
        "type": "Pale",
        "abv": "5.0",
        "notes": "This lingering combination of pale Maris Otter malts and choice German hops may make you pause for thought. As you contemplate the gentle biscuit malts fresh Hersbrucker hops seduce the taste buds educating and enlightening the palate. "
    },
    {
        "brewer": "Millstone Brewery",
        "name": "Grain Storm",
        "type": "Golden",
        "abv": "4.2",
        "notes": "A golden premium bitter. Full hop aroma with crisp pine and citrus notes followed by a balanced dry bitter finish. "
    },
    {
        "brewer": "Millstone Brewery",
        "name": "True Grit",
        "type": "Pale",
        "abv": "5.0",
        "notes": "A very pale and hoppy strong ale. Well hopped using only Chinnook hop; the mellow bitters make way for a distinctive citrus/grapefruit aroma. "
    },
    {
        "brewer": "Millstone Brewery",
        "name": "Three Shires Bitter",
        "type": "Pale",
        "abv": "4.0",
        "notes": "A very pale hoppy bitter. Full hop aroma with a crisp fruity taste followed by a smooth bitter finish."
    },
    {
        "brewer": "Millstone Brewery",
        "name": "Vale Mill",
        "type": "Pale",
        "abv": "3.9",
        "notes": "Pale gold floral spicy aroma crisp refreshing taste."
    },
    {
        "brewer": "Millstone Brewery",
        "name": "Tiger Rut",
        "type": "Pale",
        "abv": "4.0",
        "notes": "Pale hoppy bitter full-bodied with distinctive citrus grapefruit aroma."
    },
    {
        "brewer": "Moorhouse's",
        "name": "Black Cat",
        "type": "Dark",
        "abv": "3.4",
        "notes": "A dark refreshing ale with a distinctive chocolate malt flavour and a smooth hoppy finish.Supreme Champion Beer of Britain 2000International Brewing Awards â€“ Double Gold Medal Winner 1998"
    },
    {
        "brewer": "Moorhouse's",
        "name": "Blond Witch",
        "type": "Blonde",
        "abv": "4.5",
        "notes": "A pale coloured ale with a crisp delicate fruit flavour dry and refreshing with a smooth hop finish."
    },
    {
        "brewer": "Nethergate",
        "name": "Suffolk County",
        "type": "Malty",
        "abv": "4.0",
        "notes": "A quality best bitter with great hop and  malt aromas. together with a punching bitterness. Was originally brewed as \"Nethergate Bitter\" the grist now having been restored to the original 1986 recipe. "
    },
    {
        "brewer": "Nethergate",
        "name": "IPA",
        "type": "Amber",
        "abv": "3.5",
        "notes": "This amber bitter drinks well above its abv. A well-supported session beer packed with flavour  and fuggles."
    },
    {
        "brewer": "Oakham Ales",
        "name": "JHB",
        "type": "Golden",
        "abv": "3.8",
        "notes": "A golden beer whose aroma is dominated by hops that give characteristic citrus notes. Hops and fruit on the palate are balanced by malt and a bitter base. Dry hoppy finish with soft fruit flavours."
    },
    {
        "brewer": "Oakham Ales",
        "name": "Citra",
        "type": "Golden",
        "abv": "4.2",
        "notes": "A light refreshing beer with pungent grapefruit lychee and gooseberry aromas leading to a dry bitter finish. CHAMPION GOLDEN ALE AT GBBF."
    },
    {
        "brewer": "Oud brewery",
        "name": "Wandering Eye",
        "type": "Pale",
        "abv": "4.3",
        "notes": "New Zealand zesty pale made with nelson sauvin and rakau hops"
    },
    {
        "brewer": "Outstanding",
        "name": "Stout",
        "type": "Stout",
        "abv": "5.5",
        "notes": "A true representation of the beer style thick jet black bitter with liquorice and strong roast flavours in the finish."
    },
    {
        "brewer": "Outstanding",
        "name": "Ultra Pale Ale",
        "type": "Pale",
        "abv": "4.1",
        "notes": "A very light coloured pale ale - crisp and zingy with lemony hop notes."
    },
    {
        "brewer": "Outstanding",
        "name": "Red",
        "type": "Amber",
        "abv": "4.4",
        "notes": "Copper coloured mellow biscuity. This traditional reddish bitter has a light malt body which is finely balanced with a delicate hop bitterness providing a modern take on a classic British ale style."
    },
    {
        "brewer": "Outstanding",
        "name": "Imperial",
        "type": "IPA",
        "abv": "7.4",
        "notes": "Golden, dry and implausibly hopped ale. Relax and take time to savour the intricate flavours of this beer."
    },
    {
        "brewer": "Outstanding",
        "name": "Blond",
        "type": "Blonde",
        "abv": "4.5",
        "notes": "Only Marris Otter low colour malt gives this beer a very pale appearance that looks like a lager but is definitely an ale. Lightly bittered with a heavy concentration of flavour towards citrus and floral nose and mouth feel."
    },
    {
        "brewer": "Parker Brewery",
        "name": "Centurion Pale",
        "type": "Pale",
        "abv": "3.9",
        "notes": "A light refreshing ale with zingy zesty fruit flavours. A crisp and dry ale with a hoppy finish."
    },
    {
        "brewer": "Parker Brewery",
        "name": "Viking Blonde",
        "type": "Blonde",
        "abv": "4.7",
        "notes": "A delightful blonde ale with subtle hints of blackcurrant leaf and red summer berry fruit flavours, with a refreshing full crisp finish."
    },
    {
        "brewer": "Parker Brewery",
        "name": "Saxon Red",
        "type": "Red",
        "abv": "4.7",
        "notes": "A moreish, smooth malty ale packed full of warm fruit flavours, with a subtle hint of spice on the finish."
    },
    {
        "brewer": "Parker Brewery",
        "name": "Sparatan Stout",
        "type": "Stout",
        "abv": "5.0",
        "notes": "Hints of chocolate and coffee and is silky smooth. Think bonfire night and treacle toffee."
    },
    {
        "brewer": "Phoenix",
        "name": "Wobbly Bob",
        "type": "Malty",
        "abv": "6.0",
        "notes": "Red/brown beer strongly malty and fruity flavour with a hint of hops and herbs."
    },
    {
        "brewer": "Purple Moose Brewery",
        "name": "Snowdonia Ale",
        "type": "Pale",
        "abv": "3.6",
        "notes": "A delightfully refreshing pale ale brewed with a delicate combination of aromatic hops."
    },
    {
        "brewer": "Purple Moose Brewery",
        "name": "Glaslyn",
        "type": "Golden",
        "abv": "4.2",
        "notes": "A golden coloured fruity best bitter with a well balanced hoppy finish."
    },
    {
        "brewer": "Raw Brewing Company",
        "name": "Baby Ghost IPA",
        "type": "Pale",
        "abv": "3.9",
        "notes": "Session version of Grey Ghost IPA powerful grapefruit citrus aroma"
    },
    {
        "brewer": "Robinsons Brewery",
        "name": "Trooper",
        "type": "Amber",
        "abv": "4.8",
        "notes": "Created with Iron Maiden's lead vocalist Bruce Dickinson. A deep golden ale with citric hop notes and dominating malt flavours with a subtle hint of lemon. Real depth of character with complex hop notes using a combination of Goldings Bobec and Cascade Hops."
    },
    {
        "brewer": "Robinsons Brewery",
        "name": "Dizzy Blonde",
        "type": "Blonde",
        "abv": "3.8",
        "notes": "Straw coloured Summer Ale with distinctive herbal or perfume like hop aroma. This light refreshing beer has a clean zesty hop dominated palate complimented by a crisp dry finish."
    },
    {
        "brewer": "Robinsons Brewery",
        "name": "Old Tom",
        "type": "Dark",
        "abv": "8.5",
        "notes": "Superior dark rich and warming strong ale with a cherry brandy like colour and character.Booming balance of ripe malt and peppery hops combine with roasted nut and chocolate flavours with a smoky richness.Distinctive deep port wine finish with bitter hops balance complemented by heady vinous aromas of dark fruit."
    },
    {
        "brewer": "Saltaire",
        "name": "Elderflower Blonde",
        "type": "Blonde",
        "abv": "4.0",
        "notes": "A refreshing blonde ale infused with the delicate flavour of elderflower. "
    },
    {
        "brewer": "Saltaire",
        "name": "Saltaire Blonde",
        "type": "Blonde",
        "abv": "4.0",
        "notes": "A straw coloured light ale with soft malt flavours delicately hopped with Czech and German hop varieties."
    },
    {
        "brewer": "Saltaire",
        "name": "Raspberry Blonde",
        "type": "Blonde",
        "abv": "4.0",
        "notes": "Refreshing blonde ale delicately infused with raspberry flavours. "
    },
    {
        "brewer": "Scarborough Brewery",
        "name": "Sea Lord",
        "type": "Golden",
        "abv": "4.3",
        "notes": "A golden well-rounded bitter with admiral hops."
    },
    {
        "brewer": "Scarborough Brewery",
        "name": "Blonde",
        "type": "Blonde",
        "abv": "3.8",
        "notes": "Easy going session pale ale."
    },
    {
        "brewer": "Scarborough Brewery",
        "name": "Old sailor",
        "type": "Amber",
        "abv": "4.9",
        "notes": "SIBA award winning American style golden pale ale packed with hops for tropical flavours and a hoppy aroma"
    },
    {
        "brewer": "Siren Craft Brew",
        "name": "Soundwave",
        "type": "IPA",
        "abv": "5.6",
        "notes": " USA west coast style IPA: golden, immensely hoppy and alive with grapefruit peach and mango flavours. Soundwave carries her drinker to golden shores of California where craft ale is nectar. She is the driest of Siren`s ales  full with flavour but subtle with bitterness.Her resinous finish will pull you off balance."
    },
    {
        "brewer": "Stockport Brewing Co",
        "name": "Stockporter",
        "type": "Porter",
        "abv": "4.8",
        "notes": "A great ale with subtle hints of liquorice dark chocolate and coffee. Warm cosy and delicious."
    },
    {
        "brewer": "Stockport Brewing Co",
        "name": "Cascade",
        "type": "Pale",
        "abv": "4.0",
        "notes": "Very light in colour gently hopped with English cascade which gives a slight citrusy flavour."
    },
    {
        "brewer": "Stockport Brewing Co",
        "name": "Deluded IPA",
        "type": "IPA",
        "abv": "6.2",
        "notes": "Awaiting tasting notes from brewer."
    },
    {
        "brewer": "Storm Brewing",
        "name": "Pale Gale Ale",
        "type": "Pale",
        "abv": "4.4",
        "notes": "A truly classic German style beer using Hersbrucker hops & lager malts to create a light delicate taste with floral hoppy overtones "
    },
    {
        "brewer": "Storm Brewing",
        "name": "Typhoon",
        "type": "Dark",
        "abv": "5.0",
        "notes": "A unique blend of American Cluster and Golding hops create this classic dark beer with a smooth roast finish.\t"
    },
    {
        "brewer": "Storm Brewing",
        "name": "Ale Force",
        "type": "Amber",
        "abv": "4.2",
        "notes": "An amber coloured ale created from a fusion of chocolate, pale and crystal malts with the finest Fuggles hops"
    },
    {
        "brewer": "The Parker Brewery",
        "name": "Viking Blonde",
        "type": "Blonde",
        "abv": "4.7",
        "notes": "a delightful blonde ale subtle blackcurrant leaf and red berry fruit flavours and a refreshingly dry finish"
    },
    {
        "brewer": "The Parker Brewery",
        "name": "Saxon Ale",
        "type": "Ruby",
        "abv": "4.5",
        "notes": "A stunning ruby red ale in colour. A morish smooth drinking ale packed full of warm fruit flavours and a subtle of spice on the finish"
    },
    {
        "brewer": "The Parker Brewery",
        "name": "Dark Spartan",
        "type": "Stout",
        "abv": "5.0",
        "notes": "Hints of chocolate and coffee and silky smooth think bonfire night and treacle toffee"
    },
    {
        "brewer": "The Parker Brewery",
        "name": "Barbarian Bitter",
        "type": "Amber",
        "abv": "4.1",
        "notes": "Traditional English ale, golden amber in colour with notes of caramel. Smooth and well balanced, an easy drinking ale."
    },
    {
        "brewer": "Thornbridge Brewery",
        "name": "Made North",
        "type": "Golden",
        "abv": "3.8",
        "notes": " Manchester-style sessionable bitter which pours a bright golden colour. Bracingly bitter and dry Made North has light malt aromas and flavours of earthy floral and very moreish English hops."
    },
    {
        "brewer": "Thornbridge Brewery",
        "name": "Jaipur",
        "type": "IPA",
        "abv": "5.9",
        "notes": "A citrus dominated India Pale Ale its immediate impression is soft and smooth yet builds to a crescendo of massive hoppiness accentuated by honey. An enduring bitter finish."
    },
    {
        "brewer": "Thornbridge Brewery",
        "name": "Lord Marples",
        "type": "Malty",
        "abv": "4.0",
        "notes": "Surprisingly smooth with light toffee and caramel characters a mixture of floral and spicy hop notes and a pleasing bitter finish"
    },
    {
        "brewer": "Tiny Rebel",
        "name": "Cwtch",
        "type": "Amber",
        "abv": "4.6",
        "notes": "a Welsh Red Ale. 6 malts 2 US hops and weeks of Tiny Rebel love and attention go into making this unique beer.Champion Beer of Britian 2015!"
    },
    {
        "brewer": "Track",
        "name": "Sonoma",
        "type": "Pale",
        "abv": "3.8",
        "notes": "Awaiting tasting notes from brewer."
    },
    {
        "brewer": "Track",
        "name": "Toba",
        "type": "Stout",
        "abv": "5.6",
        "notes": "Lovely rich roasted stout with full on liquorice flavourwhich reminds me of the black jelly sweets that everyone grabbedthinking they were blackcurrantthen left because they were liquorice leaving more for me because I've always loved liquorice"
    },
    {
        "brewer": "Track",
        "name": "Toba",
        "type": "Stout",
        "abv": "5.6",
        "notes": "Lovely rich roasted stout with full on liquorice flavourwhich reminds me of the black jelly sweets that everyone grabbedthinking they were blackcurrantthen left because they were liquorice leaving more for me because I've always loved liquorice"
    },
    {
        "brewer": "Weird Beard",
        "name": "Mariana Trench",
        "type": "Amber",
        "abv": "5.3",
        "notes": "A riot of mango and passion-fruit on the nose but balanced enough to drink by the bucketful. "
    },
    {
        "brewer": "Welbeck Abbey Brewery",
        "name": "Red Feather",
        "type": "Amber",
        "abv": "3.9",
        "notes": "An amber bitter brewed with crystal malt and roasted barley to give a rich caramel flavour."
    },
    {
        "brewer": "Wilson Potter Brewery LLP",
        "name": "Don't Fall",
        "type": "Blonde",
        "abv": "3.9",
        "notes": " A lovely pale hoppy blonde"
    },
    {
        "brewer": "Wilson Potter Brewery LLP",
        "name": "Tandle Hill",
        "type": "Blonde",
        "abv": "3.9",
        "notes": "A blonde beer with strong citrus flavours and aroma created using a blend of three hops.  Winner of Best Beer at Oldham Beer Festival 2012."
    },
    {
        "brewer": "Wilson Potter Brewery LLP",
        "name": "Is This the Way",
        "type": "Golden",
        "abv": "5.6",
        "notes": "A golden ale with a strong citrus taste from the addition of Amarillo hops"
    },
    {
        "brewer": "Wilson Potter Brewery LLP",
        "name": "The Darkness",
        "type": "Stout",
        "abv": "4.4",
        "notes": "A rich, dark stout with a fruity, roasted malt aroma and taste with a liquorice finish."
    },
    {
        "brewer": "Wilson Potter Brewery LLP",
        "name": "Bon Don Doon",
        "type": "Blonde",
        "abv": "4.2",
        "notes": "Refreshing blonde beer made with Columbus and Perle hops."
    },
    {
        "brewer": "Wincle Beer Company Ltd",
        "name": "Burkes Special",
        "type": "Amber",
        "abv": "5.0",
        "notes": "A deeply satisfying chestnut coloured English Special Bitter. The beer is distinctly English in character with a full malty and fruity taste."
    },
    {
        "brewer": "Wincle Beer Company Ltd",
        "name": "Cosmic Flyer",
        "type": "IPA",
        "abv": "5.0",
        "notes": "A green hop IPA "
    },
    {
        "brewer": "Wincle Beer Company Ltd",
        "name": "Sir Philip",
        "type": "Copper",
        "abv": "4.2",
        "notes": "Amber in colour this premium bitter has light malty overtone balanced with the classic pairing of Fuggles and Target hops."
    },
    {
        "brewer": "XT Brewing",
        "name": "XT15 English IPA",
        "type": "IPA",
        "abv": "4.5",
        "notes": "Brewed to celebrate the new varieties of English Hops. This is an English IPA triple hopped, pale amber ale with caramel malt notes, lasting floral, hop character."
    },
    {
        "brewer": "XT Brewing Co",
        "name": "XT 1",
        "type": "Blonde",
        "abv": "4.2",
        "notes": "Citrus and fruity hops flirt with reserved English barley and some very naughty Bohemian malts to make a characterful blonde ale that you'll want to meet again."
    },
  {
    "name":"Pilsner",
    "brewer":"Geipel",
    "type":"Lager",
    "abv":4.6,
    "notes":"A golden lager with a Slightly floral, hoppy perfume aroma. Dry refreshing taste and finish with hints of fruit"
  },
  {
    "name":"Zoigl",
    "brewer":"Geipel",
    "type":"Lager",
    "abv":5.4,
    "notes":"A malty amber lager inspired by the traditional communal brews of North-Eastern Bavaria. Brewed with Hersbrucker hops. Initial biscuity malt notes. Low, earthy hop underlying chocolate cherry fruit notes in the lingering finish. "
  },
  {
    "name":"Hefeweizen",
    "brewer":"Geipel",
    "type":"Lager",
    "abv":5.6,
    "notes":"A golden wheat beer in the traditional Bavarian style. 75% wheat malt and Spalt Select hops. Top-fermented. Cloudy with gentle wheat malt notes which linger throughout. Rich aroma of banana and coriander. Lingering finish with some lemon citrus notes. "
  },
  {
    "name":"Lakeland Pilsner",
    "brewer":"Hawkshead",
    "type":"Lager",
    "abv":5,
    "notes":"A crisp refreshing premium beer brewed with lager malt, wheat, European hops, soft Lakeland water and ale yeast. Top fermented for maximum flavour"
  },
  {
    "name":"Lagonda ",
    "brewer":"Marble",
    "type":"IPA (Keg)",
    "abv":5,
    "notes":"Craft India Pale Ale with a golden malt base complementing a quadruple addition of hops. A floral and bitter finish. "
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
