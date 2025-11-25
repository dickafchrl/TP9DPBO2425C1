<?php

include_once ("models/DB.php");
include_once ("KontrakModelSirkuit.php");

class TabelSirkuit extends DB implements KontrakModelSirkuit {

    // Konstruktor untuk inisialisasi database
    public function __construct($host, $db_name, $username, $password) {
        parent::__construct($host, $db_name, $username, $password);
    }

    // Method untuk mendapatkan semua Sirkuit
    public function getAllSirkuit(): array {
        $query = "SELECT * FROM sirkuit";
        $this->executeQuery($query);
        return $this->getAllResult();
    }

    // Method untuk mendapatkan Sirkuit berdasarkan ID
    public function getSirkuitById($id): ?array {
        $this->executeQuery("SELECT * FROM sirkuit WHERE id = :id", ['id' => $id]);
        $results = $this->getAllResult();
        return $results[0] ?? null;
    }

    // implementasikan metode CRUD di bawah ini sesuai kebutuhan

    public function addSirkuit($nama, $negara, $panjang_km, $jumlah_tikungan): void {
        // ini isi ga ya mas 
        $query = "INSERT INTO sirkuit (nama, negara, panjang_km, jumlah_tikungan)
        VALUES (:nama, :negara, :panjang_km, :jumlah_tikungan)";

        $params = [
            'nama' => $nama,
            'negara' => $negara,
            'panjang_km' => $panjang_km,
            'jumlah_tikungan' => $jumlah_tikungan
        ];

        $this->executeQuery($query, $params);
    }
    
    public function updateSirkuit($id, $nama, $negara, $panjang_km, $jumlah_tikungan): void {
        // hayo isi ga
        $query = "UPDATE sirkuit SET 
            nama = :nama,
            negara = :negara,
            panjang_km = :panjang_km,
            jumlah_tikungan = :jumlah_tikungan
            WHERE id = :id";

        $params = [
            'nama' => $nama,
            'negara' => $negara,
            'panjang_km' => $panjang_km,
            'jumlah_tikungan' => $jumlah_tikungan,
            'id' =>$id
        ];

        $this->executeQuery($query, $params);
    }
    
    public function deleteSirkuit($id): void {
        // isi ga ya 
        $query = "DELETE FROM sirkuit WHERE id = :id";
        $params = ['id' => $id];

        $this->executeQuery($query, $params);
    }
}
?>