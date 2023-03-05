<?php
the_post();

wp_enqueue_style('primary-2023');

$design = get_field("page-design");

if (empty($design) || $design == "normal") {
    get_template_part("header/2023/header", "banner");
} else if ($design == "negative") {
    get_template_part("header/2023/header", "negative-banner");
}
/*
	<div class="page-design-<?php echo $design; ?>" style="background-color:<?php echo get_field("header-color"); ?>;">
*/
?>
<div class="page-design-<?php echo $design; ?>">
    <div class="page-heading">
    </div>
    <?php get_template_part("header/2023/header", "nav"); ?>
    <div class="page">
        <div class="container">
            <h2 class="h2"><?php the_title(); ?></h2>
            <div class="page-content">
                <?php the_content(); ?>
            </div>
        </div>

        <?php get_footer(); ?>
    </div>
</div>