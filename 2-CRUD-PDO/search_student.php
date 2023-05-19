<?php
require_once 'db_connect.php';

if (isset($_GET['search'])) {
    $search = $_GET['search'];

    $sql = "SELECT * FROM sinhvien WHERE hoten LIKE :search";
    $statement = $pdo->prepare($sql);
    $statement->execute(['search' => "%$search%"]);
    $students = $statement->fetchAll(PDO::FETCH_ASSOC);
} else {
    $sql = "SELECT * FROM sinhvien";
    $result = $pdo->query($sql);
    $students = $result->fetchAll(PDO::FETCH_ASSOC);
}
?>
