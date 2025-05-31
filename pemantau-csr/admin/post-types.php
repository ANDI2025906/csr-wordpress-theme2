<?php
// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

// Register Perusahaan Post Type
function register_perusahaan_post_type() {
    $labels = array(
        'name'               => 'Perusahaan',
        'singular_name'      => 'Perusahaan',
        'menu_name'          => 'Perusahaan',
        'name_admin_bar'     => 'Perusahaan',
        'add_new'            => 'Tambah Baru',
        'add_new_item'       => 'Tambah Perusahaan Baru',
        'new_item'           => 'Perusahaan Baru',
        'edit_item'          => 'Edit Perusahaan',
        'view_item'          => 'Lihat Perusahaan',
        'all_items'          => 'Semua Perusahaan',
        'search_items'       => 'Cari Perusahaan',
        'parent_item_colon'  => 'Parent Perusahaan:',
        'not_found'          => 'Tidak ada perusahaan ditemukan.',
        'not_found_in_trash' => 'Tidak ada perusahaan ditemukan di trash.'
    );

    $args = array(
        'labels'             => $labels,
        'description'        => 'Daftar perusahaan yang terdaftar',
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'show_in_nav_menus'  => true,
        'show_in_admin_bar'  => true,
        'query_var'          => true,
        'rewrite'            => array(
            'slug'       => 'perusahaan',
            'with_front' => false,
        ),
        'capability_type'    => 'post',
        'capabilities'       => array(
            'edit_post'          => 'edit_posts',
            'read_post'          => 'read_posts',
            'delete_post'        => 'delete_posts',
            'edit_posts'         => 'edit_posts',
            'edit_others_posts'  => 'edit_others_posts',
            'publish_posts'      => 'publish_posts',
            'read_private_posts' => 'read_private_posts',
        ),
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 6,
        'menu_icon'          => 'dashicons-building',
        'supports'           => array(
            'title',
            'editor',
            'thumbnail',
            'excerpt',
            'custom-fields',
            'revisions',
            'author',
        ),
        'show_in_rest'       => true,
        'rest_base'          => 'perusahaan',
        'rest_controller_class' => 'WP_REST_Posts_Controller',
        'rest_namespace'     => 'wp/v2',
    );

    register_post_type('perusahaan', $args);
}

// Register Organisasi Post Type
function register_organisasi_post_type() {
    $labels = array(
        'name'               => 'Organisasi',
        'singular_name'      => 'Organisasi',
        'menu_name'          => 'Organisasi',
        'name_admin_bar'     => 'Organisasi',
        'add_new'            => 'Tambah Baru',
        'add_new_item'       => 'Tambah Organisasi Baru',
        'new_item'           => 'Organisasi Baru',
        'edit_item'          => 'Edit Organisasi',
        'view_item'          => 'Lihat Organisasi',
        'all_items'          => 'Semua Organisasi',
        'search_items'       => 'Cari Organisasi',
        'not_found'          => 'Tidak ada organisasi ditemukan.',
        'not_found_in_trash' => 'Tidak ada organisasi ditemukan di trash.'
    );

    $args = array(
        'labels'             => $labels,
        'description'        => 'Struktur organisasi kepengurusan',
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'show_in_nav_menus'  => true,
        'show_in_admin_bar'  => true,
        'query_var'          => true,
        'rewrite'            => array(
            'slug'       => 'organisasi',
            'with_front' => false,
        ),
        'capability_type'    => 'post',
        'capabilities'       => array(
            'edit_post'          => 'edit_posts',
            'read_post'          => 'read_posts',
            'delete_post'        => 'delete_posts',
            'edit_posts'         => 'edit_posts',
            'edit_others_posts'  => 'edit_others_posts',
            'publish_posts'      => 'publish_posts',
            'read_private_posts' => 'read_private_posts',
        ),
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 7,
        'menu_icon'          => 'dashicons-groups',
        'supports'           => array(
            'title',
            'editor',
            'thumbnail',
            'excerpt',
            'custom-fields',
            'revisions',
            'author',
        ),
        'show_in_rest'       => true,
        'rest_base'          => 'organisasi',
        'rest_controller_class' => 'WP_REST_Posts_Controller',
        'rest_namespace'     => 'wp/v2',
    );

    register_post_type('organisasi', $args);
}

// Register Slider Post Type
function register_slider_post_type() {
    $labels = array(
        'name'               => 'Slider',
        'singular_name'      => 'Slider',
        'menu_name'          => 'Slider',
        'name_admin_bar'     => 'Slider',
        'add_new'            => 'Tambah Baru',
        'add_new_item'       => 'Tambah Slider Baru',
        'new_item'           => 'Slider Baru',
        'edit_item'          => 'Edit Slider',
        'view_item'          => 'Lihat Slider',
        'all_items'          => 'Semua Slider',
        'search_items'       => 'Cari Slider',
        'not_found'          => 'Tidak ada slider ditemukan.',
        'not_found_in_trash' => 'Tidak ada slider ditemukan di trash.'
    );

    $args = array(
        'labels'             => $labels,
        'description'        => 'Slider untuk homepage',
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'show_in_nav_menus'  => false,
        'show_in_admin_bar'  => true,
        'query_var'          => true,
        'rewrite'            => array(
            'slug'       => 'slider',
            'with_front' => false,
        ),
        'capability_type'    => 'post',
        'capabilities'       => array(
            'edit_post'          => 'edit_posts',
            'read_post'          => 'read_posts',
            'delete_post'        => 'delete_posts',
            'edit_posts'         => 'edit_posts',
            'edit_others_posts'  => 'edit_others_posts',
            'publish_posts'      => 'publish_posts',
            'read_private_posts' => 'read_private_posts',
        ),
        'has_archive'        => false,
        'hierarchical'       => false,
        'menu_position'      => 5,
        'menu_icon'          => 'dashicons-images-alt2',
        'supports'           => array(
            'title',
            'editor',
            'thumbnail',
            'custom-fields',
            'page-attributes',
            'author',
        ),
        'show_in_rest'       => true,
        'rest_base'          => 'slider',
        'rest_controller_class' => 'WP_REST_Posts_Controller',
        'rest_namespace'     => 'wp/v2',
    );

    register_post_type('slider', $args);
}

// Hook the registration functions
add_action('init', 'register_perusahaan_post_type', 0);
add_action('init', 'register_organisasi_post_type', 0);
add_action('init', 'register_slider_post_type', 0);

// Flush rewrite rules on theme activation
function pemantau_csr_rewrite_flush() {
    register_perusahaan_post_type();
    register_organisasi_post_type();
    register_slider_post_type();
    flush_rewrite_rules();
}
add_action('after_switch_theme', 'pemantau_csr_rewrite_flush');
?>
