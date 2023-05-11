<?php
// nhận dữ liêu từ form
$ht = $_POST['hoten'];
$masv = $_POST['masv'];
$lop = $_POST['lop'];
$id = $_POST['sid'];

// kết nối cơ sở dữ liệu
require_once 'ketnoi.php';

// viết lệnh sql để thêm dữ liệu
$update_sql = "UPDATE sinhvien SET masv = '$masv', hoten = '$ht', lop='$lop' WHERE id = $id";
// thực thi câu lệnh sql
if (mysqli_query($ketnoi, $update_sql)) {
    header("Location:index.php");
}