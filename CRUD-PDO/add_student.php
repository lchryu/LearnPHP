<?php
require_once 'db_connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $masv = $_POST['masv'];
    $hoten = $_POST['hoten'];
    $lop = $_POST['lop'];

    // Thêm sinh viên vào cơ sở dữ liệu
    $sql = "INSERT INTO sinhvien (masv, hoten, lop) VALUES (:masv, :hoten, :lop)";
    $statement = $pdo->prepare($sql);
    $statement->execute(['masv' => $masv, 'hoten' => $hoten, 'lop' => $lop]);

    // Chuyển hướng về trang chính
    header("Location: index.php");
    exit();
}
?>