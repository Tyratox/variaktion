<?php

class VA_Helpers
{
	public function __construct()
	{
		add_action('comment_post', array($this, 'comment_post'));
	}

	public function comment_post($commentId)
	{
		$comment = get_comment($commentId);

		$message .= "Dies ist eine automatisch versendete E-Mail.\n\n";

		$message .= "Es hat sich soeben ein neuer Helfer für das Jugendfestival Variaktion angemeldet.\n\n";

		$message .= "Name: " . $comment->comment_author . "\n";
		$message .= "E-Mail: " . $comment->comment_author_email . "\n";
		$message .= "Spezifische Interessen: " . $comment->comment_content . "\n";
		$message .= "Geburtstag / Alter am Festival: " . get_field("age", $comment) . "\n";
		$message .= "Datum: " . $comment->comment_date . "\n\n";

		$message .= "Die gesamte Liste ist auf https://variaktion.ch/wp-admin/edit-comments.php zu finden.\n";

		$message .= "Bei Fragen Nico kontaktieren.\n";

		wp_mail("helfer@variaktion.ch", "Neuer Helfer für das Jugendfestival Variaktion", $message);
	}
}


new VA_Helpers();
