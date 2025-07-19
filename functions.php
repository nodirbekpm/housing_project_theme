<?php
function housing_theme_setup() {
    add_theme_support('title-tag');
    add_theme_support('custom-logo');
    register_nav_menus(array(
        'primary' => 'Primary Menu',
    ));
}
add_action('after_setup_theme', 'housing_theme_setup');


function register_my_menus() {
    register_nav_menus([
        'header_menu' => 'Header menyusi',
    ]);
}
add_action('after_setup_theme', 'register_my_menus');

if( function_exists('acf_add_options_page') ) {
    acf_add_options_page([
        'page_title'  => 'Site Settings',
        'menu_title'  => 'Site Settings',
        'menu_slug'   => 'site-settings',
        'capability'  => 'edit_posts',
        'redirect'    => false
    ]);
}


add_theme_support('post-thumbnails');

require get_template_directory() . '/inc/acf-fields.php';


// Ortiqcha teglar va classlarni olib tashlash
add_filter('wpcf7_form_elements', function($content) {
    // <span class="wpcf7-form-control-wrap"> ni olib tashlash
    $content = preg_replace('/<span class="wpcf7-form-control-wrap[^>]*>(.*?)<\/span>/i', '\1', $content);
    // Input va textarea'dagi ortiqcha classlar va atributlarni olib tashlash
    $content = preg_replace('/\s*(class|aria-required|aria-invalid|size|maxlength)="[^"]*"/i', '', $content);
    // Submit tugmasidagi ortiqcha classlar va atributlarni olib tashlash
    $content = preg_replace('/<input([^>]*type="submit"[^>]*)value="([^"]*)"[^>]*>/i', '<button type="submit">\2</button>', $content);
    // Checkbox uchun ortiqcha teglarni olib tashlash
    $content = preg_replace('/<span class="wpcf7-form-control wpcf7-acceptance">(.*?)<\/span>/i', '\1', $content);
    $content = preg_replace('/<span class="wpcf7-list-item"><label>(.*?)<\/label><\/span>/i', '\1', $content);
    $content = preg_replace('/<span class="wpcf7-list-item-label">([\s\S]*?)<\/span>/i', '\1', $content);
    // Checkbox input'dagi ortiqcha atributlarni olib tashlash va required qo'shish
    $content = preg_replace('/<input([^>]*type="checkbox"[^>]*)>/i', '<input type="checkbox" required>', $content);
    // <br> va <p> teglarini olib tashlash
    $content = str_replace(['<br>', '<p>', '</p>'], '', $content);
    return $content;
});

// Forma atributlarini tozalash (faqat class="contact_form" qoldirish)
add_filter('wpcf7_form_class_attr', function($class) {
    return 'contact_form';
});

// Ortiqcha forma atributlarini olib tashlash (action, novalidate, data-status, aria-label)
add_filter('wpcf7_form_attributes', function($atts) {
    $atts = [
        'class' => 'contact_form',
        'method' => 'post'
    ];
    return $atts;
}, 10, 1);

// Yashirin inputlarni olib tashlash
add_filter('wpcf7_form_hidden_fields', function($hidden) {
    return [];
});

// Ortiqcha fieldset ni olib tashlash
add_filter('wpcf7_form_response_output', function($output) {
    $output = preg_replace('/<fieldset class="hidden-fields-container">.*?<\/fieldset>/is', '', $output);
    return $output;
});



