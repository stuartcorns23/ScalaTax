<?php get_header();?>

<main>
<section class="page-hero">
    <div class="container page-hero-grid">
        <div class="page-hero-content">
            <span class="eyebrow">Our Blog</span>
            <h1><?php echo get_the_title(); ?></h1>
            <p><?php echo get_the_excerpt(); ?></p>
        </div>
        <div class="page-hero-image">
            <img src="<?php echo get_featured_image_url(); ?>" alt="<?php echo get_the_title(); ?>">
        </div>
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="post-content">
            <?php the_content(); ?>
        </div>
    </div>
</section>
</main>

<?php get_template_part('template-parts/footer-hero'); ?>

<?php get_footer();?>