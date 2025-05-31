<?php
// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

// Add admin menu
function pemantau_csr_admin_menu() {
    add_menu_page(
        'Pengaturan Website',
        'Pengaturan Website',
        'manage_options',
        'pemantau-csr-settings',
        'pemantau_csr_settings_page',
        'dashicons-admin-generic',
        30
    );
    
    add_submenu_page(
        'pemantau-csr-settings',
        'Manajemen Konten',
        'Manajemen Konten',
        'manage_options',
        'pemantau-csr-content',
        'pemantau_csr_content_page'
    );
}
add_action('admin_menu', 'pemantau_csr_admin_menu');

// Settings page callback
function pemantau_csr_settings_page() {
    if (isset($_POST['submit'])) {
        // Save settings
        update_option('site_logo', sanitize_text_field($_POST['site_logo']));
        update_option('contact_address', sanitize_textarea_field($_POST['contact_address']));
        update_option('contact_phone', sanitize_text_field($_POST['contact_phone']));
        update_option('contact_email', sanitize_email($_POST['contact_email']));
        update_option('social_facebook', esc_url_raw($_POST['social_facebook']));
        update_option('social_twitter', esc_url_raw($_POST['social_twitter']));
        update_option('social_instagram', esc_url_raw($_POST['social_instagram']));
        update_option('social_linkedin', esc_url_raw($_POST['social_linkedin']));
        
        echo '<div class="notice notice-success"><p>Pengaturan berhasil disimpan!</p></div>';
    }
    
    // Get current values
    $site_logo = get_option('site_logo', '');
    $contact_address = get_option('contact_address', '');
    $contact_phone = get_option('contact_phone', '');
    $contact_email = get_option('contact_email', '');
    $social_facebook = get_option('social_facebook', '');
    $social_twitter = get_option('social_twitter', '');
    $social_instagram = get_option('social_instagram', '');
    $social_linkedin = get_option('social_linkedin', '');
    ?>
    
    <div class="wrap">
        <h1>Pengaturan Website</h1>
        
        <form method="post" action="">
            <table class="form-table">
                <tr>
                    <th scope="row">Logo Website</th>
                    <td>
                        <input type="text" name="site_logo" value="<?php echo esc_attr($site_logo); ?>" class="regular-text" placeholder="URL Logo" />
                        <p class="description">Masukkan URL logo website</p>
                    </td>
                </tr>
                
                <tr>
                    <th scope="row">Alamat</th>
                    <td>
                        <textarea name="contact_address" rows="3" cols="50"><?php echo esc_textarea($contact_address); ?></textarea>
                    </td>
                </tr>
                
                <tr>
                    <th scope="row">Telepon</th>
                    <td>
                        <input type="text" name="contact_phone" value="<?php echo esc_attr($contact_phone); ?>" class="regular-text" />
                    </td>
                </tr>
                
                <tr>
                    <th scope="row">Email</th>
                    <td>
                        <input type="email" name="contact_email" value="<?php echo esc_attr($contact_email); ?>" class="regular-text" />
                    </td>
                </tr>
                
                <tr>
                    <th scope="row">Facebook</th>
                    <td>
                        <input type="url" name="social_facebook" value="<?php echo esc_attr($social_facebook); ?>" class="regular-text" />
                    </td>
                </tr>
                
                <tr>
                    <th scope="row">Twitter</th>
                    <td>
                        <input type="url" name="social_twitter" value="<?php echo esc_attr($social_twitter); ?>" class="regular-text" />
                    </td>
                </tr>
                
                <tr>
                    <th scope="row">Instagram</th>
                    <td>
                        <input type="url" name="social_instagram" value="<?php echo esc_attr($social_instagram); ?>" class="regular-text" />
                    </td>
                </tr>
                
                <tr>
                    <th scope="row">LinkedIn</th>
                    <td>
                        <input type="url" name="social_linkedin" value="<?php echo esc_attr($social_linkedin); ?>" class="regular-text" />
                    </td>
                </tr>
            </table>
            
            <?php submit_button('Simpan Pengaturan'); ?>
        </form>
    </div>
    <?php
}

// Content management page
function pemantau_csr_content_page() {
    ?>
    <div class="wrap">
        <h1>Manajemen Konten</h1>
        
        <div class="card">
            <h2>Statistik Konten</h2>
            <table class="wp-list-table widefat fixed striped">
                <thead>
                    <tr>
                        <th>Jenis Konten</th>
                        <th>Jumlah</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Slider</td>
                        <td><?php echo wp_count_posts('slider')->publish; ?></td>
                        <td><a href="<?php echo admin_url('edit.php?post_type=slider'); ?>" class="button">Kelola</a></td>
                    </tr>
                    <tr>
                        <td>Perusahaan</td>
                        <td><?php echo wp_count_posts('perusahaan')->publish; ?></td>
                        <td><a href="<?php echo admin_url('edit.php?post_type=perusahaan'); ?>" class="button">Kelola</a></td>
                    </tr>
                    <tr>
                        <td>Organisasi</td>
                        <td><?php echo wp_count_posts('organisasi')->publish; ?></td>
                        <td><a href="<?php echo admin_url('edit.php?post_type=organisasi'); ?>" class="button">Kelola</a></td>
                    </tr>
                    <tr>
                        <td>Posting</td>
                        <td><?php echo wp_count_posts('post')->publish; ?></td>
                        <td><a href="<?php echo admin_url('edit.php'); ?>" class="button">Kelola</a></td>
                    </tr>
                    <tr>
                        <td>Halaman</td>
                        <td><?php echo wp_count_posts('page')->publish; ?></td>
                        <td><a href="<?php echo admin_url('edit.php?post_type=page'); ?>" class="button">Kelola</a></td>
                    </tr>
                </tbody>
            </table>
        </div>
        
        <div class="card">
            <h2>Aksi Cepat</h2>
            <p>
                <a href="<?php echo admin_url('post-new.php?post_type=slider'); ?>" class="button button-primary">Tambah Slider Baru</a>
                <a href="<?php echo admin_url('post-new.php?post_type=perusahaan'); ?>" class="button button-primary">Tambah Perusahaan Baru</a>
                <a href="<?php echo admin_url('post-new.php?post_type=organisasi'); ?>" class="button button-primary">Tambah Organisasi Baru</a>
            </p>
        </div>
    </div>
    <?php
}

// Add custom CSS for admin
function pemantau_csr_admin_styles() {
    ?>
    <style>
        .card {
            background: #fff;
            border: 1px solid #ccd0d4;
            border-radius: 4px;
            padding: 20px;
            margin: 20px 0;
            box-shadow: 0 1px 1px rgba(0,0,0,.04);
        }
        .card h2 {
            margin-top: 0;
        }
    </style>
    <?php
}
add_action('admin_head', 'pemantau_csr_admin_styles');
?>
