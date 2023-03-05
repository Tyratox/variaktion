<?php

/*
 * Template Name: Frontpage 2023 (schwarz-weiss)
 */

wp_enqueue_style('primary-2023');
get_template_part("header/2023/header", "banner");

the_post();

$pageId = get_the_ID();

?>
<section id="particles">
    <div class="spray-logo" style="position:relative;">
        <?php
          echo file_get_contents(locate_template("img/191228_logo_mini.svg"));
        ?>
    </div>
</section>

<?php get_template_part("header/2023/header", "nav"); ?>

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

<section id="press">
	<div class="container">
		<h2 class="h2">Presse</h2>
		<div class="press-articles">
			<?php
				
				$query = new WP_Query(array(
		            "post_type" => "press-article",
		            "posts_per_page" => -1,
		            "order" => "DESC",
		            "orderby" => "date",
		            'tax_query' => array(
		                array(
		                    'taxonomy' => 'variaktion_year',
		                    'field' => 'slug',
		                    'terms' => '2023',
		                )
		            ),
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
                ),
                array(
                    'taxonomy' => 'variaktion_year',
                    'field' => 'slug',
                    'terms' => '2023',
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

<section class="previous-years">
	<div class='container' id='previous-years'>
		<h2 class="h2">Vorherige Jahre</h2>
		<ul>
			<li><a href="/festival-2022">2022</a></li>
		</ul>
	</div>
</section>

<?php get_footer(); ?>