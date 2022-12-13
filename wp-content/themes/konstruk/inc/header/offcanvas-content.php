<?php 

global $konstruk_option;
if(!empty($konstruk_option['facebook']) || !empty($konstruk_option['twitter']) || !empty($konstruk_option['rss']) || !empty($konstruk_option['pinterest']) || !empty($konstruk_option['google']) || !empty($konstruk_option['instagram']) || !empty($konstruk_option['vimeo']) || !empty($konstruk_option['tumblr']) ||  !empty($konstruk_option['youtube'])){
?>

    <ul class="offcanvas_social">            
        <?php if(!empty($konstruk_option['facebook'])) { ?>
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
        <?php if (!empty($konstruk_option['youtube'])) { ?>
        <li> <a href="<?php  echo esc_url($konstruk_option['youtube']);?> " target="_blank"> <i class="fab fa-youtube"></i> </a> </li>
        <?php } ?>
        
    </ul>
<?php }

