<?php
/**
 * The Template for displaying all single products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

get_header( 'shop' ); ?>
<div class="product-category-page__content">
<div class="product-category-page">


	<?php
		/**
		 * woocommerce_before_main_content hook.
		 *
		 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
		 * @hooked woocommerce_breadcrumb - 20
		 */
		do_action( 'woocommerce_before_main_content' );
	?>
	<container class="site-main-products" >
		<?php
			/**
			 * woocommerce_sidebar hook.
			 *
			 * @hooked woocommerce_get_sidebar - 10
			 */
			do_action( 'woocommerce_sidebar' );
		?>
		<?php while ( have_posts() ) : ?>
			<?php the_post(); ?>
			

			<?php wc_get_template_part( 'content', 'single-product' ); ?>
			<div class="social-icon" >
			<ul class="socialshare-icon">
            <li>
            <a class="link-facebook" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=http://https%3A%2F%2Fwww.bereybros.com%2Fproduct%2Fariat-10027335%2F&amp;t=Ariat+10027335">
                <span class="icon-facebook4"></span>
            </a>
        </li>
                <li>
            <a class="link-twitter" target="_blank" href="https://twitter.com/intent/tweet?original_referer=http://https%3A%2F%2Fwww.bereybros.com%2Fproduct%2Fariat-10027335%2F&amp;text=Ariat+10027335&amp;url=http://https%3A%2F%2Fwww.bereybros.com%2Fproduct%2Fariat-10027335%2F">
                <span class="icon-twitter3"></span>
            </a>
        </li>
                <li>
            <a class="link-google" target="_blank" href="https://plus.google.com/share?url=http://https%3A%2F%2Fwww.bereybros.com%2Fproduct%2Fariat-10027335%2F">
                <span class="icon-google-plus4"></span>
            </a>
        </li>
                <li>
            <a class="link-pinterest" target="_blank" href="http://www.pinterest.com/pin/create/button/?url=http://https%3A%2F%2Fwww.bereybros.com%2Fproduct%2Fariat-10027335%2F&amp;media=https%3A%2F%2Fwww.bereybros.com%2Fwp-content%2Fuploads%2F2021%2F04%2Fariat_10027335.jpg&amp;description=%3Ch2%3E%3Cspan+style%3D%22font-size%3A+18pt%3B%22%3EAriat+10027335%3C%2Fspan%3E%3C%2Fh2%3E%0D%0A%3Cul%3E%0D%0A+%09%3Cli%3E%3Cspan+style%3D%22font-weight%3A+400%3B%22%3EWaterproof+full+grain+leather+upper%3C%2Fspan%3E%3C%2Fli%3E%0D%0A+%09%3Cli%3E%3Cspan+style%3D%22font-weight%3A+400%3B%22%3EWaterproof+Pro+membrane%3C%2Fspan%3E%3C%2Fli%3E%0D%0A+%09%3Cli%3E%3Cspan+style%3D%22font-weight%3A+400%3B%22%3EOil+and+slip+resistant+dual+density+outsole%3C%2Fspan%3E%3C%2Fli%3E%0D%0A+%09%3Cli%3E%3Cspan+style%3D%22font-weight%3A+400%3B%22%3ECarbon+fiber+safety+toe%3C%2Fspan%3E%3C%2Fli%3E%0D%0A+%09%3Cli%3E%3Cspan+style%3D%22font-weight%3A+400%3B%22%3ERebound+foam+cushion+insole%3C%2Fspan%3E%3C%2Fli%3E%0D%0A+%09%3Cli%3E%3Cspan+style%3D%22font-weight%3A+400%3B%22%3ENon-metallic%3C%2Fspan%3E%3C%2Fli%3E%0D%0A+%09%3Cli%3E%3Cspan+style%3D%22font-weight%3A+400%3B%22%3EEH+Rated%3C%2Fspan%3E%3C%2Fli%3E%0D%0A%3C%2Ful%3E">
                <span class="icon-pinterest"></span>
            </a>
        </li>
        
			</ul>
			</div>
		<?php endwhile; // end of the loop. ?>
	<?php
		/**
		 * woocommerce_after_main_content hook.
		 *
		 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
		 */
		do_action( 'woocommerce_after_main_content' );
	?>
</div>
</container>
</div>
<?php
get_footer( 'shop' );

/* Omit closing PHP tag at the end of PHP files to avoid "headers already sent" issues. */
