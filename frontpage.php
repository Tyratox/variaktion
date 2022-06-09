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
</section>

<?php get_header("nav"); ?>

<section id="lineup" class="lineup">
	<div id="lineup-background"></div>
	<div id="lineup-bbackground"></div>
    <div class="container row">
	    <div class="artists col-6">
		    <div class='date'>Lineup</div>
		    <div class='row tier-1'>
				<a class='artist' href="https://www.instagram.com/sensu/" target="_blank">
					<span>Sensu</span>
				</a>
				<a class='artist' href="https://www.instagram.com/palma_ada_/" target="_blank">
					<span>Palma Ada</span>
				</a>
				<a class='artist' href="https://www.instagram.com/naomi_lareine/" target="_blank">
					<span>Naomi Lareine</span>
				</a>
		    </div>
		    <div class='row tier-2'>
				<a class='artist' href="https://www.instagram.com/caachiiita/" target="_blank">
					<span>Cachita</span>
				</a>
				<a class='artist' href="https://www.instagram.com/pato.music/" target="_blank">
					<span>Pato</span>
				</a>
				<a class='artist' href="https://www.instagram.com/sansmattia/" target="_blank">
					<span>San Mattia</span>
				</a>
				<a class='artist' href="https://www.instagram.com/nola__kin/" target="_blank">
					<span>Nola Kin</span>
				</a>
				<a class='artist' href="https://www.instagram.com/meldaymusic/" target="_blank">
					<span>Melday</span>
				</a>
				<a class='artist' href="https://www.instagram.com/m_s_crew_official/" target="_blank">
					<span>M's Crew</span>
				</a>
		    </div>
	    </div>
	    <div class="artists col-6">
		    <div class='date'>hör rein 🎧🔥</div>
            <iframe
            	class="spotify-player"
            	style="border-radius:12px"
            	src="https://open.spotify.com/embed/playlist/51IhkW6F73FsmYLQRTy6kG?utm_source=generator"
            	width="100%"
            	height="380"
            	frameBorder="0"
            	allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture"
            ></iframe>
        </div>
    </div>
</section>

<?php echo file_get_contents(locate_template("img/lineup-end.svg")); ?>


<a class="map-link" target="_blank" href="https://www.google.com/maps/place/47%C2%B023'37.9%22N+8%C2%B002'22.1%22E/@47.3938422,8.0389436,19z/data=!4m6!3m5!1s0x0:0xa158492c8bb16311!7e2!8m2!3d47.3938638!4d8.0394719">
<section id="wo" class="map">
    <div class="container">
        <div class="title">
            <h2 class="h2">Wo</h2>
            <p>Die Veranstaltung findet auf der <u class="pulse">Pontonirwiese in Aarau</u> statt.</p>
        </div>
    </div>
    <?php echo file_get_contents(locate_template("img/map.svg")); ?>
</section>
</a>

<?php echo file_get_contents(locate_template("img/info-end.svg")); ?>

<section id="wo-was" class="where-what-fr-sa">
	
	<div class="container row">
		<h2 class="h2">Was</h2>
		
        <div class="activities col-6">
			<div class='date'>Freitag & Samstag</div>
			<div class='row tier-2'>
				<div class='activity'>
					<span>Hotdogstand</span>
					<wbr>
					<small>JARA</small>
				</div>
				<div class='activity'>
					<span>Crêpes</span>
					<wbr>
					<small>Rolling Bistro</small>
				</div>
				<div class='activity'>
					<span>Barbetrieb</span>
					<wbr>
					<small>Flösserplatz</small>
				</div>
				<div class='activity'>
					<span>Schlangenbrot</span>
					<wbr>
					<small>Pfadi & Jubla</small>
				</div>
				<div class='activity'>
					<span>Bücher & Roboter</span>
					<wbr>
					<small>Stadtbibliothek Aarau</small>
				</div>
				<div class='activity'>
					<span>Afterparties</span>
					<wbr>
					<small>Variaktion OK</small>
				</div>
				<div class='activity'>
					<span>Live-Übertragung</span>
					<wbr>
					<small>Radio Summernight</small>
				</div>
				<div class='activity'>
					<span>Weitere Partnerstände</span>
					<wbr>
					<small>Kulturdünger & Jamarama</small>
				</div>
			</div>
		</div>
	</div>
</section>

<?php echo file_get_contents(locate_template("img/support-end.svg")); ?>

<section id="wo-was" class="where-what-so">
	<div class="container row">
        <div class="activities col-6">
			<div class='date'>Sonntag (Familientag)</div>
			<div class='row tier-2'>
				<div class='activity'>
					<span>Zaubershow</span>
				</div>
				<div class='activity'>
					<span>Schminkecke</span>
				</div>
				<div class='activity'>
					<span>Tanzvorführungen</span>
				</div>
				<div class='activity'>
					<span>Riesen-Seifenblasen</span>
				</div>
				<div class='activity'>
					<span>Geschichtenerzähler</span>
				</div>
				<div class='activity'>
					<span>Hotdogstand</span>
				</div>
				<div class='activity'>
					<span>Crêpes</span>
				</div>
				<div class='activity'>
					<span>Barbetrieb</span>
				</div>
			</div>
        </div>
	</div>
</section>

<?php echo file_get_contents(locate_template("img/where-what-end.svg")); ?>

<section id="programm" class="programm">
	<div class="container row">
        <div id="family-day">
	        
	        <div class="title">
	            <h2 class="h2">Freitag, 17.</h3>
	        </div>
	        
	        <table class="table">
			    <tbody>
				   <tr>
					   <td>17:00</td>
					   <td>
						   😜 Öffnung Festivalgelände
					   </td>
				   </tr> 
				   <tr>
					   <td>18:00-19:00</td>
					   <td>
						   San Mattia
					   </td>
				   </tr>
				   <tr>
					   <td>19:00-20:00</td>
					   <td>
						   Pato
					   </td>
				   </tr>
				   <tr>
					   <td>20:00-21:00</td>
					   <td>
						   Cachita
					   </td>
				   </tr>
				   <tr>
					   <td>21:00-22:00</td>
					   <td>
						   Naomi Lareine
					   </td>
				   </tr>
				   <tr>
					   <td>22:00-04:00</td>
					   <td>
						   🪩 <span class="anton">DUNSTCHREIS</span> (New Wave HipHop): Variaktion Afterparty im Flösserplatz
					   </td>
				   </tr>
			    </tbody>
		    </table>
	        
	        <div class="title">
	            <h2 class="h2">Samstag, 17.</h3>
	        </div>
	        
	        <table class="table">
			    <tbody>
				   <tr>
					   <td>14:00</td>
					   <td>
						   😜 Öffnung Festivalgelände
					   </td>
				   </tr>
				   <tr>
					   <td>15:00-18:00</td>
					   <td>
						   🎤 Open-Stage Auftritte
					   </td>
				   </tr>
				   <tr>
					   <td>18:00-19:00</td>
					   <td>
						   M's Crew
					   </td>
				   </tr>
				   <tr>
					   <td>19:00-20:00</td>
					   <td>
						   Melday
					   </td>
				   </tr>
				   <tr>
					   <td>20:00-21:00</td>
					   <td>
						   Nola Kin
					   </td>
				   </tr>
				   <tr>
					   <td>21:00-22:00</td>
					   <td>
						   Palma Ada
					   </td>
				   </tr>
				   <tr>
					   <td>22:00-23:00</td>
					   <td>
						   Sensu
					   </td>
				   </tr>
				   <tr>
					   <td>22:00-04:00</td>
					   <td>
						   🪩 <span class="anton">DUNSTCHREIS</span> (Techno - Tech House - DnB): Variaktion Afterparty im Flösserplatz
					   </td>
				   </tr>
			    </tbody>
		    </table>
	        
	        <div class="title">
	            <h2 class="h2">Sonntag, 19.</h3>
	        </div>
	        
	        <p>Organisiert und koordiniert durch die Kirchen und Kinderförderung Aarau gibt es am Familientag folgendes Angebot: Kaffee- und Kuchenauswahl durch die Katholische Kirche Aarau, JARA Hotdogstand,Crêpes von Rolling Bistro, Flössi-Bar mit Softgetränken, Schlangenbrote über dem Feuer mit der Pfadi St. Georg, Knipsbox, DIY Bändeli knüpfen,
Stand der Stadtbibliothek Aarau mit Büchern und Roboter, diverses Spielmaterial.</p>
		    
		    <table class="table">
			    <tbody>
				    <tr>
					   <td>11:00</td>
					   <td>
						   Öffnung Festivalgelände
					   </td>
				   </tr>
				   <tr>
					   <td>13:00-14:00</td>
					   <td>
						   💃 Tanzauftritte der Roundabout-Gruppen Aarau
					   </td>
				   </tr>
				   <tr>
					   <td>14:00-14:30</td>
					   <td>
						   🪄 Zaubershow
					   </td>
				   </tr>
				   <tr>
					   <td>14:30-15:30</td>
					   <td>
						   <ul>
							   <li>💃 Tanzen lernen</li>
							   <li>🪄 Selber zaubern lernen</li>
						   </ul>
					   </td>
				   </tr>
				   <tr>
					   <td>14:30-17:00</td>
					   <td>
						   <ul>
							   <li>🫧 Riesen-Seifenblasen</li>
							   <li>💄 Schminken</li>
							   <li>🟢 Selber Slime herstellen</li>
							   <li>🎲 Spielangebot der Jubla</li>
							   <li>🤖 Robotik</li>
						   </ul>
					   </td>
				   </tr>
				   <tr>
					   <td>15:30-17:00</td>
					   <td>
						   🪩 Openair Disco
					   </td>
				   </tr>
			    </tbody>
		    </table>
		    
	    </div>
    </div>
</section>

<?php echo file_get_contents(locate_template("img/programm-end.svg")); ?>

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