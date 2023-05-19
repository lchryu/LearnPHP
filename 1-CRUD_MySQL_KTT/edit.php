<?php
// lấy id của edit
$id = $_GET['sid'];

// kết nối
require_once 'ketnoi.php';

// câu lệnh để lấy thông tin về sinh viên của id = $id
$edit_sql = "SELECT * FROM sinhvien WHERE id = $id";

$result = mysqli_query($ketnoi, $edit_sql);
$row = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit sinh vien</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<div class="container">
    <h1>Update Form</h1>
    <form action="update.php" method="post">
        <input type="hidden" name="sid" value="<?= $id ?>">
        <div class="form-group">
            <label for="hoten">Họ tên</label>
            <input type="text" id="hoten" class="form-control" name="hoten" value="<?= $row['hoten'] ?>">
        </div>
        <div class="form-group">
            <label for="masv">Mã sinh viên</label>
            <input type="text" id="masv" class="form-control" name="masv" value="<?= $row['masv'] ?>">
        </div>
        <div class="form-group">
            <label for="lop">Lớp</label>
            <input type="text" id="hoten" class="form-control" name="lop" value="<?= $row['lop'] ?>">
        </div>
        <button class="btn btn-success">Cập nhật thông tin</button>
    </form>
</div>
<body>
</body>

</html>