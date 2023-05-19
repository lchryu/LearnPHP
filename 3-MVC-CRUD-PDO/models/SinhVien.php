<?php
require_once 'config/database.php';

class SinhVien {
    private $db;

    public function __construct() {
        global $db;
        $this->db = $db;
    }

    public function getAllSinhVien() {
        $query = $this->db->query("SELECT * FROM sinhvien");
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getSinhVienById($id) {
        $query = $this->db->prepare("SELECT * FROM sinhvien WHERE id = :id");
        $query->bindParam(':id', $id);
        $query->execute();
        return $query->fetch(PDO::FETCH_ASSOC);
    }

    public function addSinhVien($masv, $hoten, $lop) {
        $query = $this->db->prepare("INSERT INTO sinhvien (masv, hoten, lop) VALUES (:masv, :hoten, :lop)");
        $query->bindParam(':masv', $masv);
        $query->bindParam(':hoten', $hoten);
        $query->bindParam(':lop', $lop);
        return $query->execute();
    }

    public function updateSinhVien($id, $masv, $hoten, $lop) {
        $query = $this->db->prepare("UPDATE sinhvien SET masv = :masv, hoten = :hoten, lop = :lop WHERE id = :id");
        $query->bindParam(':id', $id);
        $query->bindParam(':masv', $masv);
        $query->bindParam(':hoten', $hoten);
        $query->bindParam(':lop', $lop);
        return $query->execute();
    }

    public function deleteSinhVien($id) {
        $query = $this->db->prepare("DELETE FROM sinhvien WHERE id = :id");
        $query->bindParam(':id', $id);
        return $query->execute();
    }
}
?>
