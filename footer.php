<footer class="site-footer">
    <div class="container footer-grid">
        <div class="footer-brand">
            <a class="site-logo" href="<?php echo esc_url(home_url('/')); ?>" rel="Home" aria-label="Scala Tax - Home">
                <img width="auto" src="<?php echo get_theme_mod("dark-logo") ?>" />
            </a>
            <p>Specialist support for HMRC disputes and voluntary disclosures, delivered with care and discretion.</p>
        </div>
        <div class="footer-column">
            <h3>Explore</h3>
            <?php
                wp_nav_menu(array(
                    'theme_location' => 'explore',
                    'depth' => 2,
                    'container' => 'nav',
                    'container_class' => '',
                    'container_id' => '',
                    'menu_class' => '',
                    'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                ));
            ?>
        </div>
        <div class="footer-column">
            <h3>Our Services</h3>
            <?php
                wp_nav_menu(array(
                    'theme_location' => 'services',
                    'depth' => 2,
                    'container' => 'nav',
                    'container_class' => '',
                    'container_id' => '',
                    'menu_class' => '',
                    'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                ));
            ?>
        </div>
    
        <div class="footer-column">
            <h3>Get in Touch</h3>
            <ul>
                <li><?php echo do_shortcode('[business_email]');?></li>
                <li><?php echo do_shortcode('[business_phone]');?></li>
                <li><a href="<?php echo esc_url(scalatax_contact_url());?>">Book a consultation</a></li>
            </ul>
        </div>
    </div>
    <div class="container footer-bottom"><p>© <?php echo date('Y');?> Scala Tax. All rights reserved.</p><p><a href="privacy.html">Privacy Policy</a> · <a href="cookies.html">Cookie Policy</a></p></div>
</footer>

<?php wp_footer(); ?>
</body>
</html>