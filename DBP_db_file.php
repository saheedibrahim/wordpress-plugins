<?php
// Silence is golden.
/**Creating Database table for plugin */

/*
Plugin Name: Create Database table
Plugin URI: http://dbptbcreate.com/
Description: Create table for our plug.
Author: Saheed Ibrahim
Version: 1.0.0
Author URI: http://dbptbcreate.com/
License: GPL2
*/

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