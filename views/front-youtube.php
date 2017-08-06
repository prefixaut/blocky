<div id="media-youtube" class="media container">
    
    <div class="media-meta">
        <div class="md-12">
            <h2 class="media-title">Latest Video</h2>
            <span class="media-subtitle">osu!mania | Rche - Entelecheia [Hyper] 96.15% | ENG | HD</span>
        </div>
    </div>
    
    <div class="md-12">
        <div class="player-wrapper">
            <iframe src="https://www.youtube.com/embed/UD0O9el9sAc" frameborder="0" allowfullscreen></iframe>
        </div>
    </div>
    
    <div class="md-6">
        <!-- TODO: Other Videos -->
    </div>
    
    <div class="news-wrapper md-6">
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
