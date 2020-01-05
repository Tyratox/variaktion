<?php

class VA_Ajax
{
    public function __construct()
    {
        add_action('wp_ajax_get_helpers', array($this, 'get_helpers'));
        add_filter('views_edit-comments', array($this, 'add_helper_download_button'));
    }

    public function get_helpers()
    {
        $comments = get_comments();
        echo implode("\n", array_map(function ($comment) {
            return $comment->comment_author_email;
        }, $comments));
        wp_die();
    }

    public function add_helper_download_button($views)
    {
        $views['download'] = "<form action='/wp-admin/admin-ajax.php' method='POST'>"
            . "<input type='submit' value='Helferliste herunterladen'/>"
            . "<input type='hidden' name='action' value='get_helpers'></form>";
        return $views;
    }
}

new VA_Ajax();
