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
                <nav class="breadcrumbs" aria-label="Breadcrumb">
                    <ol>
                        <?php foreach (breadcrumbs() as $crumb) : ?>
                        <li>
                            <?php if ($crumb->url) : ?>
                            <a href="<?php echo esc_url($crumb->url); ?>"><?php echo esc_html($crumb->name); ?></a>
                            <?php else : ?>
                            <span aria-current="page"><?php echo esc_html($crumb->name); ?></span>
                            <?php endif; ?>
                        </li>
                        <?php endforeach; ?>
                    </ol>
                </nav>

                <?php the_content();?>
            </div>

            <?php
            $other_services = get_posts(array(
                'post_type'      => 'service',
                'post_status'    => 'publish',
                'posts_per_page' => -1,
                'post__not_in'   => array(get_the_ID()),
                'orderby'        => 'menu_order title',
                'order'          => 'ASC',
            ));
            if ($other_services) : ?>
            <aside class="service-sidebar">
                <div class="sidebar-card">
                    <h3>Other Services</h3>
                    <ul class="sidebar-links">
                        <?php foreach ($other_services as $service) : ?>
                        <li><a href="<?php echo esc_url(get_permalink($service)); ?>"><?php echo esc_html(get_the_title($service)); ?></a></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </aside>
            <?php endif; ?>
        </div>
    </section>
</main>

<?php get_template_part('template-parts/footer-hero'); ?>


<?php get_footer();?>
