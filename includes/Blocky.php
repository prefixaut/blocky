<?php

class Blocky
{
    /* ~ Constants
     * ------------------------------------------------------ */
    const VERSION               = '1.0.0';
    
    /* ~ Fields
     * ------------------------------------------------------ */
    private $twitch_channel     = 'prefixaut';
    private $twitch_token       = null;
    
    /* ~ Constructor
     * ------------------------------------------------------ */
    public function __construct()
    {
        $this->twitch_token = require(get_template_directory() . '/config/twitch-key.php');
        $this->setupHooks();
    }
    
    /* ~ Functions
     * ------------------------------------------------------ */
    private function setupHooks()
    {
        add_action('after_setup_theme', array($this, 'setup'));
        add_action('wp_enqueue_scripts', array($this, 'enqueue'));
        add_action('init', array($this, 'disable_emojis'));
    }
    
    public function setup()
    {
        add_theme_support("automatic-feed-links");
        add_theme_support("post-thumbnails");
        add_theme_support("admin-bar");
        
        register_nav_menu("main", "Main Menu");
    }
    
    public function enqueue()
    {
        wp_enqueue_style('style', get_template_directory_uri() . '/style.css');
        wp_enqueue_style('theme', get_template_directory_uri() . '/theme.css');
        wp_enqueue_script('scripts', get_template_directory_uri() . '/scripts.js');
    }
    
    public function getTwitchToken()
    {
        return $this->twitch_token;
    }
    
    public function getTwitchChannel()
    {
        return $this->twitch_channel;
    }
    
    public function getContent($p = null, $cut = false, $finish = "<br/>Read more ...") {
        $p = get_post($p);
        $c = $p->post_content;
        
        if ($cut) {
            if (strpos($c, "<!--more-->")) {
                $c = substr($c, 0, strpos($c, "<!--more-->"));
                if (!is_null($finish)) $c .= $finish;
            }
            
            if (is_numeric($cut) && strlen($c) > $cut) {
                $c = substr($c, 0, $cut);
                if (!is_null($finish)) $c .= $finish;
            }
        }
        
        $c = apply_filters("the_content", $c);
        $c = str_replace("]]>", "]]&gt;", $c);
        
        if (preg_match("/(<br{1}\s*\/>{1})$/i", $c, $match) === 1) {
            $c = substr($c, 0, strlen($c)-strlen($match[1]));
        }
        
        return trim($c);
    }
    
    public function render($template, $data = array())
    {
        $blocky = $this;
        foreach ($data as $name => $content) {
            if (is_string($name)) {
                $$name = $content;
            }
        }
        require get_template_directory() . "/views/${template}.php";
    }
        
    public function disable_emojis() {
        remove_action('wp_head', 'print_emoji_detection_script', 7);
        remove_action('admin_print_scripts', 'print_emoji_detection_script');
        remove_action('wp_print_styles', 'print_emoji_styles');
        remove_action('admin_print_styles', 'print_emoji_styles'); 
        remove_filter('the_content_feed', 'wp_staticize_emoji');
        remove_filter('comment_text_rss', 'wp_staticize_emoji'); 
        remove_filter('wp_mail', 'wp_staticize_emoji_for_email');
        add_filter('tiny_mce_plugins', array($this, 'disable_emojis_tinymce'));
        add_filter('wp_resource_hints', array($this, 'disable_emojis_remove_dns_prefetch'), 10, 2);
    }
    
    public function disable_emojis_tinymce($plugins) {
        if (is_array($plugins)) {
            return array_diff($plugins, array('wpemoji'));
        } else {
            return array();
        }
    }

    public function disable_emojis_remove_dns_prefetch($urls, $relation_type) {
        if ('dns-prefetch' == $relation_type) {
            /** This filter is documented in wp-includes/formatting.php */
            $emoji_svg_url = apply_filters('emoji_svg_url', 'https://s.w.org/images/core/emoji/2/svg/');
            $urls = array_diff($urls, array($emoji_svg_url));
        }

        return $urls;
    }
}
