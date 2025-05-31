<?php get_header(); ?>

<div class="contact-page">
    <!-- Hero Section -->
    <section class="contact-hero">
        <div class="container">
            <div class="hero-content">
                <h1>Hubungi Kami</h1>
                <p>Kami siap membantu Anda dalam mengembangkan program CSR yang berkelanjutan</p>
            </div>
        </div>
    </section>

    <!-- Main Contact Content -->
    <section class="contact-main">
        <div class="container">
            <div class="contact-grid">
                <!-- Contact Form - Minimalis -->
                <div class="contact-form-section">
                    <div class="section-header">
                        <h2>Kirim Pesan</h2>
                        <p>Sampaikan pertanyaan atau saran Anda</p>
                    </div>
                    
                    <?php if (isset($_GET['status']) && $_GET['status'] == 'success'): ?>
                        <div class="alert alert-success">
                            <i class="fas fa-check-circle"></i>
                            Terima kasih! Pesan Anda telah berhasil dikirim.
                        </div>
                    <?php elseif (isset($_GET['status']) && $_GET['status'] == 'error'): ?>
                        <div class="alert alert-error">
                            <i class="fas fa-exclamation-circle"></i>
                            Maaf, terjadi kesalahan. Silakan coba lagi.
                        </div>
                    <?php endif; ?>

                    <form id="contactForm" method="post" action="<?php echo esc_url(admin_url('admin-post.php')); ?>" class="compact-form">
                        <input type="hidden" name="action" value="submit_contact_form">
                        <?php wp_nonce_field('contact_form_nonce', 'contact_nonce'); ?>
                        
                        <div class="form-row">
                            <div class="form-group">
                                <input type="text" name="nama" class="form-control" placeholder="Nama Lengkap *" required>
                            </div>
                            <div class="form-group">
                                <input type="email" name="email" class="form-control" placeholder="Email *" required>
                            </div>
                        </div>
                        
                        <div class="form-row">
                            <div class="form-group">
                                <input type="text" name="perusahaan" class="form-control" placeholder="Perusahaan">
                            </div>
                            <div class="form-group">
                                <input type="tel" name="telepon" class="form-control" placeholder="Nomor Telepon">
                            </div>
                        </div>
                        
                        <div class="form-row">
                            <div class="form-group">
                                <select name="kategori" class="form-control" required>
                                    <option value="">Pilih Kategori *</option>
                                    <option value="kemitraan">Kemitraan CSR</option>
                                    <option value="konsultasi">Konsultasi Program</option>
                                    <option value="informasi">Informasi Umum</option>
                                    <option value="media">Media & Press</option>
                                    <option value="lainnya">Lainnya</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <input type="text" name="subjek" class="form-control" placeholder="Subjek *" required>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <textarea name="pesan" class="form-control" rows="4" placeholder="Pesan Anda *" required></textarea>
                        </div>
                        
                        <div class="form-actions">
                            <label class="checkbox-label">
                                <input type="checkbox" name="newsletter">
                                <span class="checkmark"></span>
                                Saya ingin menerima newsletter
                            </label>
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-paper-plane"></i>
                                Kirim Pesan
                            </button>
                        </div>
                    </form>
                </div>

                <!-- Contact Info & Social - Minimalis -->
                <div class="contact-info-section">
                    <!-- Informasi Kontak - 1 Baris -->
                    <div class="contact-info-compact">
                        <h3>Informasi Kontak</h3>
                        <div class="info-row">
                            <div class="info-item">
                                <i class="fas fa-map-marker-alt"></i>
                                <div>
                                    <strong>Alamat</strong>
                                    <span>Jl. Sudirman No. 123, Jakarta Pusat 10220</span>
                                </div>
                            </div>
                            <div class="info-item">
                                <i class="fas fa-phone"></i>
                                <div>
                                    <strong>Telepon</strong>
                                    <span>+62 21 1234 5678</span>
                                </div>
                            </div>
                            <div class="info-item">
                                <i class="fas fa-envelope"></i>
                                <div>
                                    <strong>Email</strong>
                                    <span>info@pemantaucsr.id</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Social Media - Minimalis -->
                    <div class="social-section-compact">
                        <h3>Ikuti Kami</h3>
                        <div class="social-links">
                            <a href="#" class="social-link facebook">
                                <i class="fab fa-facebook-f"></i>
                                <span>Facebook</span>
                            </a>
                            <a href="#" class="social-link twitter">
                                <i class="fab fa-twitter"></i>
                                <span>Twitter</span>
                            </a>
                            <a href="#" class="social-link instagram">
                                <i class="fab fa-instagram"></i>
                                <span>Instagram</span>
                            </a>
                            <a href="#" class="social-link linkedin">
                                <i class="fab fa-linkedin-in"></i>
                                <span>LinkedIn</span>
                            </a>
                        </div>
                    </div>

                    <!-- Map - Minimalis -->
                    <div class="map-section-compact">
                        <h3>Lokasi Kami</h3>
                        <div class="map-container">
                            <iframe 
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.521260322283!2d106.8195613507864!3d-6.194637395493371!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f5390917b759%3A0x6b45e67356080477!2sBundle%20Indonesia!5e0!3m2!1sen!2sid!4v1635724087890!5m2!1sen!2sid" 
                                style="border:0;" 
                                allowfullscreen="" 
                                loading="lazy">
                            </iframe>
                            <div class="map-overlay">
                                <i class="fas fa-map-marker-alt"></i>
                                <span>Jakarta Pusat</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<style>
/* ===== CONTACT PAGE MINIMALIS STYLES ===== */

.contact-page {
    background: #f8f9fa;
}

.contact-hero {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white;
    padding: 60px 0;
    text-align: center;
}

.contact-hero h1 {
    font-size: 2.5rem;
    margin-bottom: 15px;
    font-weight: 700;
}

.contact-hero p {
    font-size: 1.1rem;
    opacity: 0.9;
    max-width: 600px;
    margin: 0 auto;
}

.contact-main {
    padding: 60px 0;
}

.contact-grid {
    display: grid;
    grid-template-columns: 1fr 400px;
    gap: 40px;
    align-items: start;
}

/* ===== FORM SECTION - COMPACT ===== */
.contact-form-section {
    background: white;
    padding: 30px;
    border-radius: 15px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.1);
}

.section-header {
    margin-bottom: 25px;
    text-align: center;
}

.section-header h2 {
    font-size: 1.8rem;
    color: #2c3e50;
    margin-bottom: 8px;
}

.section-header p {
    color: #6c757d;
    font-size: 0.95rem;
}

.compact-form .form-row {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 15px;
    margin-bottom: 15px;
}

.compact-form .form-group {
    margin-bottom: 0;
}

.compact-form .form-control {
    padding: 12px 15px;
    border: 2px solid #e9ecef;
    border-radius: 8px;
    font-size: 0.95rem;
    transition: all 0.3s ease;
}

.compact-form .form-control:focus {
    border-color: #667eea;
    box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
}

.compact-form textarea.form-control {
    resize: vertical;
    min-height: 100px;
}

.form-actions {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-top: 20px;
}

.checkbox-label {
    display: flex;
    align-items: center;
    font-size: 0.9rem;
    color: #6c757d;
    cursor: pointer;
}

.checkbox-label input[type="checkbox"] {
    margin-right: 8px;
}

/* ===== INFO SECTION - COMPACT ===== */
.contact-info-section {
    display: flex;
    flex-direction: column;
    gap: 25px;
}

.contact-info-compact,
.social-section-compact,
.map-section-compact {
    background: white;
    padding: 25px;
    border-radius: 15px;
    box-shadow: 0 5px 20px rgba(0,0,0,0.08);
}

.contact-info-compact h3,
.social-section-compact h3,
.map-section-compact h3 {
    font-size: 1.3rem;
    color: #2c3e50;
    margin-bottom: 15px;
    text-align: center;
}

/* Info Row - 1 Baris */
.info-row {
    display: flex;
    flex-direction: column;
    gap: 15px;
}

.info-item {
    display: flex;
    align-items: center;
    gap: 12px;
    padding: 12px;
    background: #f8f9fa;
    border-radius: 8px;
    transition: all 0.3s ease;
}

.info-item:hover {
    background: #e9ecef;
    transform: translateX(5px);
}

.info-item i {
    width: 20px;
    text-align: center;
    color: #667eea;
    font-size: 1.1rem;
}

.info-item div {
    flex: 1;
}

.info-item strong {
    display: block;
    font-size: 0.85rem;
    color: #495057;
    margin-bottom: 2px;
}

.info-item span {
    font-size: 0.9rem;
    color: #6c757d;
}

/* Social Links - Minimalis */
.social-links {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 10px;
}

.social-link {
    display: flex;
    align-items: center;
    gap: 8px;
    padding: 10px 12px;
    border-radius: 8px;
    text-decoration: none;
    font-size: 0.9rem;
    font-weight: 500;
    transition: all 0.3s ease;
}

.social-link.facebook {
    background: #f8f9fa;
    color: #1877f2;
}

.social-link.twitter {
    background: #f8f9fa;
    color: #1da1f2;
}

.social-link.instagram {
    background: #f8f9fa;
    color: #e4405f;
}

.social-link.linkedin {
    background: #f8f9fa;
    color: #0077b5;
}

.social-link:hover {
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
}

.social-link.facebook:hover { background: #1877f2; color: white; }
.social-link.twitter:hover { background: #1da1f2; color: white; }
.social-link.instagram:hover { background: #e4405f; color: white; }
.social-link.linkedin:hover { background: #0077b5; color: white; }

/* Map - Minimalis */
.map-container {
    position: relative;
    height: 200px;
    border-radius: 10px;
    overflow: hidden;
}

.map-container iframe {
    width: 100%;
    height: 100%;
}

.map-overlay {
    position: absolute;
    top: 15px;
    left: 15px;
    background: rgba(255,255,255,0.95);
    padding: 8px 12px;
    border-radius: 20px;
    display: flex;
    align-items: center;
    gap: 6px;
    font-size: 0.85rem;
    font-weight: 500;
    color: #2c3e50;
    box-shadow: 0 2px 10px rgba(0,0,0,0.1);
}

.map-overlay i {
    color: #667eea;
}

/* ===== RESPONSIVE ===== */
@media (max-width: 768px) {
    .contact-grid {
        grid-template-columns: 1fr;
        gap: 30px;
    }
    
    .contact-hero {
        padding: 40px 0;
    }
    
    .contact-hero h1 {
        font-size: 2rem;
    }
    
    .compact-form .form-row {
        grid-template-columns: 1fr;
        gap: 15px;
    }
    
    .form-actions {
        flex-direction: column;
        gap: 15px;
        align-items: stretch;
    }
    
    .social-links {
        grid-template-columns: 1fr;
    }
    
    .info-row {
        gap: 12px;
    }
    
    .contact-form-section,
    .contact-info-compact,
    .social-section-compact,
    .map-section-compact {
        padding: 20px;
    }
}

@media (max-width: 480px) {
    .contact-main {
        padding: 40px 0;
    }
    
    .info-item {
        padding: 10px;
    }
    
    .info-item strong {
        font-size: 0.8rem;
    }
    
    .info-item span {
        font-size: 0.85rem;
    }
}

/* ===== ALERTS ===== */
.alert {
    padding: 15px 20px;
    border-radius: 8px;
    margin-bottom: 20px;
    display: flex;
    align-items: center;
    gap: 10px;
    font-size: 0.95rem;
}

.alert-success {
    background: #d4edda;
    color: #155724;
    border: 1px solid #c3e6cb;
}

.alert-error {
    background: #f8d7da;
    color: #721c24;
    border: 1px solid #f5c6cb;
}
</style>

<?php get_footer(); ?>
