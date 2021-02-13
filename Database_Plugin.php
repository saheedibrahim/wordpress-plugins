<?php
// Silence is golden.

// Silence is golden.
/**Creating Database table for plugin */

/*
Plugin Name: Database Plugin
Plugin URI: http://dbptbcreate.com/
Description: This is custom Plugin.
Author: Saheed Ibrahim
Version: 1.0.0
Author URI: http://dbptbcreate.com/
License: GPL2
*/

//direct absolute path to avoid direct path
if(!defined('ABSPATH')){
    define('ABSPATH', dirname(__FILE__). '/');
}

//include database file
include_once("DBP_db_file.php");

//register hook
register_activation_hook(__FILE__, "DBP_tb_create");



/*
function DBP_tb_Create(){
    global $wpdb;
    // step 1
    $DBP_db_name = $wpdb -> prefix ."dbp_tb_login";

    //step 2
    $DBP_query = "CREATE TABLE  $DBP_db_name(
        id int(10) NOT NULL AUTO_INCREMENT,
        user_name varchar (100) DEFAULT '',
        password varchar (100) DEFAULT '',
        email varchar (100) DEFAULT '',
        PRIMARY KEY (id)
        
    )";

    //step 3
    require_once(ABSPATH."wp-admin/includes/upgrade.php");
    dbDelta($DBP_query);

}
*/
