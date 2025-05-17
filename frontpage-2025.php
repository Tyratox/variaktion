<?php

/*
 * Template Name: Frontpage 2025 (schwarz-weiss)
 */

wp_enqueue_style('primary-2025');
get_template_part("header/2025/header", "banner");

the_post();

$pageId = get_the_ID();

?>
<section id="particles">
    <div class="spray-logo" style="position:relative;">
        <?php
          echo file_get_contents(locate_template("img/2025/logo-mini-alt.svg"));
        ?>
    </div>
</section>

<?php get_template_part("header/2025/header", "nav"); ?>

<section id="info" class="info">
    <div class="container">
        <h2 class="h2">Save the Date</h2>
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
                        IBAN: CH06 0076 1648 8273 6200 1
                    </p>
                    <p>Verein Jugendkulturfestival Variaktion</p>
                    <p>c/o Jugendkulturhaus Flösserplatz</p>
                    <p>Flösserstrasse 7</p>
                    <p>5000 Aarau</p>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
	
	/*
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
		                    'terms' => '2025',
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
*/
?>

<section class="sponsors">
    <?php

    echo "<div class='container' id='sponsoring'>";

    echo '<h2 class="h2">Sponsoring</h2>';

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
                    'terms' => '2025',
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
    ), 'jugendarbeit' => array(
        'tier' => 5,
        'col' => 'col-3'
    )
    );

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
			<li><a href="/festival-2023">2023</a></li>
			<li><a href="/festival-2022">2022</a></li>
		</ul>
	</div>
</section>

<?php get_footer("white"); ?>