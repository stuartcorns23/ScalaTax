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

    <section class="section section--soft"><div class="container about-grid">
        <div class="about-image"><img src="https://images.unsplash.com/photo-1497366811353-6870744d04b2?auto=format&fit=crop&w=1200&q=85" alt="Calm, contemporary office interior" loading="lazy"></div>
        <div class="about-content">
            <span class="eyebrow">A Structured Approach</span>
            <h2>Experienced, trusted and on your side.</h2>
            <p>Tax concerns can be personal and stressful. Scala Tax aims to make the process clearer through careful listening, straightforward explanations and support tailored to your circumstances.</p>
            <div class="values-grid">
                <div class="value-item">
                    <h3>Assess</h3>
                    <p>Review HMRC Correspondence, Deadlines, Facts and Records.</p>
                </div>
                <div class="value-item">
                    <h3>Strategise</h3>
                    <p>Identify the technical. evidential and procedural arguments.</p>
                </div>
                <div class="value-item">
                    <h3>Respond</h3>
                    <p>Identify the technical. evidential and procedural arguments.</p>
                </div>
                <div class="value-item">
                    <h3>Resolve</h3>
                    <p>Identify the technical. evidential and procedural arguments.</p>
                </div>
            </div>
            <p style="margin-top:28px"><a class="btn btn--primary" href="about.html">About Scala Tax</a></p>
        </div>
    </section>

    <section class="section"><div class="container"><div class="section-heading"><span class="eyebrow">Latest Insights</span><h2>Tax news, updates and practical advice.</h2><p>Helpful information to support a better understanding of tax enquiries and disclosure processes.</p></div>
    
    <div class="blog-grid">
        <article class="blog-card">
            <a href="insights.html">
                <div class="blog-card-image">
                    <img src="https://images.unsplash.com/photo-1554224155-8d04cb21cd6c?auto=format&fit=crop&w=900&q=80" alt="Calculator and financial paperwork" loading="lazy">
                </div>
            </a>
            <div class="blog-card-content">
                <div class="blog-meta">
                    <span>HMRC Guidance</span>
                    <span>5 min read</span>
                </div>
                <h3>Understanding an HMRC Enquiry</h3>
                <p>An introductory guide to what an enquiry may involve and how to prepare.</p>
                <a href="insights.html" class="text-link">Read article →</a>
            </div>
        </article>
        <article class="blog-card"><a href="insights.html"><div class="blog-card-image"><img src="https://images.unsplash.com/photo-1450101499163-c8848c66ca85?auto=format&fit=crop&w=900&q=80" alt="Documents on a desk" loading="lazy"></div></a><div class="blog-card-content"><div class="blog-meta"><span>Disclosures</span><span>4 min read</span></div><h3>Considering a Voluntary Disclosure</h3><p>Key questions to consider when exploring a disclosure and your options.</p><a href="insights.html" class="text-link">Read article →</a></div></article>
        <article class="blog-card"><a href="insights.html"><div class="blog-card-image"><img src="https://images.unsplash.com/photo-1460925895917-afdab827c52f?auto=format&fit=crop&w=900&q=80" alt="Business documents and laptop" loading="lazy"></div></a><div class="blog-card-content"><div class="blog-meta"><span>Tax Planning</span><span>3 min read</span></div><h3>Keeping Clear Tax Records</h3><p>Why organised records can help you respond to tax questions more confidently.</p><a href="insights.html" class="text-link">Read article →</a></div></article>
    </div></div></section>
</main>

<section class="cta-section">
  <div class="container cta-inner">
    <div><h2>Need clarity on a tax matter?</h2><p>Speak to Scala Tax about your situation and the support available to you.</p></div>
    <a class="btn btn--primary" href="<?php echo esc_url(scalatax_contact_url());?>">Make an Enquiry →</a>
  </div>
</section>

<?php function_exists('get_footer') ? get_footer() : ''; ?>