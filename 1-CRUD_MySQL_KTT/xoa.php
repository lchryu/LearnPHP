<?php
// lấy id cần xoá
$svid = $_GET['sid'];

// kết nối
require_once 'ketnoi.php';

// sql command
$xoa_sql = "DELETE FROM sinhvien WHERE id = $svid";
mysqli_query($ketnoi, $xoa_sql);

// trở về trang liệt kê
header("Location: index.php");