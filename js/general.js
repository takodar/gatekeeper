/*---------------------------------------------------------------------*/
;(function($){
/*---------------------------------------------------------------------*/
$(document).ready( function(){
/*---------------------------------------------------------------------*/

$('.nav').append('<div class="mMenu"></div>').append('<a class="mTreger"><span></span><span></span><span></span></a>');
$('.mMenu').append($('.navbar').clone());
$('.mTreger').click(function(){
	$('.mMenu .navbar').slideToggle();
});
if($('.slider').length > 0){
	$('.slider').bxSlider({
	  speed:1000,
	  auto: true,
	  pager: false,
	  controls: true,
	  infiniteLoop: false  
	});
}
if($('.sliderText').length > 0){
	$('.sliderText').bxSlider({
	  speed:1000,
	  auto: true,
	  pager: true,
	  controls: false
	});
}
if($('.cat .text').length > 1){
	var carHeight = 0;
	$('.cat .text').each(function(index) {
		if($(this).height() > carHeight){
			carHeight=$(this).height();
		}		
	});
	$('.cat .text').height(carHeight);
}
if($('.cat > h3').length > 1){
	var carTitleHeight = 0;
	$('.cat > h3').each(function(index) {
		if($(this).height() > carTitleHeight){
			carTitleHeight=$(this).height();
		}
	});
	$('.cat > h3').height(carTitleHeight);
}
if($('.toppic .text').length > 1){
	var toppicHeight = 0;
	$('.toppic .text').height('auto');
	$('.toppic .text').each(function(index) {
		if($(this).height() > toppicHeight){
			toppicHeight=$(this).height();
		}
	});
	$('.toppic .text').height(toppicHeight);
}

/*---------------------------------------------------------------------*/
});
})(jQuery); 
$(window).resize(function(){
	if($('.cat .text').length > 1){
		var carHeight = 0;
		$('.cat .text').height('auto');
		$('.cat .text').each(function(index) {
			if($(this).height() > carHeight){
				carHeight=$(this).height();
			}
		});
		$('.cat .text').height(carHeight);
	}
	if($('.cat > h3').length > 1){
		var carTitleHeight = 0;
		$('.cat > h3').height('auto');
		$('.cat > h3').each(function(index) {
			if($(this).height() > carTitleHeight){
				carTitleHeight=$(this).height();
			}
		});
		$('.cat > h3').height(carTitleHeight);
	}
	if($('.toppic .text').length > 1){
		var toppicHeight = 0;
		$('.toppic .text').height('auto');
		$('.toppic .text').each(function(index) {
			if($(this).height() > toppicHeight){
				toppicHeight=$(this).height();
			}
		});
		$('.toppic .text').height(toppicHeight);
	}
})