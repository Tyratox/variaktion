<?php

/*
 * Template Name: Leere Seite
 */

the_post();

get_header("html");

?>
<div style="background-color:<?php echo get_field("header-color"); ?>; min-height: 100%;">
	<div class="page">
        <div class="container">
            <div class="page-content">
                <?php the_content(); ?>
            </div>
        </div>
    </div>
</div>

<?php wp_footer(); ?>