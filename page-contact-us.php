<?php get_header();?>
<main>

    <section class="page-hero">
        <div class="container page-hero-grid">
            <div class="page-hero-content">
                <span class="eyebrow"><?php echo esc_html(get_theme_mod('contact-eyebrow', 'Get in Touch')); ?></span>
                <h1><?php echo esc_html(get_theme_mod('contact-title', 'Let\'s talk about how we can help.')); ?></h1>
                <p><?php echo esc_html(get_theme_mod('contact-description', 'If you have a tax enquiry or would like to discuss your circumstances, contact Scala Tax to arrange an initial conversation.')); ?></p>
            </div>
            <div class="page-hero-image">
                <img src="<?php echo esc_url(get_theme_mod('contact-hero-image')); ?>" alt="Contact Scala Tax" />
            </div>
        </div>
    </section>

<section class="section">
    <div class="container contact-grid">
        <div class="contact-details">
            <span class="eyebrow"><?php echo esc_html(get_theme_mod('contact-form-eyebrow', 'Get in Touch')); ?></span>
            <h2><?php echo esc_html(get_theme_mod('contact-form-title', 'Get in Touch')); ?></h2>
            <p><?php echo esc_html(get_theme_mod('contact-form-description', 'Tell us a little about what you need support with. Please avoid including highly sensitive personal or financial information in your initial message.')); ?></p>
            <div class="contact-list">
                <div class="contact-item">
                    <div class="contact-item-icon" aria-hidden="true">☎</div>
                    <div>
                        <h3>Telephone</h3>
                        <p><a href="tel:<?php echo do_shortcode('[business_phone]');?>"><?php echo do_shortcode('[business_phone]');?></a></p>
                    </div>
                </div>
                <div class="contact-item">
                    <div class="contact-item-icon" aria-hidden="true">✉</div>
                    <div>
                        <h3>Email</h3>
                        <p><a href="mailto:<?php echo esc_html(get_theme_mod('business-email', 'enquiries@example.co.uk')); ?>"><?php echo esc_html(get_theme_mod('business-email', 'enquiries@example.co.uk')); ?></a></p>
                    </div>
                </div>
                <div class="contact-item">
                    <div class="contact-item-icon" aria-hidden="true">◷</div>
                    <div>
                        <h3>Confidential conversation</h3>
                        <p>Contact us to arrange a suitable time to speak.</p>
                    </div>
                </div>
            </div>
        </div>

<form class="contact-form" action="#" method="post">
    <div class="form-row">
        <div class="form-group">
            <label for="name">Your name *</label>
            <input id="name" name="name" autocomplete="name" required>
        </div>
        <div class="form-group">
            <label for="email">Email address *</label>
            <input id="email" name="email" type="email" autocomplete="email" required>
        </div>
    </div>
    <div class="form-group">
        <label for="subject">What would you like help with?</label>
        <select id="subject" name="subject">
            <option value="">Choose a topic</option>
            <?php
            $services = get_posts(array(
                'post_type'      => 'service',
                'post_status'    => 'publish',
                'posts_per_page' => -1,
                'orderby'        => 'menu_order title',
                'order'          => 'ASC',
            ));
            foreach ($services as $service) : ?>
            <option value="<?php echo esc_attr(get_the_title($service)); ?>"><?php echo esc_html(get_the_title($service)); ?></option>
            <?php endforeach; ?>
            <option value="Other enquiry">Other enquiry</option>
        </select>
    </div>
    <div class="form-group">
        <label for="message">How can we help? *</label>
        <textarea id="message" name="message" required></textarea>
    </div>
    
    <p class="muted" style="font-size:.82rem">By submitting this form, you agree to be contacted about your enquiry. Add the final privacy notice and consent wording before publishing.</p>
    <button type="submit" class="btn btn--primary">Send Enquiry →</button>
    <!-- <p class="muted" style="font-size:.82rem;margin:0">Demo form only. Connect a secure form handler before going live.</p>-->
    </form>
</div>
</section>
</main>

<?php get_footer();?>