<?php foreach ($posts as $p): ?>

<article id="page-<?= $p->ID ?>" class="sidebar-news">
    <div class="news-date">
        <div class="day"><?= get_the_date("d", $p->ID); ?></div>
        <div class="month"><?= get_the_date("F", $p->ID); ?></div>
    </div>
    <div class="news-teaser">
        <h3 class="news-title"><?= get_the_title($p->ID); ?></h3>
        <div class="news-content"><?= $blocky->getContent($p->ID, true); ?></div>
        <a href="<?= get_permalink($p->ID); ?>">
            <button class="btn readmore-button">Read more ...</button>
        </a>
    </div>
</article>

<?php endforeach; ?>
