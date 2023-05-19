<!DOCTYPE html>
<html>
<head>
    <title>Add Student</title>
</head>
<body>
    <h1>Add Student</h1>
    <form method="POST" action="index.php?action=create">
        <label for="masv">Student Code:</label>
        <input type="text" name="masv" id="masv" required><br>
        <label for="hoten">Name:</label>
        <input type="text" name="hoten" id="hoten" required><br>
        <label for="lop">Class:</label>
        <input type="text" name="lop" id="lop" required><br>
        <button type="submit">Add</button>
    </form>
</body>
</html>
