<?php
require_once '../database/Connection.php';
class AttendanceController {
    public function index() {
        // Retrieve attendance records and render the view
        require_once 'views/attendance/index.php';
    }

    public function create()
    {
        // Load the list of students from the StudentModel
//        $studentModel = new StudentModel(Connection::getConnection()); // Assuming you have an instance of PDO named $db
//        $students = $studentModel->getAllStudents();

        // Pass the students data to the view
        require_once 'views/attendance/create.php';
    }
    
    public function show($id) {
        // Retrieve and display a specific attendance record
        require_once 'views/attendance/show.php';
    }
    
    public function edit($id) {
        // Handle form submission for editing attendance
        require_once 'views/attendance/edit.php';
    }
    
    public function report() {
        // Generate attendance report and render the view
        require_once 'views/attendance/report.php';
    }
}
