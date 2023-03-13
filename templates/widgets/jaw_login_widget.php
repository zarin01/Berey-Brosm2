<?php
$args = jaw_template_get_var('args');
$instance = jaw_template_get_var('instance');

extract($args);

echo $before_widget;
?>
<article id="login-register-password" class="widget">

    <?php
    global $user_ID, $user_identity, $current_url;
    $current_url = 'http' . (empty($_SERVER['HTTPS']) ? '' : 's') . '://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
    wp_get_current_user();
    if (!$user_ID) {
        ?>

        <div class="tab_container_login">
            <div id="login" class="tab_content_login">

                <?php
                if (isset($_GET['register']) && (isset($_GET['reset']))) {

                    $register = $_GET['register'];
                    $reset = $_GET['reset'];
                    if ($register == true) {
                        ?>

                        <h2><strong><?php _e('Success!', 'genesis-block-theme'); ?></strong></h2>
                        <p><?php _e('Check your email for the password and then return to log in.', 'genesis-block-theme'); ?></p>

                    <?php } elseif ($reset == true) { ?>

                        <h2><strong><?php _e('Success!', 'genesis-block-theme'); ?></strong></h2>
                        <p><?php _e('Check your email to reset your password.', 'genesis-block-theme'); ?></p>

                    <?php } else { ?>


                        <h2><strong><?php _e('Have an account?', 'genesis-block-theme'); ?></strong></h2>

                        <?php
                    }
                }
                ?>

                <form method="post" action="<?php echo home_url(); ?>/wp-login.php" class="wp-user-form">
                    <div class="username">
                        <input type="text" name="log" value="<?php
                        if (isset($user_login)) {
                            echo esc_attr(stripslashes($user_login));
                        }
                        ?>" size="20" id="user_login" placeholder="<?php _e('Username', 'genesis-block-theme'); ?>" tabindex="11" />
                    </div>
                    <div class="password">
                        <input type="password" name="pwd" placeholder="<?php _e('Password', 'genesis-block-theme'); ?>" value="" size="20" id="user_pass" tabindex="12" />
                    </div>				
                    <div class="login_fields contact_form_button">
                        <div class="rememberme">
                            <label for="rememberme">
                                <input type="checkbox" name="rememberme" value="forever" checked="checked" id="rememberme" tabindex="13" /><?php _e(' Remember me', 'genesis-block-theme'); ?>
                            </label>
                        </div>
                        <div class="contact_submit_button">
                            <input type="submit" name="user-submit" value="<?php _e('Login', 'genesis-block-theme'); ?>" tabindex="14" class="user-submit" />
                        </div>
                        <div class="clear"></div>
                        <div class="contact_form_arrow"></div>
                        <input type="hidden" name="redirect_to" value="<?php echo $current_url; ?>" />
                        <input type="hidden" name="user-cookie" value="1" />                                
                    </div>
                    <?php do_action('login_form'); ?>
                </form>
            </div>
        </div>

    <?php } else { // is logged in     ?>

        <div class="sidebox">
            <h2><strong><?php _e('Welcome, ', 'genesis-block-theme'); ?> <?php echo $user_identity; ?></strong></h2>
            <?php
            if (version_compare($GLOBALS['wp_version'], '2.5', '>=')) {
                if (get_option('show_avatars')) {
                    ?>
                    <div class="usericon">
                        <?php
                        global $userdata;
                        wp_get_current_user();
                        echo get_avatar($userdata->ID, 50);
                        ?>
                    </div>
                <?php } else { ?>		
                    <style type="text/css">.userinfo p{margin-left: 0px !important;text-align:center;}.userinfo{width:100%;}</style>
                    <?php
                }
            }
            ?>	
            <div class="userinfo">
                <p><?php _e('You are logged in as ', 'genesis-block-theme'); ?> <strong><?php echo $user_identity; ?></strong></p>
                <p>
                    <a href="<?php echo wp_logout_url($current_url); ?>"><?php _e('Log out', 'genesis-block-theme'); ?></a> | 
                    <?php
                    if (current_user_can('manage_options')) {
                        echo '<a href="' . admin_url() . '">' . __('Admin', 'genesis-block-theme') . '</a>';
                    } else {
                        echo '<a href="' . admin_url() . 'profile.php">' . __('Profile', 'genesis-block-theme') . '</a>';
                    }
                    ?>
                </p>
            </div>
        </div>

    <?php } ?>

</article>
<?php
echo $after_widget;
