<?php

/*
 * Template Name: Frontpage
 */

get_header(); ?>
<section class="spray-logo container">
    <div class="row">
        <div class="col-12 col-sm-6">
            <div class="spray row">
                <div class="v col-6">
                    <div class="dot-row" data-top="4" data-left-from="-8" data-left-to="35"></div>
                    <div class="dot-row" data-top="15" data-left-from="-5" data-left-to="37"></div>
                    <div class="dot-row" data-top="26" data-left-from="-2" data-left-to="41"></div>
                    <div class="dot-row" data-top="37" data-left-from="-2" data-left-to="41"></div>
                    <div class="dot-row" data-top="48" data-left-from="-1" data-left-to="44"></div>
                    <div class="dot-row" data-top="59" data-left-from="-1" data-left-to="44"></div>
                    <div class="dot-row" data-top="70" data-left-from="-4" data-left-to="76"></div>
                    <div class="dot-row" data-top="81" data-left-from="-4" data-left-to="76"></div>
                    <div class="dot-row" data-top="92" data-left-from="-4" data-left-to="76"></div>
                    <div class="dot-row" data-top="95" data-left-from="-4" data-left-to="76"></div>
                    <div class="dot-row" data-top="4" data-left-from="65" data-left-to="93"></div>
                    <div class="dot-row" data-top="15" data-left-from="47" data-left-to="90"></div>
                    <div class="dot-row" data-top="26" data-left-from="44" data-left-to="87"></div>
                    <div class="dot-row" data-top="37" data-left-from="44" data-left-to="87"></div>
                    <div class="dot-row" data-top="48" data-left-from="44" data-left-to="87"></div>
                    <div class="dot-row" data-top="59" data-left-from="44" data-left-to="87"></div>
                </div>
                <div class="a col-6">
                    <div class="dot-row" data-top="4" data-left-from="15" data-left-to="85"></div>
                    <div class="dot-row" data-top="15" data-left-from="10" data-left-to="45"></div>
                    <div class="dot-row" data-top="26" data-left-from="5" data-left-to="50"></div>
                    <div class="dot-row" data-top="37" data-left-from="0" data-left-to="40"></div>
                    <div class="dot-row" data-top="48" data-left-from="-5" data-left-to="50"></div>
                    <div class="dot-row" data-top="59" data-left-from="-10" data-left-to="40"></div>
                    <div class="dot-row" data-top="70" data-left-from="-10" data-left-to="45"></div>
                    <div class="dot-row" data-top="81" data-left-from="-10" data-left-to="50"></div>
                    <div class="dot-row" data-top="92" data-left-from="-10" data-left-to="30"></div>
                    <div class="dot-row" data-top="95" data-left-from="-10" data-left-to="30"></div>
                    <div class="dot-row" data-top="15" data-left-from="45" data-left-to="90"></div>
                    <div class="dot-row" data-top="26" data-left-from="50" data-left-to="95"></div>
                    <div class="dot-row" data-top="37" data-left-from="40" data-left-to="100"></div>
                    <div class="dot-row" data-top="48" data-left-from="50" data-left-to="100"></div>
                    <div class="dot-row" data-top="59" data-left-from="40" data-left-to="100"></div>
                    <div class="dot-row" data-top="70" data-left-from="45" data-left-to="100"></div>
                    <div class="dot-row" data-top="81" data-left-from="50" data-left-to="100"></div>
                    <div class="dot-row" data-top="92" data-left-from="50" data-left-to="100"></div>
                    <div class="dot-row" data-top="95" data-left-from="50" data-left-to="100"></div>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-6">
            <h1 class="variaktion">
                Va<span>r</span>iaktion
            </h1>

            Variaktion ist ein Jugendfestival das vom 19. bis am 21. Juni stattfindet.

            <?php

            echo "<div class='sponsors'>";

            echo '<h2>Sponsoren</h2>';

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

            foreach ($slugs as $slug => $v) {
                echo "<div class='row tier-" . $v['tier'] . "'>";
                foreach (sponsorsByCategory($slug) as $post) {
                    echo "<div class='" . $v['col'] . "'>" . get_the_post_thumbnail($post) . "</div>";
                }
                echo "</div>";
            }

            echo "</div>";
            ?>

            <a href="/sponsor-werden">Auch Sponsor werden?</a>
        </div>
    </div>
</section>

<?php echo file_get_contents(locate_template("img/water-entry.svg")); ?>
<section class="lineup">
    <div class="container">
        <h2 class="h2">Lineup</h2>
        <div class="artists">
            <div class="tier-1">TBA</div>
            <div class="tier-2">
                <div>M'Ghadi (LU)</div>
            </div>
            <div class="tier-3">
                <div>Pato (SO)</div>
                <div>2001 (CH)</div>
            </div>
        </div>
    </div>
</section>

<section class="map">
    <div class="container">
        <h2 class="h2">Location</h2>
    </div>
    <?php echo file_get_contents(locate_template("img/map.svg")); ?>
</section>

<section class="help">
    <?php echo file_get_contents(locate_template("img/green-stuff.svg")); ?>
    <div class="container">
        <div class="date row">
            <div class="col-6"></div>
            <div class="col-6">
                <h2 class="h2">19.–21. Juni 2020</h2>
            </div>
        </div>
        <h2 class="h2">Helfer gesucht</h2>
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

<?php get_footer(); ?>