<?php
require_once 'db_connect.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Lấy thông tin sinh viên từ cơ sở dữ liệu
    $sql = "SELECT * FROM sinhvien WHERE id = :id";
    $statement = $pdo->prepare($sql);
    $statement->execute(['id' => $id]);
    $student = $statement->fetch(PDO::FETCH_ASSOC);

    // Kiểm tra xem sinh viên có tồn tại không
    if (!$student) {
        die("Sinh viên không tồn tại");
    }
}

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Sửa thông tin sinh viên</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
</head>

<body>
<div class="container">
    <h2 class="display-5">Sửa thông tin sinh viên</h2>

    <form method="POST" action="update_student.php?id=<?= $id ?>">
        <div class="form-group">
            <label for="masv">Mã SV</label>
            <input type="text" class="form-control" id="masv" name="masv" value="<?= $student['masv'] ?>">
        </div>

        <div class="form-group">
            <label for="hoten">Họ tên</label>
            <input type="text" class="form-control" id="hoten" name="hoten" value="<?= $student['hoten'] ?>">
        </div>

        <div class="form-group">
            <label for="lop">Lớp</label>
            <input type="text" class="form-control" id="lop" name="lop" value="<?= $student['lop'] ?>">
        </div>

        <button type="submit" class="btn btn-primary">Lưu</button>
    </form>
</div>

<!-- jQuery library -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
<!-- Popper JS -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
