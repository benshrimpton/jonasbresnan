<?php
/* Template Name: Homepage */

include_once 'includes.php';
get_header();
?>


<div id	="galleria-wrap-home">
	<div id="galleria"></div>
</div>

<div id	="galleria-hidden">
	<div id="galleria-hidden"></div>
</div>

<div id="grid"></div>
<script>
$(function() { 

var data = [

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<?php
$images = get_field('images');
$image = $images[0];
?>
	<?php $image_text = array(); ?>
	<?php foreach( $images as $image ): ?>
		 <?php $image_text[] = "{ image :'". $image['sizes']['large'] . "', thumb: '".  $image['sizes']['thumbnail'] ."'}"; ?>
	<?php endforeach; ?>
	<?php echo implode( $image_text, ","); ?>
<?php endwhile; endif;  ?>

];
Galleria.loadTheme('<?php bloginfo( 'template_url' ); ?>/js/vendor/galleria-1.2.9/themes/classic/galleria.classic.min.js');


	//console.log(headerheight, galHeight);
	
	$('.home .main-header').imagesLoaded(function() {
		var headerheight = $('.main-header').outerHeight() / 2;
		var galHeight = $(window).height();
		var galWidth = $(window).width();
		$('.home .main-header').delay(1000).animate({ 'margin-top':'-'+headerheight+'px'}, 600, 'easeInOutCubic');
		$('#galleria').animate({'height':galHeight+'px'}, 1000, function() {
			Galleria.run('#galleria', {
			autoPlay: 3000,
			transitionSpeed: 600,
			dataSource: data,
			imageCrop:true,
			thumbnails: false,
			transition: 'flash',
			imagenav: false,
			showImagenav: false,
			showCounter: false		
			});
		});
	});
	


	
$(window).on('resize', function() {
		var headerheight = $('.main-header').outerHeight() / 2;
		var galHeight = $(window).height();
		var galWidth = $(window).width();
		console.log(headerheight, galHeight);
		$('#galleria').animate({'height':galHeight+'px'});
});	
	
	
}); //end dom ready.
</script>
<? get_footer() ?>