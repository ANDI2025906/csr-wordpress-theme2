<?php get_header(); ?>

<!-- Hero Slider -->
<section class="hero-slider">
    <?php
    $slides = get_posts(array(
        'post_type' => 'slider',
        'posts_per_page' => -1,
        'post_status' => 'publish'
    ));
    
    if ($slides) :
        foreach ($slides as $index => $slide) :
            $image = get_the_post_thumbnail_url($slide->ID, 'full');
            $subtitle = get_post_meta($slide->ID, '_slider_subtitle', true);
            $button_text = get_post_meta($slide->ID, '_slider_button_text', true);
            $button_link = get_post_meta($slide->ID, '_slider_button_link', true);
    ?>
    <div class="slide <?php echo $index === 0 ? 'active' : ''; ?>" style="background-image: url('<?php echo $image; ?>');">
        <div class="slide-content">
            <h2><?php echo get_the_title($slide->ID); ?></h2>
            <?php if ($subtitle) : ?>
                <p><?php echo $subtitle; ?></p>
            <?php endif; ?>
            <?php if ($button_text && $button_link) : ?>
                <a href="<?php echo $button_link; ?>" class="btn btn-primary"><?php echo $button_text; ?></a>
            <?php endif; ?>
        </div>
    </div>
    <?php 
        endforeach;
    else :
    ?>
    <div class="slide active" style="background: linear-gradient(135deg, #2c5aa0, #1e3a8a);">
        <div class="slide-content">
            <h2>Visi MP-TJSL</h2>
            <p>Menjadi lembaga pemantau CSR terdepan di Indonesia</p>
        </div>
    </div>
    <?php endif; ?>
</section>

<!-- Services Section -->
<section class="services">
    <div class="container">
        <h2 class="section-title">Layanan Kami</h2>
        <div class="services-grid">
            <div class="service-card">
                <div class="service-icon">
                    <i class="fas fa-search"></i>
                </div>
                <h3>CSR Monitoring</h3>
                <p>Pemantauan dan evaluasi program CSR perusahaan secara komprehensif</p>
            </div>
            <div class="service-card">
                <div class="service-icon">
                    <i class="fas fa-chart-line"></i>
                </div>
                <h3>Program Evaluation</h3>
                <p>Evaluasi dampak dan efektivitas program CSR terhadap masyarakat</p>
            </div>
            <div class="service-card">
                <div class="service-icon">
                    <i class="fas fa-graduation-cap"></i>
                </div>
                <h3>Training & Capacity Building</h3>
                <p>Pelatihan dan pengembangan kapasitas dalam pengelolaan CSR</p>
            </div>
            <div class="service-card">
                <div class="service-icon">
                    <i class="fas fa-handshake"></i>
                </div>
                <h3>Konsultasi & Pendampingan</h3>
                <p>Konsultasi dan pendampingan implementasi program CSR</p>
            </div>
        </div>
    </div>
</section>

<!-- About Section -->
<section class="about">
    <div class="container">
        <div class="about-grid">
            <div class="about-content">
                <h2>Tentang Pemantau CSR</h2>
                <p>Pemantau CSR adalah lembaga independen yang berkomitmen untuk memantau, mengevaluasi, dan meningkatkan kualitas program Corporate Social Responsibility (CSR) di Indonesia.</p>
                <p>Kami hadir untuk memastikan program CSR berjalan efektif dan memberikan dampak positif bagi masyarakat dan lingkungan.</p>
                <a href="#" class="btn btn-outline">Selengkapnya</a>
            </div>
            <div class="about-content">
                <h2>CSR Program</h2>
                <p>Kami mengembangkan berbagai program untuk mendukung implementasi CSR yang berkelanjutan, mulai dari pelatihan, konsultasi, hingga evaluasi dampak.</p>
                <ul>
                    <li>Program Sertifikasi CSR</li>
                    <li>Workshop dan Seminar</li>
                    <li>Penelitian dan Publikasi</li>
                    <li>Jaringan Stakeholder</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<!-- News Section -->
<section class="news">
    <div class="container">
        <h2 class="section-title">News Update</h2>
        <div class="news-tabs">
            <button class="tab-button active" data-tab="berita">Berita</button>
            <button class="tab-button" data-tab="video">Video</button>
            <button class="tab-button" data-tab="galeri">Galeri Foto</button>
        </div>
        
        <div class="tab-content" id="berita">
            <div class="news-grid">
                <?php
                $recent_posts = get_posts(array(
                    'numberposts' => 6,
                    'post_status' => 'publish'
                ));
                
                foreach ($recent_posts as $post) :
                    setup_postdata($post);
                ?>
                <article class="news-card">
                    <?php if (has_post_thumbnail()) : ?>
                        <div class="news-image">
                            <?php the_post_thumbnail('medium'); ?>
                        </div>
                    <?php endif; ?>
                    <div class="news-content">
                        <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                        <p class="news-date"><?php echo get_the_date(); ?></p>
                        <p><?php echo wp_trim_words(get_the_excerpt(), 20); ?></p>
                        <a href="<?php the_permalink(); ?>" class="read-more">Baca Selengkapnya</a>
                    </div>
                </article>
                <?php endforeach; wp_reset_postdata(); ?>
            </div>
        </div>
        
        <div class="tab-content" id="video" style="display: none;">
            <p>Konten video akan ditampilkan di sini</p>
        </div>
        
        <div class="tab-content" id="galeri" style="display: none;">
            <p>Galeri foto akan ditampilkan di sini</p>
        </div>
    </div>
</section>

<?php get_footer(); ?>
