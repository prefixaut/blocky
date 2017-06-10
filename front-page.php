<?php get_header(); ?>

<section class="container-fluid" id="slider">
    <div class="row">
        <div id="wallop" class="Wallop Wallop--slide">
            <div class="Wallop-list">
                <div class="Wallop-item slide">
                    <div class="slide-inner">
                        <div class="slide-title">Pretty Cool Slide</div>
                        <div class="slide-content">
                            Some content i guess
                        </div>
                    </div>
                    <img src="<?= get_template_directory_uri(); ?>/assets/images/slide-1.jpg" />
                </div>
                <div class="Wallop-item slide">
                    <div class="slide-inner">
                        <div class="slide-title">Pretty Cool Slide</div>
                        <div class="slide-content">
                            Some content i guess
                        </div>
                    </div>
                    <img src="<?= get_template_directory_uri(); ?>/assets/images/slide-2.jpg" />
                </div>
                <div class="Wallop-item slide">
                    <div class="slide-inner">
                        <div class="slide-title">Pretty Cool Slide</div>
                        <div class="slide-content">
                            Some content i guess
                        </div>
                    </div>
                    <img src="<?= get_template_directory_uri(); ?>/assets/images/slide-3.jpg" />
                </div>
                <div class="Wallop-item slide">
                    <div class="slide-inner">
                        <div class="slide-title">Pretty Cool Slide</div>
                        <div class="slide-content">
                            Some content i guess
                        </div>
                    </div>
                    <img src="<?= get_template_directory_uri(); ?>/assets/images/slide-4.jpg" />
                </div>
            </div>
            <button class="Wallop-buttonPrevious"><i class="fa fa-chevron-left"></i></button>
            <button class="Wallop-buttonNext"><i class="fa fa-chevron-right"></i></button>
        </div>
    </div>
</section>

<section class="container" id="user">
    <div class="row">
        <div class="col-md-4">
            <div class="card home">
                <div class="card-icon fa fa-flask"></div>
                <div class="card-title">Development</div>
                <div class="card-body">
                    <p>I'm dun dev stuff</p>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card home">
                <div class="card-icon fa fa-twitch"></div>
                <div class="card-title">Streams</div>
                <div class="card-body">
                    <p>cool shit happenin' on ma <a href="https://twitch.tv/prefixaut" target="_blank">Twitch-Channel</a></p>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card home">
                <div class="card-icon fa fa-twitter"></div>
                <div class="card-title">Shitposts</div>
                <div class="card-body">
                    <p>Check em out on my <a href="https://twitter.com/prefixaut" target="_blank">Twitter Account</a></p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="container" id="media">
    
    <?php 
        $stream = $twitch->streams->get($blocky->getTwitchChannel());
        if ($stream && !is_null($stream->stream)) {
            $blocky->render('front-twitch', array(
                'status'    => $stream->stream->channel->status,
                'game'      => $stream->stream->game,
                'name'      => $stream->stream->channel->name,
            ));
        } else {
            
        }
    ?>
    
</section>

<?php get_footer(); ?>
