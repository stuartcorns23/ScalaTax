<?php
/**
 * Sidebar card listing the most recent blog posts.
 *
 * Args:
 *   title   (string) Card heading. Default 'Recent Posts'.
 *   count   (int)    How many posts to show. Default 5.
 *   exclude (int[])  Post IDs to leave out, e.g. the one being viewed.
 */
$args = wp_parse_args($args ?? array(), array(
    'title'   => 'Recent Posts',
    'count'   => 5,
    'exclude' => array(),
));

$recent_posts = get_posts(array(
    'post_type'           => 'post',
    'post_status'         => 'publish',
    'posts_per_page'      => absint($args['count']),
    'post__not_in'        => array_map('absint', (array) $args['exclude']),
    'ignore_sticky_posts' => true,
));

if (!$recent_posts) {
    return;
}
?>
<aside class="service-sidebar">
    <div class="sidebar-card">
        <h3><?php echo esc_html($args['title']); ?></h3>
        <ul class="sidebar-links sidebar-links--posts">
            <?php foreach ($recent_posts as $recent) : ?>
            <li>
                <a href="<?php echo esc_url(get_permalink($recent)); ?>">
                    <span>
                        <?php echo esc_html(get_the_title($recent)); ?>
                        <time datetime="<?php echo esc_attr(get_the_date('c', $recent)); ?>"><?php echo esc_html(get_the_date('', $recent)); ?></time>
                    </span>
                </a>
            </li>
            <?php endforeach; ?>
        </ul>
    </div>
</aside>
