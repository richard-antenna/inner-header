<?php  

// check if the Page Hero Heading is the H1 for the page
if (get_field( 'page_hero_heading_is_h1' )) {
    $heading_tag_open = '<h1 class="page-hero__heading">';
    $heading_tag_close = '</h1>';
} elseif (is_archive()) {
    $heading_tag_open = '<h1 class="page-hero__heading">';
    $heading_tag_close = '</h1>';
    $bg_type = "Color";
} elseif (is_single()) {
    $heading_tag_open = '<span class="page-hero__heading">';
    $heading_tag_close = '</span>';
    $bg_type = "Color";
} else {
    $heading_tag_open = '<span class="page-hero__heading">';
    $heading_tag_close = '</span>';
}

// title output
if( get_field( 'ph_heading' ) ) :

    echo $heading_tag_open.get_field( 'ph_heading' ).$heading_tag_close;
    
elseif ( is_tag() ) : 

    $tag = get_queried_object();
    $tag_name = "Showing Articles Tagged: ".$tag->name;

    echo $heading_tag_open.$tag_name.$heading_tag_close;

elseif ( is_year() ) : 

    $year = get_the_date('Y');
    $year_name = "Showing Articles From: ".$year;
        
    echo $heading_tag_open.$year_name.$heading_tag_close;
    
elseif ( is_archive() ) : 
    $categories = get_queried_object();
    $category_name = "Showing Articles In: ".$categories->name;

    echo $heading_tag_open.$category_name.$heading_tag_close;
    
elseif ( is_single() ) : 

    // get the categories
    $categories = get_the_category();
    $separator = ' / ';
    $output = '';
    
    if ( !empty( $categories ) ) {
        foreach( $categories as $category ) {
                $output .= '<span class="page-hero__label">' . esc_html( $category->name ) . '</span>' . $separator;
        }
        echo trim( $output, $separator );
    }
        
    echo $heading_tag_open.get_the_title().$heading_tag_close;
    
elseif ( get_the_title() ) :
    echo $heading_tag_open.get_the_title().$heading_tag_close;
else :
    echo $heading_tag_open.get_bloginfo().$heading_tag_close;
endif;
?>
