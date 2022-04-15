<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <meta name="format-detection" content="telephone=no">
    
    <?php
    if (!function_exists('_wp_render_title_tag')) {
        function theme_slug_render_title()
        {
    ?>
            <title><?php wp_title('|', true, 'right'); ?></title>
    <?php
        }
        add_action('wp_head', 'theme_slug_render_title');
    }

    wp_head();

    ?>
</head>

<body>