<?php
/*
 * Template name: Новости
 * */

get_header();


?>


    <!-- news -->
    <section class="news">
        <div class="container">
            <h1 class="title">Новости</h1>
            <div class="news_block d-flex flex-column">
                <?php
                $args = array(
                    'post_type' => 'post',
                    'posts_per_page' => -1
                );
                $query = new WP_Query($args);

                if ($query->have_posts()):
                    while ($query->have_posts()): $query->the_post(); ?>
                        <div class="news_item" id="post-<?php the_ID(); ?>">
                            <div class="news_img" >
                                <?php if (has_post_thumbnail()): ?>
                                    <?php the_post_thumbnail('full'); ?>
                                <?php endif; ?>
                            </div>
                            <div class="news_details">
                                <h3 class="news_title"><?php the_title(); ?></h3>
                                <div class="news_details_text">
                                    <?php the_content(); ?>
                                </div>
                                <div class="news_bottom">
                                    <p class="date"><?php echo get_the_date('d.m.Y'); ?></p>
                                    <a href="#" class="share_btn" onclick="shareNews(event)">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="15" height="13" viewBox="0 0 15 13"
                                             fill="none">
                                            <path
                                                    d="M0.389064 12.9685C0.275489 12.9302 0.176956 12.8581 0.10721 12.7623C0.0374645 12.6665 -1.51304e-05 12.5517 4.58202e-09 12.434C4.58202e-09 9.85184 0.529329 7.7868 1.57392 6.29577C2.83595 4.49424 4.8267 3.52424 7.50003 3.40378V0.565136C7.50004 0.454466 7.53321 0.346235 7.59544 0.253867C7.65766 0.1615 7.7462 0.0890618 7.85007 0.0455395C7.95393 0.00201712 8.06856 -0.0106743 8.17972 0.00903953C8.29088 0.0287534 8.39369 0.080005 8.47539 0.156436L14.8216 6.09089C14.878 6.14366 14.9229 6.20708 14.9535 6.27733C14.9842 6.34758 15 6.42319 15 6.49959C15 6.57599 14.9842 6.6516 14.9535 6.72184C14.9229 6.79209 14.878 6.85552 14.8216 6.90829L8.47539 12.8427C8.39369 12.9192 8.29088 12.9704 8.17972 12.9901C8.06856 13.0098 7.95393 12.9972 7.85007 12.9536C7.7462 12.9101 7.65766 12.8377 7.59544 12.7453C7.53321 12.6529 7.50004 12.5447 7.50003 12.434V9.61623C5.87742 9.66427 4.65146 9.92179 3.67537 10.416C2.62068 10.9501 1.8559 11.748 1.03161 12.7827C0.957668 12.8754 0.856007 12.9433 0.740817 12.9767C0.625627 13.0101 0.502656 13.0075 0.389064 12.9692V12.9685Z"
                                                    fill="white" />
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php endwhile;
                    wp_reset_postdata();
                endif;
                ?>

            </div>
        </div>
    </section>


<?php
get_footer();
