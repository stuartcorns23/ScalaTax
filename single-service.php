<?php get_header();?>

<main>
    <section class="page-hero">
        <div class="container page-hero-grid">
            <div class="page-hero-content">
                <span class="eyebrow">Our Services</span>
                <h1><?php the_title();?></h1>
            </div>
            <div class="page-hero-image">
                <img src="<?php echo esc_url(get_the_post_thumbnail_url(get_the_ID(), 'full')); ?>" alt="<?php echo esc_attr(get_the_title()); ?>">
            </div>
        </div>
    </section>

    <section class="section">
        <div class="container service-layout">
            <div class="service-main">
                <?php get_template_part('template-parts/breadcrumbs'); ?>

                <?php the_content();?>
            </div>

            <?php get_template_part('template-parts/sidebar-services', null, array(
                'title'   => 'Other Services',
                'exclude' => array(get_the_ID()),
            )); ?>
        </div>
    </section>
</main>

<?php get_template_part('template-parts/footer-hero'); ?>


<?php get_footer();?>
