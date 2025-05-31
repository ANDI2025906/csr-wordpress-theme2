<?php
<?php
// Enqueue enhanced styles and scripts
function enqueue_enhanced_assets() {
    // Enqueue enhanced CSS
    wp_enqueue_style(
        'enhanced-styles',
        get_template_directory_uri() . '/css/enhanced-styles.css',
        array(),
        '1.0.0'
    );
    
    // Enqueue enhanced JavaScript
    wp_enqueue_script(
        'enhanced-effects',
        get_template_directory_uri() . '/js/enhanced-effects.js',
        array('jquery'),
        '1.0.0',
        true
    );
    
    // Add Font Awesome
    wp_enqueue_style(
        'font-awesome',
        'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css'
    );
}
add_action('wp_enqueue_scripts', 'enqueue_enhanced_assets');

// Add body classes for styling
function add_enhanced_body_classes($classes) {
    $classes[] = 'enhanced-theme';
    return $classes;
}
add_filter('body_class', 'add_enhanced_body_classes');

// Add custom CSS to head
function add_custom_css_to_head() {
    ?>
    <style>
        /* Immediate visual improvements */
        body.enhanced-theme {
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            min-height: 100vh;
        }
        
        .site-header, .page-header, .entry-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 40px 0;
            position: relative;
            overflow: hidden;
        }
        
        .site-title, .page-title, .entry-title {
            color: white;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
        }
        
        .post, .page, article {
            background: rgba(255,255,255,0.9);
            border-radius: 15px;
            padding: 30px;
            margin-bottom: 30px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            transition: all 0.3s ease;
        }
        
        .post:hover, .page:hover, article:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 40px rgba(0,0,0,0.15);
        }
    </style>
    <?php
}
add_action('wp_head', 'add_custom_css_to_head');

// Rest of your existing functions...

/**
 * Pemantau CSR Theme Functions
 * 
 * @package Pemantau_CSR
 * @version 1.0.0
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Theme Setup
 */
function pemantau_csr_setup() {
    // Make theme available for translation
    load_theme_textdomain('pemantau-csr', get_template_directory() . '/languages');

    // Add default posts and comments RSS feed links to head
    add_theme_support('automatic-feed-links');

    // Let WordPress manage the document title
    add_theme_support('title-tag');

    // Enable support for Post Thumbnails on posts and pages
    add_theme_support('post-thumbnails');

    // Add support for HTML5 markup
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'style',
        'script',
    ));

    // Add theme support for selective refresh for widgets
    add_theme_support('customize-selective-refresh-widgets');

    // Add support for custom logo
    add_theme_support('custom-logo', array(
        'height'      => 250,
        'width'       => 250,
        'flex-width'  => true,
        'flex-height' => true,
    ));

    // Add support for custom header
    add_theme_support('custom-header', array(
        'default-image'      => '',
        'default-text-color' => '000',
        'width'              => 1920,
        'height'             => 800,
        'flex-width'         => true,
        'flex-height'        => true,
    ));

    // Add support for custom background
    add_theme_support('custom-background', array(
        'default-color' => 'ffffff',
    ));

    // Register navigation menus
    register_nav_menus(array(
        'primary' => esc_html__('Primary Menu', 'pemantau-csr'),
        'footer'  => esc_html__('Footer Menu', 'pemantau-csr'),
    ));

    // Add custom image sizes
    add_image_size('hero-slider', 1920, 800, true);
    add_image_size('news-thumb', 400, 250, true);
    add_image_size('company-logo', 300, 200, true);
    add_image_size('org-photo', 300, 300, true);
}
add_action('after_setup_theme', 'pemantau_csr_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet
 */
function pemantau_csr_content_width() {
    $GLOBALS['content_width'] = apply_filters('pemantau_csr_content_width', 1200);
}
add_action('after_setup_theme', 'pemantau_csr_content_width', 0);

/**
 * Enqueue scripts and styles
 */
function pemantau_csr_scripts() {
    // Enqueue main stylesheet
    wp_enqueue_style('pemantau-csr-style', get_stylesheet_uri(), array(), '1.0.0');

    // Enqueue Google Fonts
    wp_enqueue_style('pemantau-csr-fonts', 'https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap', array(), null);

    // Enqueue Font Awesome
    wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css', array(), '6.4.0');

    // Enqueue main JavaScript
    wp_enqueue_script('pemantau-csr-script', get_template_directory_uri() . '/assets/js/main.js', array('jquery'), '1.0.0', true);

    // Localize script for AJAX
    wp_localize_script('pemantau-csr-script', 'pemantau_csr_ajax', array(
        'ajax_url' => admin_url('admin-ajax.php'),
        'nonce'    => wp_create_nonce('pemantau_csr_nonce'),
    ));

    // Enqueue comment reply script
    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}
add_action('wp_enqueue_scripts', 'pemantau_csr_scripts');

/**
 * Enqueue admin scripts and styles
 */
function pemantau_csr_admin_scripts($hook) {
    // Only load on our custom pages
    if (strpos($hook, 'pemantau-csr') !== false) {
        wp_enqueue_style('pemantau-csr-admin', get_template_directory_uri() . '/admin/admin-style.css', array(), '1.0.0');
        wp_enqueue_script('pemantau-csr-admin', get_template_directory_uri() . '/admin/admin-script.js', array('jquery'), '1.0.0', true);
    }
}
add_action('admin_enqueue_scripts', 'pemantau_csr_admin_scripts');

/**
 * Include admin functions
 */
if (is_admin()) {
    $admin_files = array(
        'admin-functions.php',
        'post-types.php',
        'meta-boxes.php'
    );

    foreach ($admin_files as $file) {
        $file_path = get_template_directory() . '/admin/' . $file;
        if (file_exists($file_path)) {
            require_once $file_path;
        }
    }
}

/**
 * Register widget areas
 */
function pemantau_csr_widgets_init() {
    // Main sidebar
    register_sidebar(array(
        'name'          => esc_html__('Main Sidebar', 'pemantau-csr'),
        'id'            => 'sidebar-1',
        'description'   => esc_html__('Add widgets here to appear in your sidebar.', 'pemantau-csr'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));

    // Footer widgets
    for ($i = 1; $i <= 4; $i++) {
        register_sidebar(array(
            'name'          => sprintf(esc_html__('Footer Widget %d', 'pemantau-csr'), $i),
            'id'            => 'footer-' . $i,
            'description'   => sprintf(esc_html__('Add widgets here to appear in footer column %d.', 'pemantau-csr'), $i),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h3 class="widget-title">',
            'after_title'   => '</h3>',
        ));
    }
}
add_action('widgets_init', 'pemantau_csr_widgets_init');

/**
 * Custom excerpt length
 */
function pemantau_csr_excerpt_length($length) {
    return 25;
}
add_filter('excerpt_length', 'pemantau_csr_excerpt_length');

/**
 * Custom excerpt more text
 */
function pemantau_csr_excerpt_more($more) {
    return '...';
}
add_filter('excerpt_more', 'pemantau_csr_excerpt_more');

/**
 * Add custom body classes
 */
function pemantau_csr_body_classes($classes) {
    // Add a class if we have a custom header image
    if (get_header_image()) {
        $classes[] = 'has-header-image';
    }

    // Add a class if we have a custom logo
    if (has_custom_logo()) {
        $classes[] = 'has-custom-logo';
    }

    // Add classes for different page types
    if (is_front_page()) {
        $classes[] = 'is-front-page';
    }

    if (is_page_template('page-organisasi.php')) {
        $classes[] = 'page-organisasi';
    }

    if (is_page_template('page-perusahaan.php')) {
        $classes[] = 'page-perusahaan';
    }

    if (is_page_template('page-forum.php')) {
        $classes[] = 'page-forum';
    }

    if (is_page_template('page-contact.php')) {
        $classes[] = 'page-contact';
    }

    return $classes;
}
add_filter('body_class', 'pemantau_csr_body_classes');

/**
 * Custom pagination
 */
function pemantau_csr_pagination() {
    global $wp_query;

    $big = 999999999;
    $pages = paginate_links(array(
        'base'      => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
        'format'    => '?paged=%#%',
        'current'   => max(1, get_query_var('paged')),
        'total'     => $wp_query->max_num_pages,
        'type'      => 'array',
        'prev_text' => '<i class="fas fa-chevron-left"></i>',
        'next_text' => '<i class="fas fa-chevron-right"></i>',
    ));

    if (is_array($pages)) {
        echo '<div class="pagination"><ul>';
        foreach ($pages as $page) {
            echo "<li>$page</li>";
        }
        echo '</ul></div>';
    }
}

/**
 * Custom search form
 */
function pemantau_csr_search_form($form) {
    $form = '<form role="search" method="get" class="search-form" action="' . home_url('/') . '">
        <label>
            <span class="screen-reader-text">' . _x('Search for:', 'label', 'pemantau-csr') . '</span>
            <input type="search" class="search-field" placeholder="' . esc_attr_x('Search...', 'placeholder', 'pemantau-csr') . '" value="' . get_search_query() . '" name="s" />
        </label>
        <input type="submit" class="search-submit" value="' . esc_attr_x('Search', 'submit button', 'pemantau-csr') . '" />
    </form>';

    return $form;
}
add_filter('get_search_form', 'pemantau_csr_search_form');

/**
 * Customize comment form
 */
function pemantau_csr_comment_form_defaults($defaults) {
    $defaults['comment_notes_before'] = '';
    $defaults['comment_notes_after'] = '';
    $defaults['title_reply'] = esc_html__('Leave a Comment', 'pemantau-csr');
    $defaults['label_submit'] = esc_html__('Post Comment', 'pemantau-csr');

    return $defaults;
}
add_filter('comment_form_defaults', 'pemantau_csr_comment_form_defaults');

/**
 * Add custom CSS to admin
 */
function pemantau_csr_admin_css() {
    echo '<style>
        .post-type-slider .manage-column.column-thumbnail,
        .post-type-perusahaan .manage-column.column-thumbnail,
        .post-type-organisasi .manage-column.column-thumbnail {
            width: 80px;
        }
        .post-type-slider .column-thumbnail img,
        .post-type-perusahaan .column-thumbnail img,
        .post-type-organisasi .column-thumbnail img {
            width: 60px;
            height: 60px;
            object-fit: cover;
            border-radius: 4px;
        }
    </style>';
}
add_action('admin_head', 'pemantau_csr_admin_css');

/**
 * Add thumbnail column to admin post lists
 */
function pemantau_csr_add_thumbnail_column($columns) {
    $columns['thumbnail'] = esc_html__('Thumbnail', 'pemantau-csr');
    return $columns;
}

function pemantau_csr_show_thumbnail_column($column, $post_id) {
    if ($column == 'thumbnail') {
        if (has_post_thumbnail($post_id)) {
            echo get_the_post_thumbnail($post_id, array(60, 60));
        } else {
            echo '<span style="color: #999;">No image</span>';
        }
    }
}

// Add to custom post types
add_filter('manage_slider_posts_columns', 'pemantau_csr_add_thumbnail_column');
add_action('manage_slider_posts_custom_column', 'pemantau_csr_show_thumbnail_column', 10, 2);

add_filter('manage_perusahaan_posts_columns', 'pemantau_csr_add_thumbnail_column');
add_action('manage_perusahaan_posts_custom_column', 'pemantau_csr_show_thumbnail_column', 10, 2);

add_filter('manage_organisasi_posts_columns', 'pemantau_csr_add_thumbnail_column');
add_action('manage_organisasi_posts_custom_column', 'pemantau_csr_show_thumbnail_column', 10, 2);

/**
 * AJAX handler for contact form
 */
function pemantau_csr_handle_contact_form() {
    // Verify nonce
    if (!wp_verify_nonce($_POST['nonce'], 'pemantau_csr_nonce')) {
        wp_die('Security check failed');
    }

    // Sanitize form data
    $name = sanitize_text_field($_POST['name']);
    $email = sanitize_email($_POST['email']);
    $phone = sanitize_text_field($_POST['phone']);
    $subject = sanitize_text_field($_POST['subject']);
    $message = sanitize_textarea_field($_POST['message']);

    // Validate required fields
    if (empty($name) || empty($email) || empty($subject) || empty($message)) {
        wp_send_json_error('Please fill in all required fields.');
    }

    // Validate email
    if (!is_email($email)) {
        wp_send_json_error('Please enter a valid email address.');
    }

    // Send email
    $to = get_option('admin_email');
    $email_subject = 'Contact Form: ' . $subject;
    $email_message = "Name: $name\n";
    $email_message .= "Email: $email\n";
    $email_message .= "Phone: $phone\n\n";
    $email_message .= "Message:\n$message";

    $headers = array('Content-Type: text/html; charset=UTF-8');

    if (wp_mail($to, $email_subject, nl2br($email_message), $headers)) {
        wp_send_json_success('Thank you! Your message has been sent successfully.');
    } else {
        wp_send_json_error('Sorry, there was an error sending your message. Please try again.');
    }
}
add_action('wp_ajax_contact_form', 'pemantau_csr_handle_contact_form');
add_action('wp_ajax_nopriv_contact_form', 'pemantau_csr_handle_contact_form');

/**
 * AJAX handler for newsletter subscription
 */
function pemantau_csr_handle_newsletter() {
    // Verify nonce
    if (!wp_verify_nonce($_POST['nonce'], 'pemantau_csr_nonce')) {
        wp_die('Security check failed');
    }

    $email = sanitize_email($_POST['email']);

    if (!is_email($email)) {
        wp_send_json_error('Please enter a valid email address.');
    }

    // Here you would typically integrate with a newsletter service
    // For now, we'll just store in options or send an email

    wp_send_json_success('Thank you for subscribing to our newsletter!');
}
add_action('wp_ajax_newsletter_subscribe', 'pemantau_csr_handle_newsletter');
add_action('wp_ajax_nopriv_newsletter_subscribe', 'pemantau_csr_handle_newsletter');

/**
 * Custom login logo
 */
function pemantau_csr_login_logo() {
    $custom_logo_id = get_theme_mod('custom_logo');
    if ($custom_logo_id) {
        $logo = wp_get_attachment_image_src($custom_logo_id, 'full');
        ?>
        <style type="text/css">
            #login h1 a, .login h1 a {
                background-image: url(<?php echo esc_url($logo[0]); ?>);
                height: 80px;
                width: 320px;
                background-size: contain;
                background-repeat: no-repeat;
                padding-bottom: 30px;
            }
        </style>
        <?php
    }
}
add_action('login_enqueue_scripts', 'pemantau_csr_login_logo');

/**
 * Change login logo URL
 */
function pemantau_csr_login_logo_url() {
    return home_url();
}
add_filter('login_headerurl', 'pemantau_csr_login_logo_url');

/**
 * Change login logo title
 */
function pemantau_csr_login_logo_url_title() {
    return get_bloginfo('name');
}
add_filter('login_headertitle', 'pemantau_csr_login_logo_url_title');

/**
 * Remove admin bar for non-admins
 */
function pemantau_csr_remove_admin_bar() {
    if (!current_user_can('administrator') && !is_admin()) {
        show_admin_bar(false);
    }
}
add_action('after_setup_theme', 'pemantau_csr_remove_admin_bar');

/**
 * Disable file editing in admin
 */
if (!defined('DISALLOW_FILE_EDIT')) {
    define('DISALLOW_FILE_EDIT', true);
}

/**
 * Security headers
 */
function pemantau_csr_security_headers() {
    if (!is_admin()) {
        header('X-Content-Type-Options: nosniff');
        header('X-Frame-Options: SAMEORIGIN');
        header('X-XSS-Protection: 1; mode=block');
        header('Referrer-Policy: strict-origin-when-cross-origin');
    }
}
add_action('send_headers', 'pemantau_csr_security_headers');

/**
 * Remove WordPress version from head
 */
remove_action('wp_head', 'wp_generator');

/**
 * Remove RSD link
 */
remove_action('wp_head', 'rsd_link');

/**
 * Remove wlwmanifest link
 */
remove_action('wp_head', 'wlwmanifest_link');

/**
 * Disable XML-RPC
 */
add_filter('xmlrpc_enabled', '__return_false');

/**
 * Custom helper functions
 */

// Get slider posts
function get_slider_posts($limit = -1) {
    return get_posts(array(
        'post_type' => 'slider',
        'posts_per_page' => $limit,
        'post_status' => 'publish',
        'orderby' => 'menu_order',
        'order' => 'ASC'
    ));
}

// Get company posts
function get_company_posts($limit = -1, $category = '') {
    $args = array(
        'post_type' => 'perusahaan',
        'posts_per_page' => $limit,
        'post_status' => 'publish'
    );

    if (!empty($category)) {
        $args['meta_query'] = array(
            array(
                'key' => '_company_category',
                'value' => $category,
                'compare' => '='
            )
        );
    }

    return get_posts($args);
}

// Get organization posts
function get_organization_posts($limit = -1, $level = '') {
    $args = array(
        'post_type' => 'organisasi',
        'posts_per_page' => $limit,
        'post_status' => 'publish'
    );

    if (!empty($level)) {
        $args['meta_query'] = array(
            array(
                'key' => '_org_level',
                'value' => $level,
                'compare' => '='
            )
        );
    }

    return get_posts($args);
}

// Get social media links
function get_social_links() {
    return array(
        'facebook' => get_option('social_facebook', ''),
        'twitter' => get_option('social_twitter', ''),
        'instagram' => get_option('social_instagram', ''),
        'linkedin' => get_option('social_linkedin', ''),
        'youtube' => get_option('social_youtube', ''),
    );
}

// Get contact info
function get_contact_info() {
    return array(
        'address' => get_option('contact_address', ''),
        'phone' => get_option('contact_phone', ''),
        'email' => get_option('contact_email', ''),
        'fax' => get_option('contact_fax', ''),
    );
}

/**
 * Theme activation hook
 */
function pemantau_csr_activation() {
    // Flush rewrite rules
    flush_rewrite_rules();

    // Set default options
    $default_options = array(
        'contact_address' => 'Jl. Contoh No. 123, Jakarta, Indonesia',
        'contact_phone' => '+62 21 1234 5678',
        'contact_email' => 'info@pemantaucsr.com',
        'social_facebook' => 'https://facebook.com/pemantaucsr',
        'social_twitter' => 'https://twitter.com/pemantaucsr',
        'social_instagram' => 'https://instagram.com/pemantaucsr',
        'social_linkedin' => 'https://linkedin.com/company/pemantaucsr',
    );

    foreach ($default_options as $key => $value) {
        if (!get_option($key)) {
            add_option($key, $value);
        }
    }
}

// Run activation function when theme is activated
add_action('after_switch_theme', 'pemantau_csr_activation');

/**
 * Theme deactivation hook
 */
function pemantau_csr_deactivation() {
    // Flush rewrite rules
    flush_rewrite_rules();
}

// Run deactivation function when theme is deactivated
add_action('switch_theme', 'pemantau_csr_deactivation');

/**
 * Debug function (remove in production)
 */
if (defined('WP_DEBUG') && WP_DEBUG) {
    function pemantau_csr_debug($data) {
        echo '<pre>';
        print_r($data);
        echo '</pre>';
    }
}
// Footer menu fallback
function pemantau_csr_footer_menu_fallback() {
    echo '<ul class="footer-menu">';
    echo '<li><a href="' . home_url() . '">Home</a></li>';
    echo '<li><a href="' . home_url('/organisasi') . '">Organisasi</a></li>';
    echo '<li><a href="' . home_url('/perusahaan') . '">Perusahaan</a></li>';
    echo '<li><a href="' . home_url('/forum') . '">Forum</a></li>';
    echo '<li><a href="' . home_url('/contact') . '">Contact</a></li>';
    echo '</ul>';
}

/**
 * Fix REST API issues for custom post types
 */
function pemantau_csr_fix_rest_api() {
    // Ensure REST API is working for custom post types
    add_action('rest_api_init', function() {
        // Register REST fields for perusahaan
        register_rest_field('perusahaan', 'featured_image_url', array(
            'get_callback' => function($post) {
                if ($post['featured_media']) {
                    $image = wp_get_attachment_image_src($post['featured_media'], 'full');
                    return $image ? $image[0] : null;
                }
                return null;
            }
        ));
        
        // Register REST fields for organisasi
        register_rest_field('organisasi', 'featured_image_url', array(
            'get_callback' => function($post) {
                if ($post['featured_media']) {
                    $image = wp_get_attachment_image_src($post['featured_media'], 'full');
                    return $image ? $image[0] : null;
                }
                return null;
            }
        ));
        
        // Register REST fields for slider
        register_rest_field('slider', 'featured_image_url', array(
            'get_callback' => function($post) {
                if ($post['featured_media']) {
                    $image = wp_get_attachment_image_src($post['featured_media'], 'full');
                    return $image ? $image[0] : null;
                }
                return null;
            }
        ));
    });
}
add_action('init', 'pemantau_csr_fix_rest_api');

/**
 * Force flush rewrite rules for custom post types
 */
function pemantau_csr_force_flush_rewrites() {
    if (get_option('pemantau_csr_flush_rewrites') != 'done') {
        flush_rewrite_rules();
        update_option('pemantau_csr_flush_rewrites', 'done');
    }
}
add_action('init', 'pemantau_csr_force_flush_rewrites', 999);

/**
 * Reset flush option when theme is switched
 */
function pemantau_csr_reset_flush_option() {
    delete_option('pemantau_csr_flush_rewrites');
}
add_action('after_switch_theme', 'pemantau_csr_reset_flush_option');


/**
 * Debug REST API issues
 */
function pemantau_csr_debug_rest_api() {
    if (defined('WP_DEBUG') && WP_DEBUG) {
        add_action('wp_footer', function() {
            if (is_admin()) {
                echo '<script>console.log("REST API URL: ' . get_rest_url() . '");</script>';
                echo '<script>console.log("Perusahaan REST: ' . get_rest_url(null, 'wp/v2/perusahaan') . '");</script>';
            }
        });
    }
}
add_action('init', 'pemantau_csr_debug_rest_api');
/**
 * Fix Gutenberg REST API issues for custom post types
 */
function pemantau_csr_fix_gutenberg_rest_api() {
    // Force flush rewrite rules
    if (!get_option('pemantau_csr_permalinks_flushed')) {
        flush_rewrite_rules();
        update_option('pemantau_csr_permalinks_flushed', true);
    }
    
    // Fix REST API for Gutenberg
    add_action('rest_api_init', function() {
        // Remove default REST API restrictions
        remove_filter('rest_pre_serve_request', 'rest_send_cors_headers');
        
        // Add CORS headers for REST API
        add_action('rest_api_init', function() {
            remove_filter('rest_pre_serve_request', 'rest_send_cors_headers');
            add_filter('rest_pre_serve_request', function($value) {
                header('Access-Control-Allow-Origin: *');
                header('Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE');
                header('Access-Control-Allow-Credentials: true');
                header('Access-Control-Allow-Headers: Authorization, Content-Type, X-WP-Nonce');
                return $value;
            });
        }, 15);
    });
}
add_action('init', 'pemantau_csr_fix_gutenberg_rest_api', 1);

/**
 * Disable Gutenberg for custom post types (TEMPORARY FIX)
 */
function pemantau_csr_disable_gutenberg_for_custom_types($use_block_editor, $post_type) {
    // Disable for custom post types temporarily
    if (in_array($post_type, ['perusahaan', 'organisasi', 'slider'])) {
        return false;
    }
    return $use_block_editor;
}
add_filter('use_block_editor_for_post_type', 'pemantau_csr_disable_gutenberg_for_custom_types', 10, 2);

/**
 * Force classic editor for custom post types
 */
function pemantau_csr_force_classic_editor() {
    global $post_type;
    
    if (in_array($post_type, ['perusahaan', 'organisasi', 'slider'])) {
        add_filter('use_block_editor_for_post', '__return_false');
        
        // Add classic editor support
        add_post_type_support($post_type, 'editor');
        remove_post_type_support($post_type, 'custom-fields');
        add_post_type_support($post_type, 'custom-fields');
    }
}
add_action('admin_init', 'pemantau_csr_force_classic_editor');

/**
 * Reset permalinks option when needed
 */
function pemantau_csr_reset_permalinks_option() {
    delete_option('pemantau_csr_permalinks_flushed');
}
add_action('after_switch_theme', 'pemantau_csr_reset_permalinks_option');

/**
 * Alternative: Enable Classic Editor plugin functionality
 */
function pemantau_csr_enable_classic_editor() {
    // Force classic editor for all custom post types
    add_filter('use_block_editor_for_post_type', function($use_block_editor, $post_type) {
        if (in_array($post_type, ['perusahaan', 'organisasi', 'slider'])) {
            return false;
        }
        return $use_block_editor;
    }, 10, 2);
    
    // Ensure classic editor scripts are loaded
    add_action('admin_enqueue_scripts', function($hook) {
        global $post_type;
        
        if (in_array($post_type, ['perusahaan', 'organisasi', 'slider']) && 
            in_array($hook, ['post-new.php', 'post.php'])) {
            
            wp_enqueue_script('editor');
            wp_enqueue_script('quicktags');
            wp_enqueue_style('editor-buttons');
        }
    });
}
add_action('init', 'pemantau_csr_enable_classic_editor');

// Handle contact form submission
function handle_contact_form_submission() {
    // Verify nonce
    if (!wp_verify_nonce($_POST['contact_nonce'], 'contact_form_nonce')) {
        wp_die('Security check failed');
    }
    
    // Sanitize form data
    $nama = sanitize_text_field($_POST['nama']);
    $email = sanitize_email($_POST['email']);
    $telepon = sanitize_text_field($_POST['telepon']);
    $perusahaan = sanitize_text_field($_POST['perusahaan']);
    $subjek = sanitize_text_field($_POST['subjek']);
    $pesan = sanitize_textarea_field($_POST['pesan']);
    
    // Prepare email
    $to = get_option('admin_email');
    $subject = 'Pesan Baru dari Website - ' . $subjek;
    $message = "Nama: $nama\n";
    $message .= "Email: $email\n";
    $message .= "Telepon: $telepon\n";
    $message .= "Perusahaan: $perusahaan\n";
    $message .= "Subjek: $subjek\n\n";
    $message .= "Pesan:\n$pesan";
    
    $headers = array('Content-Type: text/plain; charset=UTF-8');
    
    // Send email
    $sent = wp_mail($to, $subject, $message, $headers);
    
    if ($sent) {
        wp_redirect(add_query_arg('contact', 'success', wp_get_referer()));
    } else {
        wp_redirect(add_query_arg('contact', 'error', wp_get_referer()));
    }
    exit;
}
add_action('admin_post_submit_contact_form', 'handle_contact_form_submission');
add_action('admin_post_nopriv_submit_contact_form', 'handle_contact_form_submission');

function enqueue_enhanced_scripts() {
    wp_enqueue_script(
        'enhanced-effects', 
        get_template_directory_uri() . '/js/enhanced-effects.js', 
        array(), 
        '1.0.0', 
        true
    );
    
    // Add Font Awesome for icons
    wp_enqueue_style(
        'font-awesome', 
        'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css'
    );
}
add_action('wp_enqueue_scripts', 'enqueue_enhanced_scripts');
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


// End of file - no closing PHP tag needed
