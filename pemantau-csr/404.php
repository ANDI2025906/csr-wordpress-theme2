<?php get_header(); ?>

<div class="error-page">
    <div class="container">
        <div class="error-content">
            <div class="error-illustration">
                <div class="error-number">404</div>
                <div class="error-icon">
                    <i class="fas fa-search"></i>
                </div>
            </div>
            
            <h1>Halaman Tidak Ditemukan</h1>
            <p>Maaf, halaman yang Anda cari tidak dapat ditemukan. Mungkin telah dipindahkan atau dihapus.</p>
            
            <div class="error-actions">
                <a href="<?php echo home_url(); ?>" class="btn btn-primary">
                    <i class="fas fa-home"></i> Kembali ke Beranda
                </a>
                <a href="<?php echo home_url('/contact'); ?>" class="btn btn-outline">
                    <i class="fas fa-envelope"></i> Hubungi Kami
                </a>
            </div>
            
            <div class="search-section">
                <h3>Atau coba cari yang Anda butuhkan:</h3>
                <?php get_search_form(); ?>
            </div>
        </div>
    </div>
</div>

<style>
.error-page {
    min-height: 70vh;
    display: flex;
    align-items: center;
    padding: 80px 0;
    background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
}

.error-content {
    text-align: center;
    max-width: 600px;
    margin: 0 auto;
}

.error-illustration {
    position: relative;
    margin-bottom: 40px;
}

.error-number {
    font-size: 120px;
    font-weight: 900;
    color: #667eea;
    opacity: 0.3;
    line-height: 1;
}

.error-icon {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    font-size: 40px;
    color: #667eea;
}

.error-content h1 {
    font-size: 36px;
    margin-bottom: 20px;
    color: #2c3e50;
}

.error-content p {
    font-size: 18px;
    color: #6c757d;
    margin-bottom: 40px;
    line-height: 1.6;
}

.error-actions {
    display: flex;
    gap: 20px;
    justify-content: center;
    margin-bottom: 50px;
    flex-wrap: wrap;
}

.search-section {
    background: white;
    padding: 30px;
    border-radius: 15px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.1);
}

.search-section h3 {
    margin-bottom: 20px;
    color: #2c3e50;
}
</style>

<?php get_footer(); ?>
