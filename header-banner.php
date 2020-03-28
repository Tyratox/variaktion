<?php get_header("html"); ?>

<header>
    <div class="container">
        <div class="row">
            <div class="col-6">
                <?php echo file_get_contents(locate_template("img/header-title.svg")); ?>

            </div>
            <div class="col-6">
                <?php //echo file_get_contents(locate_template("img/header-description.svg")); 
                ?>
            </div>
        </div>
    </div>
</header>