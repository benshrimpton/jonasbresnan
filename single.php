<!-- single view -->
<?php

include_once 'includes.php';
get_header();
?>

<a href="#" id="toggle-grid">Toggle Thumbnails</a>

<div id="galleria-single-wrap">
	<div id="galleria-single"></div>
</div>
<div id="counter-wrapper"><!-- js counter --></div>



<div id="grid">	
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		
		<?php
		$images = get_field('image');
		$image = $images[0];
		?>
			<?php foreach( $images as $image ): ?>
					<a href="<?php echo $image['sizes']['large']; ?>">
					<img
					src="<?php bloginfo( 'template_url' ); ?>/css/img/loader.png"
			        data-original="<?php echo $image['sizes']['thumbnail']; ?>"
			        class="lazy"
			        />
			        </a>
			<?php endforeach; ?>
	<?php endwhile; endif;  ?>
		<div class="clear"></div>
</div>

	
<script>
$(document).ready(function() {

  
Galleria.loadTheme('<?php bloginfo( 'template_url' ); ?>/js/vendor/galleria-1.2.7/themes/classic/galleria.classic.min.js');




$('.main-header').imagesLoaded(function() {

		//set height vars
		var winheight = $(window).height();
		var headheight = $('.main-header').outerHeight() + 60;
		var galHeight = winheight - headheight ;
		var gridTop = winheight + 20;
		
		//console.log(winheight, headheight, galHeight)
		
		//$('#grid').css({'top': gridTop+'px'});
		
		//animate galleria wrapper then init the galleria
		$('#galleria-single-wrap').animate({'height': galHeight+'px'}, 0, function() {
		
			Galleria.run('#galleria-single', {
				autoPlay: 3000,
				transitionSpeed: 600,
				dataSource: '#grid',
				keepSource: true,
				thumbnails: false,
				transition: 'flash',
				responsive: true,
				extend: function() {
					var gallery = this; // "this" is the gallery instance
					//$("a#galleria-next").click(function() {gallery.next();});
					//$("a#galleria-prev").click(function() {gallery.prev();});
					this.$('counter').appendTo('#counter-wrapper');
				}
			});
			
		});

}); //end imagesLoaded





$('#grid').on('click', 'a', function(e) {

	e.preventDefault();
	$('body, html').animate({scrollTop: 0},300);
	
	var winheight = $(window).height();
	var gridTop = $('.main-header').outerHeight() + 20;
	var gridBottom = $(window).height() + 20;
	var gridIsShown = $('#grid').hasClass('shown');
	
	if( gridIsShown ){
		$('#grid').css({'position':'relative', 'top':'auto'}).animate({}).removeClass('shown');
	}
	else {
		$('#grid').css({'top':'auto'});
	}
		
});



$('#toggle-grid').on('click', function(e) { 

	e.preventDefault();
	
	var gridTop = $('.main-header').outerHeight() + 20;
	var gridBottom = $(window).height() + 20;
	var gridIsShown = $('#grid').hasClass('shown');
	
	$('body, html').animate({scrollTop: 0}, 50, 'jswing');
	
	if( gridIsShown ){
		$('#grid').css({'position':'relative', 'top':'auto'}, 300, 'jswing').removeClass('shown');
	}
	if( !gridIsShown ){
		$('#grid').css({'position':'absolute', 'top':gridTop+'px'}, 300, 'jswing').addClass('shown');
	}
});


$(window).on('scroll', function() { 
	var scrollDistance  = $(this).scrollTop();
	console.log(scrollDistance);
	if (scrollDistance > 100) {
 	$('.main-nav').addClass('fixed');
	}
	else {
 	$('.main-nav').removeClass('fixed');
	}
});


	
$(window).on('resize', function() {

		//set height vars
		var winheight = $(window).height();
		var headheight = $('.main-header').outerHeight() + 60;
		var galHeight = winheight - headheight ;
		var gridTop = winheight + 20;
	
		$('#galleria-single-wrap').css({'height':galHeight+'px'});
});	



}); //end dom ready
</script>
<? get_footer() ?>