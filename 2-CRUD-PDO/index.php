<?php
require_once 'db_connect.php';
require_once 'search_student.php';
require_once 'add_student.php';

// Số dòng dữ liệu hiển thị trên mỗi trang
$rowsPerPage = 10;

// Tính tổng số trang dựa trên số lượng sinh viên và số dòng dữ liệu trên mỗi trang
$totalPages = ceil(count($students) / $rowsPerPage);

// Xác định trang hiện tại
$currentPage = isset($_GET['page']) ? $_GET['page'] : 1;

// Tính chỉ số bắt đầu và kết thúc của dòng dữ liệu trên trang hiện tại
$startIndex = ($currentPage - 1) * $rowsPerPage;
$endIndex = $startIndex + $rowsPerPage - 1;
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Dữ liệu sinh viên</title>
    <style>

    </style>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>

    <!-- Popper JS -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script> -->

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>


    <link rel="stylesheet" href="./assets/css/style.css">

</head>

<body>
    <div class="container">
        <header>
            <h2 class="display-4">
                <a href="index.php" class="text-decoration-none">Student Infomation</a>
            </h2>
        </header>
        <div class="row mb-3">
            <div class="col-6">
                <!-- Form tìm kiếm -->
                <form method="GET" action="">
                    <div class="input-group">
                        <input type="text" class="form-control" name="search" placeholder="Nhập từ khóa tìm kiếm">
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-primary">Tìm kiếm</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-6 text-right">
                <!-- Button to Open the Modal -->
                <button type="button" class="btn btn-primary btn-add-student" data-toggle="modal" data-target="#myModal">
                    Thêm mới sinh viên
                </button>
            </div>
        </div>
        <!-- <table>
            <tr>
                <th class="text-center">ID</th>
                <th class="text-center">Mã SV</th>
                <th class="text-center">Họ tên</th>
                <th class="text-center">Lớp</th>
                <th class="text-center">Thao tác</th>
            </tr>
            <?php foreach ($students as $student) { ?>
                <tr>
                    <td><?= $student['id'] ?></td>
                    <td><?= $student['masv'] ?></td>
                    <td><?= $student['hoten'] ?></td>
                    <td><?= $student['lop'] ?></td>
                    <td>
                        <a href="edit_student.php?id=<?= $student['id'] ?>" class="btn btn-info">Sửa</a>
                        <a href="delete_student.php?id=<?= $student['id'] ?>" class="btn btn-danger">Xoá</a>
                    </td>
                </tr>
            <?php } ?>
        </table> -->
        <table>
            <tr>
                <th class="text-center">ID</th>
                <th class="text-center">Mã SV</th>
                <th class="text-center">Họ tên</th>
                <th class="text-center">Lớp</th>
                <th class="text-center">Thao tác</th>
            </tr>
            <?php
            // Hiển thị dòng dữ liệu trên trang hiện tại
            for ($i = $startIndex; $i <= $endIndex; $i++) {
                if ($i >= count($students)) {
                    break;
                }
                $student = $students[$i];
            ?>
                <tr>
                    <td><?= $student['id'] ?></td>
                    <td><?= $student['masv'] ?></td>
                    <td><?= $student['hoten'] ?></td>
                    <td><?= $student['lop'] ?></td>
                    <td>
                        <a href="edit_student.php?id=<?= $student['id'] ?>" class="btn btn-info">Sửa</a>
                        <a href="delete_student.php?id=<?= $student['id'] ?>" class="btn btn-danger">Xoá</a>
                    </td>
                </tr>
            <?php } ?>
        </table>
        <!-- Hiển thị thanh phân trang -->
        <ul class="pagination mt-3">
            <?php for ($page = 1; $page <= $totalPages; $page++) { ?>
                <li class="page-item <?php if ($page == $currentPage) echo 'active'; ?>">
                    <a class="page-link" href="index.php?page=<?= $page ?>"><?= $page ?></a>
                </li>
            <?php } ?>
        </ul>

    </div>

    <!-- The Modal -->
    <div class="modal" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Insert Student</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <form action="add_student.php" method="post">
                        <div class="form-group">
                            <label for="masv">Mã sinh viên</label>
                            <input type="text" name="masv" id="masv" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="hoten">Họ tên</label>
                            <input type="text" id="hoten" name="hoten" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="lop">Lớp</label>
                            <input type="text" id="lop" name="lop" class="form-control">
                        </div>
                        <button class="btn btn-success">Thêm sinh viên</button>
                    </form>
                </div>


                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>

            </div>
        </div>
    </div>

</body>
<script src="./assets/js/custom.js"></script>

</html>