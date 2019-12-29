<?php

class VA_Setup
{
	public function __construct()
	{
		add_action('init', array($this, 'init'));
		add_action('admin_init', array($this, 'admin_init'));
		add_action('admin_menu', array($this, 'admin_menu'));
		add_action('admin_footer', array($this, 'admin_footer'));

		// Close comments on the front-end
		add_filter('comments_open', '__return_false', 20, 2);
		add_filter('pings_open', '__return_false', 20, 2);
		// Hide existing comments
		add_filter('comments_array', '__return_empty_array', 10, 2);

		//hide admin bar
		add_filter('show_admin_bar', '__return_false');
	}

	public function init()
	{
		if (is_admin_bar_showing()) {
			remove_action('admin_bar_menu', 'wp_admin_bar_comments_menu', 60);
		}
	}

	public function admin_init()
	{
		// Redirect any user trying to access comments page
		global $pagenow;

		if ($pagenow === 'edit-comments.php' || $pagenow === "edit.php" && !isset($_GET["post_type"])) {
			wp_redirect(admin_url());
			exit;
		}
		// Remove comments metabox from dashboard
		remove_meta_box('dashboard_recent_comments', 'dashboard', 'normal');
		// Disable support for comments and trackbacks in post types
		foreach (get_post_types() as $post_type) {
			if (post_type_supports($post_type, 'comments')) {
				remove_post_type_support($post_type, 'comments');
				remove_post_type_support($post_type, 'trackbacks');
			}
		}
	}

	public function admin_menu()
	{
		remove_menu_page('edit.php');
		remove_menu_page('edit-comments.php');
	}

	public function admin_footer()
	{
		echo '<script type="text/javascript">jQuery("#sponsor_categorychecklist input[type=checkbox]").each(function(){this.type="radio"});jQuery("#sponsor_category-add-toggle").remove();</script>';
	}
}


new VA_Setup();
