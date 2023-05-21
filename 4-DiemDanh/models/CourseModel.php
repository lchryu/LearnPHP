<?php

class CourseModel
{
    private $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    public function getCourseById($courseId)
    {
        $query = "SELECT * FROM COURSE WHERE course_id = :courseId";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':courseId', $courseId, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getAllCourses()
    {
        $query = "SELECT * FROM COURSE";
        $stmt = $this->db->prepare($query);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addCourse($adminId, $courseName, $timeBegin, $timeEnd)
    {
        $query = "INSERT INTO COURSE (admin_id, course_name, time_begin, time_end)
                  VALUES (:adminId, :courseName, :timeBegin, :timeEnd)";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':adminId', $adminId, PDO::PARAM_INT);
        $stmt->bindParam(':courseName', $courseName, PDO::PARAM_STR);
        $stmt->bindParam(':timeBegin', $timeBegin, PDO::PARAM_STR);
        $stmt->bindParam(':timeEnd', $timeEnd, PDO::PARAM_STR);

        return $stmt->execute();
    }

    public function updateCourse($courseId, $courseName, $timeBegin, $timeEnd)
    {
        $query = "UPDATE COURSE 
                  SET course_name = :courseName, time_begin = :timeBegin, time_end = :timeEnd
                  WHERE course_id = :courseId";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':courseName', $courseName, PDO::PARAM_STR);
        $stmt->bindParam(':timeBegin', $timeBegin, PDO::PARAM_STR);
        $stmt->bindParam(':timeEnd', $timeEnd, PDO::PARAM_STR);
        $stmt->bindParam(':courseId', $courseId, PDO::PARAM_INT);

        return $stmt->execute();
    }

    public function deleteCourse($courseId)
    {
        $query = "DELETE FROM COURSE WHERE course_id = :courseId";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':courseId', $courseId, PDO::PARAM_INT);

        return $stmt->execute();
    }
}
