<?php
// File Security Check
if ( ! empty( $_SERVER['SCRIPT_FILENAME'] ) && basename( __FILE__ ) == basename( $_SERVER['SCRIPT_FILENAME'] ) ) {
    die ( 'You do not have sufficient permissions to access this page!' );
}
?>
<?php 
/**
 * Sidebar Template
 *
 * If a `primary` widget area is active and has widgets, display the sidebar.
 *
 * @package WooFramework
 * @subpackage Template
 */
	global $woo_options;
	
	if ( isset( $woo_options['woo_layout'] ) && ( $woo_options['woo_layout'] != 'layout-full' ) ) {
?>	
<aside id="sidebar" class="col-right">

	<?php woo_sidebar_inside_before(); ?>

	<?php if ( woo_active_sidebar( 'primary' ) ) { ?>
    <div class="primary">
    	<?php 	echo "<div class='widget woocommerce widget_product_search'>";
				echo do_shortcode('[woo_vpf_filter title="Part Search" view="V" label_make="Select Make" label_model="Select Model" show_year="true/false" label_year="Select Year" show_engine="true/false" label_engine="Select Engine" show_category="true/false" label_category="Select Category" show_keyword="true" label_keyword="Search products..." show_my_vehicles="" label_search="Search" label_reset_search="Reset Search"]');
				echo "</div>";
		?>
		<?php woo_sidebar( 'primary' );  ?>
	</div>        
	<?php } // End IF Statement ?>   
	
	<?php woo_sidebar_inside_after(); ?> 
	
</aside><!-- /#sidebar -->
<?php } // End IF Statement ?>