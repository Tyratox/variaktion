<?php

/*
 * Template Name: Frontpage
 */

get_header("front"); ?>
<section id="particles">
    <div class="container">
        <div class="spray-logo">
            <?php
            echo file_get_contents(locate_template("img/191228_logo_mini.svg"));
            ?>
        </div>
    </div>
</section>

<?php get_header("nav"); ?>

<?php /*<section id="lineup" class="lineup">
    <div class="container">
        <h2 class="h2">Lineup</h2>
        <div class="artists">
            <?php

            function actsByCategory($slug)
            {
                $query = new WP_Query(array(
                    "post_type" => "act",
                    "posts_per_page" => -1,
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'act_category',
                            'field' => 'slug',
                            'terms' => $slug,
                        )
                    ),
                ));

                return $query->posts;
            }

            $slugs = array('headliner' => array(
                'tier' => 1,
            ), 'known-artists' => array(
                'tier' => 2
            ), 'lesser-known-artists' => array(
                'tier' => 3
            ));

            foreach ($slugs as $slug => $v) {
                echo "<div class='row tier-" . $v['tier'] . "'>";
                foreach (actsByCategory($slug) as $post) {
                    $origin = get_field('origin', $post->ID);

                    echo "<a href=''>" . $post->post_title . ($origin ? " (" . $origin . ")" : "") . "</a>";
                }
                echo "</div>";
            }


            ?>

        </div>
    </div>
</section>*/ ?>

<section class="map">
    <div class="container">
        <div class="title">
            <h2 class="h2">Location</h2>
        </div>
    </div>
    <?php echo file_get_contents(locate_template("img/map.svg")); ?>
</section>

<section id="help" class="help">
    <div class="container">
        <h2 class="h2">Helfer gesucht</h2>
        <div class="row">
            <div class="col-12 col-md-6">
                <p><?php echo get_field("helper-text"); ?></p>
            </div>
            <div class="col-12 col-md-6">
                <?php if (!is_user_logged_in()) {
                    comment_form(
                        array(
                            'class_form' => 'class_form row',
                            'fields' => array(
                                'author' => '<div class="col-12 col-lg-6">' .
                                    '<div class="input">' .
                                    '<input placeholder="Name" name="author">' .
                                    '</div>' .
                                    '</div>',
                                'email' => '<div class="col-12 col-lg-6">' .
                                    '<div class="input">' .
                                    '<input placeholder="E-Mail" name="email" type="email">' .
                                    '</div>' .
                                    '</div>',
                            ),
                            'comment_field' => '<div class="col-12">' .
                                '<div class="input">' .
                                '<input placeholder="Spezifische Interessen? (optional)" name="comment">' .
                                '</div>' .
                                '</div>',
                            'must_log_in' => '',
                            'logged_in_as' => '',
                            'cancel_reply_before' => '',
                            'cancel_reply_after' => '',
                            'cancel_reply_link' => ' ',
                            'comment_notes_before' => '',
                            'comment_notes_after' => '',
                            'title_reply' => '',
                            'title_reply_before' => '',
                            'title_reply_after' => '',
                            'submit_field' => '%1$s <div class="hidden">%2$s</div>',
                            'submit_button' => '<div class="col-12 col-lg-6">' .
                                '<div class="input">' .
                                '<input type="submit" value="Absenden">' .
                                '</div>' .
                                '</div>',
                            'format' => 'xhtml'
                        )
                    );
                } ?>
            </div>
        </div>
    </div>
</section>
<?php echo file_get_contents(locate_template("img/grass-end.svg")); ?>

<section id="info" class="info">
    <div class="container">
        <h2 class="h2">Info</h2>
        <div class="row">
            <div class="col-12 col-md-6">
                <p><?php echo get_field("info-text"); ?></p>
            </div>
            <div class="col-12 col-md-6">
                <?php echo file_get_contents(locate_template("img/logo.svg")); ?>
            </div>
        </div>
    </div>
</section>

<?php echo file_get_contents(locate_template("img/info-end.svg")); ?>

<section id="support" class="support">
    <div class="container">
        <h2 class="h2">Unterstützen</h2>
        <div class="row">
            <div class="col-12 col-md-6">
                <p><?php echo get_field("support-text"); ?></p>
            </div>
            <div class="col-12 col-md-6">
                <div class="address">
                    <p>
                        IBAN: CH94 0900 0000 1536 0
                    </p>
                    <p>Verein Jugendfestival</p>
                    <p>Variaktion</p>
                    <p>c/o Jugendarbeit Aarau</p>
                    <p>Poststrasse 17</p>
                    <p>5000 Aarau</p>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="sponsors">
    <?php

    echo "<div class='container'>";

    echo '<h2 class="h2">Sponsoren</h2>';

    $x = get_field("sponsor-text");

    function sponsorsByCategory($slug)
    {
        $query = new WP_Query(array(
            "post_type" => "sponsor",
            "posts_per_page" => -1,
            'tax_query' => array(
                array(
                    'taxonomy' => 'sponsor_category',
                    'field' => 'slug',
                    'terms' => $slug,
                )
            ),
        ));

        return $query->posts;
    }

    $slugs = array('ab-10000-fr' => array(
        'tier' => 1,
        'col' => 'col-8'
    ), 'bis-10000-fr' => array(
        'tier' => 2,
        'col' => 'col-6'
    ), 'bis-5000-fr' => array(
        'tier' => 3,
        'col' => 'col-4'
    ), 'bis-1000-fr' => array(
        'tier' => 4,
        'col' => 'col-3'
    ));

    echo "<div class='row'>";
    echo "<div class='col-12'>";

    echo "<div class='logos'>";
    foreach ($slugs as $slug => $v) {
        //echo "<div class='row tier-" . $v['tier'] . "'>";
        foreach (sponsorsByCategory($slug) as $post) {
            echo "<div class=tier-'" . $v['tier'] /*$v['col']*/ . "'>" . get_the_post_thumbnail($post) . "</div>";
        }
        //echo "</div>";
    }

    echo "</div>";
    echo "</div>";

    echo "<div class='col-12'>";
    echo $x;
    echo "</div>";

    echo "</div>"; //row
    echo "</div>"; //container

    ?>

</section>

<?php get_footer(); ?>