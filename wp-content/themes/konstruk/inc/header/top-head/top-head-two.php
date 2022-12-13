<?php
/* Top Header part for konstruk Theme
*/
global $konstruk_option;

// Header Options here
require get_parent_theme_file_path('inc/header/header-options.php');

if($rs_top_bar != 'hide'){
    if(!empty($konstruk_option['show-top']) || ($rs_top_bar == 'show')){
        if( !empty($konstruk_option['top-email']) || !empty($konstruk_option['phone']) || !empty($konstruk_option['show-social'])){?> 
        <div class="toolbar-area dd">
            <div class="<?php echo esc_attr($header_width);?>">
              <div class="row">
                <div class="col-lg-7">
                  <div class="toolbar-contact">
                    <ul class="rs-contact-info">                        

                        <?php if(!empty($konstruk_option['top-email'])) { ?>
                        <li class="rs-contact-email">
                            <i class="fi fi-rr-envelope-plus"></i>                  
                            <a href="mailto:<?php echo esc_attr($konstruk_option['top-email'])?>"><?php echo esc_html($konstruk_option['top-email'])?></a>                
                        </li>
                        <?php } ?>

                        <?php if(!empty($konstruk_option['phone'])) { ?>
                        <li class="rs-contact-phone">
                          <i class="fi fi-rr-phone-call"></i>                                      
                              <a href="tel:<?php echo esc_attr(str_replace(" ","",($konstruk_option['phone'])))?>"> <?php echo esc_html($konstruk_option['phone']); ?></a>                   
                        </li>
                        <?php } ?> 

                        <?php if(!empty($konstruk_option['top_address'])) { ?>
                            <li class="rs-hours rs-contact-email">
                                <i class="fi fi-rr-map-marker-home"></i> 
                                <?php echo esc_html($konstruk_option['top_address'])?>
                            </li>  
                        <?php } ?>                    
                       
                  </ul>
                  </div>
                </div>
                <div class="col-lg-5">
                  <div class="toolbar-sl-share">
                    <ul class="clearfix">
                      <?php
                      if(!empty($konstruk_option['open_hours'])):
                        $open_hours = $konstruk_option['open_hours']; ?>
                         <li class="opening"> <em><i class="fi-rr-time-add"></i> <?php echo esc_html($open_hours); ?></em> </li>

                    <?php
                      endif;

                      if(!empty($konstruk_option['show-social'])){
                        $top_social = $konstruk_option['show-social']; 
                    
                        if($top_social == '1'){ 
                                          
                            if(!empty($konstruk_option['facebook'])) { ?>
                            <li> <a href="<?php echo esc_url($konstruk_option['facebook']);?>" target="_blank"> <i class="fab fa-facebook-f"></i> </a> </li>
                            <?php } ?>
                            <?php if(!empty($konstruk_option['twitter'])) { ?>
                            <li> <a href="<?php echo esc_url($konstruk_option['twitter']);?> " target="_blank"> <i class="fab fa-twitter"></i> </a> </li>
                            <?php } ?>
                            <?php if(!empty($konstruk_option['rss'])) { ?>
                            <li> <a href="<?php  echo esc_url($konstruk_option['rss']);?> " target="_blank"> <i class="fas fa-rss"></i> </a> </li>
                            <?php } ?>
                            <?php if (!empty($konstruk_option['pinterest'])) { ?>
                            <li> <a href="<?php  echo esc_url($konstruk_option['pinterest']);?> " target="_blank"> <i class="fab fa-pinterest-p"></i> </a> </li>
                            <?php } ?>
                            <?php if (!empty($konstruk_option['linkedin'])) { ?>
                            <li> <a href="<?php  echo esc_url($konstruk_option['linkedin']);?> " target="_blank"> <i class="fab fa-linkedin-in"></i> </a> </li>
                            <?php } ?>
                            <?php if (!empty($konstruk_option['instagram'])) { ?>
                            <li> <a href="<?php  echo esc_url($konstruk_option['instagram']);?> " target="_blank"> <i class="fab fa-instagram"></i> </a> </li>
                            <?php } ?>
                            <?php if(!empty($konstruk_option['vimeo'])) { ?>
                            <li> <a href="<?php  echo esc_url($konstruk_option['vimeo']);?> " target="_blank"> <i class="fab fa-vimeo-v"></i> </a> </li>
                            <?php } ?>
                            <?php if (!empty($konstruk_option['tumblr'])) { ?>
                            <li> <a href="<?php  echo esc_url($konstruk_option['tumblr']);?> " target="_blank"> <i class="fab fa-tumblr"></i> </a> </li>
                            <?php } ?>
                            <?php if (!empty($konstruk_option['snapchat'])) { ?>
                                <li> <a href="<?php  echo esc_url($konstruk_option['snapchat']);?> " target="_blank"><i class="fab fa-snapchat-ghost"></i></a> </li>
                            <?php } ?>
                            
                            <?php if (!empty($konstruk_option['tiktok'])) { ?>
                                <li> <a href="<?php  echo esc_url($konstruk_option['tiktok']);?> " target="_blank"><i class="fab fa-tiktok"></i></a> </li>
                            <?php } ?>
                            <?php if (!empty($konstruk_option['youtube'])) { ?>
                            <li> <a href="<?php  echo esc_url($konstruk_option['youtube']);?> " target="_blank"> <i class="fab fa-youtube"></i> </a> </li>
                            <?php } ?>
                            <?php if (!empty($konstruk_option['houzz'])) { ?>
                            <li> <a href="<?php  echo esc_url($konstruk_option['houzz']);?> " target="_blank"> <i class="fab fa-houzz"></i> </a> </li>
                            <?php } ?>
                            <?php }
                            }
                         ?>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
      <?php 
    }
  }
} ?>