<?php

/*
 * Template Name: Frontpage 2025 (farbig)
 */

wp_enqueue_style('primary-2025');
get_template_part("header/2025-color/header", "banner");

the_post();

$pageId = get_the_ID();

?>
<section id="particles">
	<div id="color-background"></div>
    <div class="spray-logo" style="position:relative;">
        <?php
          echo file_get_contents(locate_template("img/191228_logo_mini_negative.svg"));
        ?>
    </div>
</section>

<?php get_template_part("header/2025-color/header", "nav"); ?>

<?php
	
	/*
		<section id="lineup" class="lineup">
	<div id="lineup-background"></div>
    <div class="container">
        <div class="artists">
            <?php
	            
	        $dates = array('saturday' => array('name' => 'samstag, 3. juni'));

            function acts_by_category_date($category, $date){
                $query = new WP_Query(array(
                    "post_type" => "act",
                    "posts_per_page" => -1,
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'act_category',
                            'field' => 'slug',
                            'terms' => $category,
                        ),
                        array(
                            'taxonomy' => 'act_date',
                            'field' => 'slug',
                            'terms' => $date,
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

            $slugs = array(
	            'tier-1' => array(
	                'tier' => 1,
	            ),
	            'tier-2' => array(
                	'tier' => 2
				),
	            'tier-3' => array(
                	'tier' => 3
				)
            );
            
            foreach($dates as $date => $dv){
	            
	            echo "<div class='date'>" . $dv['name'] . "</div>";
	            
	            foreach($slugs as $slug => $v) {
	                echo "<div class='row tier-" . $v['tier'] . "'>";
	                foreach(acts_by_category_date($slug, $date) as $post) {
	                    $origin = get_field('origin', $post->ID);
	                    $time = get_field('time', $post->ID);
	                    $link = get_field('link', $post->ID);
	                    
	                    if(empty($link)){
		                    echo "<div class='artist'><span>" . $post->post_title . "</span><wbr><small>" . $time . "</small>" . "</div>";
	                    }else{
		                    echo "<a class='artist' href='" . $link . "' target='_blank'><span>" . $post->post_title . "</span><wbr><small>" . $time . "</small>" . "</a>";
	                    }
	                }
	                echo "</div>";
	            }
            }


            ?>
        </div>
        <div class="artists col-6">
			<?php echo apply_filters('the_content', get_the_content(null, false, 847)); ?>
        </div>
    </div>
</section>

<?php echo file_get_contents(locate_template("img/2025/lineup-end.svg")); ?>

*/?>



<a class="map-link" target="_blank" href="https://www.google.com/maps/place/47%C2%B023'37.9%22N+8%C2%B002'22.1%22E/@47.3938422,8.0389436,19z/data=!4m6!3m5!1s0x0:0xa158492c8bb16311!7e2!8m2!3d47.3938638!4d8.0394719">
<section id="wo" class="map">
    <div class="container">
        <div class="title">
            <h2 class="h2">Wo</h2>
            <p>Das Variaktion findet auf der <u class="pulse">Pontonierwiese in Aarau</u> statt.</p>
        </div>
    </div>
    <?php echo file_get_contents(locate_template("img/2025/map.svg")); ?>
</section>
</a>

<?php echo file_get_contents(locate_template("img/2025/map-end.svg")); ?>

<?php
	
/*
<section id="programm" class="programm">
	<div class="container row">
        <div class="title">
            <h2 class="h2">Programm</h3>
        </div>
        
        <table class="table">
		    <tbody>
			   <tr>
				   <td>17:00-22:00</td>
				   <td>
					   🎵 Konzerte, siehe <a class="pulse" href="#lineup">Lineup</a>
				   </td>
			   </tr>
			   <tr>
				   <td>22:00-04:00</td>
				   <td>
					   <p>🪩 <span class="anton">Night Pulse</span> (2000er Hits): Variaktion Afterparty im Flösserplatz</p>		    
					    <p>🔗
						    <a class="pulse" href="https://www.floesserplatz.ch/de/programm/2025/juni/night-pulse1" target="_blank">Mehr Infos</a>,
						    <a class="pulse" href="https://eventfrog.ch/de/p/party/hip-hop-rap/night-pulse-7049686903277118251.html" target="_blank">Tickets</a>
					    </p>
					   
				   </td>
			   </tr>
		    </tbody>
	    </table>
    </div>
</section>

<?php echo file_get_contents(locate_template("img/2025/programm-end.svg")); ?>

*/

?>


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


<?php echo file_get_contents(locate_template("img/2025/support-end.svg")); ?>

<?php /*<section id="press" class="press">
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
<?php echo file_get_contents(locate_template("img/2025/press-end.svg")); ?>*/?>
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
<?php echo file_get_contents(locate_template("img/2025/sponsors-end.svg")); ?>
<section class="previous-years">
	<div class='container' id='previous-years'>
		<h2 class="h2">Vorherige Jahre</h2>
		<ul>
			<li><a href="/festival-2023">2023</a></li>
			<li><a href="/festival-2022">2022</a></li>
		</ul>
	</div>
</section>

<?php get_footer(); ?>