<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
<script type="text/javascript">
        var _gaq = _gaq || [];
        _gaq.push(['_setAccount', 'UA-35875054-1']);
        _gaq.push(['_trackPageview']);

        (function () {
            var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
            ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
            var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
        })();
</script>
<script type="text/javascript" src="Scripts/bootstrap.youtubepopup.js"></script>
<script src="Scripts/jquery.sticky.js"></script>
<script src="Scripts/superfish.js"></script>
<script src="Scripts/hoverIntent.js"></script>
<script src="Scripts/jquery.watable.js" type="text/javascript" charset="utf-8"></script>
<script>
$(document).ready(function(){		/* ---------------------------------------------------- */
        /*	Navigation											*/
        /* ---------------------------------------------------- */

        $('#navigation').on('mouseenter', 'li', function() {
            var $this = $(this), $subMenu = $this.children('ul');
            if ($subMenu.length) {
                $subMenu.hide().stop(true, true).fadeIn(300);
            }
        }).on('mouseleave', 'li', function() {
            $(this).children('ul').stop(true, true).fadeOut(50);
        });

		/* ---------------------------------------------------- */
		/*	Respond menu										*/
		/* ---------------------------------------------------- */

		if (!$('#mobile-menu').children('ul').length) {
			$('#mobile-menu').append($('#navigation').html());
		}

		$('#responsive-nav-button').on('click', function(e) {
			e.preventDefault();
			var $this = $(this);
			if (!$('#wrapper').is('.active')) {
				$('#wrapper').css({
					height: 600
				}).addClass('active');
			}
		});

		$('#menu-hide').on('click', function(e) {
			e.preventDefault();
			if ($('#wrapper').is('.active')) {
				$('#wrapper').css({height: 'auto'}).removeClass('active');
			}
		});

	});

</script>