<?php

global $jal_db_version;
$jal_db_version = '1.0';


function adopt_install_table()
{
	global $wpdb;
	global $jal_db_version;

	$table_name = $wpdb->prefix . 'disclaimerInfor';

	$charset_collate = $wpdb->get_charset_collate();

	$sql = "CREATE TABLE $table_name (
		id mediumint(9) NOT NULL AUTO_INCREMENT,
		created_at timestamp NOT NULL,
		disclaimerId text NOT NULL,
		text text NOT NULL,
		PRIMARY KEY  (id)
	) $charset_collate;";

	require_once ABSPATH . 'wp-admin/includes/upgrade.php';
	dbDelta($sql);

	add_option('jal_db_version', $jal_db_version);
}


function Adp_activate()
{
	if (version_compare(get_bloginfo('version'), '5.9.3', '<')) {
		wp_die(__('You need to update your wordpress version', 'adopt'));
	} else {
		adopt_install_table();
	}
}

function  Adp_desactivate()
{
	
}