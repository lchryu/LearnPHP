<?php

class ClassModel
{
    private $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    public function getClassById($classId)
    {
        $query = "SELECT * FROM CLASS WHERE class_id = :classId";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':classId', $classId, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getClassesByCourse($courseId)
    {
        $query = "SELECT * FROM CLASS WHERE course_id = :courseId";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':courseId', $courseId, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addClass($courseId, $className, $member)
    {
        $query = "INSERT INTO CLASS (course_id, class_name, member)
                  VALUES (:courseId, :className, :member)";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':courseId', $courseId, PDO::PARAM_INT);
        $stmt->bindParam(':className', $className, PDO::PARAM_STR);
        $stmt->bindParam(':member', $member, PDO::PARAM_INT);

        return $stmt->execute();
    }

    public function updateClass($classId, $className, $member)
    {
        $query = "UPDATE CLASS 
                  SET class_name = :className, member = :member
                  WHERE class_id = :classId";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':className', $className, PDO::PARAM_STR);
        $stmt->bindParam(':member', $member, PDO::PARAM_INT);
        $stmt->bindParam(':classId', $classId, PDO::PARAM_INT);

        return $stmt->execute();
    }

    public function deleteClass($classId)
    {
        $query = "DELETE FROM CLASS WHERE class_id = :classId";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':classId', $classId, PDO::PARAM_INT);

        return $stmt->execute();
    }
}
