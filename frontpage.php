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
        <div class="spray-logo" style="position:relative;">
            <?php
              echo file_get_contents(locate_template("img/191228_logo_mini_negative.svg"));
            ?>
            <?php
	        /*<div style="position:absolute;left:50%;top:50%;transform:translate(-50%, -50%);font-size:5rem;text-align:center;color:#fff;font-family:Anton, sans-serif;">
	            Das Variaktion findet neu vom 17.-19. Juni 2022 statt!
	        </div>*/
	        ?>
        </div>
    </div>
</section>

<?php get_header("nav"); ?>

<section id="lineup" class="lineup">
	<div id="lineup-background"></div>
	<div id="lineup-bbackground"></div>
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
                    $time = get_field('time', $post->ID);

                    echo "<div class='artist'><span>" . $post->post_title . "</span><wbr><small>" . $time . "</small>" . "</div>";
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
<?php echo file_get_contents(locate_template("img/support-end.svg")); ?>
<section id="press">
	<div class="container">
		<h2 class="h2">Presse</h2>
		<div class="press-articles">
			<?php
				
				$query = new WP_Query(array(
		            "post_type" => "press-article",
		            "posts_per_page" => -1,
		            "order" => "ASC",
		            "orderby" => "date"
		        ));
		
		        foreach($query->posts as $post){
			        echo '<a href="' . get_field('article_url', $post) . '" target="_blank">';
			        	echo '<div class="row">';
					        echo '<div class="col-12 col-md-4">';
					        	echo '<h3>' . get_field('newspaper', $post) . '</h3>';
					        	echo '<p>' . get_the_date('d.m.Y H:i', $post) . '</p>';
					        	echo '<p><u>Zum Artikel</u></p>';
							echo '</div>';
							echo '<div class="col-12 col-md-8">';
								echo '<h3>' . $post->post_title . '</h3>';
								echo '<div>' . apply_filters('the_content', $post->post_content) . '</div>';
							echo '</div>';
						echo '</div>';
					echo '</a>';
		        }
				
			?>
		</div>
	</div>
</section>
<?php echo file_get_contents(locate_template("img/press-end.svg")); ?>
<section class="sponsors">
    <?php

    echo "<div class='container' id='sponsors'>";

    echo '<h2 class="h2">Sponsoren</h2>';

    $x = get_field("sponsor-text");

    function sponsorsByCategory($slug)
    {
        $query = new WP_Query(array(
            "post_type" => "sponsor",
            "posts_per_page" => -1,
            "order" => "ASC",
            "orderby" => "date",
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