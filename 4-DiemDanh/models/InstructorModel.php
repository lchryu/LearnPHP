<?php

class InstructorModel
{
    private $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    public function getInstructorById($instructorId)
    {
        $query = "SELECT * FROM INSTRUCTOR WHERE instructor_id = :instructorId";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':instructorId', $instructorId, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getInstructorsByClass($classId)
    {
        $query = "SELECT * FROM INSTRUCTOR WHERE class_id = :classId";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':classId', $classId, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addInstructor($userId, $classId, $name, $phone, $email)
    {
        $query = "INSERT INTO INSTRUCTOR (user_id, class_id, name, phone, email)
                  VALUES (:userId, :classId, :name, :phone, :email)";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':userId', $userId, PDO::PARAM_INT);
        $stmt->bindParam(':classId', $classId, PDO::PARAM_INT);
        $stmt->bindParam(':name', $name, PDO::PARAM_STR);
        $stmt->bindParam(':phone', $phone, PDO::PARAM_STR);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);

        return $stmt->execute();
    }

    public function updateInstructor($instructorId, $userId, $classId, $name, $phone, $email)
    {
        $query = "UPDATE INSTRUCTOR 
                  SET user_id = :userId, class_id = :classId, name = :name, phone = :phone, email = :email
                  WHERE instructor_id = :instructorId";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':userId', $userId, PDO::PARAM_INT);
        $stmt->bindParam(':classId', $classId, PDO::PARAM_INT);
        $stmt->bindParam(':name', $name, PDO::PARAM_STR);
        $stmt->bindParam(':phone', $phone, PDO::PARAM_STR);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':instructorId', $instructorId, PDO::PARAM_INT);

        return $stmt->execute();
    }

    public function deleteInstructor($instructorId)
    {
        $query = "DELETE FROM INSTRUCTOR WHERE instructor_id = :instructorId";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':instructorId', $instructorId, PDO::PARAM_INT);

        return $stmt->execute();
    }
}
