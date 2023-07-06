<?php
// Load the configuration
require_once 'config.php';

// Start the session
session_start();

// Get the controller and action from the request
$controller = $_GET['controller'] ?? 'cart';
$action = $_GET['action'] ?? 'index';

// Create the controller class name
$controllerClassName = ucfirst($controller) . 'Controller';
$controllerFile = "controllers/$controllerClassName.php";

// Check if the controller file exists
if (file_exists($controllerFile)) {
    // Load the controller
    require_once $controllerFile;

    // Create an instance of the controller
    $controllerInstance = new $controllerClassName();

    // Check if the action method exists
    if (method_exists($controllerInstance, $action)) {
        // Call the action method
        $controllerInstance->$action();
    } else {
        // Invalid action
        die('Invalid action');
    }
} elseif ($controller === 'products' && $action === 'list') {
    // Handle the "products/list" route
    require_once './Views/product_list.php';
} else {
    // Invalid controller or route
    die('Invalid controller or route');
}
?>