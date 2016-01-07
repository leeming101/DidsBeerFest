window.onload = function () {
    pageLoad();
}

function scrollToBottom() {
    $("html, body").animate({ scrollTop: $(document).height() }, "slow");
    return false;
};

function openSponsors() {
    if ((location.pathname != "/ciderlist.shtml")&&(location.pathname != "/beerlist.shtml"))
        $('html, body').animate({ scrollTop: $(document).height() }, 1600);
    else
        location.pathname = '/sponsors.shtml';
};

function bandInfo(band) {
    $('#entInstructions').fadeOut(100);
    $('#sponsorInfo').fadeOut(100);
    $('.bandInfo').fadeOut(100);
    if (band == "spartacus") {
        $('.bandLogo').fadeIn(600);
        $('.bandLogo').attr("src", "Images/spartacus.jpg");
        $('#spartacus').fadeIn(600);
    }
    if (band == "craftyD") {
        $('.bandLogo').fadeIn(600);
        $('.bandLogo').attr("src", "Images/craftydog.jpg");
        $('#craftyD').fadeIn(600);
    }
    if (band == "unclestrawb") {
        $('.bandLogo').fadeIn(600);
        $('.bandLogo').attr("src", "Images/unclestrawb.jpg");
        $('#unclestrawb').fadeIn(600);
    }
    if (band == "swingin") {
        $('.bandLogo').fadeIn(600);
        $('.bandLogo').attr("src", "Images/swingin.jpg");
        $('#swingin').fadeIn(600);
    }
    if (band == "rich") {
        $('.bandLogo').fadeIn(600);
        $('.bandLogo').attr("src", "");
        $('#rich').fadeIn(600);
    }
    if (band == "miken") {
        $('.bandLogo').fadeIn(600);
        $('.bandLogo').attr("src", "");
        $('#miken').fadeIn(600);
    }
    if (band == "vagab") {
        $('.bandLogo').fadeIn(600);
        $('.bandLogo').attr("src", "");
        $('#vagab').fadeIn(600);
    }
    if (band == "edwin") {
        $('.bandLogo').fadeIn(600);
        $('.bandLogo').attr("src", "");
        $('#edwin').fadeIn(600);
    }
    if (band == "shane") {
        $('.bandLogo').fadeIn(600);
        $('.bandLogo').attr("src", "");
        $('#shane').fadeIn(600);
    }
    if (band == "kyle") {
        $('.bandLogo').fadeIn(600);
        $('.bandLogo').attr("src", "");
        $('#kyle').fadeIn(600);
    }
    if (band == "steve") {
        $('.bandLogo').fadeIn(600);
        $('.bandLogo').attr("src", "");
        $('#steve').fadeIn(600);
    }
	if (band == "chow") {
        $('.bandLogo').fadeIn(600);
        $('.bandLogo').attr("src", "Images/chow.jpg");
        $('#chow').fadeIn(600);
    }
};