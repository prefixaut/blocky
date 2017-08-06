<?php get_header(); ?>

<section id="title">
    <div class="title-background">
        <img src="<?= $blocky->getPostImage(); ?>" class="title-background-img" />
    </div>
    <div class="title-container">
        <h1 class="title-content"><?php the_title(); ?></h1>
    </div>
</section>

<main id="page-<?php the_ID(); ?>">
    <div class="container">
        <?= $blocky->getContent(); ?>
    </div>
</main>

<?php get_footer(); ?>
