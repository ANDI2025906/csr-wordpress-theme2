<?php get_header(); ?>

<main class="main-content">
    <?php while (have_posts()) : the_post(); ?>
        <div class="page-header">
            <div class="container">
                <h1><?php the_title(); ?></h1>
                <nav class="breadcrumb">
                    <a href="<?php echo home_url(); ?>">Home</a> > 
                    <a href="<?php echo get_permalink(get_option('page_for_posts')); ?>">Blog</a> > 
                    <?php the_title(); ?>
                </nav>
            </div>
        </div>
        
        <article class="single-post">
            <div class="container">
                <div class="post-header">
                    <div class="post-meta">
                        <span class="post-date"><?php echo get_the_date(); ?></span>
                        <span class="post-author">Oleh <?php the_author(); ?></span>
                        <span class="post-category">
                            Kategori: <?php the_category(', '); ?>
                        </span>
                    </div>
                    
                    <?php if (has_post_thumbnail()) : ?>
                        <div class="post-featured-image">
                            <?php the_post_thumbnail('large'); ?>
                        </div>
                    <?php endif; ?>
                </div>
                
                <div class="post-content">
                    <?php the_content(); ?>
                </div>
                
                <div class="post-tags">
                    <?php the_tags('Tags: ', ', ', ''); ?>
                </div>
                
                <div class="post-navigation">
                    <div class="nav-previous">
                        <?php previous_post_link('%link', '&laquo; %title'); ?>
                    </div>
                    <div class="nav-next">
                        <?php next_post_link('%link', '%title &raquo;'); ?>
                    </div>
                </div>
            </div>
        </article>
    <?php endwhile; ?>
</main>

<?php get_footer(); ?>
