<!DOCTYPE html>
<html>
<head>
    <title>Delete Student</title>
</head>
<body>
    <h1>Delete Student</h1>
    <p>Are you sure you want to delete this student?</p>
    <form method="POST" action="index.php?action=delete&id=<?php echo $sinhvien['id']; ?>">
        <button type="submit">Delete</button>
        <a href="index.php">Cancel</a>
    </form>
</body>
</html>
