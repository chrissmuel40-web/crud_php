<?php
class Murid {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function getAll() {
        $query = "SELECT murid.*, jurusan.nama_jurusan 
                  FROM murid 
                  LEFT JOIN jurusan ON murid.jurusan_id = jurusan.id";
        return $this->conn->query($query);
    }

    public function getJurusan() {
        return $this->conn->query("SELECT * FROM jurusan");
    }

    public function getById($id) {
        return $this->conn->query("SELECT * FROM murid WHERE id=$id");
    }

    public function create($nama, $ekstrakulikuler, $jurusan_id) {
        return $this->conn->query("INSERT INTO murid (nama, ekstrakulikuler, jurusan_id) 
                                   VALUES('$nama', '$ekstrakulikuler', '$jurusan_id')");
    }

    public function update($id, $nama, $ekstrakulikuler, $jurusan_id) {
        return $this->conn->query("UPDATE murid SET 
                                   nama='$nama', ekstrakulikuler='$ekstrakulikuler', jurusan_id='$jurusan_id' 
                                   WHERE id=$id");
    }

    public function delete($id) {
        return $this->conn->query("DELETE FROM murid WHERE id=$id");
    }
}
?>
