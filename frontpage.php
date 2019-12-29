<?php

/*
 * Template Name: Frontpage
 */

get_header("front"); ?>
<section class="spray-logo">
    <?php
    echo file_get_contents(locate_template("img/191228_logo_mini.svg"));
    ?>
</section>

<?php get_header("nav"); ?>

<?php echo file_get_contents(locate_template("img/water-entry.svg")); ?>
<section id="lineup" class="lineup">
    <div class="container">
        <h2 class="h2-white">Lineup</h2>
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
</section>

<section class="map">
    <div class="container">
        <div class="title">
            <h2 class="h2-white">Location</h2>
        </div>
    </div>
    <?php echo file_get_contents(locate_template("img/map.svg")); ?>
</section>

<section id="help" class="help">
    <?php echo file_get_contents(locate_template("img/green-stuff.svg")); ?>
    <div class="container">
        <div class="date row">
            <div class="col-6"></div>
            <div class="col-6">
                <h2 class="h2">19.–21. Juni 2020</h2>
            </div>
        </div>
        <h2 class="h2-white">Helfer gesucht</h2>
        <div class="row">
            <div class="col-12 col-md-6">
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Vitae voluptate ipsam, ea a omnis beatae explicabo tempore eveniet vero amet aliquid non blanditiis possimus veniam, nam consequuntur placeat, eos earum!</p>
            </div>
            <div class="col-12 col-md-6">
                <form action="/wp-admin/admin-ajax.php?action_name=xxx">
                    <div class="row">
                        <div class="col-12 col-lg-6">
                            <div class="input">
                                <input placeholder="Vorname" name="first-name">
                            </div>
                        </div>
                        <div class="col-12 col-lg-6">
                            <div class="input">
                                <input placeholder="Nachname" name="last-name">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="input">
                                <textarea placeholder="Be was wettsch eus helfe?"></textarea>
                            </div>
                        </div>
                        <div class="col-12 col-lg-6">
                            <div class="input">
                                <input type="submit" value="Absenden">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<?php echo file_get_contents(locate_template("img/grass-end.svg")); ?>
<section class="sponsors">
    <?php

    echo "<div class='container'>";

    echo '<h2 class="h2">Sponsoren</h2>';

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
    echo "<div class='col-12 col-md-6'>";

    foreach ($slugs as $slug => $v) {
        echo "<div class='row tier-" . $v['tier'] . "'>";
        foreach (sponsorsByCategory($slug) as $post) {
            echo "<div class='" . $v['col'] . "'>" . get_the_post_thumbnail($post) . "</div>";
        }
        echo "</div>";
    }

    echo "</div>";

    echo "<div class='col-12 col-md-6'>";
    echo "<p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Consequuntur voluptates eos, ab repellendus voluptatum nam laudantium ex suscipit quas accusantium, atque facere minus fugit iure soluta repellat. Earum, vitae quo?</p>";
    echo '<a href="/sponsor-werden">Auch Sponsor werden?</a>';
    echo "</div>";

    echo "</div>"; //row
    echo "</div>"; //container

    ?>

</section>

<?php get_footer(); ?>