<section class="section section--soft">
    <div class="container about-grid">
        <div class="about-image">
            <img src="<?php echo get_theme_mod('article-content-image'); ?>" alt="Calm, contemporary office interior" loading="lazy">
        </div>
        <div class="about-content">
            <span class="eyebrow"><?php echo get_theme_mod('article-content-eyebrow'); ?></span>
            <h2><?php echo get_theme_mod('article-content-title'); ?></h2>
            <p><?php echo get_theme_mod('article-content-description'); ?></p>
            <div class="values-grid">
                <?php for ($number = 1; $number <= 4; $number++) :?>
                <div class="value-item">
                    <h3><?php echo get_theme_mod("article-content-point-$number-title");?></h3>
                    <p><?php echo get_theme_mod("article-content-point-$number-description");?></p>
                </div>
                <?php endfor;?>
            </div>
            <p style="margin-top:28px"><a class="btn btn--primary" href="about.html">About Scala Tax</a></p>
        </div>
    </div>
</section>
