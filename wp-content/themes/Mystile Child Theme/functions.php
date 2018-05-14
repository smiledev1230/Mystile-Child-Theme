<?php

/*	All child theme functions go here

----------------------------------------------- */

add_filter('woocommerce_package_rates', 'wf_sort_shipping_methods', 10, 2);

function wf_sort_shipping_methods($available_shipping_methods, $package)
{
	// Arrange shipping methods as per your requirement
	$sort_order	= array(
		'wf_shipping_ups'	=>	array(),
		'wf_shipping_usps'	=>	array(),
		'free_shipping'		=>	array(),
		'local_pickup'		=>	array(),
		'legacy_flat_rate'	=>	array(),		
	);
	
	// unsetting all methods that needs to be sorted
	foreach($available_shipping_methods as $carrier_id => $carrier){
		$carrier_name	=	current(explode(":",$carrier_id));
		if(array_key_exists($carrier_name,$sort_order)){
			$sort_order[$carrier_name][$carrier_id]	=		$available_shipping_methods[$carrier_id];
			unset($available_shipping_methods[$carrier_id]);
		}
	}
	
	// adding methods again according to sort order array
	foreach($sort_order as $carriers){
		$available_shipping_methods	=	array_merge($available_shipping_methods,$carriers);
	}
	return $available_shipping_methods;
}

remove_action( ‘woocommerce_before_shop_loop’, ‘woocommerce_catalog_ordering’, 30 );

add_filter( 'woocommerce_shipping_fields', 'wc_npr_filter_company', 10, 1 );



function wc_npr_filter_company( $address_fields ) {

$address_fields['shipping_company']['required'] = true;

return $address_fields;

}

add_action( 'pre_get_posts', 'search_by_cat' );

function search_by_cat()
{
    if ( is_search() )
    {
        $cat = empty( $_GET['cat'] ) ? '' : (int) $_GET['cat'];
        add_query_arg( 'cat', $cat );
    }
}
	
function theme_enqueue_styles()
{
	wp_enqueue_script('child-main-jquery', get_stylesheet_directory_uri().'/assets/js/child.js', array('jquery'), false, false);
}
add_action('wp_enqueue_scripts', 'theme_enqueue_styles');
// Register widgetized areas

if (!function_exists( 'the_child_widgets_init')) {
	function the_child_widgets_init() {
		
	    if ( !function_exists( 'register_sidebar') )
	    return;
	
	    register_sidebar(array( 'name' => 'Quick Links','id' => 'quick_links','description' => "Child full width sidebar", 'before_widget' => '<div id="%1$s" class="widget %2$s">','after_widget' => '</div>','before_title' => '<h3>','after_title' => '</h3>'));
	}
}

add_action( 'init', 'the_child_widgets_init', 1000 );
add_action('woo_main_before', 'add_category_links', 1100);
function add_category_links() {
	?>
	<section class="entry"> 
        <div class="quick-link " id="woocommerce_product_categories2-2">
            <h3>PRODUCT QUICK LINKS</h3>
            <?php woo_sidebar( 'quick_links' );  ?>                 
        </div>
    </section>  
    <?php 
}
?>