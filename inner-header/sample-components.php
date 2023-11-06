<?php if( is_page('sample-components') && isset($section_number) ) : ?>
<section class="sc-section">
	<div class="row row-site column">
    <h2 data-anchor="<?php echo $layout_title; ?>" class="sc-section__subheading"><span class="icon-arrow-down"></span><span><?php echo "#".$section_number; ?>: <?php echo $layout_title; ?></span></h2>
		<?php $component_name = ucwords(preg_replace("/[\-_]/", " ", get_row_layout())); ?>
		<span class="sc-section__created__using">created using the <?php echo $component_name ?> component</span>
	</div>
</section>
<?php endif; ?>