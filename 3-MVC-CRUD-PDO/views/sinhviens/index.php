<!DOCTYPE html>
<html>
<head>
    <title>Student List</title>
</head>
<body>
    <h1>Student List</h1>
    <a href="index.php?action=create">Add Student</a>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Student Code</th>
                <th>Name</th>
                <th>Class</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($sinhviens as $sinhvien): ?>
                <tr>
                    <td><?php echo $sinhvien['id']; ?></td>
                    <td><?php echo $sinhvien['masv']; ?></td>
                    <td><?php echo $sinhvien['hoten']; ?></td>
                    <td><?php echo $sinhvien['lop']; ?></td>
                    <td>
                        <a href="index.php?action=edit&id=<?php echo $sinhvien['id']; ?>">Edit</a>
                        <a href="index.php?action=delete&id=<?php echo $sinhvien['id']; ?>" onclick="return confirm('Are you sure you want to delete this student?')">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
