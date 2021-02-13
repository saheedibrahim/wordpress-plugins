<?php
/**
 * Plugin Name:       Welcome top bar
 * Plugin URI:        https://topbar.com/
 * Description:       This will add a welcome bar at the top of the page.
 * Version:           1.0.0
 * Author:            Saheed Ibrahim
 * Author URI:        https://topbar.com/
 **/

 //Add bar after the openg body
 add_action('wp_body_open', 'tb_head');

 
 function get_user_or_websitename()
 {
     if( !is_user_logged_in() )
     {
         return 'to ' . get_bloginfo('name');
     }
     else 
     {
         $current_user = wp_get_current_user();
         return $current_user -> user_login;
     }
 }


 function tb_head()
 {
     echo '<h3 class="tb">Welcome '.get_user_or_websitename().'</h3>';
 }

 add_action('wp_print_styles', 'tb_css');

 function tb_css()
 {
     echo '
     <style>
     h3.tb {
         color: fff; margin: 0; padding: 30px; text-align: center; background: orange;
     }
     </style>
     ';
 }

