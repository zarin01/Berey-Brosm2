<?php
$args = jaw_template_get_var('args', array());
$instance = jaw_template_get_var('instance');
if (isset($instance['custom_banner'])) {
    $custom_banner = $instance['custom_banner'];
    if (get_option('banner_custom_' . $custom_banner . '_show', '0') == '1') {


        extract($args);
        echo $before_widget;
        ?>
        <?php if (get_option('banner_custom_' . $custom_banner . '_type', 'image') == 'image') { ?>
            <?php
            $image_banner = get_option('banner_custom_' . $custom_banner, '');
            if ($image_banner != "") {
                ?>
                <div class="type-ads element isotope-item one_col google_ads_box custom_banner">
                    <div class="box">
                        <div class="post_banner">
                            <a href="<?php echo get_option('banner_custom_' . $custom_banner . '_link', 'http://'); ?>"  target="<?php echo get_option('banner_w_' . $custom_banner . '_link_target', '_blank'); ?>">
                                <img src="<?php echo esc_url($image_banner); ?>" alt="banner">
                            </a>
                        </div>
                    </div>
                </div>
            <?php } ?>
        <?php } else { ?>
            <?php
            $google_ads = get_option('banner_custom_' . $custom_banner . '_google', '');
            if ($google_ads != "") {
                ?>
                <div class="type-ads element isotope-item one_col google_ads_box custom_banner">
                    <div class="box">
                        <div class="google_ads">
                <?php echo esc_html($google_ads); ?>
                        </div>
                    </div>
                </div>
            <?php } ?>
        <?php } ?>
        <div class="clear"></div>
        <?php
        echo $after_widget;
    }
}