<?php 
include ( MODULES . 'inner-header/image.php'); 
?>

<section class="home-hero mt12 bg-black pt10 pb10">
	<div class="home-hero__content">
		<div class="row row-site column">
			<?php include ( MODULES . 'inner-header/label.php'); ?>
			<?php include ( MODULES . 'inner-header/title.php'); ?>
			<?php include ( MODULES . 'inner-header/intro-text.php'); ?>
			
			<figure>
			<?php echo $inner_header_image;  ?>
			</figure>
			
		</div>
	</div>
</section>
