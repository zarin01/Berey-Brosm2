<?php if ( get_option('banner_skyscrapper_right_type', 'image') == 'image' && strlen(get_option('skyscrapper_right', '')) > 0 ) { ?>
    <div id="skyscrapper-right" class="skyscrapper">
        <?php 
            $banner_link = get_option('skyscrapper_right_link', '#');
        ?>
        <?php if ( strlen($banner_link) <= 0 || $banner_link == 'http://' || $banner_link == 'https://' ) { ?>
        <a href="#">
            <img src="<?php echo get_option('skyscrapper_right', ''); ?>" alt="<?php bloginfo('name'); ?>">
        </a>
        <?php } else { ?>
        <a href="<?php echo $banner_link; ?>"   target="<?php echo get_option('banner_ss_l_link_target', '_blank'); ?>"   >
            <img src="<?php echo get_option('skyscrapper_right', ''); ?>" alt="banner">
        </a>
        <?php } ?>
    </div>
<?php } else { ?>
    <?php if ( strlen(get_option('skyscrapper_right_link_google', '')) > 0 ) { ?>
        <div id="skyscrapper-right" class="skyscrapper">
            <div class="google_ads">
                <?php echo do_shortcode(get_option('skyscrapper_right_link_google', '')); ?>
            </div>
        </div>
    <?php } ?>
<?php } ?>
