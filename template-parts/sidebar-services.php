<?php
/**
 * Sidebar card listing services.
 *
 * Args:
 *   title   (string) Card heading. Default 'Our Services'.
 *   exclude (int[])  Service IDs to leave out, e.g. the one being viewed.
 */
$args = wp_parse_args($args ?? array(), array(
    'title'   => 'Our Services',
    'exclude' => array(),
));

$services = get_posts(array(
    'post_type'      => 'service',
    'post_status'    => 'publish',
    'posts_per_page' => -1,
    'post__not_in'   => array_map('absint', (array) $args['exclude']),
    'orderby'        => 'menu_order title',
    'order'          => 'ASC',
));

if (!$services) {
    return;
}
?>
<aside class="service-sidebar">
    <div class="sidebar-card">
        <h3><?php echo esc_html($args['title']); ?></h3>
        <ul class="sidebar-links">
            <?php foreach ($services as $service) : ?>
            <li><a href="<?php echo esc_url(get_permalink($service)); ?>"><?php echo esc_html(get_the_title($service)); ?></a></li>
            <?php endforeach; ?>
        </ul>
    </div>
</aside>
