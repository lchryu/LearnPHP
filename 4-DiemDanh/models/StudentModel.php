<?php

class StudentModel
{
    private $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    public function getStudentById($studentId)
    {
        $query = "SELECT * FROM STUDENT WHERE student_id = :studentId";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':studentId', $studentId, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getStudentsByClass($classId)
    {
        $query = "SELECT * FROM STUDENT WHERE class_id = :classId";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':classId', $classId, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addStudent($userId, $classId, $name, $phone, $email)
    {
        $query = "INSERT INTO STUDENT (user_id, class_id, name, phone, email)
                  VALUES (:userId, :classId, :name, :phone, :email)";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':userId', $userId, PDO::PARAM_INT);
        $stmt->bindParam(':classId', $classId, PDO::PARAM_INT);
        $stmt->bindParam(':name', $name, PDO::PARAM_STR);
        $stmt->bindParam(':phone', $phone, PDO::PARAM_STR);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);

        return $stmt->execute();
    }

    public function updateStudent($studentId, $userId, $classId, $name, $phone, $email)
    {
        $query = "UPDATE STUDENT 
                  SET user_id = :userId, class_id = :classId, name = :name, phone = :phone, email = :email
                  WHERE student_id = :studentId";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':userId', $userId, PDO::PARAM_INT);
        $stmt->bindParam(':classId', $classId, PDO::PARAM_INT);
        $stmt->bindParam(':name', $name, PDO::PARAM_STR);
        $stmt->bindParam(':phone', $phone, PDO::PARAM_STR);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':studentId', $studentId, PDO::PARAM_INT);

        return $stmt->execute();
    }

    public function deleteStudent($studentId)
    {
        $query = "DELETE FROM STUDENT WHERE student_id = :studentId";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':studentId', $studentId, PDO::PARAM_INT);

        return $stmt->execute();
    }

    public function getAllStudents()
    {
        $query = "SELECT * FROM STUDENT";
        $stmt = $this->db->prepare($query);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
