<?php
/* Start loop */
global $content_width;
?>
<?php
while (have_posts()) : the_post();

    $post_meta = get_post_meta(get_the_id(), '');
    if (jwLayout::content_layout() == 'fullwidth_sidebar') {
        $layout = 'fullwidth';
    } else {  
        $layout = 'sidebar';
    }

    ?>
    <article  <?php post_class($layout . ' ' . 'content' . ' ' . implode(' ', jwLayout::content_width())) ?> id="post-<?php the_ID(); ?>"  >
        <!-- Image / video / gallery -->
        <?php
        if (get_option('post_use_featured', '1') == '1') {

            echo '<span class="post-thumbnail" rel="media:thumbnail">';
            if (isset($post_meta['_team_photo'][0])) {
                $img = json_decode($post_meta['_team_photo'][0]);
                $url = wp_get_attachment_image_src($img[0]->id, 'large');
                $img_small = wp_get_attachment_image_src($img[0]->id, 'lazyload');             
                echo '<img class="lazy" data-original="' . $url[0] . '" src="'.$img_small[0].'" width="'.$url[1].'" height="'.$url[2].'" alt="' . get_the_title() . '">';
            }
            echo '</span>';
        }
        ?>

        <header  >
            <h1 class="entry-title"  ><?php the_title(); ?></h1>
        </header>



        <div class="entry-content" >
            <?php if (get_option('post_date', '1') || get_option('post_author', '1')) { ?>
                <div class="meta">
                    <?php
                    if (get_option('post_date', '1')) {
                        echo '<a href="' . get_permalink() . '" title="' . get_the_title() . '" rel="bookmark"><time class="entry-date" datetime="' . get_the_date('c') . '">' . get_the_date(get_option('element_blog_dateformat', 'F j, Y')) . '</time></a>';
                    }
                    if (get_option('post_author', '1')) {

                        echo '<span class="meta_posted_by">' . __(' by:', 'genesis-block-theme') . ' </span> <span class="author vcard"><a href="' . get_author_posts_url(get_the_author_meta('ID')) . '"  rel="author">' . get_the_author() . '</a></span> </span>';
                    }
                    ?>
                </div>
            <?php } ?>

            <?php
            if (get_option('banner_posttop_show', '0') == '1') {
                get_template_part('loop', 'top_banner');
            }
            ?> 

            <div class="perex">
                <?php
                if (strpos(get_the_content(), 'id="more-')) {
                    global $more;
                    $more = 0;       // Set (inside the loop) to display content above the more tag.
                    echo do_shortcode(get_the_content(''));
                    ?>
                </div>

                <div class="clear"></div>

                <div  class="more-text">
                    <?php
                    $more = 1;
                    echo do_shortcode(get_the_content('', true)); // Set to hide content above the more tag.
                } else {
                    echo do_shortcode(get_the_content(''));
                }
                ?>
            </div>
            <?php
            if (get_option('banner_postbottom_show', '0') == '1') {
                get_template_part('loop', 'bottom_banner');
            }


           
            ?>


        </div>
        <div class="clear"></div>


        <?php if (get_option('post_share') == '1') { ?>

            <div class="share_post" role="main">

                <div class="share_hearline">
                    <?php _e("Share IT:", "genesis-block-theme"); ?>

                </div>

                <?php
                $title = urlencode(get_the_title());
                $link = urlencode(get_permalink());
                $media = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'large-size');
                $media = urlencode($media[0]);
                $desc = urlencode($post->post_excerpt);

                $img_pin = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), "large");
                // pokud neni featured vem logo stránky
                if ($img_pin == false) {
                    $img_pin[0] = get_option('custom_logo', '');
                }
                ?>
                <ul class="socialshare-icon">
                    <?php if (get_option('post_share_fb') == '1') { ?>
                        <li>
                            <a class="link-facebook" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo esc_url($link); ?>&t=<?php echo $title; ?>">
                                <span class="icon-facebook4"></span>
                            </a>
                        </li>
                    <?php } ?>
                    <?php if (get_option('post_share_tw') == '1') { ?>
                        <li>
                            <a class="link-twitter" target="_blank" href="https://twitter.com/intent/tweet?original_referer=<?php echo esc_url($link); ?>&text=<?php echo $title; ?>&url=<?php echo esc_url($link); ?>">
                                <span class="icon-twitter3"></span>
                            </a>
                        </li>
                    <?php } ?>
                    <?php if (get_option('post_share_g') == '1') { ?>
                        <li>
                            <a class="link-google" target="_blank" href="https://plus.google.com/share?url=<?php echo esc_url($link); ?>">
                                <span class="icon-google-plus4"></span>
                            </a>
                        </li>
                    <?php } ?>
                    <?php if (get_option('post_share_pi') == '1') { ?>
                        <li>
                            <a class="link-pinterest" target="_blank" href="http://www.pinterest.com/pin/create/button/?url=<?php echo esc_url($link); ?>&media=<?php echo $media ?>&description=<?php echo $desc; ?>">
                                <span class="icon-pinterest"></span>
                            </a>
                        </li>
                    <?php } ?>
                    <?php if (get_option('post_share_mail') == '1') { ?>
                        <li>
                            <a class="link-email" target="_blank" href="mailto:youremail@addresshere.com?subject=<?php echo urldecode($title); ?>&body=<?php echo urldecode($desc) . ' ' . $link; ?>">
                                <span class="icon-mail4 "></span>
                            </a>
                        </li>
                    <?php } ?>
                </ul>
                <div class="clear"></div>
            </div>
        <?php } ?>



        
        <nav id="nav-single">
            <span class="nav-previous"><?php previous_post_link('%link', '<i class="icon-arrow-slide-left"></i> ' . __('Previous', 'genesis-block-theme')); ?></span>
            <span class="nav-next"><?php next_post_link('%link', __('Next', 'genesis-block-theme') . ' <i class="icon-arrow-slide-right"></i>'); ?></span>
        </nav><!-- #nav-single -->
        <div class="clear"></div>



    </article>
    <?php
endwhile;
