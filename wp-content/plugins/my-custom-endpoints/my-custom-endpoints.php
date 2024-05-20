<?php
/*
Plugin Name: My Custom Endpoints
Description: This plugin contains my custom REST API endpoints.
Version: 1.0.0
Author: Neil Pachter
Author URI: summitcountys1
*/

// Activation hook
register_activation_hook(__FILE__, 'my_custom_plugin_activate');

function custom_plugin_activate() {
    // Activation code here
}

// Deactivation hook
register_deactivation_hook(__FILE__, 'my_custom_endpoints_deactivate');

function custom_plugin_deactivate() {
    // Deactivation code here
}

// Define the custom API endpoint
function custom_api_endpoint_init() {
    register_rest_route('custom/v1', '/data/', array(
        'methods' => 'GET',
        'callback' => 'custom_api_get_data',
    ));
}
add_action('rest_api_init', 'custom_api_endpoint_init');

// Callback function to handle API requests
function custom_api_get_data($request) {
//    // API endpoint URL
//    $api_url = 'https://api.weather.gov/stations/KDEN/observations/latest';
//
//    // Initialize cURL session
//    $curl = curl_init();
//
//    // Set cURL options
//    curl_setopt_array($curl, array(
//        CURLOPT_URL => $api_url,
//        CURLOPT_RETURNTRANSFER => true,
//        CURLOPT_TIMEOUT => 30,
//        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
//        CURLOPT_CUSTOMREQUEST => 'GET',
//        CURLOPT_HTTPHEADER => array(
//            'Content-Type: application/json',
//            // Add any other headers as needed
//        ),
//    ));
//
//    // Execute cURL request
//    $response = curl_exec($curl);
//
//    // Check for cURL errors
//    if ($response === false) {
//        $data = curl_error($curl);
//        // Handle error
//    }
//
//    // Close cURL session
//    curl_close($curl);
//
//    // Process API response
//    if (!empty($response)) {
//        $data = json_decode($response, true);
//        // Process $data as needed
//    }
//
//    return rest_ensure_response($data);

    global $wpdb;

    // Custom SQL query
    $query = "SELECT * FROM {$wpdb->prefix}options";

    // Execute the query
    $results = $wpdb->get_results($query);

    // Check if there are results
    $options = array();
    $retStr = "";

    if ($results) {
        // Loop through the results
        foreach ($results as $option) {
            // Access post data
            $retStr .= str_replace("\\/", "/", json_encode($option)) . "\r\n";
//            $option .= "\r\n";
//            array_push($options, $option);
        }
    } else {
        echo "No options found.";
    }

    return rest_ensure_response($retStr);
//    return rest_ensure_response(json_encode($results[0]));
}

// Add custom column to the plugins list table
function custom_auto_update_plugin_column($columns) {
    $columns['auto_update'] = 'Auto-update';
    return $columns;
}
add_filter('plugin_install_action_links', 'custom_auto_update_plugin_column');

// Display enable auto-update checkbox
function custom_auto_update_plugin_checkbox($action_links, $plugin_file) {
    if ($plugin_file == plugin_basename(__FILE__))
        $action_links[] = '<a href="' . wp_nonce_url(admin_url('plugins.php?action=custom_enable_auto_update&plugin=' . $plugin_file), 'custom_enable_auto_update') . '">Enable My Auto-update</a>';
    return $action_links;
}
add_filter('plugin_action_links', 'custom_auto_update_plugin_checkbox', 10, 2);

// Process enable auto-update action
function custom_process_enable_auto_update() {
    check_admin_referer('custom_enable_auto_update');

    $plugin = isset($_GET['plugin']) ? $_GET['plugin'] : '';
    if ($plugin && current_user_can('activate_plugins')) {
        update_option('auto_update_' . $plugin, true);
    }

    wp_safe_redirect(admin_url('plugins.php'));
    exit;
}
add_action('admin_action_custom_enable_auto_update', 'custom_process_enable_auto_update');
