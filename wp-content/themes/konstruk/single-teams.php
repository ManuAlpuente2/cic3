<?php
/**
 * @author  rs-theme
 */ 
get_header();
global $konstruk_option; ?>

<!-- Main content Start -->
<div class="main-content">  
  <!-- Team Detail Start -->  
    <div class="rs-porfolio-detail single-team-item">
        <div class="container">
            <div id="content">
                <?php 
				//take metafield value            
                $company         = get_post_meta(  get_the_ID(), 'company', true );
                $address         = get_post_meta(  get_the_ID(), 'address', true );
                $city            = get_post_meta(  get_the_ID(), 'city', true );
                $state           = get_post_meta(  get_the_ID(), 'state', true );
                $country         = get_post_meta(  get_the_ID(), 'country', true );
                $phone           = get_post_meta(  get_the_ID(), 'phone', true );
                $email           = get_post_meta(  get_the_ID(), 'email', true );
                $website         = get_post_meta(  get_the_ID(), 'website', true );
                $facebook        = get_post_meta( get_the_ID(), 'facebook', true );
                $twitter         = get_post_meta( get_the_ID(), 'twitter', true );
                $google_plus     = get_post_meta( get_the_ID(), 'google_plus', true );
                $linkedin        = get_post_meta( get_the_ID(), 'linkedin', true );
                $team_desination = get_post_meta( get_the_ID(), 'designation', true );  
                $short_desc      = get_post_meta( get_the_ID(), 'shortbio', true );
				while ( have_posts() ) : the_post();
                                      
                ?>
                <div class="row btm-row">
                    <div class="col-lg-4">
                        <div class="inner-images">
                            <div class="ps-image">
                                <?php the_post_thumbnail(); ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8 rs-con-info">
                        <div class="designation-info">
                            <?php echo esc_html($team_desination); ?>
                        </div>
                        <h2 class="title-bg-gray"><?php the_title(); ?></h2> 
                        
                        <?php if(!empty($short_desc)): ?>
                            <div class="short-desc">
                                <?php echo wp_kses($short_desc, 'konstruk'); ?>
                            </div>
                        <?php endif; ?>

                        <div class="ps-informations">
                            <ul class="personal-info">
                              <?php if($email):?>
                                  <li class="email">
                                    <span><i class="glyph-icon flaticon-email"> </i> </span>
                                    <a href="mailto:<?php echo esc_attr( $email ); ?>"><?php  echo esc_html( $email ); ?></a>
                                  </li>
                              <?php endif;?>

                              <?php if($phone):?>
                                <li class="phone">
                                  <span><i class="glyph-icon flaticon-call"></i></span> <?php echo esc_html( $phone ); ?>
                            </li>
                          <?php endif; ?>
                        </ul>

                        <ul class="social-info">
                            <?php if($facebook):?>
                            <li class="social-icon">
                              <a href="<?php  echo esc_url( $facebook ); ?>" target="_blank"> 
                                <i class="fa fa-facebook"></i>
                              </a>
                            </li>
                          <?php endif;?>
                          <?php if($twitter):?>
                            <li class="social-icon">
                              <a href="<?php  echo esc_url( $twitter ); ?>" target="_blank"> 
                                <i class="fa fa-twitter" aria-hidden="true"></i>
                              </a>
                            </li>
                          <?php endif;?>
                          <?php if($google_plus):?>
                            <li class="social-icon">
                              <a href="<?php  echo esc_url( $google_plus ); ?>" target="_blank">
                                <i class="fa fa-instagram"></i>
                              </a>
                            </li>
                          <?php endif; ?>
                          <?php if($linkedin):?>
                          <li class="social-icon"><a href="<?php echo esc_url( $linkedin ); ?>" target="_blank"> <i class="fa fa-linkedin"></i></a></li>
                          <?php endif; ?>
                          </ul>                       
                        </div>                        
                    </div>       
                </div>

                <?php if(!empty($konstruk_option['show-team-biography-skill'])) { ?>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="project-desc">

                            <?php if(!empty($konstruk_option['team_sigle_title'])){?>
                            <h3 class="title-bg-gray padding-top"><?php echo wp_kses($konstruk_option['team_sigle_title'], 'konstruk'); ?></h3> 
                            <?php }
                             else{ ?>
                            <h3 class="title-bg-gray padding-top"><?php esc_html_e( 'Biography','konstruk' );?></h3> 
                            <?php } ?>      
                            <?php the_content() ?>
                        </div>
                    </div> 

                    <?php $team_member_skill = get_post_meta( get_the_ID(), 'member_skill', true );

                    if(!empty($team_member_skill)){
                    ?>
                    <div class="col-lg-6">

                        <?php if(!empty($konstruk_option['team_sigle_skallbar'])){?>
                        <h3 class="title-bg-gray padding-top-skills"><?php echo wp_kses($konstruk_option['team_sigle_skallbar'], 'konstruk'); ?></h3> 
                        <?php }
                         else{ ?>
                        <h3 class="title-bg-gray padding-top"><?php esc_html_e( 'Professional Skills','konstruk' );?></h3> 
                        <?php } ?>
                        <div class="team-skill"> 
                            <div class="row">       
                                <?php foreach ( $team_member_skill as $value ) { ?>
                                  <div class="col-md-12">
                                      <div class="progress rs-progress">
                                          <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="95" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo wp_kses($value['skill_level'], 'konstruk'); ?>%">

                                              <span class="pb-label"><?php echo wp_kses($value['skill_title'], 'konstruk'); ?></span>
                                              <span class="pb-percent"><?php echo wp_kses($value['skill_level'], 'konstruk'); ?>%</span>

                                          </div>
                                      </div>
                                  </div>
                                <?php } ?>         
                            </div>
                        </div>
                    </div>
                <?php } ?>
                </div>
                <?php } else {
                    the_content();
                } ?>
                <?php endwhile; wp_reset_postdata(); ?>
            </div>  
        </div>
    </div>
</div>
<!-- Single Team End -->
<?php dynamic_sidebar('cta_widget'); ?>
<?php
get_footer();