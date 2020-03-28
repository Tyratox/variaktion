<?php

/*
 * Template Name: Frontpage
 */

get_header("banner");

the_post();

$pageId = get_the_ID();

?>
<section id="particles">
    <div id="color-background"></div>
    <div class="container">
        <div class="spray-logo">
            <?php
            echo file_get_contents(locate_template("img/191228_logo_mini.svg"));
            ?>
        </div>
    </div>
</section>

<?php get_header("nav"); ?>

<section id="lineup" class="lineup">
    <div class="container">
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

            $slugs = array('tier-1' => array(
                'tier' => 1,
            ), 'tier-2' => array(
                'tier' => 2
            ), 'tier-3' => array(
                'tier' => 3
            ), 'tier-4' => array(
                'tier' => 4
            ));

            foreach ($slugs as $slug => $v) {
                echo "<div class='row tier-" . $v['tier'] . "'>";
                foreach (actsByCategory($slug) as $post) {
                    $origin = get_field('origin', $post->ID);

                    echo "<div class='artist'>" . $post->post_title . "</div>";
                }
                echo "</div>";
            }


            ?>

        </div>
    </div>
</section>
<?php echo file_get_contents(locate_template("img/lineup-end.svg")); ?>
<section class="map">
    <div class="container">
        <div class="title">
            <h2 class="h2">Location</h2>
        </div>
    </div>
    <?php echo file_get_contents(locate_template("img/map.svg")); ?>
</section>
<section class="info-spacer"></section>
<section id="info" class="info">
    <div class="container">
        <h2 class="h2">Info</h2>
        <div class="row">
            <div class="col-12 col-md-12">
                <p><?php echo get_field("info-text", $pageId); ?></p>
            </div>
            <?php /*<div class="col-12 col-md-6">
                <div class="stamp">
                    <?php echo file_get_contents(locate_template("img/stamp.svg")); ?>
                </div>
            </div>*/ ?>

        </div>
    </div>
</section>
<?php echo file_get_contents(locate_template("img/grass-end.svg")); ?>

<section id="help" class="help inverted">
    <div class="container">
        <h2 class="h2">Helfer gesucht</h2>
        <div class="row">
            <div class="col-12 col-md-6">
                <p><?php echo get_field("helper-text", $pageId); ?></p>
            </div>
            <div class="col-12 col-md-6">
                <?php
                /*if (is_user_logged_in()) {
                    echo "<p>Wöll du agmeldet besch zeigts do kes namen und email feld a.</p>";
                }
                comment_form(
                    array(
                        'class_form' => 'class_form row',
                        'fields' => array(
                            'author' => '<div class="col-12 col-lg-6">' .
                                '<div class="input">' .
                                '<div class="schiller">' .
                                '<input placeholder="Name" name="author">' .
                                '<div class="phill"></div>' .
                                '</div>' .
                                '</div>' .
                                '</div>',
                            'email' => '<div class="col-12 col-lg-6">' .
                                '<div class="input">' .
                                '<div class="schiller">' .
                                '<input placeholder="E-Mail" name="email" type="email">' .
                                '<div class="phill"></div>' .
                                '</div>' .
                                '</div>' .
                                '</div>',
                        ),
                        'comment_field' => '<div class="col-12">' .
                            '<div class="input">' .
                            '<div class="schiller">' .
                            '<input placeholder="Spezifische Interessen? (optional)" name="comment">' .
                            '<div class="phill"></div>' .
                            '</div>' .
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
                            '<div class="schiller">' .
                            '<input type="submit" value="Absenden">' .
                            '<div class="phill"></div>' .
                            '</div>' .
                            '</div>' .
                            '</div>',
                        'format' => 'xhtml'
                    )
                );*/ ?>
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
                <p><?php echo get_field("support-text", $pageId); ?></p>
            </div>
            <div class="col-12 col-md-6">
                <div class="address">
                    <p>
                        IBAN: CH94 0900 0000 1536 6372 0
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
            echo "<a href='" . get_field("link", $post) . "' target='_blank' class='tier-" . $v['tier'] /*$v['col']*/ . "'>" . get_the_post_thumbnail($post) . "</a>";
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