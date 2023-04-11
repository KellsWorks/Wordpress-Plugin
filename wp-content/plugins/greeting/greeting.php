<?php
/*
Plugin Name: Greeting
Plugin URI: https://greeting-plugin.com
Description: A plugin that stores and displays a greeting on the WordPress Admin screen
Version: 1.0.0
Author: kelvin Chidothi
Author URI: https://greeting-plugin.com/author
License: GPL2
*/

/***
 * API endpoint to store the greeting
 * @method add_action
 */
add_action('rest_api_init', function () {
    register_rest_route('greeting-plugin/v1', '/greeting', array(
        'methods' => 'POST',
        'callback' => 'store_greeting',
        'permission_callback' => function () {
            return current_user_can('edit_posts');
        },
    ));
});

/***
 * Callback function to store the greeting in the database
 * @method store_greetinh
 */
function store_greeting($request) {
    $greeting = $request->get_param('greeting');
    
    return array(
        'status' => 'success',
        'message' => 'Greeting stored successfully',
    );
}
