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
		// wp_enqueue_script('flucht');

		wp_register_script('smooth-scroll', get_template_directory_uri() . '/js/min/smooth-scroll.min.js', array());
		wp_enqueue_script('smooth-scroll');
		//wp_register_script('hacks', get_template_directory_uri() . '/js/min/hacks.min.js', array());
		//wp_enqueue_script('hacks');
		// wp_register_script('particles-js', get_template_directory_uri() . '/node_modules/particles.js/particles.js', array());
		// wp_enqueue_script('particles-js');
		// wp_register_script('particles', get_template_directory_uri() . '/js/min/particles.min.js', array('particles-js'));
		// wp_enqueue_script('particles');
	}
	public function enqueue_styles()
	{
		wp_register_style('primary-2022-color', get_template_directory_uri() . '/css/style-2022.css', array(), "1.1.19");
		wp_register_style('primary-2023', get_template_directory_uri() . '/css/2023/style-2023.css', array(), "1.1.5");
		
		wp_register_style('primary-2025', get_template_directory_uri() . '/css/2025/style-2025.css', array(), "1.0.1");
		// wp_enqueue_style('primary-2022-color');
	}
}


new VA_Enqueues();
