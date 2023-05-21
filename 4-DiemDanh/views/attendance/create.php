<!DOCTYPE html>
<html>
<head>
    <title>Create Attendance</title>
</head>
<body>
<?php echo $students;?>
<h2>Create Attendance</h2>
<form method="POST" action="?controller=Attendance&action=store">
    <label for="student_id">Student:</label>
    <select name="student_id" id="student_id">
        <?php foreach ($students as $student): ?>
            <option value="<?php echo $student['student_id']; ?>"><?php echo $student['name']; ?></option>
        <?php endforeach; ?>
    </select>
    <br>
    <label for="date_attendance">Date:</label>
    <input type="date" name="date_attendance" id="date_attendance">
    <br>
    <label for="time_attendance">Time:</label>
    <input type="time" name="time_attendance" id="time_attendance">
    <br>
    <label for="status">Status:</label>
    <select name="status" id="status">
        <option value="present">Present</option>
        <option value="late">Late</option>
        <option value="absent">Absent</option>
    </select>
    <br>
    <input type="submit" value="Create Attendance">
</form>
</body>
</html>
