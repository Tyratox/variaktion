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
		//add_filter('comments_open', '__return_false', 20, 2);
		add_filter('pings_open', '__return_false', 20, 2);
		add_filter('comment_form_fields', array($this, 'move_comment_field_to_bottom'));
		// Hide existing comments
		//add_filter('comments_array', '__return_empty_array', 10, 2);
		//Allow empty comments
		add_filter('allow_empty_comment', '__return_true');
		add_filter('comment_text', array($this, 'allow_empty_comment_text'));
		add_filter('comment_post_redirect', array($this, 'redirect_after_comment'));
		//send email on comment
		add_action('comment_post', array($this, 'on_comment'));

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

		if (/*$pagenow === 'edit-comments.php' || */$pagenow === "edit.php" && !isset($_GET["post_type"])) {
			wp_redirect(admin_url());
			exit;
		}
		// Remove comments metabox from dashboard
		//remove_meta_box('dashboard_recent_comments', 'dashboard', 'normal');
		// Disable support for comments and trackbacks in post types
		foreach (get_post_types() as $post_type) {
			if (post_type_supports($post_type, 'comments')) {
				//remove_post_type_support($post_type, 'comments');
				remove_post_type_support($post_type, 'trackbacks');
			}
		}
	}

	public function admin_menu()
	{
		remove_menu_page('edit.php');

		global $menu; // Global to get menu array
		$menu[25][0] = 'Helfer'; // Change name of posts to portfolio
		//remove_menu_page('edit-comments.php');
	}

	public function admin_footer()
	{
		echo '<script type="text/javascript">jQuery("#sponsor_categorychecklist input[type=checkbox]").each(function(){this.type="radio"});jQuery("#sponsor_category-add-toggle").remove();</script>';
	}

	public function move_comment_field_to_bottom($fields)
	{
		$comment_field = $fields['comment'];
		unset($fields['comment']);
		$fields['comment'] = $comment_field;
		return $fields;
	}

	public function allow_empty_comment_text($text = '')
	{
		if (empty($text)) {
			return "Keine spezifischen Interessen";
		}
		return $text;
	}

	public function redirect_after_comment()
	{
		return '/#help';
	}

	public function on_comment($commentId)
	{
		$comment = get_comment($commentId);
		wp_mail(
			$comment->email,
			"Variaktion | Vielen Dank für Dein Interesse",
			"Hallo " . $comment->name . "\n" .
				"Wir freuen uns sehr über deine Mithilfe und werden uns bei Dir melden.\n" .
				"Viele Grüsse\n"
		);
	}
}


new VA_Setup();
