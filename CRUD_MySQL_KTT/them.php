<?php
// Lấy dữ liệu từ biểu mẫu
$hoten = $_POST['hoten'];
$masv = $_POST['masv'];
$lop = $_POST['lop'];

// Bao gồm tệp kết nối cơ sở dữ liệu
require_once('ketnoi.php');

// Chuẩn bị câu lệnh INSERT
$themsql = "INSERT INTO SINHVIEN (masv, hoten, lop) VALUES (?, ?, ?)";

// Tạo một câu lệnh được chuẩn bị
$stmt = mysqli_prepare($ketnoi, $themsql);

// Gán các tham số cho câu lệnh
mysqli_stmt_bind_param($stmt, "sss", $masv, $hoten, $lop);

// Thực thi câu lệnh
if (mysqli_stmt_execute($stmt)) {
    mysqli_stmt_close($stmt);
    mysqli_close($ketnoi);
    header("Location: index.php");
    exit();
} else {
    echo "Lỗi: " . mysqli_error($ketnoi);
}

?>


<!-- 
Dưới đây là giải thích về những thay đổi:

1-Câu lệnh chuẩn bị: Thay vì trực tiếp chèn dữ liệu người dùng vào truy vấn SQL,
mã code này sử dụng câu lệnh chuẩn bị. Điều này giúp ngăn chặn tấn công SQL injection và nâng cao bảo mật.

2-Gán tham số: Các giá trị được gán cho câu lệnh chuẩn bị bằng cách sử dụng mysqli_stmt_bind_param().
Điều này đảm bảo rằng các giá trị được chuyển đổi đúng cách và tránh các lỗ hổng SQL injection có thể xảy ra.

3-Xử lý lỗi cải tiến: Mã code này bao gồm xử lý lỗi cho thao tác cơ sở dữ liệu. 
Nếu có lỗi xảy ra, thông báo lỗi sẽ được hiển thị bằng cách sử dụng mysqli_error(). 
Bạn có thể tùy chỉnh xử lý lỗi dựa trên yêu cầu của mình.

4-Dọn dẹp và chuyển hướng: Sau khi thực thi câu lệnh, 
câu lệnh chuẩn bị và kết nối cơ sở dữ liệu được đóng lại. 
Sau đó, trang sẽ được chuyển hướng đến index.php bằng header("Location: index.php"). 
Đảm bảo không có bất kỳ đầu ra nào trước hàm header() để tránh gây ra các vấn đề. -->