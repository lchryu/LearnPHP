<?php

class AdminModel
{
    private $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    public function getAllAdmins()
    {
        $query = "SELECT * FROM ADMIN";
        $stmt = $this->db->prepare($query);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getAdminById($adminId)
    {
        $query = "SELECT * FROM ADMIN WHERE admin_id = :adminId";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':adminId', $adminId, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function addAdmin($userId, $name, $phone, $email)
    {
        $query = "INSERT INTO ADMIN (user_id, name, phone, email)
                  VALUES (:userId, :name, :phone, :email)";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':userId', $userId, PDO::PARAM_INT);
        $stmt->bindParam(':name', $name, PDO::PARAM_STR);
        $stmt->bindParam(':phone', $phone, PDO::PARAM_STR);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);

        return $stmt->execute();
    }

    public function updateAdmin($adminId, $name, $phone, $email)
    {
        $query = "UPDATE ADMIN 
                  SET name = :name, phone = :phone, email = :email
                  WHERE admin_id = :adminId";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':adminId', $adminId, PDO::PARAM_INT);
        $stmt->bindParam(':name', $name, PDO::PARAM_STR);
        $stmt->bindParam(':phone', $phone, PDO::PARAM_STR);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);

        return $stmt->execute();
    }

    public function deleteAdmin($adminId)
    {
        $query = "DELETE FROM ADMIN WHERE admin_id = :adminId";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':adminId', $adminId, PDO::PARAM_INT);

        return $stmt->execute();
    }
}
