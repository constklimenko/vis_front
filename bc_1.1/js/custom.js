$(document).ready(function () {





// pixel perfect toggle
	$('body').keydown(function(e){
        if(e.keyCode == 27) {
            $('body').toggleClass('pixelperfect');
        }
    });


	$(document).ready(function() {
	   stylesheetToggle();
	    $(window).resize(stylesheetToggle);
	});



	function stylesheetToggle() {
	   	var winHeight = $('body').outerHeight();
	   	var winHeight2 = $('body').height();
	    var headerHeight = $('.header').outerHeight();
	    var pageTitleHeight = $('.gallery-controls_wrapper').outerHeight();
	    var mapHeight = winHeight - headerHeight;
	    var controlsBoxHeight = winHeight2 - headerHeight;
	    $('.big-map').css({height : mapHeight});
	    $('.controls-box').css({minHeight :  controlsBoxHeight});


	    var winHeight = $(window).height();
		var headerHeight = $('.headre').outerHeight();
		var topLineHeight = $('.gallery-controls_wrapper').outerHeight();

		var svgContHeight = (winHeight - headerHeight - topLineHeight - 70)
		$('.svgContainer').css({"height":svgContHeight});
	};


  

// hide pleceholder on hover
    $('input, textarea').each(function(){
		var placeholder = $(this).attr('placeholder');
		$(this).focus(function(){ $(this).attr('placeholder', ''); return false;});
		$(this).focusout(function(){			 
		$(this).attr('placeholder', placeholder); 
			
			return false;
		});
	});

// formstyler
	$('select, input[type="radio"], input[type="checkbox"]').styler({
		selectSearch: true
	});

// fancybox
	$(".fancy").fancybox({
		openEffect	: 'none',
		closeEffect	: 'none',
		wrapCSS : 'popup-form',
        scrolling   : 'no',
		padding : 0,	
		helpers	: {
			 overlay : {
	            css : {
	                'background' : 'rgba(0, 0, 0, 0.6)'
	            }
	        }
		}
	});

// sliders
	var owl = $(".top-banner_slider");
	owl.owlCarousel({
	    loop:true,
	    margin:0,
	    autoplayHoverPause:true,
		items:3,
	    autoplay:true,
	    autoplayTimeout:7000,
	    navSpeed:100,
	    autoplaySpeed:100,
	    responsive:{
		        0:{
		        	items:1,
		        	nav:false,
		            dots:true
		        },
		        950:{
		        	items:2,
		        	dots:false,
		        },
		        1400:{
		        	items:3
		        }
		    }
	});
	  // Custom Navigation Events
	$(".next").click(function(){
	    owl.trigger('prev.owl.carousel');
	    return false;
	})
	$(".prev").click(function(){
	    owl.trigger('next.owl.carousel');
	    return false;
	})


// similar
	$(".simmilar-slider").owlCarousel({
	    loop:true,
	    margin:0,
	    autoplayHoverPause:true,
	    items:3,
	    autoplay:true,
	    autoplayTimeout:7000,
	    navSpeed:100,
	    autoplaySpeed:100,
	    responsive:{
		        0:{
		        	items:1,
		        	nav:false,
		            dots:true
		        },
		        950:{
		        	items:2,
		        	dots:false,
		        },
		        1400:{
		        	items:5
		        }
		    }
		})
// tabs
	$('ul.tabs').on('click', 'li:not(.current)', function() {
	    $(this).addClass('current').siblings().removeClass('current').parents('div.tabs-wrapper, .catalog-wrapper').find('div.box').eq($(this).index()).fadeIn(150).siblings('div.box').hide();
	});
	$('select[name="select-tab"]').change(function(){
		var el = $(this).val();
		$('.tabs-wrapper .box, .mobile-tab_container').hide();
		$('#tab-'+el).fadeIn();   
	});



// spoilers
	$('.spoiler-trigger').on('click', function(){
		$(this).siblings('.spoiler-box').slideToggle()
		return false;
	});

	$('.filter-spoiler_second__trigger').on('click', function(){
		$(this).siblings('.filter-spoiler_second').slideToggle();
		if ($('.filter-spoiler_second__trigger').text()=='Показать еще') $('.filter-spoiler_second__trigger').text('Свернуть');
		else $('.filter-spoiler_second__trigger').text('Показать еще');
	    return false;
	});

// selection parameters
	$('.parameters-link').on('click', function(){
		$(this).toggleClass('active');
		$('.selection-parameters').fadeToggle(300);
		$('.number-offers').fadeToggle(300);
		return false;
	});

	$('.menu-open').on('click',function()
	{
		if($('.menu-wrap').css('display')=='block')
		{
			$('.menu-wrap').css('display','none');
		}
		else
		{
			$('.menu-wrap').css('display','block');
		}

	});

	$(window).mousemove(function (pos) { 
	    $(".floorTooltip").css('left',(pos.pageX-50)+'px').css('top',(pos.pageY-145)+'px'); 
	    $(".officeTooltip").css('left',(pos.pageX-53)+'px').css('top',(pos.pageY-140)+'px');
	});

    animate();
    menu();
    hamburgerForm();

	if($('.back-link.parameters-link').length && $('.housing-line').length) {
		window.isClickedParametersLink = false;
		$('.back-link.parameters-link').first().on('click', function (e) {
			if (window.isClickedParametersLink) {
				return;
			}
			window.isClickedParametersLink = true;
			$('.housing-line').first().trigger('change');
		})
	}
});
function hamburgerForm() {
    var closer = $('.mob-menu .close-btn'),
        opener = $('.mob-menu .enter-btn'),
        parent = $('.mob-menu .enter'),
        form = $('.login-form'),
        menu = $('.mob-menu .menu-list');

    parent.click(function(){
        if(!form.is(':visible')) {
            opener.hide();
            menu.hide();
            form.show();
            closer.show();
        } else {
            closer.hide();
            menu.show();
            form.hide();
            opener.show();
        }
    });
    /*opener.click(function(){
        $(this).hide();
        menu.hide();
        form.show();
        closer.show();
    });
    closer.click(function(){
        $(this).hide();
        menu.show();
        form.hide();
        opener.show();
    });*/
}

function menu() {
    var opener = $('.header .menu-open'),
        menu = $('.mob-menu'),
        fader = $('.dark-fader'),
        closer = menu.find('.menu-open');

    opener.click(function(){
        /*e.preventDefault();*/
        fader.fadeIn(100);
        $('.page-wrap, .header').animate({
            'left':-menu.width()
        }, 500);
        menu.animate({
            'right':0
        }, 500)
    });
    closer.click(function(e){
        e.preventDefault();
        closeMenu()
    });
    fader.click(function(e){
        e.preventDefault();
        closeMenu()
    });

    function closeMenu() {
        setTimeout(function(){
            fader.fadeOut(100);
        }, 500)
        $('.page-wrap, .header').animate({
            'left':0
        }, 500);
        menu.animate({
            'right':'-100%'
        }, 500)
    }
}

function animate() {
    setTimeout(function(){
        $('.preload .loading li:nth-child(1)').css('opacity', 1);
    }, 0);
    setTimeout(function(){
        $('.preload .loading li:nth-child(2)').css('opacity', 1);
    }, 500);
    setTimeout(function(){
        $('.preload .loading li:nth-child(3)').css('opacity', 1);
    }, 1000);
    setTimeout(function(){
        $('.preload .loading li').css('opacity', 0);
    }, 1600);
    setInterval(function(){
        setTimeout(function(){
            $('.preload .loading li:nth-child(1)').css('opacity', 1);
        }, 0);
        setTimeout(function(){
            $('.preload .loading li:nth-child(2)').css('opacity', 1);
        }, 500);
        setTimeout(function(){
            $('.preload .loading li:nth-child(3)').css('opacity', 1);
        }, 1000);
        setTimeout(function(){
            $('.preload .loading li').css('opacity', 0);
        }, 1600);
    }, 2200);
}



$(window).load(function(){
    $('.preload').fadeOut(300, function(){
        $('.preload').remove();
    });
});

/*** 4.5.16 ***/
setInterval(function() {
    var x = $('.locationCar p.active');
    var next = x.next();
    if (next.attr('class')=='button'){
        next = $('.locationCar p.first');}
    x.removeClass('active');
    next.addClass('active');
}, 2000);