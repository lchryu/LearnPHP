<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liet ke danh sach sinh vien</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
<div class="container">
    <h1>Danh sách sinh viên</h1>
    <!-- Button to Open the Modal -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
        Thêm mới sinh viên
    </button>
    <br>
    <table class="table">
        <thead class="thead-dark">
        <tr>
            <th>Mã sinh viên</th>
            <th>Họ tên</th>
            <th>Lớp</th>
            <th>Thao tác</th>
        </tr>
        </thead>
        <tbody>
        <?php
        // kết nối
        require_once('ketnoi.php');

        // câu lệnh
        $lietket_sql = "SELECT * FROM sinhvien order by lop, hoten";

        // thực thi câu lệnh
        $result = mysqli_query($ketnoi, $lietket_sql);

        // duyệt qua result và in ra
        while ($r = mysqli_fetch_assoc($result)) { ?>
            <tr>
                <td><?= $r['masv'] ?></td>
                <td><?= $r['hoten'] ?></td>
                <td><?= $r['lop'] ?></td>
                <td>
                    <a href="edit.php?sid=<?= $r['id'] ?>" class="btn btn-info">Sửa</a>
                    <a onclick="return confirm('Bạn có muốn xoá sinh viên này không ?')"
                       href="xoa.php?sid=<?= $r['id'] ?>" class="btn btn-danger">Xoá</a>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>


<!-- The Modal -->
<div class="modal" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Form thêm sinh viên</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form action="them.php" method="post">
                    <div class="form-group">
                        <label for="hoten">Họ tên</label>
                        <input type="text" id="hoten" class="form-control" name="hoten">
                    </div>
                    <div class="form-group">
                        <label for="masv">Mã sinh viên</label>
                        <input type="text" name="masv" id="masv" class="form-control">
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

</html>