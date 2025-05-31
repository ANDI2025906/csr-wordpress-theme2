<?php
// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

// Meta boxes untuk slider
function add_slider_meta_boxes() {
    add_meta_box(
        'slider_details',
        'Detail Slider',
        'slider_meta_box_callback',
        'slider',
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'add_slider_meta_boxes');

function slider_meta_box_callback($post) {
    wp_nonce_field('save_slider_meta', 'slider_meta_nonce');
    
    $button_text = get_post_meta($post->ID, '_slider_button_text', true);
    $button_link = get_post_meta($post->ID, '_slider_button_link', true);
    
    echo '<table class="form-table">';
    echo '<tr><th><label for="slider_button_text">Teks Tombol:</label></th>';
    echo '<td><input type="text" id="slider_button_text" name="slider_button_text" value="' . esc_attr($button_text) . '" style="width:100%;" /></td></tr>';
    echo '<tr><th><label for="slider_button_link">Link Tombol:</label></th>';
    echo '<td><input type="url" id="slider_button_link" name="slider_button_link" value="' . esc_attr($button_link) . '" style="width:100%;" /></td></tr>';
    echo '</table>';
}

function save_slider_meta($post_id) {
    if (!isset($_POST['slider_meta_nonce']) || !wp_verify_nonce($_POST['slider_meta_nonce'], 'save_slider_meta')) {
        return;
    }
    
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }
    
    if (!current_user_can('edit_post', $post_id)) {
        return;
    }
    
    if (isset($_POST['slider_button_text'])) {
        update_post_meta($post_id, '_slider_button_text', sanitize_text_field($_POST['slider_button_text']));
    }
    
    if (isset($_POST['slider_button_link'])) {
        update_post_meta($post_id, '_slider_button_link', esc_url_raw($_POST['slider_button_link']));
    }
}
add_action('save_post', 'save_slider_meta');

// Meta boxes untuk organisasi
function add_organization_meta_boxes() {
    add_meta_box(
        'organization_details',
        'Detail Organisasi',
        'organization_meta_box_callback',
        'organisasi',
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'add_organization_meta_boxes');

function organization_meta_box_callback($post) {
    wp_nonce_field('save_organization_meta', 'organization_meta_nonce');
    
    $level = get_post_meta($post->ID, '_org_level', true);
    $position = get_post_meta($post->ID, '_org_position', true);
    $region = get_post_meta($post->ID, '_org_region', true);
    
    echo '<table class="form-table">';
    echo '<tr><th><label for="org_level">Tingkat:</label></th>';
    echo '<td><select id="org_level" name="org_level">';
    echo '<option value="pusat"' . selected($level, 'pusat', false) . '>Pusat</option>';
    echo '<option value="wilayah"' . selected($level, 'wilayah', false) . '>Wilayah</option>';
    echo '<option value="daerah"' . selected($level, 'daerah', false) . '>Daerah</option>';
    echo '</select></td></tr>';
    echo '<tr><th><label for="org_position">Jabatan:</label></th>';
    echo '<td><input type="text" id="org_position" name="org_position" value="' . esc_attr($position) . '" style="width:100%;" /></td></tr>';
    echo '<tr><th><label for="org_region">Wilayah/Daerah:</label></th>';
    echo '<td><input type="text" id="org_region" name="org_region" value="' . esc_attr($region) . '" style="width:100%;" placeholder="Kosongkan jika tingkat pusat" /></td></tr>';
    echo '</table>';
}

function save_organization_meta($post_id) {
    if (!isset($_POST['organization_meta_nonce']) || !wp_verify_nonce($_POST['organization_meta_nonce'], 'save_organization_meta')) {
        return;
    }
    
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }
    
    if (!current_user_can('edit_post', $post_id)) {
        return;
    }
    
    if (isset($_POST['org_level'])) {
        update_post_meta($post_id, '_org_level', sanitize_text_field($_POST['org_level']));
    }
    
    if (isset($_POST['org_position'])) {
        update_post_meta($post_id, '_org_position', sanitize_text_field($_POST['org_position']));
    }
    
    if (isset($_POST['org_region'])) {
        update_post_meta($post_id, '_org_region', sanitize_text_field($_POST['org_region']));
    }
}
add_action('save_post', 'save_organization_meta');

// Meta boxes untuk perusahaan
function add_company_meta_boxes() {
    add_meta_box(
        'company_details',
        'Detail Perusahaan',
        'company_meta_box_callback',
        'perusahaan',
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'add_company_meta_boxes');

function company_meta_box_callback($post) {
    wp_nonce_field('save_company_meta', 'company_meta_nonce');
    
    $category = get_post_meta($post->ID, '_company_category', true);
    $website = get_post_meta($post->ID, '_company_website', true);
    $phone = get_post_meta($post->ID, '_company_phone', true);
    $address = get_post_meta($post->ID, '_company_address', true);
    
    echo '<table class="form-table">';
    echo '<tr><th><label for="company_category">Kategori:</label></th>';
    echo '<td><select id="company_category" name="company_category">';
    echo '<option value="bumn"' . selected($category, 'bumn', false) . '>BUMN</option>';
    echo '<option value="swasta"' . selected($category, 'swasta', false) . '>Swasta</option>';
    echo '<option value="asing"' . selected($category, 'asing', false) . '>Asing</option>';
    echo '</select></td></tr>';
    echo '<tr><th><label for="company_website">Website:</label></th>';
    echo '<td><input type="url" id="company_website" name="company_website" value="' . esc_attr($website) . '" style="width:100%;" /></td></tr>';
    echo '<tr><th><label for="company_phone">Telepon:</label></th>';
    echo '<td><input type="text" id="company_phone" name="company_phone" value="' . esc_attr($phone) . '" style="width:100%;" /></td></tr>';
    echo '<tr><th><label for="company_address">Alamat:</label></th>';
    echo '<td><textarea id="company_address" name="company_address" rows="3" style="width:100%;">' . esc_textarea($address) . '</textarea></td></tr>';
    echo '</table>';
}

function save_company_meta($post_id) {
    if (!isset($_POST['company_meta_nonce']) || !wp_verify_nonce($_POST['company_meta_nonce'], 'save_company_meta')) {
        return;
    }
    
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }
    
    if (!current_user_can('edit_post', $post_id)) {
        return;
    }
    
    if (isset($_POST['company_category'])) {
        update_post_meta($post_id, '_company_category', sanitize_text_field($_POST['company_category']));
    }
    
    if (isset($_POST['company_website'])) {
        update_post_meta($post_id, '_company_website', esc_url_raw($_POST['company_website']));
    }
    
    if (isset($_POST['company_phone'])) {
        update_post_meta($post_id, '_company_phone', sanitize_text_field($_POST['company_phone']));
    }
    
    if (isset($_POST['company_address'])) {
        update_post_meta($post_id, '_company_address', sanitize_textarea_field($_POST['company_address']));
    }
}
add_action('save_post', 'save_company_meta');
?>
