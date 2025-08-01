<?php
/*
 * Template name: Главная страница
 * */

get_header();


?>


<?php if (get_field('banner_hidden') !== "Да"): ?>
    <!-- hero -->
    <section class="hero">
        <div class="container">
            <div class="reminder d-flex align-items-center justify-content-between">
                    <span>
                        <?= get_field('banner_warning') ?>
                    </span>
                <svg xmlns="http://www.w3.org/2000/svg" width="29" height="30" viewBox="0 0 29 30" fill="none">
                    <path
                            d="M14.5 28.5C21.9558 28.5 28 22.4558 28 15C28 7.54416 21.9558 1.5 14.5 1.5C7.04416 1.5 1 7.54416 1 15C1 22.4558 7.04416 28.5 14.5 28.5Z"
                            stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M14.5 21H14.515V21.015H14.5V21Z" stroke="white" stroke-width="2"
                          stroke-linejoin="round"/>
                    <path d="M14.5 15V9" stroke="white" stroke-width="2" stroke-linecap="round"
                          stroke-linejoin="round"/>
                </svg>
            </div>
            <div class="hero_wrapper">

                <div class="hero_block d-flex justify-content-between">
                    <div class="hero_left">
                        <h1 class="hero_title">
                            <?= get_field('banner_title') ?>
                        </h1>
                        <div class="hero_services d-flex flex-wrap">
                            <?php foreach (get_field('banner_services') as $service): ?>
                                <div class="service_item">
                                    <div class="service_icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="15" height="11"
                                             viewBox="0 0 15 11" fill="none">
                                            <path d="M1.5 4.5L6 9L13.5 1.5" stroke="white" stroke-width="2"/>
                                        </svg>
                                    </div>
                                    <p class="service_name"><?= $service['service'] ?></p>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <div class="hero_right">
                        <div class="service_block">
                            <div class="service_header">
                                <h2 class="service_title"><?= get_field('banner_address')['title'] ?></h2>
                                <div class="service_icon">
                                    <img src="<?php echo get_template_directory_uri() ?>/assets/images/hero_service_building.png" alt="">
                                </div>
                            </div>

                            <div class="service_table">
                                <div class="service_table_row service_table_head">
                                    <div class="service_column">Адрес:</div>
                                    <div class="service_column">Дома:</div>
                                </div>

                                <?php foreach (get_field('banner_address')['addresses'] as $address): ?>
                                    <div class="service_table_row">
                                        <div class="service_column"><?= $address['address'] ?></div>
                                        <div class="service_column"><?= $address['house'] ?></div>
                                    </div>
                                <?php endforeach; ?>


                            </div>
                        </div>

                    </div>
                </div>
                <div class="hero_bottom d-flex ">
                    <a href="#" class="hero_btn">
                        <img src="<?php echo get_template_directory_uri() ?>/assets/images/kvitel.png" alt="">
                    </a>
                    <!-- <a href="#" class="sms_notification">
                        <span>Подключи уведомления по sms</span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="29" height="30" viewBox="0 0 29 30"
                            fill="none">
                            <path
                                d="M14.5 28.5C21.9558 28.5 28 22.4558 28 15C28 7.54416 21.9558 1.5 14.5 1.5C7.04416 1.5 1 7.54416 1 15C1 22.4558 7.04416 28.5 14.5 28.5Z"
                                stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M14.5 21H14.515V21.015H14.5V21Z" stroke="white" stroke-width="2"
                                stroke-linejoin="round" />
                            <path d="M14.5 15V9" stroke="white" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" />
                        </svg>
                    </a> -->
                </div>
            </div>
        </div>
    </section>

<?php endif; ?>

<?php if (get_field('news_hidden') !== "Да"): ?>
    <!-- main_news -->
    <section class="main_news">
        <div class="container">
            <h1 class="title"><?= get_field('news_title') ?></h1>
            <div class="swiper news_swiper news_block d-flex">
                <?php
                $latest_posts = new WP_Query([
                    'post_type' => 'post',
                    'posts_per_page' => 3,
                ]);
                ?>

                <div class="swiper-wrapper justify-content-between">
                    <?php while ($latest_posts->have_posts()): $latest_posts->the_post(); ?>
                        <div class="news_item">
                            <div class="news_img">
                                <?php if (has_post_thumbnail()): ?>
                                    <img src="<?php the_post_thumbnail_url('medium'); ?>" alt="<?php the_title(); ?>">
                                <?php endif; ?>
                            </div>
                            <div class="news_body">
                                <p class="news_date"><?php echo get_the_date('d.m.Y'); ?></p>
                                <p class="news_item_title"><?php the_title(); ?></p>
                                <p class="news_item_desc"><?php echo wp_trim_words(get_the_content(), 20); ?></p>
                                <div class="news_bottom">
                                    <a href="<?php echo get_permalink(get_option('page_for_posts')); ?>#post-<?php the_ID(); ?>">
                                        Читать далее
                                    </a>
                                    <div class="news_icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="7" height="13" viewBox="0 0 7 13"
                                             fill="none">
                                            <path d="M1 1L5 6.5L1 12" stroke="#182538" stroke-width="2"
                                                  stroke-linecap="round"/>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endwhile;
                    wp_reset_postdata(); ?>

                    <!-- Все новости -->
                    <div class="news_item all_news">
                        <p class="all_title">Все новости</p>
                        <div class="news_all_img">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/news_all.png" alt="">
                        </div>
                        <a href="<?php echo get_permalink(get_option('page_for_posts')); ?>"
                           class="item_btn">Перейти</a>
                    </div>
                </div>

            </div>
        </div>
    </section>
<?php endif; ?>


<?php if (get_field('events_hidden') !== "Да"): ?>
    <section class="events">
        <div class="container">
            <h1 class="title"><?= get_field('events_title'); ?></h1>
            <div class="events_block">
                <?php if (have_rows('events')): ?>
                    <?php while (have_rows('events')): the_row(); ?>
                        <?php
                        $image = get_sub_field('event_image');
                        $title = get_sub_field('event_title');
                        $day = get_sub_field('event_day'); // already in d/m/Y
                        $time = get_sub_field('event_time'); // already in H:i
                        $place = get_sub_field('event_place');
                        $text = get_sub_field('event_text');
                        ?>
                        <div class="event_item">
                            <div class="event_left">
                                <div class="event_image">
                                    <?php if ($image): ?>
                                        <img src="<?= esc_url($image['url']); ?>" alt="<?= esc_attr($image['alt']); ?>">
                                    <?php endif; ?>
                                </div>
                                <?php if ($day):
                                    $day_obj = DateTime::createFromFormat('d/m/Y', $day);
                                    ?>
                                    <div class="event_dates">
                                        <span class="number"><?= $day_obj->format('d'); ?></span>
                                        <span class="date_text"><?= ucfirst(date_i18n('F', $day_obj->getTimestamp())); ?></span>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div class="event_right">
                                <?php if ($title): ?>
                                    <h3><?= $title; ?></h3>
                                <?php endif; ?>
                                <p>
                                    <?= $place ? esc_html($place) . '<br><br>' : ''; ?>
                                    <?= $time ? 'Начало в ' . esc_html($time) . '<br><br>' : ''; ?>
                                    <?php if (have_rows('event_programs')): ?>
                                        В программе: <br>
                                        <?php while (have_rows('event_programs')): the_row(); ?>
                                            - <?= esc_html(get_sub_field('program')); ?><br>
                                        <?php endwhile; ?>
                                    <?php endif; ?>
                                    <?= $text ? '<br>' . esc_html($text) : ''; ?>
                                </p>
                            </div>
                        </div>
                    <?php endwhile; ?>
                <?php endif; ?>
            </div>
        </div>
    </section>
<?php endif; ?>


<?php if (get_field('about_company_hidden') !== "Да"): ?>
    <section class="about">
        <div class="container">
            <div class="about_block d-flex justify-content-between">
                <div class="about_left">
                    <h1 class="title"><?= get_field('about_company_title'); ?></h1>
                    <div class="about_text">
                        <?php if (have_rows('about_company_texts')): ?>
                            <?php while (have_rows('about_company_texts')): the_row(); ?>
                                <?php $text = get_sub_field('text'); ?>
                                <?php if ($text): ?>
                                    <p><?= esc_html($text); ?></p>
                                <?php endif; ?>
                            <?php endwhile; ?>
                        <?php endif; ?>

                        <?php
                        $about_img = get_field('about_company_img');
                        if ($about_img):
                            ?>
                            <div class="about_building_img d-sm-none">
                                <img src="<?= esc_url($about_img['url']); ?>" alt="<?= esc_attr($about_img['alt']); ?>">
                            </div>
                        <?php endif; ?>
                    </div>

                    <?php if (have_rows('about_company_socials')): ?>
                        <div class="about_social">
                            <p class="social_name">Мы в сетях:</p>
                            <?php while (have_rows('about_company_socials')): the_row(); ?>
                                <?php
                                $icon = get_sub_field('icon');
                                $link = get_sub_field('link');
                                ?>
                                <?php if ($link && $icon): ?>
                                    <a href="<?= esc_url($link['url']); ?>" class="social_icon"
                                       target="<?= esc_attr($link['target']); ?>">
                                        <img src="<?= esc_url($icon['url']); ?>" alt="<?= esc_attr($icon['alt']); ?>">
                                    </a>
                                <?php endif; ?>
                            <?php endwhile; ?>
                        </div>
                    <?php endif; ?>
                </div>

                <div class="about_right d-none d-sm-block">
                    <?php if ($about_img): ?>
                        <div class="about_building_img">
                            <img src="<?= esc_url($about_img['url']); ?>" alt="<?= esc_attr($about_img['alt']); ?>">
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>


<?php if (get_field('contact_hidden') !== "Да"): ?>
    <!-- contact -->
    <section class="contact">
        <div class="container">
            <div class="contact_block d-flex">
                <div class="contact_left">
                    <h1 class="title"><?= get_field('contact_title') ?></h1>
                    <p class="form_desc"><?= get_field('contact_text') ?></p>
                    <p class="contact_subtitle"><?= get_field('contact_mini_title') ?></p>

                    <div class="social_icons">
                        <?php foreach (get_field('contact_socials') as $social): ?>
                            <a href="<?php echo $social['link']['url'] ?>">
                                <img src="<?php echo $social['icon']['url'] ?>" alt="">
                            </a>
                        <?php endforeach; ?>
                    </div>
                    <div class="contact_socials">
                        <div class="social_left">
                            <div class="social_item">
                                <div class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                         viewBox="0 0 20 20" fill="none">
                                        <path
                                                d="M1.01128 7.9714C3.34345 13.052 7.48658 17.0789 12.6298 19.2639L13.4557 19.6322C14.3703 20.0397 15.3993 20.1111 16.3613 19.8339C17.3234 19.5566 18.1568 18.9485 18.7147 18.1167L19.7945 16.5076C19.9634 16.2553 20.0318 15.9488 19.9862 15.6485C19.9406 15.3482 19.7842 15.0759 19.5479 14.8852L15.8897 11.932C15.7622 11.8293 15.6154 11.7533 15.4579 11.7087C15.3005 11.6642 15.1356 11.6519 14.9733 11.6727C14.8109 11.6934 14.6545 11.7468 14.5133 11.8296C14.3721 11.9124 14.2491 12.0229 14.1516 12.1544L13.0196 13.6821C10.1139 12.2461 7.76196 9.89231 6.32741 6.98458L7.8529 5.85193C7.98437 5.75441 8.09479 5.63132 8.17753 5.49004C8.26027 5.34875 8.31362 5.1922 8.33438 5.02977C8.35514 4.86734 8.34288 4.70239 8.29834 4.54482C8.25379 4.38725 8.17788 4.24032 8.07517 4.11284L5.12378 0.452366C4.93322 0.215934 4.66108 0.059477 4.36097 0.0138147C4.06086 -0.0318475 3.75454 0.0365952 3.50235 0.205661L1.88334 1.29213C1.04699 1.85333 0.436905 2.69339 0.161761 3.66265C-0.113383 4.63191 -0.0357163 5.66743 0.380926 6.58475L1.01128 7.9714Z"
                                                fill="white"/>
                                    </svg>
                                </div>
                                <div class="tel_numbers">
                                    <?php foreach (get_field('contact_phones') as $phone): ?>
                                        <a href="tel:<?= $phone['phone'] ?>"
                                           class="contact_text"><?= $phone['phone'] ?></a>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                            <div class="social_item align-items-center">
                                <div class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="16"
                                         viewBox="0 0 22 16" fill="none">
                                        <path
                                                d="M19.8 0H2.2C0.99 0 0.011 0.9 0.011 2L0 14C0 15.1 0.99 16 2.2 16H19.8C21.01 16 22 15.1 22 14V2C22 0.9 21.01 0 19.8 0ZM19.36 4.25L11.583 8.67C11.231 8.87 10.769 8.87 10.417 8.67L2.64 4.25C2.5297 4.19371 2.43311 4.11766 2.35608 4.02645C2.27904 3.93525 2.22317 3.83078 2.19183 3.71937C2.1605 3.60796 2.15435 3.49194 2.17377 3.37831C2.19319 3.26468 2.23777 3.15581 2.30481 3.0583C2.37185 2.96079 2.45996 2.87666 2.5638 2.811C2.66764 2.74533 2.78506 2.69951 2.90895 2.6763C3.03283 2.65309 3.16061 2.65297 3.28455 2.67595C3.40849 2.69893 3.52601 2.74453 3.63 2.81L11 7L18.37 2.81C18.474 2.74453 18.5915 2.69893 18.7155 2.67595C18.8394 2.65297 18.9672 2.65309 19.0911 2.6763C19.2149 2.69951 19.3324 2.74533 19.4362 2.811C19.54 2.87666 19.6282 2.96079 19.6952 3.0583C19.7622 3.15581 19.8068 3.26468 19.8262 3.37831C19.8456 3.49194 19.8395 3.60796 19.8082 3.71937C19.7768 3.83078 19.721 3.93525 19.6439 4.02645C19.5669 4.11766 19.4703 4.19371 19.36 4.25Z"
                                                fill="white"/>
                                    </svg>
                                </div>
                                <a href="mailto:<?= get_field('email') ?>" class="tel_numbers contact_text">
                                    <?= get_field('email') ?>
                                </a>
                            </div>
                        </div>
                        <div class="social_right">
                            <div class="social_item align-items-center">
                                <div class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="24"
                                         viewBox="0 0 22 24" fill="none">
                                        <path
                                                d="M13.2 13.0909H14.85V16.1673L17.534 17.7055L16.709 19.1236L13.2 17.1164V13.0909ZM17.6 7.63636H2.2V19.6364H7.337C6.864 18.6436 6.6 17.5309 6.6 16.3636C6.6 14.3383 7.41125 12.396 8.85528 10.9639C10.2993 9.53182 12.2578 8.72727 14.3 8.72727C15.477 8.72727 16.599 8.98909 17.6 9.45818V7.63636ZM2.2 21.8182C1.61652 21.8182 1.05694 21.5883 0.644365 21.1791C0.231785 20.77 0 20.215 0 19.6364V4.36364C0 3.15273 0.979 2.18182 2.2 2.18182H3.3V0H5.5V2.18182H14.3V0H16.5V2.18182H17.6C18.1835 2.18182 18.7431 2.41169 19.1556 2.82086C19.5682 3.23003 19.8 3.78498 19.8 4.36364V11.0182C21.164 12.3927 22 14.28 22 16.3636C22 18.3889 21.1888 20.3313 19.7447 21.7634C18.3007 23.1955 16.3422 24 14.3 24C12.199 24 10.296 23.1709 8.91 21.8182H2.2ZM14.3 11.0727C12.8851 11.0727 11.5281 11.6302 10.5276 12.6224C9.52708 13.6146 8.965 14.9604 8.965 16.3636C8.965 19.2873 11.352 21.6545 14.3 21.6545C15.0006 21.6545 15.6943 21.5177 16.3416 21.2518C16.9889 20.9859 17.577 20.5962 18.0724 20.1049C18.5678 19.6136 18.9608 19.0303 19.2289 18.3884C19.497 17.7465 19.635 17.0584 19.635 16.3636C19.635 13.44 17.248 11.0727 14.3 11.0727Z"
                                                fill="white"/>
                                    </svg>
                                </div>
                                <p class=" contact_text">
                                    <?= get_field('contact_time_table') ?>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="social_item align-items-center">
                        <div class="icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="19" height="24" viewBox="0 0 19 24"
                                 fill="none">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                      d="M9.89086 23.8785L9.89357 23.8772L9.90036 23.8725L9.92072 23.8572L10.0008 23.8005C10.0695 23.7512 10.1668 23.6792 10.2926 23.5845C10.5423 23.3965 10.8965 23.1198 11.3193 22.7645C12.429 21.8326 13.4667 20.8209 14.4237 19.7377C16.6684 17.187 19 13.5469 19 9.3842C19 6.89748 17.9998 4.51076 16.2192 2.75072C15.3392 1.87957 14.2924 1.18805 13.1393 0.715963C11.9861 0.243876 10.7493 0.000552409 9.5 0C8.25077 0.000465085 7.01398 0.243684 5.86081 0.715655C4.70764 1.18763 3.66088 1.87903 2.78079 2.75006C0.998654 4.51424 -0.000975045 6.8993 7.13672e-07 9.38486C7.13672e-07 13.5469 2.33157 17.187 4.57629 19.7377C5.53332 20.8209 6.571 21.8326 7.68075 22.7645C8.10418 23.1198 8.45772 23.3965 8.70743 23.5845C8.82993 23.6772 8.95367 23.7683 9.07861 23.8578L9.10032 23.8725L9.10643 23.8772L9.10914 23.8785C9.34325 24.0405 9.65675 24.0405 9.89086 23.8785ZM12.8929 9.33353C12.8929 10.2176 12.5354 11.0655 11.8991 11.6906C11.2628 12.3157 10.3998 12.6669 9.5 12.6669C8.60016 12.6669 7.73717 12.3157 7.10089 11.6906C6.4646 11.0655 6.10714 10.2176 6.10714 9.33353C6.10714 8.44945 6.4646 7.60159 7.10089 6.97646C7.73717 6.35132 8.60016 6.00012 9.5 6.00012C10.3998 6.00012 11.2628 6.35132 11.8991 6.97646C12.5354 7.60159 12.8929 8.44945 12.8929 9.33353Z"
                                      fill="white"/>
                            </svg>
                        </div>
                        <p class="contact_text">
                            <?= get_field('address') ?>
                        </p>
                    </div>
                </div>
                <div class="contact_right">
                    <?php
                    // Replace '33785b0' with your actual form ID
                    echo do_shortcode('[contact-form-7 id="33785b0" title="Contact"]');
                    ?>
                    <style>
                        .wpcf7-response-output {
                            display: none !important;
                        }
                    </style>
                    <!-- CHECKBOX PASTDA -->
                    <label class="form_checkbox">
                        <input type="checkbox" required>
                        <span class="checkmark"></span>
                        Я ознакомлен(а) с <a href="#" target="_blank">политикой
                            конфиденциальности</a>
                    </label>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>


<?php if (get_field('documents_hidden') !== "Да"): ?>
    <!-- document -->
    <section class="document">
        <div class="container">
            <h1 class="title"><?= get_field('documents_title') ?></h1>
            <label class="documents_search align-items-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 22 22" fill="none">
                    <path
                            d="M10.5 20C15.7467 20 20 15.7467 20 10.5C20 5.25329 15.7467 1 10.5 1C5.25329 1 1 5.25329 1 10.5C1 15.7467 5.25329 20 10.5 20Z"
                            stroke="black" stroke-width="1.5"/>
                    <path d="M17.5 17.5L21 21" stroke="black" stroke-width="1.5" stroke-linecap="round"/>
                </svg>
                <input type="text" id="search_input" class="search_input" placeholder="Поиск"/>
            </label>

            <div class="documents_sections">
                <div class="documents_section">
                    <h2 class="section_title">Отчеты о деятельности</h2>
                    <div class="documents_list swiper">
                        <div class="swiper-wrapper">
                            <?php foreach (get_field('documents_reports') as $item): ?>
                                <a href="<?php if ($item['file']):?><?= $item['file']['url'] ?><?php else: ?>#<?php endif;?>" download class="document_item swiper-slide"
                                     data-title="<?= $item['title'] ?>">
                                    <img src="<?php echo get_template_directory_uri() ?>/assets/images/pdf_img.png" alt="PDF" class="document_icon"/>
                                    <p class="document_title"><?= $item['title'] ?></p>
                                </a>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>

                <div class="documents_section">
                    <h2 class="section_title">Список домов, находящихся в обслуживании</h2>
                    <div class="documents_list swiper">
                        <div class="swiper-wrapper">
                            <?php foreach (get_field('documents_reports') as $item): ?>
                                <a href="" download class="document_item swiper-slide"
                                     data-title="<?= $item['title'] ?>">
                                    <img src="<?php echo get_template_directory_uri() ?>/assets/images/pdf_img.png" alt="PDF" class="document_icon"/>
                                    <p class="document_title"><?= $item['title'] ?></p>
                                </a>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>

                <div class="documents_section">
                    <h2 class="section_title">Лицензии и сертификаты компании.</h2>
                    <div class="documents_list swiper">
                        <div class="swiper-wrapper">
                            <?php foreach (get_field('documents_reports') as $item): ?>
                                <a href="" download class="document_item swiper-slide"
                                     data-title="<?= $item['title'] ?>">
                                    <img src="<?php echo get_template_directory_uri() ?>/assets/images/pdf_img.png" alt="PDF" class="document_icon"/>
                                    <p class="document_title"><?= $item['title'] ?></p>
                                </a>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>

                <div class="documents_section">
                    <h2 class="section_title">Правила и регламенты</h2>
                    <div class="documents_list swiper">
                        <div class="swiper-wrapper">
                            <?php foreach (get_field('documents_reports') as $item): ?>
                                <a href="" download class="document_item swiper-slide"
                                     data-title="<?= $item['title'] ?>">
                                    <img src="<?php echo get_template_directory_uri() ?>/assets/images/pdf_img.png" alt="PDF" class="document_icon"/>
                                    <p class="document_title"><?= $item['title'] ?></p>
                                </a>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>


<?php
get_footer();
