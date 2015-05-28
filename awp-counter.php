<?php 
	/*
	Plugin Name: AWP Counter
	Description: Плагін рахує кулькість переглядів
	Plugin URI: http://#
	Author: Andrii Hnatyshyn
	Author URI: http://#
	Version: 1.0
	License: GPL2
	Text Domain: Text Domain
	Domain Path: Domain Path
	*/
	
	register_activation_hook( __FILE__, 'awp_add_field' );
	add_filter('the_content' , 'awp_views');

	function awp_views ($content)
	{	
		if( is_page( )) return $content;
		
		global $post;
		
		$views = $post->awp_views;
		if(is_single()) $views+=1;
		//print_r($views);
		return $content . "<b>Кількість переглядів : </b>" . $views;
	}

	function awp_add_field() 
	{
		global $wpdb;

		$query = "AlTER TABLE $wpdb->posts ADD awp_views INT NOT NULL DEFAULT '0'";
		$wpdb->query($query);
	}
	
?>