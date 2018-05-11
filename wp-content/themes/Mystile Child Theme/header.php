<?php
// File Security Check
if ( ! empty( $_SERVER['SCRIPT_FILENAME'] ) && basename( __FILE__ ) == basename( $_SERVER['SCRIPT_FILENAME'] ) ) {
    die ( 'You do not have sufficient permissions to access this page!' );
}
?>
<?php
/**
 * Header Template
 *
 * Here we setup all logic and XHTML that is required for the header section of all screens.
 *
 * @package WooFramework
 * @subpackage Template
 */
 
 global $woo_options, $woocommerce;
 
?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="<?php if ( $woo_options['woo_boxed_layout'] == 'true' ) echo 'boxed'; ?> <?php if (!class_exists('woocommerce')) echo 'woocommerce-deactivated'; ?>">
<head>

<meta charset="<?php bloginfo( 'charset' ); ?>" />

<title><?php woo_title(''); ?></title>
<?php woo_meta(); ?>
<link rel="stylesheet" type="text/css" href="<?php bloginfo( 'stylesheet_url' ); ?>" media="screen" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php
    wp_head();
	woo_head();
?>
</head>

<body <?php body_class(); ?>>
<?php woo_top(); ?>
<div id="wrapper">
	<header id="header" class="col-full">
	    <div class="top-header">
	    	<div class="header-left">
	    		<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="logo-section">
	    			<img class="site-logo">
	    			<img class="tag-line">
	    		</a>
	    	</div>
	    	<div class="header-right">
	    		<a href="<?php echo esc_url($woocommerce->cart->get_checkout_url());?>"><img class="checkout-button"/></a>
	    	</div>	    	
	    	<div class="phone-number">1-866-772-5502</div>
	    </div>
        
        <?php woo_nav_before(); ?>		
		<?php woo_nav_after(); ?>
	
	</header><!-- /#header -->	
    <?php woo_header_before(); ?>
	<div id="top" class="main-menu">
		<nav class="col-full" role="navigation">
			<?php if ( function_exists( 'has_nav_menu' ) && has_nav_menu( 'top-menu' ) ) { ?>
			<?php wp_nav_menu( array( 'depth' => 6, 'sort_column' => 'menu_order', 'container' => 'ul', 'menu_id' => 'top-nav', 'menu_class' => 'nav fl', 'theme_location' => 'top-menu' ) ); ?>
			<?php } ?>
			<?php
				if ( class_exists( 'woocommerce' ) ) {
					echo '<ul class="nav wc-nav">';
					echo get_search_form();
					echo "<li class='search-box-list'>
							<div><a href='".home_url( '/' )."shop/?search_type=1'>Products</a></div>
							<div><a href='".home_url( '/' )."shop/?search_type=2'>Enter part #</a></div>
							<div><a href='".home_url( '/' )."product-category/sanden/sanden-compressors/?search_type=3'>Enter Sanden Model #</a></div>
						</li>";
					echo '</ul>';
				}
			?>
		</nav>
	</div><!-- /#top -->
	<?php woo_content_before(); ?>