<?php 
include 'header.php'
?>
<body>
<?php
include 'navigation.php'
?>
<div style="width:100%; padding-left:15px; padding-right:15px; background-color: #1dbfd7; min-height: 40px; text-align:center;"><span style="line-height:3" class="mediumfont helvMed">Beer List</span></div>
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
        brewer: {
                index: 1,
                type: "string",
                friendly: "Brewer",
                filterTooltip: "Type here to filter by brewer", //Show some additional info about column
                placeHolder: "Filter..", //Overrides default placeholder and placeholder specified in data types(row 34).
                tooltip: "Click any column name to toggle ascending/descending order"
                },
            name: {
                index: 2,
                type: "string",
                friendly: "Name",
                filterTooltip: "Type here to filter by name", //Show some additional info about column
                placeHolder: "Filter..", //Overrides default placeholder and placeholder specified in data types(row 34).
                tooltip: "Click any column name to toggle ascending/descending order"

                
            },
            type: {
                index: 3,
                type: "string",
                friendly: "Category",               
                filterTooltip: "Type here to filter by category", //Show some additional info about column
                placeHolder: "Filter.." //Overrides default placeholder and placeholder specified in data types(row 34).
            },
            abv: {
                index: 4,
                type: "string",
                friendly: "ABV",
                filterTooltip: "Type here to filter by strength", //Show some additional info about column
                placeHolder: "Filter.." //Overrides default placeholder and placeholder specified in data types(row 34).
            },
            notes: {
                index: 5,
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
        brewer:"n/a",
        name: "Hawkshead Pilsner",
        type: "Lager & Craft",
        abv:"5.0%",
        notes:"Crisp, prizewinning premium beer brewed with lager malt, wheat, European hops, soft Lakeland water and ale yeast"
      },
      {
        brewer:"n/a",
        name: "Geipel Pilsner",
        type: "Lager & Craft",
        abv:"4.6%",
        notes:"Golden lager brewed with Perle hops. Floral, hoppy aroma, dry refreshing taste, finish with hints of fruit"
      },
      {
      	brewer:"n/a",
        name: "Geipel Zoigl",
        type: "Lager & Craft",
        abv:"5.4%",
        notes:"Amber beer brewed with Hersbrucker hops. Initial biscuity flavour. Earthy hoppiness gives way to chocolate cherry notes in the lingering finish"
      },
				  {
    "brewer":"Abbeydale Brewery",
    "name":"Absolution",
    "type":"Pale",
    "abv":"5.3",
    "notes":"Mid-straw coloured beer with aromas of tropical fruit particularly mangoes. The beer  is sweet all the way through balanced by bitterness at the finish. Flavours are fruity with toffee-apples and bananas. A clean tasting beer sweetish but not cloying. Very drinkable."
  },
  {
    "brewer":"Abbeydale Brewery",
    "name":"Daily Bread",
    "type":"Malty",
    "abv":"3.8",
    "notes":"A classic English bitter. Well-balanced copper colored beer with malt flavors and a smooth bitter finish. Subtle hop characteristics from traditional Fuggles hops. Brewed originally for our own pub and now released into the trade."
  },
  {
    "brewer":"Abbeydale Brewery",
    "name":"Deception",
    "type":"Blonde",
    "abv":"4.1",
    "notes":"A pale beer made with fabulous Nelson Sauvin hops. Aromas of elderflower and grapes. Strong citrus flavours especially grapefruit. Long lasting bitter finish. Very refreshing and packed full of flavour."
  },
  {
    "brewer":"Abbeydale Brewery",
    "name":"Dr Morton's Gra'mma Checker",
    "type":"Amber",
    "abv":"4.1",
    "notes":"Gra'mma Checker enables you to bring friends back without embarrassment!"
  },
  {
    "brewer":"Abbeydale Brewery",
    "name":"Dr Morton's Typopotamus",
    "type":"Amber",
    "abv":"4.1",
    "notes":"For those who approach spelling like a charging hippo!"
  },
  {
    "brewer":"Abbeydale Brewery",
    "name":"White Lady",
    "type":"Pale",
    "abv":"4.7",
    "notes":"Tropical fruit flavours and a quenching bitter finish. Made with an enticing mix of Continental and New Zealand hops and a small quantity of lager malt in the mash."
  },
  {
    "brewer":"Arran Brew Ltd",
    "name":"Arran Ale",
    "type":"Mild",
    "abv":"3.8",
    "notes":"Perfumed hop aroma delicate balance of malt and fruit with a dry hop finish. A pale amber coloured refreshing session ale."
  },
  {
    "brewer":"Arran Brew Ltd",
    "name":"Arran Blonde",
    "type":"Blonde",
    "abv":"5",
    "notes":"Delicate floral hop aroma. A subtle well balanced finish with good character. A pale golden beer clear tasting in a continental style."
  },
  {
    "brewer":"Arran Brew Ltd",
    "name":"Arran Dark",
    "type":"Dark",
    "abv":"4.3",
    "notes":"Rich in aroma of malt hops with ripe fruit. Full malt with a deep bitter finish. A traditional style Scottish Heavy Ale, WBA World's Best Dark Brown Ale 2012"
  },
  {
    "brewer":"Arran Brew Ltd",
    "name":"Arran ID Black IPA",
    "type":"IPA",
    "abv":"6",
    "notes":"Dark strong Scottish IPA full of flavour"
  },
  {
    "brewer":"Bollington Brewing Company",
    "name":"Autumn Nights",
    "type":"Amber",
    "abv":"4",
    "notes":"A warming seasonal beer with a selection of characterful hops including the cirtrus favour of Columbus."
  },
  {
    "brewer":"Bollington Brewing Company",
    "name":"Bollington Best",
    "type":"Golden",
    "abv":"4.2",
    "notes":"A delightfully hoppy bitter. Clean & crisp with a light golden colour and a refreshing bitter aftertaste. "
  },
  {
    "brewer":"Bollington Brewing Company",
    "name":"Dinner Ale",
    "type":"Amber",
    "abv":"4.3",
    "notes":"Deep copper coloured beer with a fresh slightly fruity nose a traditional style bitter with a dry hoppy finish. "
  },
  {
    "brewer":"Bollington Brewing Company",
    "name":"Endurance ",
    "type":"Pale",
    "abv":"4.8",
    "notes":"American Pale Ale brewed with a special yeast and containing Citra hops."
  },
  {
    "brewer":"Bollington Brewing Company",
    "name":"Oat Mill Stout",
    "type":"Stout",
    "abv":"5",
    "notes":"An Oatmeal Stout with a twist. A hoppy bitter taste keeps the sweetness in check and allows for a great dark beer. "
  },
  {
    "brewer":"Bollington Brewing Company",
    "name":"White Nancy",
    "type":"Pale",
    "abv":"4.1",
    "notes":"Very pale light bitter with a good hoppiness and light body."
  },
  {
    "brewer":"Box Steam Brewery",
    "name":"Funnel Blower",
    "type":"Porter",
    "abv":"4.5",
    "notes":"Dark brown in color with a subtle vanilla aroma. The vanilla sweetness contrasts nicely with the slight bitterness from the roasted barley and chocolate malts. "
  },
  {
    "brewer":"Box Steam Brewery",
    "name":"Steam Porter",
    "type":"Porter",
    "abv":"4.4",
    "notes":"A smooth drinking well rounded Porter with aslightly smokey aroma. Roasted malt gives way tochocolate undertones on the palate."
  },
  {
    "brewer":"Brightside Brewing Company",
    "name":"Amarillo",
    "type":"IPA",
    "abv":"5",
    "notes":"Light in colour long on taste. American hops at their finest SIBA Champion 2014"
  },
  {
    "brewer":"Brightside Brewing Company",
    "name":"Firestarter Golden Ale with Ginger",
    "type":"Golden",
    "abv":"4.5",
    "notes":"A golden ale brewed with fresh ginger this beer's heat creeps up on you rather than hitting you square in the face...It's flavoursome and warming so great for the fast approaching winter weather."
  },
  {
    "brewer":"Brightside Brewing Company",
    "name":"Manchester Skyline",
    "type":"Golden",
    "abv":"4.6",
    "notes":"A full bodied Golden Ale with a greater depth of colour and not as dry as most"
  },
  {
    "brewer":"Brightside Brewing Company",
    "name":"Maverick IPA",
    "type":"IPA",
    "abv":"4.8",
    "notes":"A golden American style IPA with punchy bitterness and a dominant citrus hopped flavour.   "
  },
  {
    "brewer":"Brightside Brewing Company",
    "name":"Odin",
    "type":"Blonde",
    "abv":"3.8",
    "notes":"A refreshing light bodied blonde ale made from a blend of three fruity American hops with the addition of wheat - so it will have a slight haze."
  },
  {
    "brewer":"Chantry Brewery",
    "name":"DBF 7",
    "type":"Golden",
    "abv":"3.8",
    "notes":"Brewed by the Didsbury Festival Beer team at Chantry Brewery. Brewed to a traditional South Yorkshire recipe and all at a special price! To commemorate the 7th Didsbury Beer Festival  "
  },
  {
    "brewer":"Chantry Brewery",
    "name":"Diamond Black Stout",
    "type":"Stout",
    "abv":"4.5",
    "notes":"Full bodied dry stout with a bitter finish spicy with hints of liquorice and dark berries. Brewed using the finest Yorkshire malts and roast barley."
  },
  {
    "brewer":"Chantry Brewery",
    "name":"New York Pale",
    "type":"Pale",
    "abv":"3.9",
    "notes":"A pale session bitter with a refreshing citrus taste and a crisp bitter finish."
  },
  {
    "brewer":"Chantry Brewery",
    "name":"Women of Steel ",
    "type":"Golden",
    "abv":"3.6",
    "notes":"Golden Bitter - Using all British ingredients with hops from Kent and malt from Yorkshire. This beer is well balanced with a zesty lemon taste with hints of orange. "
  },
  {
    "brewer":"Coniston Brewery",
    "name":"Bluebird Bitter",
    "type":"Pale",
    "abv":"3.6",
    "notes":"It is exceedingly pale with just a hint of colour in its cheeks from the dash of crystal malt. It has a massive orange fruit aroma from the challengers balanced by biscuity malt."
  },
  {
    "brewer":"Copper Dragon",
    "name":"Best Bitter",
    "type":"Amber",
    "abv":"3.8",
    "notes":"A refreshing amber coloured beer with a well balanced malty and hoppy flavour.  An excellent mid-gravity session ale breewed to suit the Northern palate."
  },
  {
    "brewer":"Copper Dragon",
    "name":"Black Gold",
    "type":"Dark",
    "abv":"3.7",
    "notes":"The use of traditional coloured and roasted malts gives a unique rich and luscious flavour."
  },
  {
    "brewer":"Copper Dragon",
    "name":"Golden Pippin",
    "type":"Blonde",
    "abv":"3.9",
    "notes":"A refreshing blonde beer brewed using a specially selected hop to create a citrus flavour."
  },
  {
    "brewer":"Cumbrian",
    "name":"Loweswater Gold",
    "type":"Golden",
    "abv":"4.3",
    "notes":"A true golden ale, it is brewed using three malts including lager and Maris Otter together with German hops. Bursting with tropical flavour it is an outstanding beer."
  },
  {
    "brewer":"Dark Star Brewery",
    "name":"Art of Darkness",
    "type":"Dark",
    "abv":"3.5",
    "notes":"This is a low gravity beer with a big heart. A range of dark malts bring classic roasted flavours along with a hint of sweetness through the natural complex sugars. Warrior bittering hops are used along with a blend of the finest aroma hops to add fruit and spicy flavours that are the perfect balance making this a very drinkable ale."
  },
  {
    "brewer":"Dark Star Brewery",
    "name":"Espresso",
    "type":"Stout",
    "abv":"4.2",
    "notes":"A black beer brewed with roasted barley malt and challenger hops with freshly ground espresso coffee beans also added to the copper for a few minutes to provide a rich and complementary coffee aroma"
  },
  {
    "brewer":"Dark Star Brewery",
    "name":"Green Hopped IPA",
    "type":"IPA",
    "abv":"6.5",
    "notes":"An already full flavoured IPA made with the very aromatic Simcoe hops is then made even bigger by using fresh green Target hops infused into the slowly conditioning beer.  Designed for those who like their hops as an extreme sport!"
  },
  {
    "brewer":"Dark Star Brewery",
    "name":"Hophead",
    "type":"Pale",
    "abv":"3.8",
    "notes":"An extremely clean-drinking pale gold coloured ale with a strong floral aroma and elderflower notes. "
  },
  {
    "brewer":"Dunham Massey",
    "name":"Cheshire IPA",
    "type":"IPA",
    "abv":"4.7",
    "notes":"A strong pale hoppy bitter beer based on the IPA's of old."
  },
  {
    "brewer":"Dunham Massey",
    "name":"Chocolate Cherry Mild",
    "type":"Mild",
    "abv":"3.8",
    "notes":"Chocolate Cherry Mild has all the class of \"Dunham Dark\" with a dry hint of cherry that cuts through the beer."
  },
  {
    "brewer":"Dunham Massey",
    "name":"Deer Beer",
    "type":"Malty",
    "abv":"4.5",
    "notes":"Dunham Massey Deer Beer is a strong malty bitter. It is a clean full bodied English ale with a slight hint of toffee and is very moreish."
  },
  {
    "brewer":"Dunham Massey",
    "name":"Dunham Milk Stout",
    "type":"Stout",
    "abv":"4",
    "notes":"A classic full bodied sweet stout with a creamy roast malt character."
  },
  {
    "brewer":"Dunham Massey",
    "name":"East India Pale",
    "type":"IPA",
    "abv":"6",
    "notes":"A strong light hoppy bitter ale brewed at 6% using all English malts and hops. Just as the beers were back in the day!"
  },
  {
    "brewer":"Dunham Massey",
    "name":"Stamford Bitter ",
    "type":"Golden",
    "abv":"4.2",
    "notes":"A golden full bodied bitter with a complex blend of hops and gives a slightly dry finish."
  },
  {
    "brewer":"Dunham Massey",
    "name":"Treacle Treat",
    "type":"Dark",
    "abv":"4.1",
    "notes":"A classic dark English bitter with a hint of treacle."
  },
  {
    "brewer":"Elland Brewery Ltd",
    "name":"1872 Porter",
    "type":"Porter",
    "abv":"6.5",
    "notes":"CAMRA Champion Beer of Britain 2013 and International Award Winning Porter rich complex and dark based on an original 1872 recipe with an old port nose and coffee and bitter chocolate flavours on the palate."
  },
  {
    "brewer":"Elland Brewery Ltd",
    "name":"Ellium",
    "type":"Pale",
    "abv":"3.8",
    "notes":"Refreshing session ale light straw coloured smooth and rounded with sweet fruit aroma and a dry finish."
  },
  {
    "brewer":"Elland Brewery Ltd",
    "name":"Nettle Thrasher",
    "type":"Malty",
    "abv":"4.4",
    "notes":"This is a copper coloured traditional strong ale brewed using six different malts and robust flavours from the combined use of English hop varieties. All this goes together to make this a mighty mouthful!"
  },
  {
    "brewer":"Ennerdale",
    "name":"Blonde",
    "type":"Blonde",
    "abv":"3.8",
    "notes":"A fruity golden beer with a heady burst of floral hop aroma and a satisfying clean bitterness. Blonde was first brewed as a summer special but it proved so popular that it is now one of our permanent beers. A blonde for bitter drinkers it's our best-seller."
  },
  {
    "brewer":"Ennerdale",
    "name":"Darkest",
    "type":"Dark",
    "abv":"4.2",
    "notes":"A dark bitter it is a more potent brew than our other beers but it remains remarkably quaffable. With a rich velvety texture a definite chocolate flavour and a creamy head this beer has converted hundreds of \"light beer\" drinkers to the \"dark side\"."
  },
  {
    "brewer":"Ennerdale",
    "name":"IPA",
    "type":"Amber",
    "abv":"TBC",
    "notes":"Awaiting tasting notes from brewer so just try if for yourself. Our beermeister has selected it - so it must be good!"
  },
  {
    "brewer":"Ennerdale",
    "name":"Wild Ennerdale",
    "type":"Amber",
    "abv":"4.2",
    "notes":"An amber coloured beer well-hopped with two varieties of English grown hops yielding a good hop aroma and well rounded bitterness"
  },
  {
    "brewer":"Fool Hardy Ales",
    "name":"Rash Dash",
    "type":"Copper",
    "abv":"3.8",
    "notes":"A rich copper beer with a very light floral aroma. Initial toffee flavour immediately gives way to a bombardmentof hops that linger for a long aftertaste. This is a very popular ale with an outstanding reputation."
  },
  {
    "brewer":"Fool Hardy Ales",
    "name":"Risky Blond",
    "type":"Blonde",
    "abv":"4.4",
    "notes":"An easy-drinking pale ale with a good balance of hops subtle hints of citrus and a well rounded finish. This is our bestselling beer and is rapidly gathering a reputation for flying off the barin record time."
  },
  {
    "brewer":"Green Mill Brewery",
    "name":"Big Chief Bitter",
    "type":"Pale",
    "abv":"5.5",
    "notes":"A premium bitter heavily hopped with Chinook and Cascade."
  },
  {
    "brewer":"Green Mill Brewery",
    "name":"Green Mill Gold",
    "type":"Golden",
    "abv":"3.6",
    "notes":"A very drinkable golden session bitter."
  },
  {
    "brewer":"Hawkshead",
    "name":"Cumbrian Five Hop ",
    "type":"Golden",
    "abv":"5",
    "notes":"A strong golden pale ale with a highly hopped aroma of tropical fruit and a blend of traditional and modern hops giving a full flavour and long dry finish."
  },
  {
    "brewer":"Hawkshead",
    "name":"Dry Stone Stout",
    "type":"Stout",
    "abv":"4.5",
    "notes":"A traditional dry oatmeal stout and as dark as lakeland slate. Named in celebration of one of the defining features of The Lake District landscape - dry stone walls."
  },
  {
    "brewer":"Hawkshead",
    "name":"Lakeland Gold",
    "type":"Golden",
    "abv":"4.4",
    "notes":"Golden Ale. Hoppy and uncompromisingly bitter with complex fruit flavours from the blending of a modern English hop First Gold with the outrageously fruity American hop Cascade. A hopheads' beer... with balance."
  },
  {
    "brewer":"Hawkshead",
    "name":"Windermere Pale",
    "type":"Pale",
    "abv":"3.5",
    "notes":"Summer ale low gravity very pale just slips down. Maris Otter Pale Ale malt with a bit of wheat. Loads of fruity hop flavours from a medley of traditional and modern hops. Not as bitter as our other pale beers."
  },
  {
    "brewer":"Hesket Newmarket",
    "name":"Black Sail",
    "type":"Dark",
    "abv":"4",
    "notes":"A brand new very dark beer from Hesket made with lots of chocolate malt and black malt. Complex flavours of coffee and liquorice abound."
  },
  {
    "brewer":"Hesket Newmarket",
    "name":"Helvellyn Gold",
    "type":"Golden",
    "abv":"4",
    "notes":"Straw coloured bitter substantially hopped with traditional Goldings and Challenger hops moderated by the use of malted oats alongside Maris Otter pale ale malt to give an exceptionally smooth finish."
  },
  {
    "brewer":"Hesket Newmarket",
    "name":"Old Carrock Strong Ale",
    "type":"Dark",
    "abv":"6",
    "notes":"A smooth blend of crystal chocolate and pale ale malts modestly bittered with East Kent Goldings and First Gold hops then finished with a late addition of Styrian Goldings to give that classic liquid Christmas pudding flavour."
  },
  {
    "brewer":"Hesket Newmarket",
    "name":"Red Pike",
    "type":"Ruby",
    "abv":"3.8",
    "notes":"A West Coast Red Ale with lots of malt flavour and some up front hops giving pine and citrus notes."
  },
  {
    "brewer":"Hornbeam",
    "name":"Black Coral Stout ",
    "type":"Stout",
    "abv":"4.5",
    "notes":"A smooth dry roast malt dark and full bodied with a creamy head. Satisfying with subtle bitterness. "
  },
  {
    "brewer":"Hornbeam",
    "name":"Half Witebeir",
    "type":"Wheat",
    "abv":"4.6",
    "notes":"Lime and spice and lavender are the dominant flavours in this refeshing crystal wheat beer."
  },
  {
    "brewer":"Hornbeam",
    "name":"Lemon Blossom",
    "type":"Pale",
    "abv":"3.7",
    "notes":"A delicious light ale with an aroma of crisp citrus lemon. Perfectly balanced sweetness with delicate bitterness to finish. An exceptional pale ale that leaves you wanting another."
  },
  {
    "brewer":"Hornbeam",
    "name":"Lime Blossom",
    "type":"Pale",
    "abv":"3.7",
    "notes":"Refreshing pale ale clean fresh lime and tropical fruits burst onto the palette deep and complex exceptionally refreshing."
  },
  {
    "brewer":"Hornbeam",
    "name":"Orange Blossom",
    "type":"Amber",
    "abv":"3.8",
    "notes":"Zesty golden pale ale"
  },
  {
    "brewer":"Hornbeam",
    "name":"Top Hop Best Bitter",
    "type":"Malty",
    "abv":"4.2",
    "notes":"This superb palatable ale is full bodied with malt appeal and ample bitterness. An excellent bright premium bitter."
  },
  {
    "brewer":"Hydes Brewery Ltd",
    "name":"Hydes First Frost",
    "type":"Amber",
    "abv":"3.8",
    "notes":"A very pale session bitter produced from 100% lightly kilned Winsome Pale Ale malt. In tune with the season and to mimic the first frosts of the year hopping is crisp and sharp. The use of Centennial hops from the U.S.A. ensures a prominent citrus aroma and lingering bitterness."
  },
  {
    "brewer":"Hydes Brewery Ltd",
    "name":"Lowry Outcast",
    "type":"Dark",
    "abv":"4.3",
    "notes":"A dark smooth and satisfying Ale using Chocolate Malt and Roast Barley  perfectly blended with target and fuggle hops."
  },
  {
    "brewer":"Ilkley Brewery",
    "name":"Green Rose",
    "type":"Copper",
    "abv":"5.6",
    "notes":"Every year we brew using fresh hops - picked straight from the bine and brewed with immediately to harness their fresh hoppy goodness.  Only one batch brewed!"
  },
  {
    "brewer":"Ilkley Brewery",
    "name":"Ilkley Black",
    "type":"Mild",
    "abv":"3.7",
    "notes":"The winner of several awards and rated in the top ten beers to drink this winter by leading beer writer Melissa Cole, who says when you want something satisfying yet on the lower side of the alcohol scale mild is your best friend.  This particular example is lusciously espresso-like on the nose and palate joined by a little bit of astringent redcurrant and moreish hint of liquorice at the end."
  },
  {
    "brewer":"Ilkley Brewery",
    "name":"Ilkley Pale",
    "type":"Pale",
    "abv":"4.2",
    "notes":"A dry crisp pale ale strongly hopped with wonderfully floral Nelson Sauvin hops to give a strong but mellow citrus finish. Bronze medal winner at the SIBA Northern region beer competition 2010."
  },
  {
    "brewer":"Ilkley Brewery",
    "name":"Joshua Jane",
    "type":"Amber",
    "abv":"3.7",
    "notes":"Rich nut-brown Yorkshire Ale.  Named after Mary Jane's suitor, ont' Ilkla Moor baht'at."
  },
  {
    "brewer":"Ilkley Brewery",
    "name":"Man from D.U.N.K.E.L",
    "type":"Wheat",
    "abv":"6",
    "notes":"A collaboration with brewers from the Institute of Brewing and Distilling. A naturally hazy dark wheat beer - only a single batch was brewed so get your hands on it while you can."
  },
  {
    "brewer":"Ilkley Brewery",
    "name":"Mary Jane",
    "type":"Pale",
    "abv":"3.5",
    "notes":"Our multi-award winning pale session ale made with Amarillo hops from the USA to give a fresh and citrusy aroma with hints of lemon tangerine and grapefruit.  Its medium sweet and super smooth with a light bitterness."
  },
  {
    "brewer":"Lancaster Brewery",
    "name":"1842 Pilsner",
    "type":"Golden",
    "abv":"4.5",
    "notes":"Delicious light golden lager ale brewed with imported bohemian hops."
  },
  {
    "brewer":"Lancaster Brewery",
    "name":"Amber",
    "type":"Amber",
    "abv":"3.6",
    "notes":"Dark gold in colour Amber complements its flavour profile with an abundantly hoppy bouquet allowing the drinker to relish subtle floral and citrus aromas. Both aromatic and bursting with flavour."
  },
  {
    "brewer":"Lancaster Brewery",
    "name":"Black",
    "type":"Stout",
    "abv":"4.5",
    "notes":"Black may be dark in appearance but is surprisingly crisp with a full bouquet of crisp fruits spices and floral aromas. Brewed using a combination of Cascade and Challenger hops combined with Chocolate and Maris Otter malt."
  },
  {
    "brewer":"Lancaster Brewery",
    "name":"Blonde",
    "type":"Blonde",
    "abv":"4",
    "notes":"This most stylish and contemporary beer is crafted from pale Maris Otter Malt and carefully combined with Germanic style Munich Malt. The slightly citrus and delicate earthy aromas are created by a combination of First Gold and imported Saaz hops."
  },
  {
    "brewer":"Lancaster Brewery",
    "name":"Pumpkin Pie ",
    "type":"Amber",
    "abv":"7.3",
    "notes":"Halloween Special "
  },
  {
    "brewer":"Lancaster Brewery",
    "name":"Red",
    "type":"Ruby",
    "abv":"4.8",
    "notes":"Fired by plentiful amounts of Goldings and First Gold hops to give a wonderfully spicy but sweet fragrance. Using a blend of Maris Otter Crystal and Dark Crystal malts Red offers a robust malt-dominated body finished with a splendid bitter note."
  },
  {
    "brewer":"Little Valley",
    "name":"Ginger Pale Ale",
    "type":"Pale",
    "abv":"4",
    "notes":"Light and fresh with a hint of ginger and citrus this Fairtrade Ginger Pale Ale makes a delicious apertif or perfectly accompanies any spicy meal."
  },
  {
    "brewer":"Little Valley",
    "name":"Hebden's Wheat",
    "type":"Wheat",
    "abv":"4.5",
    "notes":"A Belgian style naturally hazy Wheat Beer. Fruity and refreshing. Light in colour with hints of coriander and lemon."
  },
  {
    "brewer":"Liverpool Organic Brewery Ltd",
    "name":"Bier Head",
    "type":"Golden",
    "abv":"4.1",
    "notes":"Bitter spice with floral notes and a pale malt undertoneTaste: Sharp hoppy fortaste with complex spice and crisp malt tones building to a rich mellow aftertaste"
  },
  {
    "brewer":"Liverpool Organic Brewery Ltd",
    "name":"Cambrinus St Anthonys",
    "type":"Pale",
    "abv":"5.2",
    "notes":"A monastic style beer made with British Pale, Crystal and Wheat Malts with Golding hops"
  },
  {
    "brewer":"Liverpool Organic Brewery Ltd",
    "name":"Honey Blond",
    "type":"Golden",
    "abv":"4.5",
    "notes":"A morish beer with moderate hops and organic wild flower honey - one pint is never enough."
  },
  {
    "brewer":"Liverpool Organic Brewery Ltd",
    "name":"Shipweck IPA",
    "type":"Golden",
    "abv":"6.5",
    "notes":"A true highly hopped strong India Pale Ale - You've tried the fakes now try the real thing!!"
  },
  {
    "brewer":"Liverpool Organic Brewery Ltd",
    "name":"William Roscoe",
    "type":"Amber",
    "abv":"4.3",
    "notes":"A copper coloured easy drinking beer with a nod towards tradition."
  },
  {
    "brewer":"Ludlow",
    "name":"Black Knight",
    "type":"Stout",
    "abv":"4.5",
    "notes":"A stout with a fully roasted barley flavour with coffee overtones with a gentle bitter finish"
  },
  {
    "brewer":"Ludlow",
    "name":"Gold",
    "type":"Golden",
    "abv":"4.2",
    "notes":"This is a golden drink in the tradition of well-hopped ales. Pale hue Maris Otter pale malt Fuggles & Goldings hops. Dry elongated bitter aftertaste. "
  },
  {
    "brewer":"Ludlow",
    "name":"Ludlow Best",
    "type":"Malty",
    "abv":"3.7",
    "notes":"A copper coloured well balanced session beer. We use Maris Otter pale malt along with Fuggles & Goldings hops."
  },
  {
    "brewer":"Ludlow",
    "name":"Stairway",
    "type":"Amber",
    "abv":"5",
    "notes":"This has a honey gold complexion with a grassy, citrus floral aroma.  It has a sharp, sweet, full bodied taste."
  },
  {
    "brewer":"Ludlow",
    "name":"The Boiling Well",
    "type":"Malty",
    "abv":"4.7",
    "notes":"Uses Marris Otter pale malt Fuggles & Goldings hops but we add a bit of crystal malt which provides a malty flavour and a darker hue. "
  },
  {
    "brewer":"Marble",
    "name":"Best",
    "type":"Copper",
    "abv":"4.3",
    "notes":"A traditional copper colour; full palette and uncompromising bitterness. Principle hops Admiral and Bramling Cross. "
  },
  {
    "brewer":"Marble",
    "name":"Ginger Marble",
    "type":"Golden",
    "abv":"4.5",
    "notes":"Fresh brisk ginger assaults the nose carrying with it a spicy honeyed malt character also. Round and malty in the mouth with some ginger bread man-esque flavours. Reasonably intense. The texture is both tingly and syrupy and genuinely good. "
  },
  {
    "brewer":"Millstone Brewery",
    "name":"Stout ",
    "type":"Stout",
    "abv":"4.5",
    "notes":"A traditional dry Stout - the English Phoenix hop provides a smooth bitterness and subtle hints of treacle in the aroma."
  },
  {
    "brewer":"Millstone Brewery",
    "name":"Three Shires Bitter",
    "type":"Pale",
    "abv":"4",
    "notes":"A very pale hoppy bitter. Full hop aroma with a crisp fruity taste followed by a smooth bitter finish."
  },
  {
    "brewer":"Millstone Brewery",
    "name":"Tiger Rut",
    "type":"Pale",
    "abv":"4",
    "notes":"Pale hoppy bitter full-bodied with distinctive citrus grapefruit aroma."
  },
  {
    "brewer":"Millstone Brewery",
    "name":"True Grit",
    "type":"Pale",
    "abv":"5",
    "notes":"A very pale and hoppy strong ale. Well hopped using only Chinnook hop; the mellow bitters make way for a distinctive citrus/grapefruit aroma. "
  },
  {
    "brewer":"Millstone Brewery",
    "name":"Vale Mill",
    "type":"Pale",
    "abv":"3.9",
    "notes":"Pale gold floral spicy aroma crisp refreshing taste."
  },
  {
    "brewer":"Moorhouse's",
    "name":"Black Cat",
    "type":"Dark",
    "abv":"3.4",
    "notes":"A dark refreshing ale with a distinctive chocolate malt flavour and a smooth hoppy finish. Supreme Champion Beer of Britain 2000, International Brewing Awards Double Gold Medal Winner 1998."
  },
  {
    "brewer":"Moorhouse's",
    "name":"Blond Witch",
    "type":"Blonde",
    "abv":"4.5",
    "notes":"A pale coloured ale with a crisp delicate fruit flavour dry and refreshing with a smooth hop finish."
  },
  {
    "brewer":"Nook Brewhouse",
    "name":"Funky Banana",
    "type":"Blonde",
    "abv":"4.5",
    "notes":"One funky brew! A deliciously light taste that will send your taste buds BANANAS!!"
  },
  {
    "brewer":"Nook Brewhouse",
    "name":"Strawberry Blonde",
    "type":"Blonde",
    "abv":"4.5",
    "notes":"A refreshing blonde beer with strawberry notes & a biscuit finish."
  },
  {
    "brewer":"Outstanding",
    "name":"Black IPA",
    "type":"Amber",
    "abv":"4.8",
    "notes":"Awaiting tasting notes from brewer so just try it for yourself. Our beermeister has selected it - so it must be good!"
  },
  {
    "brewer":"Outstanding",
    "name":"Blond",
    "type":"Blonde",
    "abv":"4.5",
    "notes":"Only Marris Otter low colour malt gives this beer a very pale appearance that looks like a lager but is definitely an ale. Lightly bittered with a heavy concentration of flavour towards citrus and floral nose and mouth feel."
  },
  {
    "brewer":"Outstanding",
    "name":"Halloween",
    "type":"Dark",
    "abv":"4.2",
    "notes":"Containing ginger cinnamon and treacle "
  },
  {
    "brewer":"Outstanding",
    "name":"Imperial",
    "type":"IPA",
    "abv":"7.4",
    "notes":"A golden, dry and implausibly hopped ale.  Relax and take time to savour the intricate flavours of this beer"
  },
  {
    "brewer":"Outstanding",
    "name":"Stout",
    "type":"Stout",
    "abv":"5.5",
    "notes":"A true representation of the beer style thick jet black bitter with liquorice and strong roast flavours in the finish."
  },
  {
    "brewer":"Purple Moose Brewery",
    "name":"Dark Side of the Moose",
    "type":"Dark",
    "abv":"4.6",
    "notes":"Dark, chestnut brown bitter with a toffee, smokey, treacle aroma and a light roasted crisp bitter taste."
  },
  {
    "brewer":"Purple Moose Brewery",
    "name":"Snowdonia Ale",
    "type":"Pale",
    "abv":"3.6",
    "notes":"Golden yellow pale ale with a lemon and peaches hoppy aroma, and a refreshing citrus taste."
  },
  {
    "brewer":"Purple Moose Brewery",
    "name":"Ysgawen",
    "type":"Golden",
    "abv":"4",
    "notes":"Golden straw pale ale with a lemon, floral and pineapple aroma, and a dry sweet elderflower bitter taste."
  },
  {
    "brewer":"Revolutions Brewing Company",
    "name":"Ghost Town ",
    "type":"Stout",
    "abv":"4.5",
    "notes":"Cherry Stout. A Halloween beer brewed to celebrate Halloween "
  },
  {
    "brewer":"Robinsons Brewery",
    "name":"Old Tom",
    "type":"Dark",
    "abv":"8.5",
    "notes":"Superior dark rich and warming strong ale with a cherry brandy like colour and character. Booming balance of ripe malt and peppery hops combine with roasted nut and chocolate flavours with a smoky richness. Distinctive deep port wine finish with bitter hops balance complemented by heady vinous aromas of dark fruit."
  },
  {
    "brewer":"Robinsons Brewery",
    "name":"Trooper",
    "type":"Amber",
    "abv":"4.8",
    "notes":"Created with Iron Maiden's lead vocalist Bruce Dickinson a deep golden ale with citric hop notes and dominating malt flavours with a subtle hint of lemon. Real depth of character with complex hop notes using a combination of Goldings Bobec and Cascade Hops."
  },
  {
    "brewer":"ShinDigger Brewing Company",
    "name":"New Zealand Pale Ale",
    "type":"Pale",
    "abv":"TBC",
    "notes":"Awaiting tasting notes from brewer so just try it for yourself. Our beermeister has selected it - so it must be good!"
  },
  {
    "brewer":"Sky's Edge Brewing",
    "name":"Orange & Hibiscus Wheat Beer (Vegan)",
    "type":"Wheat",
    "abv":"4.7",
    "notes":"A vegan friendly unfined naturally hazy wheat beer made with sweet & bitter curacao orange peel and hibiscus flowers. This beer extracts its slight crimson colour from the hibiscus flowers which provide a lemony tart and berry rich background balanced by the sweetness of the orange peel. We also use an authentic wheat beer yeast."
  },
  {
    "brewer":"Sky's Edge Brewing",
    "name":"Thirst Aid ",
    "type":"Pale",
    "abv":"4",
    "notes":"This pale ale does what it says on the tin. The beer showcases two amazing American hops together. Citra and Simcoe hops are blended to impart interesting citrus and tropical fruit characters with a sharp juicy flavour. A real thirst quencher!"
  },
  {
    "brewer":"Storm Brewing",
    "name":"Ale Force",
    "type":"Amber",
    "abv":"4.2",
    "notes":"An amber coloured ale created from a fusion of chocolate, pale and crystal malts with the finest Fuggles hops"
  },
  {
    "brewer":"Storm Brewing",
    "name":"Beaufort's Ale",
    "type":"Golden",
    "abv":"3.8",
    "notes":"American Cluster & Fuggles hops combine to create this golden brown full flavoured session bitter with a lingering hoppy aftertaste"
  },
  {
    "brewer":"Storm Brewing",
    "name":"Bosley Cloud",
    "type":"Pale",
    "abv":"4.1",
    "notes":"Wheat lager and pale malts and American Cluster and Fuggles hops produce this award winning ale."
  },
  {
    "brewer":"Storm Brewing",
    "name":"Desert Storm",
    "type":"Pale",
    "abv":"3.9",
    "notes":"This refreshing session ale is brewed using the finest pale crystal and chocolate malts with Fuggles and Golding hops "
  },
  {
    "brewer":"Storm Brewing",
    "name":"Hurricane Hubert",
    "type":"Dark",
    "abv":"4.5",
    "notes":" A classic dark beer with a refreshing full fruity hop aroma and a subtle bitter aftertaste."
  },
  {
    "brewer":"Storm Brewing",
    "name":"Silk of Amnesia",
    "type":"Dark",
    "abv":"4.7",
    "notes":"This champion dark beer produces a rich chocolate palate with a clean bitter finish."
  },
  {
    "brewer":"The Beer Studio",
    "name":"Amber Dawn",
    "type":"Amber",
    "abv":"4",
    "notes":"Amber malt gives a distinctive colour as well as light dry biscuity flavour"
  },
  {
    "brewer":"The Beer Studio",
    "name":"Puce Plum ",
    "type":"Dark",
    "abv":"4.8",
    "notes":"A fruity Dark ale flavoured with English Plums & brewed with Winsome & light crystal malts ."
  },
  {
    "brewer":"Thornbridge Brewery",
    "name":"Jaipur",
    "type":"IPA",
    "abv":"5.9",
    "notes":"A citrus dominated India Pale Ale its immediate impression is soft and smooth yet builds to a crescendo of massive hoppiness accentuated by honey. An enduring bitter finish."
  },
  {
    "brewer":"Timothy Taylor",
    "name":"Boltmaker",
    "type":"Copper",
    "abv":"4",
    "notes":"Champion Beer of Britain 2014.  A well balanced, genuine Yorkshire Bitter, with a full measure of maltiness and hoppy aroma - Boltmaker is first chioce for the discerning drinker - on both sides of the Pennines (editors note - or that's what those white rose folk want to believe)"
  },
  {
    "brewer":"Welbeck Abbey Brewery",
    "name":"Henrietta",
    "type":"Golden",
    "abv":"3.6",
    "notes":"Low in strength but absolutely crammed full of wonderful hop character. There's a good bitter note from Challenger hops which balances the citrus and grassy nose from Cascade and Hallertaur Brewers Gold."
  },
  {
    "brewer":"Welbeck Abbey Brewery",
    "name":"Red Feather",
    "type":"Amber",
    "abv":"3.9",
    "notes":"An amber bitter brewed with crystal malt and roasted barley to give a rich caramel flavour."
  },
  {
    "brewer":"Whim Ales",
    "name":"Arbor Light",
    "type":"Pale",
    "abv":"3.6",
    "notes":"An extremely clean session beer.  Lovely hop aroma.  Satisfying clean sharp bitterness right the way through with a dry finish."
  },
  {
    "brewer":"Whim Ales",
    "name":"Earl Grey Bitter ",
    "type":"Amber",
    "abv":"4.3",
    "notes":"Beautiful hoppy fruity aroma. Warm malty start with slight toffee notes soon gives to dry hoppy bitterness developing into a lasting dry and complex finish making you want more. A lot more! Enjoy..."
  },
  {
    "brewer":"Whim Ales",
    "name":"Hartington Bitter",
    "type":"Golden",
    "abv":"4",
    "notes":"Light golden in appearance this thirst quenching session bitter is fruity and light. Use of hops from both Worcestershire and Slovenia gives it a distinctive hop character. Well balanced with a dry finish and spicy floral aroma. "
  },
  {
    "brewer":"Whim Ales",
    "name":"Hartington I.P.A.",
    "type":"IPA",
    "abv":"4.5",
    "notes":"Malty nose combined with delicate hop aroma. Very smooth on the palate, maltiness dominates joined with subtle pear notes from the hop."
  },
  {
    "brewer":"Wilson Potter Brewery LLP",
    "name":"Bon Don Doon",
    "type":"Blonde",
    "abv":"4.2",
    "notes":"Refreshing blonde beer made with Columbus and Perle hops."
  },
  {
    "brewer":"Wilson Potter Brewery LLP",
    "name":"Don't Fall",
    "type":"Blonde",
    "abv":"3.9",
    "notes":" A lovely pale hoppy blonde"
  },
  {
    "brewer":"Wilson Potter Brewery LLP",
    "name":"Gingery Does It",
    "type":"Blonde",
    "abv":"3.5",
    "notes":"An extra pale blonde beer made with American hops and a touch of ginger."
  },
  {
    "brewer":"Wilson Potter Brewery LLP",
    "name":"In The Black",
    "type":"Stout",
    "abv":"4.2",
    "notes":"A rich dark stout with a fruity roasted malt aroma and taste with a liquorice finish."
  },
  {
    "brewer":"Wilson Potter Brewery LLP",
    "name":"Is This the Way",
    "type":"Golden",
    "abv":"5.6",
    "notes":"A golden ale with a strong citrus taste from the addition of Amarillo hops"
  },
  {
    "brewer":"Wilson Potter Brewery LLP",
    "name":"SBA",
    "type":"Ruby",
    "abv":"4",
    "notes":"A ruby ale with a fruity floral hop finish (Brewed to commemorate the life of Samuel Bamford)"
  },
  {
    "brewer":"XT Brewing Co",
    "name":"XT 1",
    "type":"Blonde",
    "abv":"4.2",
    "notes":"Citrus and fruity hops flirt with reserved English barley and some very naughty Bohemian malts to make a characterful blonde ale that you'll want to meet again."
  },
  {
    "brewer":"XT Brewing Co",
    "name":"XT 42",
    "type":"Amber",
    "abv":"4.2",
    "notes":"Stronger 4.2% version of our popular 'Four'"
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
