
<?php 
    
   

   // get_option( '' );
    

?>

<?php 
    include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
    if ( is_plugin_active('smart-slider-3/smart-slider-3.php')) {
    
    $slide = esc_attr( get_option( 'slider_home' ) );
    echo do_shortcode('[smartslider3 slider='. $slide .']');
    
    } else {
?>


        <!--========== SLIDER ==========-->
        <div class="promo-block parallax-window" data-parallax="scroll" data-image-src="<?=  get_template_directory_uri(); ?>/img/1920x1080/01.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="promo-block-divider">
                            <h1 class="promo-block-title">Imobi <br/> Theme</h1>
                            <p class="promo-block-text">Thema wordpress para imobiliárias</p>
                        </div>
                        <ul class="list-inline">
                            <li><a href="#" class="social-icons"><i class="icon-social-facebook"></i></a></li>
                            <li><a href="#" class="social-icons"><i class="icon-social-twitter"></i></a></li>
                            <li><a href="#" class="social-icons"><i class="icon-social-dribbble"></i></a></li>
                            <li><a href="#" class="social-icons"><i class="icon-social-behance"></i></a></li>
                            <li><a href="#" class="social-icons"><i class="icon-social-linkedin"></i></a></li>
                        </ul>
                    </div>
                </div>
                <!--// end row -->
            </div>
        </div>
        <!--========== SLIDER ==========-->
<?php } ?>
