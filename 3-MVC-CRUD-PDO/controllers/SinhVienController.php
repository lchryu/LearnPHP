<?php
require_once 'models/SinhVien.php';

class SinhVienController {
    private $model;

    public function __construct() {
        $this->model = new SinhVien();
    }

    public function index() {
        $sinhviens = $this->model->getAllSinhVien();
        require 'views/sinhviens/index.php';
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $masv = $_POST['masv'];
            $hoten = $_POST['hoten'];
            $lop = $_POST['lop'];

            $success = $this->model->addSinhVien($masv, $hoten, $lop);
            if ($success) {
                echo "Student added successfully.";
            } else {
                echo "Error adding student.";
            }
        }

        require 'views/sinhviens/create.php';
    }

    public function edit($id) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $masv = $_POST['masv'];
            $hoten = $_POST['hoten'];
            $lop = $_POST['lop'];

            $success = $this->model->updateSinhVien($id, $masv, $hoten, $lop);
            if ($success) {
                echo "Student updated successfully.";
            } else {
                echo "Error updating student.";
            }
        }

        $sinhvien = $this->model->getSinhVienById($id);
        require 'views/sinhviens/edit.php';
    }

    public function delete($id) {
        $success = $this->model->deleteSinhVien($id);
        if ($success) {
            echo "Student deleted successfully.";
        } else {
            echo "Error deleting student.";
        }
    }
}

// Handle actions
$action = isset($_GET['action']) ? $_GET['action'] : 'index';
$id = isset($_GET['id']) ? $_GET['id'] : null;

$controller = new SinhVienController();

if ($action === 'index') {
    $controller->index();
} elseif ($action === 'create') {
    $controller->create();
} elseif ($action === 'edit' && $id) {
    $controller->edit($id);
} elseif ($action === 'delete' && $id) {
    $controller->delete($id);
} else {
    echo "Invalid action.";
}
