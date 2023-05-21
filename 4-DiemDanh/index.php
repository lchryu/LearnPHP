<?php
//if (isset($_GET['controller']) && isset($_GET['action'])) {
//    $controllerName = $_GET['controller'] . 'Controller';
//    $actionName = $_GET['action'];
//
//    require_once 'controllers/' . $controllerName . '.php';
//
//    $controller = new $controllerName();
//    $controller->$actionName();
//} else {
//    // Default route
//    header('Location: index.php?controller=Attendance&action=index');
//}
require_once __DIR__ . '/controllers/AttendanceController.php';
require_once __DIR__ . '/database/Connection.php';
require_once './models/StudentModel.php';
try {
    $db = Connection::getConnection();
    echo "Database connection successful!";
} catch (PDOException $e) {
    echo "Database connection failed: " . $e->getMessage();
}

$studentModel = new StudentModel(Connection::getConnection()); // Assuming you have an instance of PDO named $db
$students = $studentModel->getAllStudents();