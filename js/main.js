/*
Author: Ben Shrimpton / Black & Black Creative
*/

/* Global Mobile Vars */ 
/* usage: if(iPadAgent || AndroidAgent) */
var iPadAgent = navigator.userAgent.match(/iPad/i) != null;
var iPhoneAgent = navigator.userAgent.match(/iPhone/i) != null;
var AndroidAgent = navigator.userAgent.match(/Android/i) != null;
var webOSAgent = navigator.userAgent.match(/webOS/i) != null;

$(function () {


//$('.home').addClass('white')
$('.general').addClass('shown');


$('#toggle-nav').on('click', function () {

	$('.main-nav').slideToggle(150).toggleClass('active');
	if( $('#toggle-nav').hasClass('active') ){
		$('#toggle-nav').html("+");
	}
	else {
		$('#toggle-nav').txt('&#9776;');
	}
});




$("img.lazy").lazyload({
	effect : "fadeIn"
});


$('.main-nav a').on('click', function(e) { 
	e.preventDefault();
	var theUrl = $(this).attr('href');
	$('.main').fadeOut(300, function() {
		window.location=theUrl;
	});
});
 

  
				




}); //end dom ready

