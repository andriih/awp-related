<?php

	if(!defined(WP_UNINSTALL_PLUGIN)) exit;

	global $wpdb;

	$query = "AlTER TABLE $wpdb->posts DROP awp_views";
	$wpdb->query($query);
?>