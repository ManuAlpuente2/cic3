<?php 
global $konstruk_option;
$post_meta_header = '';
$header_style     = '';

$logo_height        = !empty($konstruk_option['logo-height']) ? 'style = "max-height: '.$konstruk_option['logo-height'].'"' : '';
$sticky_logo_height = !empty($konstruk_option['sticky_logo_height']) ? 'style = "max-height: '.$konstruk_option['sticky_logo_height'].'"' : '';

if(!empty($konstruk_option['header_layout'])){ 
  $header_style = $konstruk_option['header_layout'];
} 

if ( class_exists( 'WooCommerce' ) && is_shop() || class_exists( 'WooCommerce' ) && is_product_tag()  || class_exists( 'WooCommerce' ) && is_product_category()  ) {
    $konstruk_shop_id      = get_option( 'woocommerce_shop_page_id' ); 
    $post_meta_header    = get_post_meta($konstruk_shop_id, 'select-logo', true); 
    $header_logos        =  get_post_meta($konstruk_shop_id, 'header_logo_img', true);
    $header_sticky_logos =  get_post_meta($konstruk_shop_id, 'header_sticky_logo_img', true);

} elseif (is_home() && !is_front_page() || is_home() && is_front_page()){

    $post_meta_header    = get_post_meta(get_queried_object_id(), 'select-logo', true); 
    $header_logos        =  get_post_meta(get_queried_object_id(), 'header_logo_img', true);
    $header_sticky_logos =  get_post_meta(get_queried_object_id(), 'header_sticky_logo_img', true);
        
} else {
    $post_meta_header = get_post_meta(get_queried_object_id(), 'select-logo', true); 
    $header_logos =  get_post_meta(get_queried_object_id(), 'header_logo_img', true);
    $header_sticky_logos =  get_post_meta(get_queried_object_id(), 'header_sticky_logo_img', true);
}
$custom_logo = get_custom_logo();

if(!empty($custom_logo)){ ?>
    
    <div class="logo-area">
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php  the_custom_logo(); ?></a>          
    </div>
    <div class="logo-area sticky-logo">
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php  the_custom_logo(); ?></a>
    </div>
<?php }
elseif(!empty($konstruk_option['enable_global'])){ ?>
    <div class="logo-area">
        <?php
           if (!empty( $konstruk_option['logo']['url'] ) ) { ?>
          <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><img <?php echo wp_kses($logo_height, 'konstruk');?> src="<?php echo esc_url( $konstruk_option['logo']['url']); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>"></a>
        <?php } else{?>
          <div class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></div>         
           <?php  } 
        ?>

    </div>
    <?php if (!empty( $konstruk_option['rswplogo_sticky']['url'] ) ) { ?>
            <div class="logo-area sticky-logo">
              <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><img <?php echo wp_kses($sticky_logo_height, 'konstruk');?> src="<?php echo esc_url( $konstruk_option['rswplogo_sticky']['url']); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>"></a>
               </div>
        <?php }

        else {?>
          <div class="logo-area sticky-logo">
        <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
        </div>
<?php }
}

elseif($header_logos !='' && empty($konstruk_option['enable_global'])){?>
    <div class="logo-areas custom-logo-area">
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
            <img <?php echo wp_kses($logo_height, 'konstruk');?> src="<?php echo esc_url($header_logos); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' )); ?>">
        </a>
    </div>    

    <div class="logo-areas custom-sticky-logo">
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
            <img <?php echo wp_kses($sticky_logo_height, 'konstruk');?> src="<?php echo esc_url($header_sticky_logos); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' )); ?>">
        </a>
    </div>  

    <?php } else {


        if( $post_meta_header == 'dark' ) {?>
        <div class="logo-area">


            <?php
               if (!empty( $konstruk_option['logo_light']['url'] ) ) { ?>
              <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><img <?php echo wp_kses($logo_height, 'konstruk');?> src="<?php echo esc_url( $konstruk_option['logo_light']['url']); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>"></a>
            <?php } else{?>
                
                  <div class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></div>   
               
               <?php  } 
            ?>     
        </div>
        <?php 
        }
         elseif($post_meta_header == 'light' || $post_meta_header == '' ){ ?>
          <div class="logo-area">
                       <?php
               if (!empty( $konstruk_option['logo']['url']  ) ) { ?>
              <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><img <?php echo wp_kses($logo_height, 'konstruk');?> src="<?php echo esc_url( $konstruk_option['logo']['url']); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>"></a>
            <?php } else{?>
              <div class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></div>         
               <?php  } 
            ?>
          </div>

        <?php }
         elseif($post_meta_header == 'icon' || $post_meta_header == ''){ ?>
          <div class="logo-area">
            <?php
               if (!empty( $konstruk_option['logo_icons']['url'] ) ) { ?>
              <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><img <?php echo wp_kses($logo_height, 'konstruk');?> src="<?php echo esc_url( $konstruk_option['logo_icons']['url']); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>"></a>
            <?php } else{?>
                
                  <div class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></div>   
               
               <?php  } 
            ?>     
          </div>

        <?php }

         elseif($post_meta_header == 'icon2' || $post_meta_header == ''){ ?>
          <div class="logo-area">
            <?php
               if (!empty( $konstruk_option['logo_icons_light']['url'] ) ) { ?>
              <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><img <?php echo wp_kses($logo_height, 'konstruk');?> src="<?php echo esc_url( $konstruk_option['logo_icons_light']['url']); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>"></a>
            <?php } else{?>
                
                  <div class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></div>   
               
               <?php  } 
            ?>     
          </div>
        <?php } else {
          ?>
          <div class="logo-area">
              <div class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></div>  
           </div>
          <?php
        }

        if (!empty( $konstruk_option['rswplogo_sticky']['url'] ) ) { ?>
            <div class="logo-area sticky-logo">
              <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><img <?php echo wp_kses($sticky_logo_height, 'konstruk');?> src="<?php echo esc_url( $konstruk_option['rswplogo_sticky']['url']); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>"></a>
               </div>
        <?php }

        else {?>
          <div class="logo-area sticky-logo">
        <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
        </div>
<?php }} ?>