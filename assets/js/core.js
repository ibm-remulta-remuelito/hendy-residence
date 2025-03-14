/**
* Add ECMA262-5 Array methods if not supported natively
*/
//extend for Array filter
if (!Array.prototype.filter){
  Array.prototype.filter = function(fun /*, thisp */) {
    "use strict"; 
    if (this == null)
      throw new TypeError(); 
      
    var t = Object(this);
    var len = t.length >>> 0;
    if (typeof fun != "function")
      throw new TypeError();
 
    var res = [];
    var thisp = arguments[1];
    for (var i = 0; i < len; i++){
      if (i in t){
        var val = t[i]; // in case fun mutates this
        if (fun.call(thisp, val, i, t))
          res.push(val);
      }
    }
    return res;
  };
}
// extend for Array indexOf
if (!('indexOf' in Array.prototype)) {
    Array.prototype.indexOf= function(find, i /*opt*/) {
        if (i===undefined) i= 0;
        if (i<0) i+= this.length;
        if (i<0) i= 0;
        for (var n= this.length; i<n; i++)
            if (i in this && this[i]===find)
                return i;
        return -1;
    };
}

var QueryString = function () {
  // This function is anonymous, is executed immediately and 
  // the return value is assigned to QueryString!
  var query_string = {};
  var query = window.location.search.substring(1);
  var vars = query.split("&");
  for (var i=0;i<vars.length;i++) {
    var pair = vars[i].split("=");
    	// If first entry with this name
    if (typeof query_string[pair[0]] === "undefined") {
      query_string[pair[0]] = pair[1];
    	// If second entry with this name
    } else if (typeof query_string[pair[0]] === "string") {
      var arr = [ query_string[pair[0]], pair[1] ];
      query_string[pair[0]] = arr;
    	// If third or later entry with this name
    } else {
      query_string[pair[0]].push(pair[1]);
    }
  } 
    return query_string;
} ();


var animations_completed = false;


$(document).ready(function() {

	var ini_menu_toggle = menu_toggle();
	var ini_flexslider = initiate_flexslider();
	var ini_fancybox = initiate_fancybox();
	var ini_scrollers = init_scrollers();

	if($('*[data-url]').length) {
		$.each($('*[data-url]'), function(){
			var el 	= $(this);
			to_url 	= el.data('url');
			url 	= el.attr('href');
			$.post('ajax/code', {'data' : to_url}, function(response) {
				if(response) {
					//chekck to see if we have a payload
		 			if(url.indexOf('?') > 0) {
		 				url 	= url + '&pg='+response;
		 			} else {
		 				url 	= url + '?pg='+response;
		 			}
					el.attr('href', url).removeAttr('data-url');
				}
			});
		});
	}

	$('select').on('change', function() { $(this).addClass('selection-made'); });

	if ($('.form-thankyou').length)
	{
		var pos = $('.form-thankyou').offset().top - $('header').outerHeight() - 150;

		$('html, body').animate({'scrollTop': pos}, 600, 'swing', function() {
			$('.form-thankyou').fadeOut(500, function() {
				$('.form-thankyou').fadeIn(500);
			});
	    });
	}

	if ($('.form-validation-errors').length)
	{
		var pos = $('.form-validation-errors').offset().top - $('header').outerHeight() - 150;

		$('html, body').animate({'scrollTop': pos}, 600, 'swing', function() {
			$('.form-validation-errors').fadeOut(500, function() {
				$('.form-validation-errors').fadeIn(500);
			});
	    });
	}

	$('.js-fancybox').on('dragstart contextmenu', 'img', function(event) { event.preventDefault(); });

	$('.fancybox-inner').on('dragstart contextmenu', '.fancybox-image', function(event) { event.preventDefault(); });

	if ($('.js-next-section').length) {
		$('.js-next-section').on('click tap touch', function (e) {
			e.preventDefault();
			scroll_to($(this).attr('href').substring(1));
		});
	}

	form_submitted = false 

	$('form').on('submit', function(e) {
		if (form_submitted)
		{
			e.preventDefault();
		}
		else
		{
			form_submitted = true;
		}
	});
    
}); /* END DOCUMENT READY */

function scroll_to(el) {
	if ($('#' + el).length) {
		$('html, body').animate({
			scrollTop: $('#' + el).offset().top - 50
		}, 600);
	}
}

function isValidEmailAddress(emailAddress) 
{
	var pattern = new RegExp(/^(("[\w-\s]+")|([\w-]+(?:\.[\w-]+)*)|("[\w-\s]+")([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i);
	return pattern.test(emailAddress);
}

function menu_toggle()
{
	var first = true;
	if ($('.menu-toggle').length)
	{
		$('.menu-toggle').on('click tap touch', function() {
			
			$('body').toggleClass('menu-open');
			if (first)
			{
				first = false;
			}
			else
			{
				$('body').toggleClass('menu-close');
			}

			return false;
		});
	}

	if ($('.menu-close').length)
	{
		$('.menu-close').on('click tap touch', function() {		
			$('body').removeClass('menu-open');
			$('body').addClass('menu-close');

			return false;
		});
	}

	if ($('.has-submenu').length)
	{
		$('.has-submenu .arrow').on('click tap touch', function(e) {
			e.preventDefault();
			$(this).closest('.has-submenu').toggleClass('open');
		});
	}
}

function initiate_flexslider() {
	if ($(".flexslider").length) {

		$('.hero-gallery .flexslider').flexslider({
			animation: "fade",
			slideshowSpeed: 7000,
			slideshow: true,
			pauseOnHover: true,
			pauseOnAction: true,
		});

		$('.article__image .flexslider').flexslider({
			animation: "fade",
			slideshowSpeed: 7000,
			slideshow: true,
			pauseOnHover: true,
			pauseOnAction: true,
		});

	}
}

function initiate_fancybox() {
	if ($(".js-fancybox").length) {
		$(".js-fancybox").fancybox({
			padding: 0,
			afterLoad: function() { $('.fancybox-inner').on('dragstart contextmenu', '.fancybox-image', function(event) { event.preventDefault(); }); },
		});
	}

	if ($(".js-fancybox-iframe").length) {
		$(".js-fancybox-iframe").fancybox({
			padding: 0,
			margin: 0,
			type: 'iframe',
			width: '100%',
			height: '100%',
			scrolling: 'no',
			// iframe: {
			// 	scrolling : 'no',
			// 	preload   : true
			// },
			beforeShow: function(){
		        $("body").css({'overflow-y':'hidden'});
		    },
		    afterClose: function(){
		        $("body").css({'overflow-y':'auto'});
		    },
			helpers : {
		        overlay : {
		            locked: false
		        }
		    },
		    tpl: {
		    	closeBtn : '<a title="Close" class="custom-fancybox-close" href="javascript:;"><img src="/assets/images/icon-close.png" alt="close" /></a>',
		    }
		});
	}
}

function init_scrollers() 
{
	if($('.js-scroll').length)	
	{
		$('.js-scroll').on('click tap touch', function(e){
			e.preventDefault();
			var target = $($(this).attr('href'));
			var scrollPos = target.offset().top - $('header').outerHeight();

			$('html, body').animate({
			scrollTop: scrollPos
			}, ((scrollPos / 10000) * 800) + 1000 );

		});
	}
}


