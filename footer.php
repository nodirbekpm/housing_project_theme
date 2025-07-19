<?php wp_footer(); ?>

<?php
$site_name = get_field('site_name', 'option');
$phones = get_field('phones', 'option');
$start_time = get_field('schedule', 'option')['start_time'];
$end_time = get_field('schedule', 'option')['end_time'];
$email = get_field('email', 'option');
$address = get_field('address', 'option');

$legal_address = get_field('legal_address', 'option');
$postal_address = get_field('postal_address', 'option');
$registration_details = get_field('registration_details', 'option');
$privacy_policy = get_field('privacy_policy', 'option');
$telegram = get_field('telegram', 'option');

?>

<!-- footer -->
<footer>
    <div class="container">
        <div class="footer_block">
            <div class="footer_top d-flex justify-content-between">
                <a href="<?php echo home_url(); ?>" class="footer_logo">
                    <?php the_field('site_name', 'option'); ?>
                </a>
                <div class="footer_details d-flex">
                    <div class="details_left">
                        <div class="footer_tel">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"
                                 fill="none">
                                <path
                                    d="M1.01128 7.9714C3.34345 13.052 7.48658 17.0789 12.6298 19.2639L13.4557 19.6322C14.3703 20.0397 15.3993 20.1111 16.3613 19.8339C17.3234 19.5566 18.1568 18.9485 18.7147 18.1167L19.7945 16.5076C19.9634 16.2553 20.0318 15.9488 19.9862 15.6485C19.9406 15.3482 19.7842 15.0759 19.5479 14.8852L15.8897 11.932C15.7622 11.8293 15.6154 11.7533 15.4579 11.7087C15.3005 11.6642 15.1356 11.6519 14.9733 11.6727C14.8109 11.6934 14.6545 11.7468 14.5133 11.8296C14.3721 11.9124 14.2491 12.0229 14.1516 12.1544L13.0196 13.6821C10.1139 12.2461 7.76196 9.89231 6.32741 6.98458L7.8529 5.85193C7.98437 5.75441 8.09479 5.63132 8.17753 5.49004C8.26027 5.34875 8.31362 5.1922 8.33438 5.02977C8.35514 4.86734 8.34288 4.70239 8.29834 4.54482C8.25379 4.38725 8.17788 4.24032 8.07517 4.11284L5.12378 0.452366C4.93322 0.215934 4.66108 0.059477 4.36097 0.0138147C4.06086 -0.0318475 3.75454 0.0365952 3.50235 0.205661L1.88334 1.29213C1.04699 1.85333 0.436905 2.69339 0.161761 3.66265C-0.113383 4.63191 -0.0357163 5.66743 0.380926 6.58475L1.01128 7.9714Z"
                                    fill="white" />
                            </svg>
                            <div class="tel_wrapper d-flex flex-column">
                                <?php foreach ($phones as $phone): ?>
                                    <a href="tel:8 (888) 888 88 88" class="footer_text">
                                        <?= $phone['phone'] ?>
                                    </a>
                                <?php endforeach; ?>
                            </div>
                        </div>
                        <a href="mailto:<?= $email ?>" class="footer_email d-flex align-items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="16" viewBox="0 0 22 16"
                                 fill="none">
                                <path
                                    d="M19.8 0H2.2C0.99 0 0.011 0.9 0.011 2L0 14C0 15.1 0.99 16 2.2 16H19.8C21.01 16 22 15.1 22 14V2C22 0.9 21.01 0 19.8 0ZM19.36 4.25L11.583 8.67C11.231 8.87 10.769 8.87 10.417 8.67L2.64 4.25C2.5297 4.19371 2.43311 4.11766 2.35608 4.02645C2.27904 3.93525 2.22317 3.83078 2.19183 3.71937C2.1605 3.60796 2.15435 3.49194 2.17377 3.37831C2.19319 3.26468 2.23777 3.15581 2.30481 3.0583C2.37185 2.96079 2.45996 2.87666 2.5638 2.811C2.66764 2.74533 2.78506 2.69951 2.90895 2.6763C3.03283 2.65309 3.16061 2.65297 3.28455 2.67595C3.40849 2.69893 3.52601 2.74453 3.63 2.81L11 7L18.37 2.81C18.474 2.74453 18.5915 2.69893 18.7155 2.67595C18.8394 2.65297 18.9672 2.65309 19.0911 2.6763C19.2149 2.69951 19.3324 2.74533 19.4362 2.811C19.54 2.87666 19.6282 2.96079 19.6952 3.0583C19.7622 3.15581 19.8068 3.26468 19.8262 3.37831C19.8456 3.49194 19.8395 3.60796 19.8082 3.71937C19.7768 3.83078 19.721 3.93525 19.6439 4.02645C19.5669 4.11766 19.4703 4.19371 19.36 4.25Z"
                                    fill="white" />
                            </svg>
                            <span class="footer_text"><?= $email ?></span>
                        </a>
                    </div>
                    <div class="details_right d-flex flex-column">
                        <div class="footer_time d-flex align-items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="24" viewBox="0 0 22 24"
                                 fill="none">
                                <path
                                    d="M13.2 13.0909H14.85V16.1673L17.534 17.7055L16.709 19.1236L13.2 17.1164V13.0909ZM17.6 7.63636H2.2V19.6364H7.337C6.864 18.6436 6.6 17.5309 6.6 16.3636C6.6 14.3383 7.41125 12.396 8.85528 10.9639C10.2993 9.53182 12.2578 8.72727 14.3 8.72727C15.477 8.72727 16.599 8.98909 17.6 9.45818V7.63636ZM2.2 21.8182C1.61652 21.8182 1.05694 21.5883 0.644365 21.1791C0.231785 20.77 0 20.215 0 19.6364V4.36364C0 3.15273 0.979 2.18182 2.2 2.18182H3.3V0H5.5V2.18182H14.3V0H16.5V2.18182H17.6C18.1835 2.18182 18.7431 2.41169 19.1556 2.82086C19.5682 3.23003 19.8 3.78498 19.8 4.36364V11.0182C21.164 12.3927 22 14.28 22 16.3636C22 18.3889 21.1888 20.3313 19.7447 21.7634C18.3007 23.1955 16.3422 24 14.3 24C12.199 24 10.296 23.1709 8.91 21.8182H2.2ZM14.3 11.0727C12.8851 11.0727 11.5281 11.6302 10.5276 12.6224C9.52708 13.6146 8.965 14.9604 8.965 16.3636C8.965 19.2873 11.352 21.6545 14.3 21.6545C15.0006 21.6545 15.6943 21.5177 16.3416 21.2518C16.9889 20.9859 17.577 20.5962 18.0724 20.1049C18.5678 19.6136 18.9608 19.0303 19.2289 18.3884C19.497 17.7465 19.635 17.0584 19.635 16.3636C19.635 13.44 17.248 11.0727 14.3 11.0727Z"
                                    fill="white" />
                            </svg>
                            <span class="footer_text"><?= $start_time ?> - <?= $end_time ?></span>
                        </div>
                        <div class="footer_time d-flex align-items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="19" height="24" viewBox="0 0 19 24"
                                 fill="none">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                      d="M9.89086 23.8785L9.89357 23.8772L9.90036 23.8725L9.92072 23.8572L10.0008 23.8005C10.0695 23.7512 10.1668 23.6792 10.2926 23.5845C10.5423 23.3965 10.8965 23.1198 11.3193 22.7645C12.429 21.8326 13.4667 20.8209 14.4237 19.7377C16.6684 17.187 19 13.5469 19 9.3842C19 6.89748 17.9998 4.51076 16.2192 2.75072C15.3392 1.87957 14.2924 1.18805 13.1393 0.715963C11.9861 0.243876 10.7493 0.000552409 9.5 0C8.25077 0.000465085 7.01398 0.243684 5.86081 0.715655C4.70764 1.18763 3.66088 1.87903 2.78079 2.75006C0.998654 4.51424 -0.000975045 6.8993 7.13672e-07 9.38486C7.13672e-07 13.5469 2.33157 17.187 4.57629 19.7377C5.53332 20.8209 6.571 21.8326 7.68075 22.7645C8.10418 23.1198 8.45772 23.3965 8.70743 23.5845C8.82993 23.6772 8.95367 23.7683 9.07861 23.8578L9.10032 23.8725L9.10643 23.8772L9.10914 23.8785C9.34325 24.0405 9.65675 24.0405 9.89086 23.8785ZM12.8929 9.33353C12.8929 10.2176 12.5354 11.0655 11.8991 11.6906C11.2628 12.3157 10.3998 12.6669 9.5 12.6669C8.60016 12.6669 7.73717 12.3157 7.10089 11.6906C6.4646 11.0655 6.10714 10.2176 6.10714 9.33353C6.10714 8.44945 6.4646 7.60159 7.10089 6.97646C7.73717 6.35132 8.60016 6.00012 9.5 6.00012C10.3998 6.00012 11.2628 6.35132 11.8991 6.97646C12.5354 7.60159 12.8929 8.44945 12.8929 9.33353Z"
                                      fill="white" />
                            </svg>
                            <span class="footer_text"><?= $address ?></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer_bottom d-flex justify-content-between align-items-center">
                <div class="footer_bottom_desc d-flex">
                    <div class="bottom_left bottom_desc_item">
                        <p>Юридический адрес:</p>
                        <p>Почтовый адрес:</p>
                        <p>Сведения о регистрации:</p>
                        <p>
                            <a href="#" class="policy" target="_blank">
                                Политика конфиденциальности и обработки персональных данных
                            </a>
                        </p>
                    </div>
                    <div class="bottom_right bottom_desc_item">
                        <p><?= $legal_address ?></p>
                        <p><?= $postal_address?></p>
                        <p><?= $registration_details ?>
                            <?= $privacy_policy['text'] ?>
                            <a
                                href="http://xn----dtbmifbdg0a6ap.xn--p1ai/images/documents/svid_ogrn_800_600.jpg">(свидетельство
                                о регистрации)</a></p>
                    </div>

                </div>
                <div class="footer_social_icons d-flex align-items-center">
                    <a href="<?php echo $telegram['link']['url'] ?>">
                        <img src="<?php echo $telegram['icon']['url'] ?>" alt="">
                    </a>

                </div>
            </div>
        </div>
    </div>
</footer>

</div>

<script>
    function shareNews(event) {
        event.preventDefault();

        // Element topiladi
        const newsItem = event.target.closest('.news_item');
        const title = newsItem.querySelector('.news_title')?.innerText || 'Yangilik';
        const text = newsItem.querySelector('.news_details_text p')?.innerText || '';

        // Ulashish funksiyasi
        if (navigator.share) {
            navigator.share({
                title: title,
                text: `${title}\n\n${text}`,
                url: window.location.href,
            }).catch((error) => console.log("Ulashishda xatolik:", error));
        } else {
            alert("Brauzeringiz bu funksiyani qo‘llab-quvvatlamaydi.");
        }
    }


</script>

<!-- Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous">
</script>
<!-- Juqery -->
<script src="<?php echo get_template_directory_uri() ?>/assets/libs/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
<!-- swiper -->
<script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
<!-- JS -->
<script src="<?php echo get_template_directory_uri() ?>/assets/js/scripts.js"></script>
</body>

</html>