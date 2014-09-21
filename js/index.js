var $content =  $("#content");
var $secondNav = $("#second-nav");
var $thirdNav = $("#third-nav");
var $nav = $("#main-nav");
var $welcome = $("#welcome");
var $body = $('body');
var $menuID;
var $pageGET;
var $loader = false;
var $loadCount = 0;
var $pageLoaded = false;

addLoader();

$(document).ready(function(){

    findContent();

    $(document).on("mousedown", "#portfolio", function (e) {

        disabledEventPropagation(e);

        if(!$welcomeDisabled){
            menuAnimation();
        }

        if(parseInt($menuID) != 0){

            goPortfolio();

        }else{
            if ($pageGET.toLowerCase().indexOf("?pid=") >= 0){

            }else{
                goPortfolio();
            }
        }

        $("menu li.active").removeClass("active");
        $(this).addClass("active");

    });

    $(document).on("mousedown", "#contact-mi", function (e) {

        disabledEventPropagation(e);

        contactMe();

        $(this).addClass("active");

    });

    $(document).on("mousedown", "#close-contact", function (e) {

        disabledEventPropagation(e);

        contactClose();

        $("#contact-mi").removeClass("active");

    });

    $(document).on("mousedown", "ul.main-nav li[menu-id]", function (e) {

        disabledEventPropagation(e);

        addHalfLoader();

        $menuID = $(this).attr('menu-id');
        $pageGET = '?pid='+$menuID;

        window.history.pushState('page2', 'A Portfolio - By Mathew Kleppin', './index.php'+$pageGET);

        goArticle(this);

    });

    $(document).on("mousedown", "[link]", function (e) {

        disabledEventPropagation(e);

        if( e.which == 2 ) {
            var productLink = $('<a href="'+$(this).attr('link')+'" />');

            productLink.attr("target", "_blank");
            window.open(productLink.attr("href"));

            return false;

        }else if( e.which == 1 ) {
            window.history.pushState('page2', 'A Portfolio - By Mathew Kleppin', $(this).attr('link'));
            $pageGET = $(this).attr('link').replace('./index.php', '');
            $menuID = $(this).attr('menu-id');
            findContent();
        }

    });

    $(document).on("mousedown", "[snap]", function (e) {

        disabledEventPropagation(e);

        if( e.which == 2 ) {
            var productLink = $('<a href="'+$(this).attr('snap')+'" />');

            productLink.attr("target", "_blank");
            window.open(productLink.attr("href"));

            return false;
        }else if( e.which == 1 ) {
            window.location.href = $(this).attr('snap');
        }

    });

    setTimeout(function(){

        if(!$pageLoaded)
            doneLoading();

    }, 10000);

});

$(window).resize(resizeNav);

window.onpopstate = function(event) {
    if($pageLoaded){
        location.reload();
    }
};

function addHalfLoader(){

    if($loader == false){

        $('body').prepend('<div id="loaderCon" style="opacity:0.7"><div id="jpreSlide"><div id="ball"></div></div></div>');
        $('#ball, #ball-0, #ball-1').delay(50).animate({'opacity' : 1}, 1500, 'easeOutExpo');

        $loader = true;

        $(window).load(function() {

            setTimeout(removeHalfLoader(), 300);

        });
    }

}

function removeHalfLoader(){

    $('#loaderCon').delay(250).animate({'opacity' : 0}, 1500, 'easeOutExpo');

    setTimeout(function(){
        $('#loaderCon').remove();
    },1500);

    $loader = false;

}

function addLoader(){

    if($loader == false){

        $('body').addClass('loading');
        $('body').prepend('<div id="loaderCon"><div id="jpreSlide"><div id="ball"></div></div></div>');
        $('#ball, #ball-0, #ball-1').delay(250).animate({'opacity' : 1}, 1500, 'easeOutExpo');

        $loader = true;

    }

}

function removeLoader(){

    $('#loaderCon').delay(250).animate({'opacity' : 0}, 1500, 'easeOutExpo');

    setTimeout(function(){
        $('#loaderCon').remove();
        $('body').removeClass('loading');
    },1250);

    $loader = false;

}

function resetBodyHeight(){



}

function findContent(){

    if($loadCount > 0){

        setTimeout(function() {

            if ($pageGET.toLowerCase().indexOf("?pid=") >= 0){

                if($menuID == 0){
                    addHalfLoader();
                    $nav.load('menu.proj.php');
                }else{
                    $content.load('article.php?pid='+$menuID);
                }

            }

        }, 600);

    }else{

        if ($pageGET.toLowerCase().indexOf("?pid=") >= 0){

            if($menuID == 0){
                $nav.load('menu.proj.php');
            }else{
                $content.load('article.php?pid='+$menuID);
            }

        }else{
            onContentLoad();
        }
    }

    $loadCount++;
}

function onContentLoad(){

    if ($pageGET.toLowerCase().indexOf("?pid=") >= 0){

        if($menuID == 0){

            if($('ul.main-nav li').length > 0){

                $('ul.main-nav li').on('scrollin', function () {

                    $(this).css('opacity', '1');

                    $(this).children('.info').css('opacity', '1');
                    $(this).children('.info').css('left', '0');


                }).scrollable({ offset: { y: '40%' } });

                removeHalfLoader();

                resizeNav();

                checkVisible();

            }else{

                setTimeout(function(){

                    onContentLoad();

                }, 50);

            }

        }else{

            if($('article').length > 0){

                removeHalfLoader();

                $("[menu-id]").removeAttr('menu-id');

                resizeNav();

            }else{

                setTimeout(function(){

                    onContentLoad();

                }, 50);

            }

        }

    }else if ($pageGET.toLowerCase().indexOf("?id=") >= 0 && $menuID == 0){

        if($('#welcome').length > 0){

            resizeNav();
            removeHalfLoader();
            removeLoader();

        }else{

            setTimeout(function(){

                onContentLoad();

            }, 50);

        }

    }

}

function checkVisible(){

    $("ul.main-nav li:in-viewport").addClass('active');
    $("ul.main-nav li:above-the-top").addClass('active');

}

function disabledEventPropagation(event){

    if (event.stopPropagation){

        event.stopPropagation();

    }else if(window.event){

        window.event.cancelBubble = true;

    }

}

function goPortfolio(){

    addHalfLoader();

    $menuID = 0;
    $pageGET = '?pid='+$menuID;

    window.history.pushState('page2', 'A Portfolio - By Mathew Kleppin', './index.php'+$pageGET);

    $nav = $("#main-nav");
    $content = $("#content");
    $nav.css('transition', 'all 1.2s ease');
    $content.css('display', 'inline-block');

    $content.css('opacity', '0');
    $nav.css('opacity', '0');

    setTimeout(function() {

        $nav.remove();
        $content.remove();

        setTimeout(function() {

            $body.prepend('<nav id="main-nav"></nav>');
            $nav = $("#main-nav");
            $nav.css('transition', 'all 1.2s ease');

            setTimeout(function() {

                findContent();

            }, 100);

        }, 100);

    }, 1100);


}

function goArticle($menuItem){

    $('ul.main-nav li').not($menuItem).css('height', 0);
    $('ul.main-nav li').not($menuItem).css('opacity', 0);
    $('ul.main-nav li').not($menuItem).css('overflow', 'hidden');
    $('ul.main-nav li').not($menuItem).css('margin', 0);

    setTimeout(function(){
        $('html, body').animate({
            scrollTop: ($($menuItem).offset().top - 20)
        }, 1500, 'easeOutExpo');

        $($menuItem).css('height', 450);
        $($menuItem).css('min-width', 820);

        $nav.after('<div id="content"></div>');

        setTimeout(function(){

            $content = $("#content");
            $content.css('opacity', '0');

            findContent();

        },100);

    },600);

}

function contactMe(){

    var $contact = $("#contact-me");

    $contact.css('left', ($(window).innerWidth()/2)-($contact.outerWidth()/2));
    $contact.css('top', ($(window).innerHeight()/2)-($contact.outerHeight()/2));

}

function contactClose(){
    var $contact = $("#contact-me");

    $contact.css('left', '110%');
}

function menuAnimation(){

    $welcomeDisabled = true;

    var $namesake = $('.namesake');

    $namesake.css('transition', 'all 0.3s ease');
    $namesake.css('overflow', 'hidden');

    window.history.pushState('page2', 'A Portfolio - By Mathew Kleppin', './index.php?pid=0');
    $menuID = 0;
    $pageGET = "?pid=0";

    setTimeout(function() {
        $namesake.css('height', 0);
        $namesake.css('padding', 0);

        $thirdNav.css('transition', 'all 0.7s ease');

        setTimeout(function() {
            $namesake.css('margin-top', 0);
            $thirdNav.css('top', 0);

            setTimeout(function() {

                $welcome.css('transition', 'all 0.7s ease');
                $body.prepend('<nav id="main-nav"></nav>');
                $nav = $("#main-nav");
                $nav.css('transition', 'all 1.2s ease');

                addHalfLoader();

                setTimeout(function() {

                    $welcome.css('opacity', '0');

                    setTimeout(function() {

                        $welcome.remove();

                        findContent();

                    }, 1000);

                }, 100);

            }, 600);

        }, 100);

    }, 100);


}

function loadPageImages($imageArray){

    $pageLoaded = false;

    var loaded = 0;

    if($imageArray.length <= 0){
        doneLoading();
    }

    $.each($imageArray, function() {

        var img = new Image();

        img.src = ""+this;

        img.onload = function(){

            loaded++;

            if(loaded >= $imageArray.length){

                doneLoading();

                return false;

            }
        }

    });

}

function doneLoading(){

    if($pageLoaded){
        return false;
    }

    setTimeout(function(){
        $pageLoaded = true;

        onContentLoad();
    }, 300);

}

function resizeNav(){

    if(!$welcomeDisabled){

        $thirdNav.css('left', ($(window).innerWidth()/2)-($thirdNav.outerWidth()/2));
        $thirdNav.css('top', ($(window).innerHeight()/2)-($thirdNav.outerHeight()/2));

        $welcome.css('width', ($(window).innerWidth()-40));
        $welcome.css('height', ($(window).innerHeight()-40));

    }else{

        $nav = $("#main-nav");

        if($thirdNav.length > 0){
            $thirdNav.css('left', ($(window).innerWidth()/2)-($thirdNav.outerWidth()/2));
        }

        $nav.css('width', $(window).innerWidth()-40);
        $nav.css('opacity', 1);
        $content.css('opacity', 1);
        $nav.children('li').css('height', ($(window).innerHeight()/1.75)-40);

        $secondNav.css('left', ($(window).innerWidth()/2)-($secondNav.outerWidth()/2));

    }

    setTimeout(function(){
        resetBodyHeight();
    }, 700);

}

function resizeSecondary(){

    $(".secondary").css('width', ($(".head").innerWidth()-50));

}

