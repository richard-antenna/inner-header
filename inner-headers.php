<?php

$hero_type = 'default';
// $hero_type = get_field("hero_type");

switch ( $hero_type ) {
	
	case 'home':
		include ( MODULES . 'inner-header/home.php');
		break;
		
		default:
		include ( MODULES . 'inner-header/default.php');
	break;
	
}

// Style Guide Files
include ( MODULES . 'inner-header/sample-components.php');
include ( MODULES . 'inner-header/style-guide-nav.php');

