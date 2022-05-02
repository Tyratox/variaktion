<?php get_header("html"); ?>

<header>
    <div class="container">
	    <a href="/">
	        <div class="row">
	            <div class="col-6">
	                <?php echo file_get_contents(locate_template("img/header-title-negative.svg")); ?>
	
	            </div>
	            <div class="col-6">
	                <?php echo file_get_contents(locate_template("img/header-description-negative.svg")); ?>
	            </div>
	        </div>
	    </a>
    </div>
</header>