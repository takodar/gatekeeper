$(document).ready(function() {

	//Platform Detection

	var Platform = {}

	Platform.iPhone= !1,
	Platform.iPad= !1,
	Platform.Android= !1,
	Platform.AndroidTablet= !1,
	Platform.IE= !1,
	Platform.IE6= !1,
	Platform.IE7= !1,
	Platform.IE8= !1,
	Platform.IE9= !1,
	Platform.Moz= !1,
	Platform.Chrome= !1,
	Platform.Safari= !1,
	Platform.Fennec= !1,
	Platform.Old= !1,
	Platform.Mobile= !1,
	Platform.Tablet= !1;
	  

	function DetectPlatform() {
		var n, t;
		$.browser.msie ? (Platform.IE = !0, Platform.IE6 = $.browser.version == 6 ? !0 : !1,
		Platform.IE7 = $.browser.version == 7 ? !0 : !1,
		Platform.IE8 = $.browser.version == 8 ? !0 : !1, 
		Platform.IE9 = $.browser.version >= 9 ? !0 : !1) : $.browser.webkit || $.browser.chrome ? (Platform.Chrome = navigator.userAgent.toLowerCase().indexOf("chrome") != -1 ? !0 : !1,
		Platform.Chrome || (Platform.iPhone = navigator.userAgent.match(/iPhone/i) || navigator.userAgent.match(/iPod/i) ? !0 : !1, 
		Platform.iPad = navigator.userAgent.match(/iPad/i) ? !0 : !1, 
		Platform.iPhone || Platform.iPad || (Platform.Safari = navigator.userAgent.match(/Safari/i) ? !0 : !1)), 
		Platform.Android = navigator.userAgent.match(/Android/i) ? !0 : !1, 
		Platform.Android && !navigator.userAgent.match(/Mobile/i) && (Platform.AndroidTablet = !0)) : (Platform.Moz = $.browser.mozilla, Platform.Firefox = navigator.userAgent.match(/Firefox/i) ? !0 : !1), 
		n = document.documentElement.clientWidth, 
		Platform.Mobile = n <= 640, 
		Platform.Tablet = Platform.Mobile == !1 && n <= 1071, 
		(typeof window.history != "object" || typeof window.history.pushState != "function") && (Platform.Old = !0), 
		$.support.touch = "ontouchstart" in window || window.DocumentTouch && document instanceof DocumentTouch, 
		$("body").removeClass("mobile desktop tablet chrome safari moz"), 
		Platform.Mobile ? ($("body").addClass("mobile"), 
		Platform.Android && navigator.userAgent.match(/android 2\./i) && (t = "onorientationchange" in window ? "orientationchange" : "resize", 
		window.addEventListener(t, function () {(window.orientation == 90 || window.orientation == -90) && location.replace(location.href)}, !1))) : Platform.Tablet ? $("body").addClass("tablet") : $("body").addClass("desktop"), 
		Platform.Chrome ? $("body").addClass("chrome") : Platform.Safari ? $("body").addClass("safari") : Platform.Moz && $("body").addClass("moz")
	}

	DetectPlatform();

	
	$(".left-clm div").each(function() {
		if(!$(this).hasClass('contact-thanks') && !$(this).hasClass('overlay') && !$(this).hasClass('thankyou') ) {
			$(this).fadeIn(1000); 				
		}
		
	});

	$('.ico-navigation a.disabled').click(function(e) {
		e.preventDefault();
	})

	//Popup Close
	$('.overlay a.close').click(function(e) {
		e.preventDefault();
		$(this).parents('.overlay').fadeOut(500);
	});

	//Popup Open
	$('a.modal').click(function(e) {
		e.preventDefault();
		var modalUrl = $(this).attr('href');
		$('.overlay').fadeOut(500);
		$('.' + modalUrl).fadeIn(500);
	});
    
	//Contact
	//$('.contact-form .button').click(function() {
	//	$('.contact-form').hide();
	//	$('.contact-thanks').show();
	//});


	//Signup
	//$('.popup-content .button').click(function() {
	//	$('.popup-content').hide();
	//	$('.popup-content.thankyou').show();
	//});

	//Singup Button
	$('.sign-up a').click(function(e) {
		e.preventDefault();
		$('.overlay').fadeOut(500);
		$('.singup-popup.overlay').fadeIn(500);
	});


});