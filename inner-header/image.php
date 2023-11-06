<?php


switch ( $hero_type ) {
	
	case 'home':
		// OPTIONS: 'image', 'background-image'
		$image_use = 'image'; 
		break;
		
		default:
		// OPTIONS: 'image', 'background-image'
		$image_use = 'background-image'; 
	break;
	
}

// Define template header image variable
$template_header_image = "";
$inner_header_image = "";

// Get current template name
$templates = wp_get_theme()->get_page_templates();
$current_template_file = get_page_template_slug();
$current_template = "default";

foreach ($templates as $key => $value) {
	if ($key === $current_template_file) {
		$current_template = strtolower($value);
	}
}

if (have_rows('templates', 'option')) :

	while (have_rows('templates', 'option')):
	
        the_row();
	
        if (strtolower(get_sub_field('template_name')) === $current_template):
        
            switch ($image_use) {

                case 'background-image':
                
                    $template_header_image = get_sub_field('image')['url'];
                    
                    if (get_field( 'background_type' )) {
                        
                        $bg_type = get_field("background_type");
                    
                        if( $bg_type == "Image") {

                            // If page header image defined use that
                            if (get_field( 'ph_image' )) {
                                $inner_header_image = get_field( 'ph_image' )['url'];
                            }
                            // if no page header image defined use template header image
                            elseif (!empty($template_header_image)) {
                                $inner_header_image = $template_header_image;
                            }

                            $ph_image_position = get_field('ph_image_position');
                            $ph_apply_image_overlay = get_field("ph_apply_image_overlay");
                            $ph_image_overlay_strength = get_field('ph_image_overlay_strength')/100;
                            
                        }
                    }
                ?>
                <?php if($bg_type == "Image" && $ph_apply_image_overlay) : ?>
                <style>
                    .page-hero__container:after {content: "";position: absolute;top:0;left: 0;width: 100%;height: 100%;background-color: rgba(0, 0, 0, <?php echo $ph_image_overlay_strength; ?>);}
                </style>
                <?php endif; ?>
                
                <?php
                break;

                default:
                
                    if (get_field( 'ph_image' )):
                        $inner_header_image_id = get_field( 'ph_image' )['id'];
                        $inner_header_image = wp_get_attachment_image( $inner_header_image_id, 'full' );
                    elseif ( get_sub_field('image') ):
                        $inner_header_image_id = get_sub_field('image')['id'];
                        $inner_header_image = wp_get_attachment_image( $inner_header_image_id, 'full' );
                    endif;
                    
                break;
                    
            }
                
            break;
                
            
        endif;
	
	endwhile;
	
endif;
