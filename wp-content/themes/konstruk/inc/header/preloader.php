<?php 
global $konstruk_option;
$preloader_img = "";

if(!empty($konstruk_option['show_preloader']))
  {
    $loading = $konstruk_option['show_preloader'];
    if(!empty($konstruk_option['preloader_img'])){
      $preloader_img = $konstruk_option['preloader_img'];
    }
    if($loading == 1){
      if(empty($preloader_img['url'])):
      ?> 

        <div id="pre-load">
            <div class="loader-pre">
                <div id="loader" class="loader">
                    <div class="loader-container">
                        <div class='loader-icon'></div>
                    </div>
                </div>
            </div>
        </div>
      
        
      <?php else: ?>
           <div id="pre-load">
                <div id="loader" class="loader">
                    <div class="loader-container">
                        <div class='loader-icon'><img src="<?php echo esc_url($preloader_img['url']);?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>"></div>
                    </div>
                </div>              
            </div>
      <?php endif; ?>
  <?php }
}?>

<?php if(!empty($konstruk_option['off_sticky'])):   
    $sticky = $konstruk_option['off_sticky'];         
    if($sticky == 1):
     $sticky_menu ='menu-sticky';        
    endif;
   else:
   $sticky_menu ='';
endif;



 ?>   