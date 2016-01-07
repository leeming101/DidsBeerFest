<?php 
include 'header.php'
?>
<body>
<?php
include 'navigation.php'
?>
    <div class="main container">
	    <div class="row">
		    <div id="contentLeft" class="col-xs-12 col-sm-6">
		     	<span class="pink mediumfont helvMed"><br>100+ Beers, Ciders &amp; Perries!<br></span>
			 	<span class="pink mediumfont helvMed">With great food &amp; music<br></span>
			 	<span class="blue dash">-</span>
			 	<span class="pink mediumfont helvMed"><br>St. Catherine's Social Club<br></span>
			 	<span class="pink mediumfont helvMed">School Lane / Didsbury<br></span>
			 	<span class="pink mediumfont helvMed">Manchester / M20 6HS<br><br></span>
			 	<span class="pink largefont desktopVid" style="float: left;"><a href="" class="click youtube" rel="k2nDXCQ9gkk"><i class="fa fa-play-circle-o"></i></a></span>
			 	<span class="pink largefont mobileVid" style="float: left;"><a href="" class="click youtubeMob" rel="k2nDXCQ9gkk"><i class="fa fa-play-circle-o"></i></a></span>
			 	<span class="blue smallfont langdon"><br>&nbsp;&nbsp;Press play to<br></span>
			 	<span class="blue smallfont langdon">&nbsp;&nbsp;watch our short film</span>
			 	<br/><br/>
			 	<br/><br/><br/><br/><br/><br/><br/><br/><br/>
			 	<div style="width:100%;">
			 		<div style="width:50%; float:left;">
				 			<span class="blue smallfont langdon">THURSDAY 30TH</span>
			 		</div>
			 		<div style="width:50%; float:right; text-align:right;">
				 		<span class="pink smallfont langdon">7-11PM</span>
			 		</div>
			 	</div>
			 	<br/>
			 	<div style="width:100%;">
			 		<div style="width:50%; float:left;">
				 			<span class="blue smallfont langdon">FRIDAY 31ST</span>
			 		</div>
			 		<div style="width:50%; float:right; text-align:right;">
				 		<span class="pink smallfont langdon">6-11PM</span>
			 		</div>
			 	</div>
			 	<br/>
			 	<div style="width:100%;">
			 		<div style="width:50%; float:left;">
				 			<span class="blue smallfont langdon">SATURDAY 1ST</span>
			 		</div>
			 		<div style="width:50%; float:right; text-align:right;">
				 		<span class="pink smallfont langdon">12-5PM / 5-11PM</span>
			 		</div>
			 	</div>
			 	<span class="pink mediumfont helvmed"><br><br><br>Interested in sponsoring the DBF in future?
			 		<br> Contact <a class="blue" href="&#109;&#x61;&#105;&#x6c;&#116;&#111;&#58;&#x44;&#66;&#70;&#x53;&#x70;&#111;&#110;&#115;&#x6f;&#x72;&#115;&#104;&#105;&#x70;&#x40;&#x79;&#x61;&#104;&#111;&#111;&#46;&#x63;&#111;&#x2e;&#x75;&#107;">DBFSponsorship@yahoo.co.uk</a></span>
			</div>
			<div id="contentRight" class="col-xs-12 col-sm-6" style="text-align:center;">
				<img src="Images/clocktower.png" width="95%" alt="clocktower">
				<span class="blue smallfont langdon"><br><br>Supporting charities and local good causes.<br></span>
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
  $(function () {
    $(".youtube").YouTubeModal({autoplay:1, width:640, height:480, cssClass:'youtubePopup'});
  });

  $(function () {
    $(".youtubeMob").YouTubeModal({autoplay:1, width:320, height:240, cssClass:'youtubePopupMobile'});
  });
</script>
</body>
</html>
