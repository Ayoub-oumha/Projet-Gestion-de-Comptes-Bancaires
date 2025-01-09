<?php
    require_once __DIR__ . "/../config/class_admin/dbconection.php";
require_once 'AdminController.php';

// Initialize database connection
$database = new Database();
$db = $database->connect();

// Create the controller instance
$adminController = new AdminController($db);

// Handle the form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $result = $adminController->handleAddClientForm($_POST, $_FILES);

    // Redirect or show a message
    if ($result === "Client account created successfully!") {
        header('Location: ../views/success.php');
    } else {
        echo $result; // Show error message
    }
}
?>
