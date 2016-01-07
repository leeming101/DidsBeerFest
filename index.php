<?php 
include 'header.php'
?>
<body> 
<?php
include 'navigation.php'
?>
    <div class="main container">
	    <div class="row">
		    <div id="contentLeft" class="col-xs-12 col-sm-6" style="padding-top:10px;">
		    	<span class="pink ">Didsbury Beer Festival 2015<br></span>
		     	<span class="pink "><br>100+ Beers, Ciders &amp; Perries!<br></span>
			 	<span class="pink ">With great food &amp; music<br></span>
			 	<span class="blue dash">-</span>
			 	<span class="pink "><br>St. Catherine's Social Club<br></span>
			 	<span class="pink ">School Lane / Didsbury<br></span>
			 	<span class="pink ">Manchester / M20 6HS<br></span>
			 	<span class="blue dash">-</span>
			 	<span class="blue "><br>Press play to<br></span>
			 	<span class="blue ">&nbsp;&nbsp;watch our short film</span>
			 	<span class="pink largefont desktopVid"><a href="" class="click youtube" rel="k2nDXCQ9gkk"><i class="fa fa-play-circle-o"></i></a></span>
			 	<span class="pink largefont mobileVid"><a href="" class="click youtubeMob" rel="k2nDXCQ9gkk"><i class="fa fa-play-circle-o"></i></a></span>	 
			 	<br/>
			 	<a href="goodcauses"><span class="blue  langdon"><br><br>Supporting charities and local good causes</span></a>	
			</div>
			<div id="contentRight" class="col-xs-12 col-sm-6" style="padding-top:10px;">
			<!--<div style="width:70%; margin: auto;">
			 		<div style="width:50%; float:left; text-align:left;">
				 			<span class="blue ">THURSDAY 29TH</span>
			 		</div>
			 		<div style="width:50%; float:right; text-align:right;">
				 		<span class="pink ">7-11PM</span>
			 		</div>
			 	</div>-->
			 	<!--<br/>
			 	<br>
			 	<div style="width:70%; margin: auto;">
			 		<div style="width:50%; float:left; text-align:left;">
				 			<span class="blue ">FRIDAY 30th</span>
			 		</div>
			 		<div style="width:50%; float:right; text-align:right;">
				 		<span class="pink ">6-11PM</span>
			 		</div>
			 	</div>
			 	<br/>
			 	<br>
			 	<div style="width:70%; margin: auto;">
			 		<div style="width:50%; float:left; text-align:left;">
				 			<span class="blue ">SATURDAY 31ST</span>
			 		</div>
			 		<div style="width:50%; float:right; text-align:right;">
				 		<span class="pink ">12-5PM / 5-11PM</span>
			 		</div>
			 	</div>-->
			 	<a class="twitter-timeline" href="https://twitter.com/dbf_beer" data-widget-id="642072896685350912">Tweets by @dbf_beer</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
				<span class="blue " style="font-size:14px;"><br><br><br>All sponsorship for this year has now been filled</span>
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
