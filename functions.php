<?php

add_theme_support('title-tag');
add_theme_support('post-thumbnails', array("sponsor"));
add_theme_support('html5', array('comment-list', 'comment-form', 'search-form', 'gallery', 'caption'));

require_once(locate_template("functions/setup.php"));
require_once(locate_template("functions/enqueues.php"));
