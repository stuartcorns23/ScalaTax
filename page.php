<?php get_header();?>

<main>
    <section class="page-hero">
        <div class="container page-hero-grid">
            <div class="page-hero-content">
                <span class="eyebrow">Our Services</span>
                <h1><?php the_title();?></h1>
            </div>
            <div class="page-hero-image">
                <img src="https://images.unsplash.com/photo-1497366754035-f200968a6e72?auto=format&fit=crop&w=1200&q=85" alt="Professional office workspace">
            </div>
        </div>
    </section>
    
    <section class="container">
        <?php the_content();?>
    </section>
</main>

<section class="cta-section">
    <div class="container cta-inner">
        <div><h2>Need clarity on a tax matter?</h2><p>Speak to Scala Tax about your situation and the support available to you.</p></div>
        <a class="btn btn--primary" href="<?php echo esc_url(scalatax_contact_url());?>">Make an Enquiry →</a>
    </div>
</section>


<?php get_footer();?>