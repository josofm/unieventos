/*
	Author: Umair Chaudary @ Pixel Art Inc.
	Author URI: http://www.pixelartinc.com/
*/




$(document).ready(function(e) {
    $ = jQuery;
    $('.flexslider').flexslider({
        animation: "slide",
        animationLoop: true
    });
	
	 $('.bottom-errow ').click(function(e){
        e.preventDefault();
        $("html, body").animate({ scrollTop: 0 }, 900);
        return false;
    });

    function open_nav(){
        $(".responsive a.open").click(function(e){
            e.preventDefault();
            $('.responsive li ul').stop(true, true).slideDown(500);
            $(this).removeClass('open').addClass('close-nav');
            close_nav();
        });
    }
    open_nav();
    function close_nav(){
        $(".responsive .close-nav").click(function(e){
            e.preventDefault();
            $('.responsive li ul').stop(true, true).slideUp(500);
            $(this).removeClass('close-nav').addClass('open');
            open_nav();
        });
    };

    $(".elastislide-list li").hover(function(){
        $(this).children(".overlay-colm").stop(true, true).fadeIn(500);
    },function(){
        $(this).children(".overlay-colm").stop(true, true).fadeOut(500);
    });

    $("nav ul li").hover(function(){
        $(this).children("ul").stop(true, true).slideDown(500);
    },function(){
        $(this).children("ul").stop(true, true).slideUp(500);
    });

    $( '#carousel1' ).elastislide();
    $( '#carousel2' ).elastislide();

    $( ".slider-slides" ).cycle({
        prev: '.prew',
        fx: 'fade',
        timeout:  0,
        next: '.next'
    });

    $('#accordion h5').click(function(e) {
        e.preventDefault();
        $(this).next().slideDown('slow');
        $(this).next().siblings('#accordion div') .slideUp('slow');
    });

    // Lightbox
    $("a.zoom").prettyPhoto({
        deep_linking: false,
        social_tools: ''
    });

    $('#product_tabs ul li  ').each(function(){
        var $active, $content, $links = $(this).find('a');

        $active = $($links.filter('[href="'+location.hash+'"]')[0] || $links[0]);
        $content = $($active.attr('href'));

        $links.not($active).each(function () {
            $($(this).attr('href')).hide();
        });

        $('#product_tabs ul li ').on('click', 'a', function(e){
            $active.removeClass('active');
            $content.hide();
            $active = $(this);
            $content = $($(this).attr('href'));

            $active.addClass('active');
            $content.slideDown();

            e.preventDefault();
        });
    });


   $('#map_canvas').gmap();

    //Portfolio Filterations
    var $container = $('#project-container');

    $container.isotope({
        itemSelector : '.protfolio'
    });

    var $optionSets = $('.option-set'),
        $optionLinks = $optionSets.find('a');

    $optionLinks.click(function(){
        var $this = $(this);

        if ( $this.hasClass('selected') ) {
            return false;
        }
        var $optionSet = $this.parents('.option-set');
        $optionSet.find('.selected').removeClass('selected');
        $this.addClass('selected');


        var options = {},
            key = $optionSet.attr('data-option-key'),
            value = $this.attr('data-option-value');

        value = value === 'false' ? false : value;
        options[ key ] = value;
        if ( key === 'layoutMode' && typeof changeLayoutMode === 'function' ) {

            changeLayoutMode( $this, options )
        } else {

            $container.isotope( options );
        }

        return false;
    });

    $(".protfolio figure").hover(function(){
        $(this).children('.overlay').stop(true, true).fadeIn(700);
    }, function(){
        $(this).children('.overlay').stop(true, true).fadeOut(500);
    });

    // NEWS SCROLLER
    jQuery.fn.liScroll = function(settings) {
        settings = jQuery.extend({
            travelocity: 0.07
        }, settings);
        return this.each(function(){
            var $strip = jQuery(this);
            $strip.addClass("newsticker")
            var stripWidth = 0;
            var $mask = $strip.wrap("<div class='mask'></div>");
            var $tickercontainer = $strip.parent().wrap("<div class='tickercontainer'></div>");
            var containerWidth = $strip.parent().parent().width();	//a.k.a. 'mask' width
            $strip.find("li").each(function(i){
                stripWidth += jQuery(this, i).outerWidth(true); // thanks to Michael Haszprunar
            });
            $strip.width(stripWidth);
            var totalTravel = stripWidth+containerWidth;
            var defTiming = totalTravel/settings.travelocity;	// thanks to Scott Waye
            function scrollnews(spazio, tempo){
                $strip.animate({left: '-='+ spazio}, tempo, "linear", function(){$strip.css("left", containerWidth); scrollnews(totalTravel, defTiming);});
            }
            scrollnews(totalTravel, defTiming);
            $strip.hover(function(){
                    jQuery(this).stop();
                },
                function(){
                    var offset = jQuery(this).offset();
                    var residualSpace = offset.left + stripWidth;
                    var residualTime = residualSpace/settings.travelocity;
                    scrollnews(residualSpace, residualTime);
                });
        });
    };
    $("ul#scroller").liScroll({travelocity: 0.1});


//    $( "#product_tabs" ).tabs();
//
//    $( "#accordion" ).accordion();

    //Social Nav
    $('.flex-direction-nav li a ').hover(
        function(){
            $(this).stop().animate(
                {backgroundPosition: "(0 -20px)"},
                {duration:500}
            )
        },
        function(){
            $(this).stop().animate(
                {backgroundPosition: "(0 0)"},
                {duration:500}
            )
        }
    );

    $.extend($.fx.step,{
        backgroundPosition: function(fx) {
            if (fx.pos === 0 && typeof fx.end == 'string') {
                var start = $.css(fx.elem,'backgroundPosition');
                start = toArray(start);
                fx.start = [start[0],start[2]];
                var end = toArray(fx.end);
                fx.end = [end[0],end[2]];
                fx.unit = [end[1],end[3]];
            }
            var nowPosX = [];
            nowPosX[0] = ((fx.end[0] - fx.start[0]) * fx.pos) + fx.start[0] + fx.unit[0];
            nowPosX[1] = ((fx.end[1] - fx.start[1]) * fx.pos) + fx.start[1] + fx.unit[1];
            fx.elem.style.backgroundPosition = nowPosX[0]+' '+nowPosX[1];

            function toArray(strg){
                strg = strg.replace(/left|top/g,'0px');
                strg = strg.replace(/right|bottom/g,'100%');
                strg = strg.replace(/([0-9\.]+)(\s|\)|$)/g,"$1px$2");
                var res = strg.match(/(-?[0-9\.]+)(px|\%|em|pt)\s(-?[0-9\.]+)(px|\%|em|pt)/);
                return [parseFloat(res[1],10),res[2],parseFloat(res[3],10),res[4]];
            }
        }
    });
						
});

var tpj=jQuery;               // MAKE JQUERY PLUGIN CONFLICTFREE
tpj.noConflict();

tpj(document).ready(function() {

    if (tpj.fn.cssOriginal!=undefined)   // CHECK IF fn.css already extended
        tpj.fn.css = tpj.fn.cssOriginal;

    tpj('.fullwidthbanner').revolution(
        {
            delay:6000,
            startwidth:960,
            startheight:370,

            onHoverStop:"on",						// Stop Banner Timet at Hover on Slide on/off

            thumbWidth:0,							// Thumb With and Height and Amount (only if navigation Tyope set to thumb !)
            thumbHeight:0,
            thumbAmount:0,

            hideThumbs:20,
            navigationType:"none",					//bullet, thumb, none, both	 (No Shadow in Fullwidth Version !)
            navigationArrows:"verticalcentered",		//nexttobullets, verticalcentered, none
            navigationStyle:"round",				//round,square,navbar

            touchenabled:"off",						// Enable Swipe Function : on/off

            navOffsetHorizontal:200,
            navOffsetVertical:200,

            fullWidth:"on",

            shadow:0								//0 = no Shadow, 1,2,3 = 3 Different Art of Shadows -  (No Shadow in Fullwidth Version !)

        });
});