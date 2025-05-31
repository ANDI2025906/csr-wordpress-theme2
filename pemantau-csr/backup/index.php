<?php get_header(); ?>

<main class="main-content">
    <div class="page-header">
        <div class="container">
            <h1><?php 
                if (is_home()) {
                    echo 'Blog';
                } elseif (is_archive()) {
                    the_archive_title();
                } elseif (is_search()) {
                    echo 'Hasil Pencarian: ' . get_search_query();
                } else {
                    the_title();
                }
            ?></h1>
            <nav class="breadcrumb">
                <a href="<?php echo home_url(); ?>">Home</a> > 
                <?php 
                if (is_home()) {
                    echo 'Blog';
                } elseif (is_archive()) {
                    the_archive_title();
                } elseif (is_search()) {
                    echo 'Pencarian';
                }
                ?>
            </nav>
        </div>
    </div>
    
    <section class="content-section">
        <div class="container">
            <div class="content-grid">
                <div class="main-content-area">
                    <?php if (have_posts()) : ?>
                        <div class="posts-grid">
                            <?php while (have_posts()) : the_post(); ?>
                                <article class="post-card">
                                    <?php if (has_post_thumbnail()) : ?>
                                        <div class="post-image">
                                            <a href="<?php the_permalink(); ?>">
                                                <?php the_post_thumbnail('medium'); ?>
                                            </a>
                                        </div>
                                    <?php endif; ?>
                                    <div class="post-content">
                                        <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                                        <p class="post-meta">
                                            <span><?php echo get_the_date(); ?></span>
                                            <span>Oleh <?php the_author(); ?></span>
                                        </p>
                                        <div class="post-excerpt">
                                            <?php the_excerpt(); ?>
                                        </div>
                                        <a href="<?php the_permalink(); ?>" class="read-more">Baca Selengkapnya</a>
                                    </div>
                                </article>
                            <?php endwhile; ?>
                        </div>
                        
                        <div class="pagination">
                            <?php
                            the_posts_pagination(array(
                                'prev_text' => '&laquo; Sebelumnya',
                                'next_text' => 'Selanjutnya &raquo;',
                            ));
                            ?>
                        </div>
                    <?php else : ?>
                        <div class="no-posts">
                            <h2>Tidak ada konten ditemukan</h2>
                            <p>Maaf, tidak ada konten yang sesuai dengan pencarian Anda.</p>
                        </div>
                    <?php endif; ?>
                </div>
                
                <aside class="sidebar">
                    <div class="widget">
                        <h3>Pencarian</h3>
                        <?php get_search_form(); ?>
                    </div>
                    
                    <div class="widget">
                        <h3>Kategori</h3>
                        <ul>
                            <?php wp_list_categories(array('title_li' => '')); ?>
                        </ul>
                    </div>
                    
                    <div class="widget">
                        <h3>Arsip</h3>
                        <ul>
                            <?php wp_get_archives(array('type' => 'monthly')); ?>
                        </ul>
                    </div>
                </aside>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>
