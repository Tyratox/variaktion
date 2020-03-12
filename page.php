<?php
the_post();

$design = get_field("page-design");

if ($design == "normal") {
    get_header("banner");
} else if ($design == "negative") {
    get_header("negative-banner");
}
?>
<div class="page-design-<?php echo $design; ?>" style="background-color:<?php echo get_field("header-color"); ?>;">
    <div class="page-heading">
    </div>
    <?php get_header("nav"); ?>
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