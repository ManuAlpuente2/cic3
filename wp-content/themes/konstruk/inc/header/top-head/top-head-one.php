<?php
/* Top Header part for konstruk Theme
*/

global $konstruk_option;

// Header Options here
require get_parent_theme_file_path('inc/header/header-options.php');

if($rs_top_bar != 'hide'){
  if(!empty($konstruk_option['show-top']) || ($rs_top_bar=='show')){
     
       if( !empty($konstruk_option['welcome-text']) || !empty($konstruk_option['show-social'])){?> 
          <div class="toolbar-area">
            <div class="<?php echo esc_attr($header_width);?>">
              <div class="toolbar-contact text-center">
                  <ul class="rs-contact-info">                   
                         <?php if(!empty($konstruk_option['welcome-text'])) { ?>
                              <li> <?php echo esc_html($konstruk_option['welcome-text']); ?> </li>
                    <?php } ?> 
                  </ul>
              </div>
            </div>
          </div>
      <?php 
    }
  }
} ?>
