<?php
// Theme setup
function pemantau_csr_setup() {
    // Add theme support
    add_theme_support('post-thumbnails');
    add_theme_support('title-tag');
    add_theme_support('custom-logo');
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
    ));
    
    // Register navigation menus
    register_nav_menus(array(
        'primary' => 'Primary Menu',
        'footer' => 'Footer Menu',
    ));
}
add_action('after_setup_theme', 'pemantau_csr_setup');

// Enqueue styles and scripts
function pemantau_csr_scripts() {
    // Main stylesheet
    wp_enqueue_style('pemantau-csr-style', get_stylesheet_uri());
    
    // Enhanced styles
    wp_enqueue_style('enhanced-styles', get_template_directory_uri() . '/css/enhanced-styles.css', array(), '1.0.0');
    
    // Font Awesome
    wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css');
    
    // Google Fonts
    wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap');
    
    // Enhanced scripts
    wp_enqueue_script('enhanced-scripts', get_template_directory_uri() . '/js/enhanced-scripts.js', array('jquery'), '1.0.0', true);
    
    // Localize script for AJAX
    wp_localize_script('enhanced-scripts', 'ajax_object', array(
        'ajax_url' => admin_url('admin-ajax.php'),
        'nonce' => wp_create_nonce('ajax_nonce')
    ));
}
add_action('wp_enqueue_scripts', 'pemantau_csr_scripts');

// Add custom post types
function create_custom_post_types() {
    // Companies post type
    register_post_type('companies', array(
        'labels' => array(
            'name' => 'Perusahaan',
            'singular_name' => 'Perusahaan',
            'add_new' => 'Tambah Perusahaan',
            'add_new_item' => 'Tambah Perusahaan Baru',
            'edit_item' => 'Edit Perusahaan',
            'new_item' => 'Perusahaan Baru',
            'view_item' => 'Lihat Perusahaan',
            'search_items' => 'Cari Perusahaan',
            'not_found' => 'Tidak ada perusahaan ditemukan',
            'not_found_in_trash' => 'Tidak ada perusahaan di trash'
        ),
        'public' => true,
        'has_archive' => true,
        'supports' => array('title', 'editor', 'thumbnail', 'custom-fields'),
        'menu_icon' => 'dashicons-building',
        'rewrite' => array('slug' => 'perusahaan')
    ));
    
    // CSR Programs post type
    register_post_type('csr_programs', array(
        'labels' => array(
            'name' => 'Program CSR',
            'singular_name' => 'Program CSR',
            'add_new' => 'Tambah Program',
            'add_new_item' => 'Tambah Program Baru',
            'edit_item' => 'Edit Program',
            'new_item' => 'Program Baru',
            'view_item' => 'Lihat Program',
            'search_items' => 'Cari Program',
            'not_found' => 'Tidak ada program ditemukan',
            'not_found_in_trash' => 'Tidak ada program di trash'
        ),
        'public' => true,
        'has_archive' => true,
        'supports' => array('title', 'editor', 'thumbnail', 'custom-fields'),
        'menu_icon' => 'dashicons-heart',
        'rewrite' => array('slug' => 'program-csr')
    ));
}
add_action('init', 'create_custom_post_types');

// Add custom taxonomies
function create_custom_taxonomies() {
    // Company categories
    register_taxonomy('company_category', 'companies', array(
        'labels' => array(
            'name' => 'Kategori Perusahaan',
            'singular_name' => 'Kategori',
            'search_items' => 'Cari Kategori',
            'all_items' => 'Semua Kategori',
            'edit_item' => 'Edit Kategori',
            'update_item' => 'Update Kategori',
            'add_new_item' => 'Tambah Kategori Baru',
            'new_item_name' => 'Nama Kategori Baru',
            'menu_name' => 'Kategori'
        ),
        'hierarchical' => true,
        'public' => true,
        'rewrite' => array('slug' => 'kategori-perusahaan')
    ));
    
    // Program categories
    register_taxonomy('program_category', 'csr_programs', array(
        'labels' => array(
            'name' => 'Kategori Program',
            'singular_name' => 'Kategori',
            'search_items' => 'Cari Kategori',
            'all_items' => 'Semua Kategori',
            'edit_item' => 'Edit Kategori',
            'update_item' => 'Update Kategori',
            'add_new_item' => 'Tambah Kategori Baru',
            'new_item_name' => 'Nama Kategori Baru',
            'menu_name' => 'Kategori'
        ),
        'hierarchical' => true,
        'public' => true,
        'rewrite' => array('slug' => 'kategori-program')
    ));
}
add_action('init', 'create_custom_taxonomies');

// Contact form handler
add_action('admin_post_submit_contact_form', 'handle_contact_form');
add_action('admin_post_nopriv_submit_contact_form', 'handle_contact_form');

function handle_contact_form() {
    // Verify nonce
    if (!wp_verify_nonce($_POST['contact_nonce'], 'contact_form_nonce')) {
        wp_die('Security check failed');
    }
    
    // Sanitize form data
    $nama = sanitize_text_field($_POST['nama']);
    $email = sanitize_email($_POST['email']);
    $perusahaan = sanitize_text_field($_POST['perusahaan']);
    $posisi = sanitize_text_field($_POST['posisi']);
    $telepon = sanitize_text_field($_POST['telepon']);
    $kategori = sanitize_text_field($_POST['kategori']);
    $subjek = sanitize_text_field($_POST['subjek']);
    $pesan = sanitize_textarea_field($_POST['pesan']);
    $newsletter = isset($_POST['newsletter']) ? 1 : 0;
    
    // Validate required fields
    if (empty($nama) || empty($email) || empty($kategori) || empty($subjek) || empty($pesan)) {
        wp_redirect(add_query_arg('status', 'error', wp_get_referer()));
        exit;
    }
    
    // Save to database
    global $wpdb;
    $table_name = $wpdb->prefix . 'contact_submissions';
    
    $result = $wpdb->insert(
        $table_name,
        array(
            'nama' => $nama,
            'email' => $email,
            'perusahaan' => $perusahaan,
            'posisi' => $posisi,
            'telepon' => $telepon,
            'kategori' => $kategori,
            'subjek' => $subjek,
            'pesan' => $pesan,
            'newsletter' => $newsletter,
            'tanggal_submit' => current_time('mysql'),
            'status' => 'unread'
        ),
        array('%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%d', '%s', '%s')
    );
    
    if ($result) {
        // Send email notification
        $admin_email = get_option('admin_email');
        $subject = 'Pesan Baru dari Website CSR: ' . $subjek;
        $message = "
        Nama: $nama
        Email: $email
        Perusahaan: $perusahaan
        Posisi: $posisi
        Telepon: $telepon
        Kategori: $kategori
        
        Pesan:
        $pesan
        ";
        
        wp_mail($admin_email, $subject, $message);
        
        wp_redirect(add_query_arg('status', 'success', wp_get_referer()));
    } else {
        wp_redirect(add_query_arg('status', 'error', wp_get_referer()));
    }
    exit;
}

// Create contact submissions table
function create_contact_table() {
    global $wpdb;
    
    $table_name = $wpdb->prefix . 'contact_submissions';
    
    $charset_collate = $wpdb->get_charset_collate();
    
    $sql = "CREATE TABLE $table_name (
        id mediumint(9) NOT NULL AUTO_INCREMENT,
        nama tinytext NOT NULL,
        email varchar(100) NOT NULL,
        perusahaan tinytext,
        posisi tinytext,
        telepon varchar(20),
        kategori varchar(50) NOT NULL,
        subjek tinytext NOT NULL,
        pesan text NOT NULL,
        newsletter tinyint(1) DEFAULT 0,
        tanggal_submit datetime DEFAULT CURRENT_TIMESTAMP,
        status varchar(20) DEFAULT 'unread',
        PRIMARY KEY (id)
    ) $charset_collate;";
    
    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($sql);
}

// Run table creation on theme activation
add_action('after_switch_theme', 'create_contact_table');

// Add admin menu for contact submissions
function add_contact_admin_menu() {
    add_menu_page(
        'Pesan Kontak',
        'Pesan Kontak',
        'manage_options',
        'contact-submissions',
        'display_contact_submissions',
        'dashicons-email-alt',
        30
    );
}
add_action('admin_menu', 'add_contact_admin_menu');

function display_contact_submissions() {
    global $wpdb;
    $table_name = $wpdb->prefix . 'contact_submissions';
    $submissions = $wpdb->get_results("SELECT * FROM $table_name ORDER BY tanggal_submit DESC");
    
    echo '<div class="wrap">';
    echo '<h1>Pesan Kontak</h1>';
    echo '<table class="wp-list-table widefat fixed striped">';
    echo '<thead><tr><th>Nama</th><th>Email</th><th>Perusahaan</th><th>Kategori</th><th>Subjek</th><th>Tanggal</th><th>Status</th></tr></thead>';
    echo '<tbody>';
    
    foreach ($submissions as $submission) {
        echo '<tr>';
        echo '<td>' . esc_html($submission->nama) . '</td>';
        echo '<td>' . esc_html($submission->email) . '</td>';
        echo '<td>' . esc_html($submission->perusahaan) . '</td>';
        echo '<td>' . esc_html($submission->kategori) . '</td>';
        echo '<td>' . esc_html($submission->subjek) . '</td>';
        echo '<td>' . esc_html($submission->tanggal_submit) . '</td>';
        echo '<td>' . esc_html($submission->status) . '</td>';
        echo '</tr>';
    }
    
    echo '</tbody></table>';
    echo '</div>';
}

// Custom excerpt length
function custom_excerpt_length($length) {
    return 30;
}
add_filter('excerpt_length', 'custom_excerpt_length');

// Custom excerpt more
function custom_excerpt_more($more) {
    return '...';
}
add_filter('excerpt_more', 'custom_excerpt_more');
?>
