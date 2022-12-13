<?php 
global $konstruk_option;
$text_alignment = !empty($konstruk_option['text_alignment']) ? $konstruk_option['text_alignment'] : ''; ?>

<div class="rs-breadcrumbs  porfolio-details <?php echo esc_attr($text_alignment); ?>">  
  <?php 
    if(!empty($konstruk_option['blog_banner_main']['url'])) { ?>
    <div class="breadcrumbs-single" style="background-image: url('<?php echo esc_url($konstruk_option['blog_banner_main']['url']);?>')">
    <?php } else { ?>
        <div class="breadcrumbs-single">
    <?php } ?>
      <div class="rs-breadcrumbs-inner">
      <div class="container">
        <div class="row">
          <?php if( !empty( $konstruk_option['footer_icon_animation']['url'])){?>
            <div class="footer-animision-icon">
                <img src="<?php echo esc_url($konstruk_option['footer_icon_animation']['url']);?> " alt="<?php echo esc_attr( get_bloginfo( 'name' )); ?>">
            </div>
        <?php } ?>
          <div class="col-md-12 text-center">
            <div class="breadcrumbs-inner">
              <h1 class="page-title"><?php printf( __( 'Search Results for: %s', 'konstruk' ), '<span>' . get_search_query() . '</span>' ); ?></h1>            
            </div>
          </div>
        </div>
      </div>
      </div>
    </div>
</div>