<?php get_header();?>

<main>
<section class="page-hero">
    <div class="container page-hero-grid">
        <div class="page-hero-content">
            <span class="eyebrow">Our Services</span>
            <h1>Expert tax support, when you need it most.</h1>
            <p>Specialist advice and support for HMRC enquiries, disputes and voluntary disclosures. We help you understand the process and the options available for your circumstances.</p>
            <a class="btn btn--primary" href="<?php echo esc_url(scalatax_contact_url());?>">Discuss Your Situation</a>
        </div>
        <div class="page-hero-image">
            <img src="https://images.unsplash.com/photo-1497366754035-f200968a6e72?auto=format&fit=crop&w=1200&q=85" alt="Professional office workspace">
        </div>
    </div>
</section>
<section class="section"><div class="container"><div class="section-heading"><span class="eyebrow">How We Can Help</span><h2>Specialist support for your tax concerns.</h2><p>Every situation is different. Contact us to discuss the details and whether our services are appropriate for you.</p></div>
<div class="services-grid">
<article class="service-card" id="hmrc-disputes"><div class="service-icon">↗</div><h3>HMRC Disputes</h3><p>Support with tax enquiries, investigations, correspondence and the process of responding to HMRC.</p><a class="text-link" href="<?php echo esc_url(scalatax_contact_url());?>">Discuss this service →</a></article>
<article class="service-card" id="disclosures"><div class="service-icon">✓</div><h3>Voluntary Disclosures</h3><p>Guidance on approaching a voluntary disclosure, understanding the process and preparing relevant information.</p><a class="text-link" href="<?php echo esc_url(scalatax_contact_url());?>">Discuss this service →</a></article>
<article class="service-card" id="tax-planning"><div class="service-icon">◇</div><h3>Tax Planning</h3><p>Help understanding tax responsibilities and considering practical next steps based on your circumstances.</p><a class="text-link" href="<?php echo esc_url(scalatax_contact_url());?>">Discuss this service →</a></article>
<article class="service-card"><div class="service-icon">▤</div><h3>Tax Investigations</h3><p>Support in understanding investigation requests, organising records and responding appropriately.</p><a class="text-link" href="<?php echo esc_url(scalatax_contact_url());?>">Discuss this service →</a></article>
<article class="service-card" id="appeals"><div class="service-icon">⚖</div><h3>Appeals and Tribunals</h3><p>Initial guidance on decisions, potential appeal routes and the support your circumstances may require.</p><a class="text-link" href="<?php echo esc_url(scalatax_contact_url());?>">Discuss this service →</a></article>
<article class="service-card"><div class="service-icon">♧</div><h3>Confidential Consultation</h3><p>A private first conversation to explain your situation and explore whether Scala Tax can assist.</p><a class="text-link" href="<?php echo esc_url(scalatax_contact_url());?>">Book a consultation →</a></article>
</div></div></section>
</main>
<section class="cta-section">
  <div class="container cta-inner">
    <div><h2>Need clarity on a tax matter?</h2><p>Speak to Scala Tax about your situation and the support available to you.</p></div>
    <a class="btn btn--primary" href="<?php echo esc_url(scalatax_contact_url());?>">Make an Enquiry →</a>
  </div>
</section>

<?php get_footer();?>