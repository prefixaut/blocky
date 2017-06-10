<div id="media-twitch" class="media">
    
    <div class="media-meta">
        <h2 class="media-title"><?= $status; ?></h2>
        <span class="media-subtitle">Game: <?= $game; ?></span>
    </div>
    
    <div class="row">
        <div class="col-md-12">
            <div class="player-wrapper">
                <iframe src="http://player.twitch.tv/?muted=true&channel=<?= $name; ?>"></iframe>
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-6">
            <div class="chat-wrapper">
                <iframe src="https://www.twitch.tv/<?= $name; ?>/chat"></iframe>
            </div>
        </div>
        
        <div class="news-wrapper col-md-6">
            <h2 class="news-header">News</h2>
            
            <?php 
                $prev_post = $post;
                $posts = get_posts($args = array(
                    "posts_per_page" => 3,
                    "category" => 2,
                    "post_status" => "publish",
                    "orderby" => "date"
                ));
                
                $blocky->render('news-sidebar', array(
                    'posts' => $posts,
                ));
            ?>
            
        </div>                
    </div>
</div>
