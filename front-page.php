<?php get_header(); ?>

<section class="container-fluid" id="slider">
    <div class="row">
        <div id="wallop" class="Wallop">
            <div class="Wallop-list">
                <div class="Wallop-item"><img src="<?= get_template_directory_uri(); ?>/assets/images/slide-1.jpg" /></div>
                <div class="Wallop-item"><img src="<?= get_template_directory_uri(); ?>/assets/images/slide-2.jpg" /></div>
                <div class="Wallop-item"><img src="<?= get_template_directory_uri(); ?>/assets/images/slide-3.jpg" /></div>
                <div class="Wallop-item"><img src="<?= get_template_directory_uri(); ?>/assets/images/slide-4.jpg" /></div>
            </div>
        </div>
    </div>
</section>

<section class="container" id="user">
    <div class="row">
        <div class="col-md-4">
            <div class="card home">
                <div class="card-icon fa fa-exclamation-triangle"></div>
                <div class="card-body">
                    <p>lorem ipsum</p>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card home">
                <div class="card-icon fa fa-exclamation-triangle"></div>
                <div class="card-body">
                    <p>lorem ipsum</p>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card home">
                <div class="card-icon fa fa-exclamation-triangle"></div>
                <div class="card-body">
                    <p>lorem ipsum</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="container" id="media">
    
    <?php 
        $stream = $twitch->channels->get($blocky->getTwitchChannel());
        if ($stream):
    ?>
        <div id="media-twitch" class="media">
            
            <div class="media-meta">
                <h2 class="media-title"><?= $stream->status; ?></h2>
                <span class="media-subtitle">Game: <?= $stream->game; ?></span>
            </div>
            
            <div class="row">
                <div class="col-md-12">
                    <div class="player-wrapper">
                        <iframe src="http://player.twitch.tv/?muted=true&channel=<?= $stream->name; ?>"></iframe>
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-6">
                    <div class="chat-wrapper">
                        <iframe src="https://www.twitch.tv/<?= $stream->name; ?>/chat"></iframe>
                    </div>
                </div>
                
                <div class="news-wrapper col-md-6">
                    <h2 class="news-header">News</h2>
                </div>                
            </div>
        </div>
    <?php else: ?>
        <div id="media-youtube" class="row">
            
        </div>
    <?php endif; ?>
</section>

<?php get_footer(); ?>
