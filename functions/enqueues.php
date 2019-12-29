<?php

class VA_Enqueues
{
	public function __construct()
	{
		add_action('wp_enqueue_scripts', array($this, 'enqueue_scripts'));
		add_action('wp_enqueue_scripts', array($this, 'enqueue_styles'));
	}

	public function enqueue_scripts()
	{
		wp_register_script('flucht', get_template_directory_uri() . '/js/min/flucht.min.js', array());
		wp_enqueue_script('flucht');
	}
	public function enqueue_styles()
	{
		wp_register_style('primary', get_template_directory_uri() . '/css/style.css', array());
		wp_enqueue_style('primary');
	}
}


new VA_Enqueues();
