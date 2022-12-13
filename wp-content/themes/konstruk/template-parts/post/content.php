<?php
/**
 * @author  rs-theme
 * @since   1.0
 * @version 1.0 
 */
global $konstruk_option;
?>




<div class="single-content-full">
    <div class="bs-desc">
        <?php
            the_content();

            wp_link_pages( array(
              'before'      => '<div class="page-links">' . esc_html__( 'Pages:', 'konstruk' ),
              'after'       => '</div>',
              'link_before' => '<span class="page-number">',
              'link_after'  => '</span>',
            ) );
        ?>
    </div>
     <?php 
        if(has_tag()){ ?>
            <div class="bs-info single-page-info tags">
                <?php
                    //tag add
                    $seperator = ''; // blank instead of comma
                    $after = '';
                    echo esc_html__( 'Tags: ', 'konstruk' );
                    the_tags( '', $seperator, $after );
                ?>             
            </div> 
       <?php } ?> 
</div>
