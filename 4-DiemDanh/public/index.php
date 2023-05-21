<?php

// Bootstrap the application and load necessary files
require_once '../app/controllers/AttendanceController.php';
require_once '../app/controllers/AuthController.php';
require_once '../config/database.php';

// Instantiate the controllers
$attendanceController = new AttendanceController();
$authController = new AuthController();

// Handle routing and requests
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {
    $action = $_POST['action'];
    switch ($action) {
        case 'login':
            $authController->login();
            break;
        case 'markAttendance':
            $attendanceController->markAttendance();
            break;
        // handle other actions
        default:
            // handle unknown action
            break;
    }
} else {
    // handle default view or redirect to appropriate page
}
