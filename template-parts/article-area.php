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