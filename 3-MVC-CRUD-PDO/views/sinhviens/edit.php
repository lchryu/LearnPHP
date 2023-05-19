<!DOCTYPE html>
<html>
<head>
    <title>Edit Student</title>
</head>
<body>
    <h1>Edit Student</h1>
    <form method="POST" action="index.php?action=edit&id=<?php echo $sinhvien['id']; ?>">
        <label for="masv">Student Code:</label>
        <input type="text" name="masv" id="masv" value="<?php echo $sinhvien['masv']; ?>" required><br>
        <label for="hoten">Name:</label>
        <input type="text" name="hoten" id="hoten" value="<?php echo $sinhvien['hoten']; ?>" required><br>
        <label for="lop">Class:</label>
        <input type="text" name="lop" id="lop" value="<?php echo $sinhvien['lop']; ?>" required><br>
        <button type="submit">Update</button>
    </form>
</body>
</html>
