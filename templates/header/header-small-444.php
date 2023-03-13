<div class="fullwidth-block row header-small-content ">
    <?php if (get_option('leader_banner_show', '0') == '1') { ?>
        <div class="col-lg-12 header_banner">
            <?php echo jaw_get_template_part('banner_leader', 'header'); ?>
        </div>
    <?php } ?>
    <?php $img_src = get_header_image(); ?>
    <?php if (isset($img_src) && $img_src != '') { ?>
        <div class="col-lg-12 custom_header_img">
            <img src="<?php echo esc_url($img_src) ?>" height="<?php echo get_custom_header()->height; ?>" width="<?php echo get_custom_header()->width; ?>" alt="header-image" />
        </div>
    <?php } ?>
    <?php if (get_option('header_widget_area', 'on') == 'on') { ?>
        <div class="col-lg-4 header-logo">
            
        <?php
            if(get_option('menu_mobile_type_design', 'on') == "on") {
            ?>
            <div class="menu-hamburger-wrapper">
                <div id="nav-icon3">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div>
            <?php
            }
            $template_logo = get_option('custom_logo', THEME_URI . '/images/logo/logo.png');
            if (strlen($template_logo) == 0) {
                $template_logo = THEME_URI . '/images/logo/logo.png';
            }
            $sizes = @getimagesize($template_logo);
            $attr = '';
            if(isset($sizes[3])){
                $attr = $sizes[3];
            }
            ?>
            <?php if (get_option('use_jaw_seo_logo', '1') == '1') { ?>
                <h1>
                <?php } else { ?>
                    <p>
                    <?php } ?>
                    <a href="<?php echo home_url(); ?>" title="<?php bloginfo('name'); ?>">
                        <img class="template-logo" src="<?php echo esc_url($template_logo); ?>" <?php echo esc_attr($attr);?> alt="<?php bloginfo('name'); ?>">
                    </a>
                    <?php if (get_option('use_jaw_seo_logo', '1') == '1') { ?>
                </h1>
            <?php } else { ?>
                </p>
            <?php } ?>
        </div> 
        <?php if (is_active_sidebar( 'header_widget_area' )) { ?>
        <div class="col-lg-4 header-widget-area">
            <?php dynamic_sidebar('header_widget_area'); ?>
        </div>
        <?php } ?>
        <?php if (is_active_sidebar( 'header_widget_area2' )) { ?>
        <div class="col-lg-4 header-widget-area">
            <?php dynamic_sidebar('header_widget_area2'); ?>
        </div>
        <?php } ?>
        <div class="clear"></div>
    <?php } else { ?>
        <div class="col-lg-12 header-logo">
            <?php
            $template_logo = get_option('custom_logo', '');
            ?>
            <h1>
                <a href="<?php echo home_url(); ?>" title="<?php bloginfo('name'); ?>">
                    <img class="template-logo" src="<?php echo esc_url($template_logo); ?>" alt="<?php bloginfo('name'); ?>">
                </a>
            </h1>  
        </div>
    <?php } ?>
</div>

<?php
$class = array();
if (get_option('menu_bar_border', 'on') == 'on') {
    $class[] = ' row-menu-border';
}
if (get_option('menu_bar_fix', 0) > 0) {
    $class[] = ' row-menu-bar-fixed';
}
// scrollable logo
if(get_option('menu_bar_fix', '0') == 2) {
    $class[] = ' jaw-logo-scrollable';
} else {
    $class[] = ' jaw-logo-scrollable-off';
}
?>
<?php 
$hamburger = "";
if(get_option('menu_mobile_type_design', 'on') == "on") {
    $hamburger = "hamburger-close";
}
?>
<div class="fullwidth-block row small-menu main-menu <?php echo implode(' ',$class).' '.$hamburger; ?>">
    <div class="col-lg-12">
        <div class="header-logo">
            <?php
            //pokud je nastaveno menu = fixed + logo
            if(get_option('menu_bar_fix', '0') == 2) {
                $template_logo = get_option('custom_logo', THEME_URI . '/images/logo/logo.png');
                if (strlen($template_logo) == 0) {
                    $template_logo = THEME_URI . '/images/logo/logo.png';
                }
                $sizes = @getimagesize($template_logo);
                $attr = '';
                if(isset($sizes[3])){
                    $attr = $sizes[3];
                }
                ?>
                <?php if (get_option('use_jaw_seo_logo', '1') == '1') { ?>
                    <h1>
                    <?php } else { ?>
                        <p>
                        <?php } ?>
                        <a href="<?php echo home_url(); ?>" title="<?php bloginfo('name'); ?>">
                            <img class="template-logo" src="<?php echo esc_url($template_logo); ?>" <?php echo esc_attr($attr);?> alt="<?php bloginfo('name'); ?>">
                        </a>
                        <?php if (get_option('use_jaw_seo_logo', '1') == '1') { ?>
                    </h1>
                <?php } else { ?>
                    </p>
                <?php }
            } ?>
        </div>
        <nav class="top-bar top-bar-jw" role="navigation">
            <section>
                <?php
                wp_nav_menu(
                        array(
                            'theme_location' => 'primary_navigation',
                        )
                );
                ?>
                <div class="clear"></div>
            </section>
        </nav>
        <nav class="mobile-menu-selectbox" role="navigation">
            <?php
            wp_nav_menu(array(
                'theme_location' => 'primary_navigation', // your theme location here
                'mobile-menu' => get_option('menu_mobile_type', '2')
            ));
            ?>
        </nav>
    </div>
</div>