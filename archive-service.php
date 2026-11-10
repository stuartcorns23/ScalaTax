<?php get_header();?>

<main>
<section class="page-hero">
    <div class="container page-hero-grid">
        <div class="page-hero-content">
            <span class="eyebrow"><?php echo get_theme_mod('services-eyebrow', 'Our Services'); ?></span>
            <h1><?php echo get_theme_mod('services-title', 'Expert tax support, when you need it most.'); ?></h1>
            <p><?php echo get_theme_mod('services-description', 'Specialist advice and support for HMRC enquiries, disputes and voluntary disclosures. We help you understand the process and the options available for your circumstances.'); ?></p>
        </div>
        <div class="page-hero-image">
            <img src="<?php echo get_theme_mod('services-featured-image', 'https://images.unsplash.com/photo-1497366754035-f200968a6e72?auto=format&fit=crop&w=1200&q=85'); ?>" alt="Professional office workspace">
        </div>
    </div>
</section>
<section class="section">
    <div class="container">

        <div class="services-grid">

            <?php
            $services = new WP_Query(array(
                'post_type' => 'service',
                'post_status' => 'publish',
                'posts_per_page' => -1,
                'orderby' => array(
                    'menu_order' => 'ASC',
                    'title' => 'ASC',
                ),
            ));

            while ($services->have_posts()) :
                $services->the_post();
            ?>
            <article class="service-card">
                <div class="service-icon">✓</div>
                <h3><?php the_title(); ?></h3>
                <p><?php echo esc_html(get_the_excerpt()); ?></p>
                <a class="text-link" href="<?php the_permalink(); ?>">Read more →</a>
            </article>
            <?php
            endwhile;
            wp_reset_postdata();
            ?>

        </div>
    </div>
</section>
</main>

<?php get_template_part('template-parts/footer-hero'); ?>

<?php get_footer();?>