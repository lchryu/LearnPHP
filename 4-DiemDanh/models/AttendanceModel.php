<?php

class AttendanceModel
{
    private $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    public function getAttendanceById($attendanceId)
    {
        $query = "SELECT * FROM ATTENDANCE WHERE attendance_id = :attendanceId";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':attendanceId', $attendanceId, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getAttendanceByClass($classId)
    {
        $query = "SELECT * FROM ATTENDANCE WHERE class_id = :classId";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':classId', $classId, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function markAttendance($studentId, $dateAttendance, $timeAttendance, $status, $classId)
    {
        $query = "INSERT INTO ATTENDANCE (student_id, date_attendance, time_attendance, status, class_id)
                  VALUES (:studentId, :dateAttendance, :timeAttendance, :status, :classId)";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':studentId', $studentId, PDO::PARAM_INT);
        $stmt->bindParam(':dateAttendance', $dateAttendance, PDO::PARAM_STR);
        $stmt->bindParam(':timeAttendance', $timeAttendance, PDO::PARAM_STR);
        $stmt->bindParam(':status', $status, PDO::PARAM_STR);
        $stmt->bindParam(':classId', $classId, PDO::PARAM_INT);

        return $stmt->execute();
    }

    public function updateAttendance($attendanceId, $status)
    {
        $query = "UPDATE ATTENDANCE 
                  SET status = :status
                  WHERE attendance_id = :attendanceId";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':status', $status, PDO::PARAM_STR);
        $stmt->bindParam(':attendanceId', $attendanceId, PDO::PARAM_INT);

        return $stmt->execute();
    }

    public function deleteAttendance($attendanceId)
    {
        $query = "DELETE FROM ATTENDANCE WHERE attendance_id = :attendanceId";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':attendanceId', $attendanceId, PDO::PARAM_INT);

        return $stmt->execute();
    }
}
