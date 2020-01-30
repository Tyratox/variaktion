<?php get_header("nav"); ?>

<?php while (have_posts()) :
    the_post();
?>
    <div class="container">
        <h2 class="h2"><?php the_title(); ?></h2>
        <div class="page-content">
            <?php the_content(); ?>
        </div>
    </div>

<?php endwhile; ?>
<?php get_footer(); ?>