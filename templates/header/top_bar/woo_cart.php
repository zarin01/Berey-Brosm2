<?php global $woocommerce; 
$link = wc_get_cart_url();
?>
<a class="cart-contents" aria-haspopup="true" href="<?php echo esc_url($link); ?>" title="<?php _e('View your shopping cart', 'genesis-block-theme'); ?>">
    <span class="topbar-title-icon icon-cart3"></span>
    <span class="topbar-title-text">
        <?php _e('Shopping cart', 'genesis-block-theme'); ?>
    </span>
    <span>
        (<?php echo esc_attr($woocommerce->cart->cart_contents_count); ?>):
    </span>
    <span>
        <?php echo esc_attr($woocommerce->cart->get_cart_total()); ?>
    </span>
</a>
<div class="top-bar-cart-content woocommerce">
    <?php echo '<div class="hide_cart_widget_if_empty">'; ?>
    <?php echo '<div class="widget_shopping_cart_content"></div>'; ?>
    <?php echo '</div>'; ?>
</div>     