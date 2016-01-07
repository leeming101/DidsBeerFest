<?php 
include 'header.php'
?>
<body>
<?php
include 'navigation.php'
?>
    <div class="main container">
	    <div class="row">
		    <div id="contentLeft" class="col-xs-12 col-sm-6" style="padding-top:5px; min-height:400px; text-align:left;">
		    <span>We need you.......</span>
<span style="text-transform: none;">The Didsbury Beer Festival is managed and staffed entirely by volunteers and we are now looking for staff for this year.
Volunteering at the festival is always great fun and many come back year after year, but we’re always looking for more.<br><br>
So if you can spare anything from a couple of hours to a full weekend, we’d love to have you join us. The work can be hard but it is rewarding and obviously there are a few perks!<br><br></span>
<ul>
<li><span style="text-transform: none;">You will be given refreshments, full training and support plus breaks whenever you need them.<br><br></span></li>
<li><span style="text-transform: none;">If you are a student and working towards Employability Awards we can provide a certificate of volunteering.<br><br></span></li>
<li><span style="text-transform: none;">Every volunteer gets a ‘limited edition’ festival t’shirt and glass to keep and an invite to our Festival Celebration Party in January.</span></li>
</ul>
<span style="text-transform: none;"><br>
If we reach the required numbers of staff needed on certain shifts these will be removed from the form and no longer available to book.
So if you’ve selected the shifts you want and submitted the form ....YOU’RE IN!!</span>

			</div>
		    <div id="contentRight" class="col-xs-12 col-sm-6" style="padding-top:5px; min-height:400px;">
		    <span style="text-transform: none;">Interested? <a href="https://docs.google.com/forms/d/1wc04HxB5smlrVqt06gf5KB0NTITVq7z3Q6hmVF8AmyA/viewform">click here</a> Please complete and submit the online Volunteer Registration Form and remember to make a note of your shifts as we are unable to contact everyone individually to confirm.<br><br></span>
<div id="slider1_container" style="position: relative; top: 0px;  width: 400px; height: 275px; margin:auto;">
    <!-- Slides Container -->
    <div u="slides" style="cursor: move; position: absolute; overflow: hidden;  top: 0px; width: 400px; height: 275px;">
        <div><img u="image" src="volunteers/image1.jpg" /></div>
        <div><img u="image" src="volunteers/image2.jpg" /></div>
        <div><img u="image" src="volunteers/image3.jpg" /></div>
        <div><img u="image" src="volunteers/image4.jpg" /></div>
        <div><img u="image" src="volunteers/image5.jpg" /></div>
    </div>
</div>
		    </div>
<?php
			include 'sponsors.php'
			?>
	    </div>
    </div>
<?php 
include 'footer.php'
?>
<script src="Scripts/jssor.slider.mini.js"></script>
<script>
    jQuery(document).ready(function ($) {
        var options = { $AutoPlay: true };
        var jssor_slider1 = new $JssorSlider$('slider1_container', options);
    });
</script>
</body>
</html>
