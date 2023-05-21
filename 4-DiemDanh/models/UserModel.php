<?php
class UserModel {
    public static function getUserByUsername($username) {
        $db = Connection::getInstance();
        
        $stmt = $db->prepare('SELECT * FROM USER WHERE user_name = :username');
        $stmt->bindParam(':username', $username);
        $stmt->execute();
        
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
