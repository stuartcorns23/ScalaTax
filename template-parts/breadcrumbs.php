<nav class="breadcrumbs" aria-label="Breadcrumb">
    <ol>
        <?php foreach (breadcrumbs() as $crumb) : ?>
        <li>
            <?php if ($crumb->url) : ?>
            <a href="<?php echo esc_url($crumb->url); ?>"><?php echo esc_html($crumb->name); ?></a>
            <?php else : ?>
            <span aria-current="page"><?php echo esc_html($crumb->name); ?></span>
            <?php endif; ?>
        </li>
        <?php endforeach; ?>
    </ol>
</nav>
