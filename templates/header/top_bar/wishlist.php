<?php global $yith_wcwl; ?>
<a  href="<?php echo esc_url($yith_wcwl->get_wishlist_url()); ?>">
    <span class="topbar-title-icon icon-star3 "></span>
    <span class="topbar-title-text">
        <?php _e('Wishlist', 'genesis-block-theme'); ?>
    </span>
    <span class="topbar-wishlist-count">
        (<?php echo esc_attr($yith_wcwl->count_products()); ?>)
    </span>
</a>