<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<?php
//error_reporting(E_ALL);
if ( is_front_page() ) 
{	
	unset($_SESSION['html']);
	unset($_SESSION['Merk']);
	unset($_SESSION['Model']);
	unset($_SESSION['MerkName']);
	unset($_SESSION['ModelDesc']);
	unset($_SESSION['chasisNumber']); 
	unset($_SESSION['Remark']);
	unset($_SESSION['typecode']);
	unset($_SESSION['typeDesc']);
	unset($_SESSION['MerkModel']);
	unset($_SESSION['plateNumber']);
	unset($_SESSION['Year']);
	unset($_SESSION['Fuel']);
	
	unset($_SESSION['automerken_brand_name']);
	unset($_SESSION['automerken_brand_code']);
	unset($_SESSION['modelcode']);
	unset($_SESSION['automerken_model_code']);
	unset($_SESSION['MerkModelType']);
	unset($_SESSION['merkmodelName']);
	unset($_SESSION['fuel_description']);
	
	/*reset session set at automerkan step*/
	unset($_SESSION['modelname']);
	unset($_SESSION['fromAutomerken']);
	unset($_SESSION['AutomerkenDuration']);
    echo 'test1234';
     //new code
}
?>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="initial-scale=0, maximum-scale=1.0">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/images/favicon.ico" />
<script type="text/javascript">
	var ajaxurl = '<?php echo SITE_DOMAIN_NAME_WITHOUT_PROTOCOL . '/wp-admin/admin-ajax.php'; ?>';
    var site_url = '<?php echo SITE_DOMAIN_NAME_WITHOUT_PROTOCOL; ?>';
</script>
<?php  wp_head(); ?>
<script src="<?php echo get_template_directory_uri(); ?>/js/jquery-ui.js" defer="defer"></script>
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/mediaquery.min.css" />
<script type="text/javascript">
var cpdCarDetail = {
    merk: "<?php echo isset($_SESSION['Merk']) ? $_SESSION['Merk'] : ''?>",
    model: "<?php echo isset($_SESSION['Model']) ? $_SESSION['Model'] : ''?>",
    type: "<?php echo isset($_SESSION['typecode']) ? $_SESSION['typecode'] : ''?>",
};
</script>
</head>
<body <?php body_class(); ?>>
    
<div id="popup_div">
        <div class="pop-overlay">
            <div class="pop-up">
                <a href="javascript:;" class="pop-up-close">x</a>
                <p><?php _e('<span>Watch out </span>Adjust your selection by provide proper car details.','carpartsdirect.nl'); ?></p>
            </div>
        </div>
</div>
<button id="btn_click" ><?php _e('Open dialog','carpartsdirect.nl') ?></button>
    <?php error_reporting(0);  ?> 
    <div id="page" class="hfeed site woocommerce">
            

    <div id="top-bar">
                <div class="container">
                    <!--custom top cart data-->
                    <div id="top-cart">
                        <?php if (class_exists('woocommerce')) : ?>
                        <div class="top-cart-icon">
                            <span class="shopping-cart-icon"></span>
                            <a class="cart-contents" href="<?php echo WC()->cart->get_checkout_url(); ?>" title="<?php _e('View your shopping cart', 'store'); ?>">
                                <div class="count">
                                    <?php echo getCartItemCount();?>
                                </div>
                                
                            </a>
                            <div class="total">
                            </div>
                        </div>
                        <?php endif; ?>	
                    </div>	
                    <!-- custom top cart data -->
                    <div id="top-menu">
                        <?php 
                        if(is_user_logged_in())
                        {
                            global $current_user;
                            get_currentuserinfo();
                            if($current_user->user_status != 2){
                            ?>
                            <div class="user-welcome-message">
                                <ul>
                                    <li>
                                        <span id="userNameSpan"><?php echo $current_user->user_firstname.' '.$current_user->user_lastname?></span>
                                    </li>
                                    <li></li>
                                </ul>
                            </div>
                            <?php
                            
                            wp_nav_menu( array( 'theme_location' => 'top_login' ) );
                            }else{
                                wp_nav_menu( array( 'theme_location' => 'top' ) );
                            }
                        }
                        else
                        {
                            wp_nav_menu( array( 'theme_location' => 'top' ) );
                        }
                        ?>
                        <div class="clear"></div>
                    </div>
                </div><!-- container div closed -->
            </div><!--- top bar div closed -->

            <header id="masthead" class="site-header custom-header" role="banner">
                <div class="container masthead-container" itemscope="" itemtype="http://schema.org/Organization">
                    <meta itemprop="name" content="carpartsdirect" />
                    <div class="site-branding">
                        <?php if ( get_theme_mod('store_logo') != "" ) : ?>
                        <div id="site-logo">
                            <a itemprop="url" content="<?php echo esc_url( home_url( '/' ) ); ?>" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="carpartsdirect.nl homepage">
                                <img itemprop="logo" content="<?php echo esc_url( get_theme_mod('store_logo') ); ?>" src="<?php echo esc_url( get_theme_mod('store_logo') ); ?>" alt="carpartsdirect.nl logo">
                            </a>
                        </div>
                        <?php endif; ?>
                    </div>	
                    <div id="header-call" class="widget-area" role="complementary">
                        <?php dynamic_sidebar( 'header-1' ); ?>
                    </div><!-- #Header Call -->            
                    <div id="top-search">
                        <?php get_search_form(); //get_template_part('searchform', 'top'); ?>
                    </div>
                    <meta itemprop="sameAs" content="<?php echo HEADER_LINK_FACEBOOK_PAGE; ?>" />
                    <meta itemprop="sameAs" content="<?php echo HEADER_LINK_TWITTER_PAGE; ?>" />
                 </div>	
                 
                <div class="main-top-nav">
                    <?php  ubermenu( 'main' ); ?>
                </div>

                <div class="usp-bar">
                <?php
                    $delivery_timing_header =  get_permalink( get_page_by_path( DELIVERY_TIMING ));
                    $postpay_header =  get_permalink( get_page_by_path( POSTPAY ));
                    $actual_price_header =  get_permalink( get_page_by_path( ACTUAL_PRICE ));
					$defaulShippingtimeMontoFriday = get_post_meta(DEFAULT_SHIPPING_TIME_MON_FRI,'configuration_desc',true);
                ?>    
                    <div class="container clearfix"> <a href="<?php echo $delivery_timing_header; ?>" class="delivery" title=""><?php echo $defaulShippingtimeMontoFriday; ?></a> <a href="<?php echo $postpay_header; ?>" class="postpay" title="">
                        <?php _e( 'Achteraf betalen', 'store' ); ?></a> <a href="<?php echo $actual_price_header; ?>" class="sharp-prices" title=""><?php _e( 'Scherpe prijzen', 'store' ); ?></a> 
                        
                    <?php
                    if(false == ($companyReview = get_transient('company_ekomi_review'))) {
                        $companyReview = company_ekomi_review();
                        set_transient('company_ekomi_review', $companyReview, DAY_IN_SECONDS );
                    }
                    ?>
                        
                        <a href="<?php echo HEADER_LINK_EKOMI_REVIEW_PAGE; ?>" target="_blank" class="rating" rel="external"><?php _e( 'Beoordeling: ', 'store' ); echo $companyReview; ?></a> 
					<?php
					if ( false === ( $facbook_count = get_transient( 'facbook_count' ) ) ) 
					{
						// It wasn't there, so regenerate the data and save the transient
						 $facbook_count = get_scp_counter( 'facebook' );
						 set_transient( 'facbook_count', $facbook_count, DAY_IN_SECONDS );
					}
					?>	
					   <a href="<?php echo HEADER_LINK_FACEBOOK_PAGE; ?>" class="fb-rating" target="_blank" title="facebook.com/carpartsdirect.nl" rel="external"><?php echo $facbook_count; ?></a>
					   

                    </div>
                </div>
            </header><!-- #masthead -->
            
            <?php if (class_exists('woocommerce')) :  
                get_template_part('coverflow', 'product'); 
                get_template_part('featured', 'products'); ?>
            <?php endif; ?>

            <div id="content" class="site-content container">
        <!--Static containt area-->
        <!--Home page static Data -->
