<?php get_template_part("header/2023/header", "html"); ?>

<header>
    <div class="container">
	    <a href="/">
	        <div class="row">
	            <div class="col-6">
	                <?php echo file_get_contents(locate_template("img/header-title.svg")); ?>
	
	            </div>
	            <div class="col-6">
	                <?php echo file_get_contents(locate_template("img/2023/header-description.svg")); ?>
	            </div>
	        </div>
	    </a>
    </div>
</header>