<?php get_header();?>

<?php
$blog_url = get_permalink(get_option('page_for_posts')) ?: home_url('/');

if (is_category() || is_tag()) {
    $listing_heading = single_term_title('', false);
} elseif (is_search()) {
    $listing_heading = sprintf('Search results for “%s”', get_search_query());
} elseif (is_archive()) {
    $listing_heading = get_the_archive_title();
} else {
    $listing_heading = 'Latest articles and updates';
}
?>

<main>
<section class="page-hero"><div class="container hero-grid"><div class="hero-copy"><span class="eyebrow">Scala Tax Insights</span><h1>Knowledge to help you move forward.</h1><p>Explore articles, updates and practical guidance on HMRC disputes, voluntary disclosures and tax matters. Our aim is to make complex topics easier to understand, so you can approach your next steps with greater clarity.</p></div><div class="hero-image"><img src="https://images.unsplash.com/photo-1450101499163-c8848c66ca85?auto=format&fit=crop&w=1200&q=85" alt="Notebook and paperwork arranged on a professional desk"></div></div></section>
<section class="articles-section"><div class="container">
  <div class="section-heading"><div><span class="eyebrow">From the Blog</span><h2><?php echo esc_html($listing_heading);?></h2><p>Browse the latest insights from Scala Tax.</p></div></div>
  <div class="article-tools">
    <nav class="category-list" aria-label="Article categories">
      <a class="category-button" href="<?php echo esc_url($blog_url);?>"<?php echo is_home() ? ' aria-current="page"' : '';?>>All articles</a>
      <?php foreach (get_categories(array('hide_empty' => true)) as $category) : ?>
        <a class="category-button" href="<?php echo esc_url(get_category_link($category));?>"<?php echo is_category($category->term_id) ? ' aria-current="page"' : '';?>><?php echo esc_html($category->name);?></a>
      <?php endforeach; ?>
    </nav>
    <form class="search-box" role="search" method="get" action="<?php echo esc_url(home_url('/'));?>">
      <span class="search-icon" aria-hidden="true">⌕</span>
      <input id="article-search" type="search" name="s" value="<?php echo esc_attr(get_search_query());?>" placeholder="Search articles..." aria-label="Search articles">
      <input type="hidden" name="post_type" value="post">
    </form>
  </div>

  <?php if (have_posts()) : ?>
  <div class="article-grid" id="article-grid">
    <?php while (have_posts()) : the_post();
      $categories = get_the_category();
      $read_time = max(1, (int) ceil(str_word_count(wp_strip_all_tags(get_the_content())) / 200));
    ?>
    <article <?php post_class('article-card');?>>
      <a class="article-image" href="<?php the_permalink();?>" aria-label="Read <?php the_title_attribute();?>">
        <?php if (has_post_thumbnail()) : ?>
          <?php the_post_thumbnail('medium_large', array('loading' => 'lazy'));?>
        <?php else : ?>
          <img src="https://images.unsplash.com/photo-1554224155-8d04cb21cd6c?auto=format&fit=crop&w=900&q=85" alt="" loading="lazy">
        <?php endif; ?>
      </a>
      <div class="article-content">
        <div class="article-meta">
          <?php if ($categories) : ?><span class="article-category"><?php echo esc_html($categories[0]->name);?></span><?php endif; ?>
          <span><?php echo $read_time;?> min read</span>
        </div>
        <h3><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>
        <?php the_excerpt();?>
        <a class="text-link" href="<?php the_permalink();?>">Read article <span aria-hidden="true">→</span></a>
      </div>
    </article>
    <?php endwhile; ?>
  </div>

  <?php
  $pages = paginate_links(array(
      'type'      => 'array',
      'prev_text' => '←',
      'next_text' => '→',
  ));
  if ($pages) : ?>
  <nav class="pagination" aria-label="Article pages"><?php echo implode('', $pages);?></nav>
  <?php endif; ?>

  <?php else : ?>
  <p class="empty-state" role="status">No articles match your search. Try another phrase or choose a different category.</p>
  <?php endif; ?>
</div></section>
<section class="cta-section"><div class="container cta-inner"><div><h2>Have a question about your tax situation?</h2><p>Speak to Scala Tax about your circumstances and the support that may be available.</p></div><a href="<?php echo esc_url(scalatax_contact_url());?>" class="btn">Contact Scala Tax →</a></div></section>
</main>

<?php get_footer();?>
