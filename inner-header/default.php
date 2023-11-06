<?php 
$bg_type = get_field("background_type");
include ( MODULES . 'inner-header/image.php'); 
?>

<section class="page-hero__container relative<?php if( $bg_type == "Color") : ?> page-hero__background-color<?php endif; ?>" <?php if( $bg_type == "Image") : ?>style="background-image: url('<?php echo $inner_header_image ?>');background-size: cover; background-position: <?php echo $ph_image_position; ?> "<?php endif; ?>>
	<div class="page-hero__content">
		<div class="row row-site column">
		
			<?php include ( MODULES . 'inner-header/label.php'); ?>
			<?php include ( MODULES . 'inner-header/title.php'); ?>
			<?php include ( MODULES . 'inner-header/intro-text.php'); ?>
			
		</div>
	</div>
</section>