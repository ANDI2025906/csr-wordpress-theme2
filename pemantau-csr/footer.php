<?php
/**
 * The template for displaying the footer
 *
 * @package Pemantau_CSR
 */
?>

</main><!-- #main -->

<footer class="site-footer">
    <div class="footer-content">
        <div class="container">
            <div class="footer-grid">
                <!-- Company Info -->
                <div class="footer-section">
                    <h3>Pemantau CSR</h3>
                    <p>Platform monitoring dan evaluasi program Corporate Social Responsibility di Indonesia.</p>
                    
                    <div class="contact-info">
                        <?php
                        $contact_address = get_option('contact_address', '');
                        $contact_phone = get_option('contact_phone', '');
                        $contact_email = get_option('contact_email', '');
                        
                        if ($contact_address) : ?>
                            <p><i class="fas fa-map-marker-alt"></i> <?php echo esc_html($contact_address); ?></p>
                        <?php endif;
                        
                        if ($contact_phone) : ?>
                            <p><i class="fas fa-phone"></i> <?php echo esc_html($contact_phone); ?></p>
                        <?php endif;
                        
                        if ($contact_email) : ?>
                            <p><i class="fas fa-envelope"></i> <?php echo esc_html($contact_email); ?></p>
                        <?php endif; ?>
                    </div>
                </div>

                <!-- Quick Links -->
                <div class="footer-section">
                    <h3>Menu Cepat</h3>
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'footer',
                        'menu_class'     => 'footer-menu',
                        'container'      => false,
                        'fallback_cb'    => 'pemantau_csr_footer_menu_fallback',
                    ));
                    ?>
                </div>

                <!-- Services -->
                <div class="footer-section">
                    <h3>Layanan Kami</h3>
                    <ul class="footer-menu">
                        <li><a href="<?php echo home_url('/organisasi'); ?>">Organisasi Kepengurusan</a></li>
                        <li><a href="<?php echo home_url('/perusahaan'); ?>">Daftar Perusahaan</a></li>
                        <li><a href="<?php echo home_url('/forum'); ?>">Forum Diskusi</a></li>
                        <li><a href="<?php echo home_url('/contact'); ?>">Hubungi Kami</a></li>
                    </ul>
                </div>

                <!-- Newsletter -->
                <div class="footer-section">
                    <h3>Newsletter</h3>
                    <p>Dapatkan update terbaru tentang program CSR di Indonesia.</p>
                    
                    <form class="newsletter-form" id="newsletter-form">
                        <input type="email" name="email" placeholder="Masukkan email Anda" required>
                        <button type="submit">
                            <i class="fas fa-paper-plane"></i>
                        </button>
                    </form>
                    
                    <div class="social-links">
                        <?php
                        $social_links = array(
                            'facebook'  => get_option('social_facebook', ''),
                            'twitter'   => get_option('social_twitter', ''),
                            'instagram' => get_option('social_instagram', ''),
                            'linkedin'  => get_option('social_linkedin', ''),
                            'youtube'   => get_option('social_youtube', ''),
                        );

                        foreach ($social_links as $platform => $url) :
                            if (!empty($url)) : ?>
                                <a href="<?php echo esc_url($url); ?>" target="_blank" rel="noopener noreferrer">
                                    <i class="fab fa-<?php echo esc_attr($platform); ?>"></i>
                                </a>
                            <?php endif;
                        endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="footer-bottom">
        <div class="container">
            <div class="footer-bottom-content">
                <p>&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. All rights reserved.</p>
                <p>Developed with <i class="fas fa-heart" style="color: #e74c3c;"></i> for better CSR monitoring in Indonesia.</p>
            </div>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>

<!-- Back to top button -->
<button id="back-to-top" class="back-to-top" title="Back to top">
    <i class="fas fa-chevron-up"></i>
</button>

<script>
// Newsletter form handler
document.addEventListener('DOMContentLoaded', function() {
    const newsletterForm = document.getElementById('newsletter-form');
    if (newsletterForm) {
        newsletterForm.addEventListener('submit', function(e) {
            e.preventDefault();
            
            const formData = new FormData(this);
            formData.append('action', 'newsletter_subscribe');
            formData.append('nonce', '<?php echo wp_create_nonce("pemantau_csr_nonce"); ?>');
            
            const submitBtn = this.querySelector('button[type="submit"]');
            const originalText = submitBtn.innerHTML;
            submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i>';
            submitBtn.disabled = true;
            
            fetch('<?php echo admin_url("admin-ajax.php"); ?>', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert('Terima kasih! Anda telah berlangganan newsletter kami.');
                    this.reset();
                } else {
                    alert('Error: ' + data.data);
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Terjadi kesalahan. Silakan coba lagi.');
            })
            .finally(() => {
                submitBtn.innerHTML = originalText;
                submitBtn.disabled = false;
            });
        });
    }

    // Back to top button
    const backToTopBtn = document.getElementById('back-to-top');
    if (backToTopBtn) {
        window.addEventListener('scroll', function() {
            if (window.pageYOffset > 300) {
                backToTopBtn.style.display = 'block';
            } else {
                backToTopBtn.style.display = 'none';
            }
        });

        backToTopBtn.addEventListener('click', function() {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });
    }
});
</script>

</body>
</html>
