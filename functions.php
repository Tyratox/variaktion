<?php

add_theme_support('title-tag');
add_theme_support('post-thumbnails', array("sponsor"));
add_theme_support('html5', array('comment-list', 'comment-form', 'search-form', 'gallery', 'caption'));

require_once(locate_template("functions/setup.php"));
require_once(locate_template("functions/enqueues.php"));
require_once(locate_template("functions/ajax.php"));
require_once(locate_template("functions/helpers.php"));

function print_filters_for($hook = '')
{
    global $wp_filter;
    if (empty($hook) || !isset($wp_filter[$hook]))
        return;

    print '<pre>';
    print_r($wp_filter[$hook]);
    print '</pre>';
}
