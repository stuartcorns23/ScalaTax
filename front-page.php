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
                <p>Support through complex tax enquiries.</p>
            </div>
        </div>
        <?php endfor;?>
        </div>
    </section>

    <section class="section"><div class="container">
        <div class="section-heading">
            <span class="eyebrow">How We Can Help</span>
            <h2>Clear, practical help when HMRC challenges your tax position.</h2>
            <p>When a tax issue feels difficult to navigate, specialist support can help you understand your position and consider the options available.</p></div>
            <div class="services-grid">
                <article class="service-card">
                    <div class="service-icon">↗</div>
                    <h3>HMRC Disputes</h3>
                    <p>Guidance and representation for tax enquiries, investigations and compliance matters.</p>
                    <a class="text-link" href="services.html#hmrc-disputes">Explore service →</a>
                </article>
                <article class="service-card">
                    <div class="service-icon">✓</div>
                    <h3>Voluntary Disclosures</h3>
                    <p>Practical support for people who need to disclose tax matters to HMRC.</p>
                    <a class="text-link" href="services.html#disclosures">Explore service →</a>
                </article>
                <article class="service-card">
                    <div class="service-icon">◇</div>
                    <h3>Tax Advice</h3>
                    <p>Understand your situation, responsibilities and possible next steps.</p>
                    <a class="text-link" href="services.html#tax-planning">Explore service →</a>
                </article>
            </div>
        </div>
    </section>

    <?php get_template_part('template-parts/article-content'); ?>

    <section class="section">
        <div class="container">
            <div class="section-heading">
                <span class="eyebrow"><?php echo get_theme_mod("article-area-eyebrow");?></span>
                <h2><?php echo get_theme_mod("article-area-title");?></h2>
                <p><?php echo get_theme_mod("article-area-description");?></p>
            </div>
    
            <div class="blog-grid">
                <?php
                $latest_posts = new WP_Query([
                    'post_type'           => 'post',
                    'posts_per_page'      => 3,
                    'orderby'             => 'date',
                    'order'               => 'DESC',
                    'ignore_sticky_posts' => true,
                ]);

                if ($latest_posts->have_posts()) :
                    while ($latest_posts->have_posts()) : $latest_posts->the_post();
                        $categories = get_the_category();
                        $read_time  = max(1, ceil(str_word_count(wp_strip_all_tags(get_the_content())) / 200));
                ?>
                <article class="blog-card">
                    <?php if (has_post_thumbnail()) : ?>
                    <a href="<?php the_permalink(); ?>">
                        <div class="blog-card-image">
                            <?php the_post_thumbnail('large', ['loading' => 'lazy']); ?>
                        </div>
                    </a>
                    <?php endif; ?>
                    <div class="blog-card-content">
                        <div class="blog-meta">
                            <?php if (!empty($categories)) : ?>
                            <span><?php echo esc_html($categories[0]->name); ?></span>
                            <?php endif; ?>
                            <span><?php echo esc_html($read_time); ?> min read</span>
                        </div>
                        <h3><?php the_title(); ?></h3>
                        <p><?php echo esc_html(get_the_excerpt()); ?></p>
                        <a href="<?php the_permalink(); ?>" class="text-link">Read article →</a>
                    </div>
                </article>
                <?php
                    endwhile;
                    wp_reset_postdata();
                endif;
                ?>
            </div>
        </div>
    </section>
</main>

<section class="cta-section">
  <div class="container cta-inner">
    <div><h2>Need clarity on a tax matter?</h2><p>Speak to Scala Tax about your situation and the support available to you.</p></div>
    <a class="btn btn--primary" href="<?php echo esc_url(scalatax_contact_url());?>">Make an Enquiry →</a>
  </div>
</section>

<?php function_exists('get_footer') ? get_footer() : ''; ?>