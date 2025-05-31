<?php
get_header();
?>

<div class="container">
    <?php while (have_posts()) : the_post(); ?>
        <div class="row">
            <div class="col-lg-8">
                <article class="perusahaan-detail">
                    <header class="entry-header mb-4">
                        <h1 class="entry-title"><?php the_title(); ?></h1>
                        
                        <?php 
                        $status = get_field('status_perusahaan');
                        if ($status) :
                        ?>
                            <span class="badge badge-<?php echo ($status == 'aktif') ? 'success' : 'secondary'; ?> mb-3">
                                <?php echo ($status == 'aktif') ? 'Aktif' : 'Tidak Aktif'; ?>
                            </span>
                        <?php endif; ?>
                    </header>

                    <div class="entry-content">
                        <?php the_content(); ?>
                    </div>
                </article>
            </div>
            
            <div class="col-lg-4">
                <div class="perusahaan-sidebar">
                    <?php 
                    $logo = get_field('logo_perusahaan');
                    if ($logo) : 
                    ?>
                        <div class="perusahaan-logo mb-4">
                            <img src="<?php echo esc_url($logo['url']); ?>" 
                                 class="img-fluid" 
                                 alt="<?php echo esc_attr($logo['alt']); ?>">
                        </div>
                    <?php endif; ?>

                    <div class="perusahaan-info card">
                        <div class="card-header">
                            <h5>Informasi Perusahaan</h5>
                        </div>
                        <div class="card-body">
                            <?php if (get_field('bidang_usaha')) : ?>
                                <p><strong>Bidang Usaha:</strong><br>
                                <?php echo esc_html(get_field('bidang_usaha')); ?></p>
                            <?php endif; ?>

                            <?php if (get_field('tahun_berdiri')) : ?>
                                <p><strong>Tahun Berdiri:</strong><br>
                                <?php echo esc_html(get_field('tahun_berdiri')); ?></p>
                            <?php endif; ?>

                            <?php if (get_field('jumlah_karyawan')) : ?>
                                <p><strong>Jumlah Karyawan:</strong><br>
                                <?php echo esc_html(get_field('jumlah_karyawan')); ?> orang</p>
                            <?php endif; ?>

                            <?php if (get_field('alamat_perusahaan')) : ?>
                                <p><strong>Alamat:</strong><br>
                                <?php echo nl2br(esc_html(get_field('alamat_perusahaan'))); ?></p>
                            <?php endif; ?>

                            <?php if (get_field('telepon')) : ?>
                                <p><strong>Telepon:</strong><br>
                                <a href="tel:<?php echo esc_attr(get_field('telepon')); ?>">
                                    <?php echo esc_html(get_field('telepon')); ?>
                                </a></p>
                            <?php endif; ?>

                            <?php if (get_field('email')) : ?>
                                <p><strong>Email:</strong><br>
                                <a href="mailto:<?php echo esc_attr(get_field('email')); ?>">
                                    <?php echo esc_html(get_field('email')); ?>
                                </a></p>
                            <?php endif; ?>

                            <?php if (get_field('website')) : ?>
                                <p><strong>Website:</strong><br>
                                <a href="<?php echo esc_url(get_field('website')); ?>" target="_blank">
                                    <?php echo esc_html(get_field('website')); ?>
                                </a></p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endwhile; ?>
</div>

<?php
get_footer();
?>
