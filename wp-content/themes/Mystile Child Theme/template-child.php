<?php
// File Security Check
if ( ! empty( $_SERVER['SCRIPT_FILENAME'] ) && basename( __FILE__ ) == basename( $_SERVER['SCRIPT_FILENAME'] ) ) {
    die ( 'You do not have sufficient permissions to access this page!' );
}
?>
<?php
/**
 * Template Name: Child Full Width
 *
 * This template is a full-width version of the page.php template file. It removes the sidebar area.
 *
 * @package WooFramework
 * @subpackage Template
 */
	get_header();
	global $woo_options;
?>
       
    <div id="content" class="page col-full">
    
    	<section id="page_title">
        <?php
        	if ( have_posts() ) {
        		$count = 0;
        		while ( have_posts() ) {
        			the_post(); $count++;
        			the_content();
        		} // End WHILE Loop
			}
		?>    		
    	</section>
    	<section id="main">
    		<section class="child-slider">
    			<?php echo do_shortcode('[wcfgallery items="3" nav="true" auto_play="true" ids="22530,22531,22532,22533"]'); ?>
    		</section>
			<section class="entry">	
				<div class="quick-link " id="woocommerce_product_categories2-2">
					<h3>PRODUCT QUICK LINKS</h3>
	        	    <?php woo_sidebar( 'quick_links' );  ?>				    
	    	    </div>
			</section>
		</section><!-- /#main -->
		
    </div><!-- /#content -->
		
<?php get_footer(); ?>