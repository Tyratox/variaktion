<?php

/*
 * Template Name: Leere Seite (2022)
 */
 
wp_enqueue_style('primary-2022-color');

the_post();

get_template_part("header/2022-color/header", "html");

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