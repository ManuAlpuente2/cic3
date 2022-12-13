<?php
/*
Header Style
*/
global $konstruk_option;
$rs_mouse_pointer="";
$rs_mouse_pointer  = get_post_meta(get_queried_object_id(), 'mouse-pointer', true);
if($rs_mouse_pointer != 'hide'){
	if(!empty($konstruk_option['show_pointer']) || ($rs_mouse_pointer == 'show') ){
	    $pointer_localize_data = array(
	        'pointer_border' => $konstruk_option['pointer_border'],
	        'border_width'   => $konstruk_option['border_width'],
	        'pointer_bg'     => $konstruk_option['pointer_bg'],
	        'diameter'       => $konstruk_option['diameter'],
	        'scale'          => $konstruk_option['scale'],
	        'speed'          => $konstruk_option['speed'],     
	    );
	    wp_localize_script( 'konstruk-main', 'pointer_data', $pointer_localize_data );
	}
}


if(!empty($konstruk_option['show_scrollbar']) ){
    $scroll_localize_data 	= array(
        'cursorcolor' 		=> $konstruk_option['cursorcolor'],
        'rail_bg'   		=> $konstruk_option['rail_bg'],
        'cursor_width'     	=> $konstruk_option['cursor_width'],
        'cursorminheight'   => $konstruk_option['cursorminheight'],
        'scrollspeed'       => $konstruk_option['scrollspeed'],
        'mousescrollstep'   => $konstruk_option['mousescrollstep'],     
    );
    wp_localize_script( 'konstruk-main', 'scroll_data', $scroll_localize_data );
}
