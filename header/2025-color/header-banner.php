<?php
	
	wp_enqueue_script('flucht');
	get_template_part("header/2022-color/header", "html");
		
?>

<header>
    <div class="container">
        <div class="row header-row">
            <div class="col-6">
                <?php echo file_get_contents(locate_template("img/2025/header-title-negative.svg")); ?>

            </div>
            <div class="col-6">
                <?php echo file_get_contents(locate_template("img/2025/header-description-alt-negative.svg")); ?>
            </div>
		</div>
    </div>
</header>