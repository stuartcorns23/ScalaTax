<?php function_exists('get_header') ? get_header() : ''; ?>
<main>
    <section class="hero">
        <div class="container hero-grid">
            <div class="hero-content">
                <span class="eyebrow"><?php echo get_theme_mod('hero-eyebrow');?></span>
                <h1><?php echo get_theme_mod('hero-title');?></h1>
                <p><?php echo get_theme_mod('hero-description');?></p>
                <div class="hero-actions">
                    <a href="<?php echo get_theme_mod('hero-link-1-url');?>" class="btn btn--primary">
                        <?php echo get_theme_mod('hero-link-1-text');?>
                    </a>
                    <a href="<?php echo get_theme_mod('hero-link-2-url');?>" class="text-link">
                        <?php echo get_theme_mod('hero-link-2-text');?> →
                    </a>
                </div>
            </div>
            <div class="hero-image">
                <img src="<?php echo get_theme_mod('hero-image');?>" alt="Bright, modern professional office">
            </div>
        </div>
    </section>

    <section class="feature-strip">
        <div class="container feature-grid">
        <?php for ($number = 1; $number <= 4; $number++) :?>
        <div class="feature-item">
            <div class="feature-icon" aria-hidden="true">
                <img src="<?php echo get_theme_mod("icon-group-{$number}-icon");?>" width="20px" height="20px" />
            </div>
            <div>
                <h3><?php echo get_theme_mod("icon-group-{$number}-title");?></h3>
                <p><?php echo get_theme_mod("icon-group-{$number}-description");?></p>
            </div>
        </div>
        <?php endfor;?>
        </div>
    </section>

    <section class="section"><div class="container">
        <div class="section-heading">
            <span class="eyebrow"><?php echo get_theme_mod("service-area-eyebrow");?></span>
            <h2><?php echo get_theme_mod("service-area-title");?></h2>
            <p><?php echo get_theme_mod("service-area-description");?></p>
        </div>
        <div class="services-grid">
            <?php for ($number = 1; $number <= 3; $number++) :
                $service = get_post(get_theme_mod("service-area-service-{$number}"));    
            ?>
            <article class="service-card">
                <div class="service-icon">✓</div>
                <h3><?php echo $service->post_title; ?></h3>
                <p><?php echo $service->post_excerpt; ?></p>
                <a class="text-link" href="<?php echo get_permalink($service->ID); ?>">Explore service →</a>
            </article>
            <?php endfor;?>
        </div>
    </section>

    <?php get_template_part('template-parts/article-content'); ?>

    <?php get_template_part('template-parts/article-area'); ?>
</main>

<?php get_template_part('template-parts/footer-hero'); ?>

<?php function_exists('get_footer') ? get_footer() : ''; ?>