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
        header("Content-type: text/csv");
        header("Content-Disposition: attachment; filename=helfer.csv");
        header("Pragma: no-cache");
        header("Expires: 0");

        $comments = get_comments();
        echo implode(
            ";",
            array(
                "Name",
                "E-Mail",
                "Nachricht",
                "Alter / Geburtsdatum",
                "Anmeldedatum"
            )
        );

        echo "\n";


        echo implode("\n", array_map(function ($comment) {
            return implode(
                ";",
                array(
                    $comment->comment_author,
                    $comment->comment_author_email,
                    $comment->comment_content,
                    get_field("age", $comment),
                    $comment->comment_date,
                )
            );
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
