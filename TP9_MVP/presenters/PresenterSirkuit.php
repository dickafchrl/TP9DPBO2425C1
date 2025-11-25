<?php

include_once(__DIR__ . "/KontrakPresenterSirkuit.php");
include_once(__DIR__ . "/../models/TabelSirkuit.php");
include_once(__DIR__ . "/../models/Sirkuit.php");
include_once(__DIR__ . "/../views/ViewSirkuit.php");

class PresenterSirkuit implements KontrakPresenterSirkuit
{
    // Model Sirkuit Query untuk operasi database
    private $tabelSirkuit; // Instance dari TabelSirkuit (Model)
    private $viewSirkuit; // Instance dari ViewSirkuit (View)

    // Data list Sirkuit
    private $listSirkuit = []; // Menyimpan array objek Sirkuit

    public function __construct($tabelSirkuit, $viewSirkuit)
    {
        $this->tabelSirkuit = $tabelSirkuit;
        $this->viewSirkuit = $viewSirkuit;
        $this->initListSirkuit();
    }

    // Method untuk initialisasi list Sirkuit dari database
    public function initListSirkuit()
    {
        // Dapatkan data Sirkuit dari database
        $data = $this->tabelSirkuit->getAllSirkuit();

        // Buat objek Sirkuit dan simpan di list
        $this->listSirkuit = [];
        foreach ($data as $item) {
            $sirkuit = new Sirkuit(
                $item['id'],
                $item['nama'],
                $item['negara'],
                $item['panjang_km'],
                $item['jumlah_tikungan']
            );
            $this->listSirkuit[] = $sirkuit;
        }
    }

    // Method untuk menampilkan daftar Sirkuit menggunakan View
    public function tampilkanSirkuit(): string
    {
        return $this->viewSirkuit->tampilSirkuit($this->listSirkuit);
    }

    // Method untuk menampilkan form
    public function tampilkanFormSirkuit($id = null): string
    {
        $data = null;
        if ($id !== null) {
            $data = $this->tabelSirkuit->getSirkuitById($id);
        }
        return $this->viewSirkuit->tampilFormSirkuit($data);
    }

    // implementasikan metode

    public function tambahSirkuit($nama, $negara, $panjang_km, $jumlah_tikungan): void {
        // isi ga ya
        if (empty($nama) || empty($negara)) {
            // $this->viewSirkuit->tampilError("Field wajib tidak boleh kosong.");
            return;
        }

        // Arahkan ke model untuk insert
        $this->tabelSirkuit->addSirkuit($nama, $negara, $panjang_km, $jumlah_tikungan);
        
        // Refresh List
        $this->initListSirkuit();

        // Update view
        // $this->viewSirkuit->tampilPesan("Data berhasil di tambahkan");
    }
    
    public function ubahSirkuit($id, $nama, $negara, $panjang_km, $jumlah_tikungan): void {
        // isi ga ya
        if(empty($id)) {
            // $this->viewSirkuit->tampilError("ID tidak valid.");
            return;
        } 

        // Arahkan ke model untuk update
        $this->tabelSirkuit->updateSirkuit($id, $nama, $negara, $panjang_km, $jumlah_tikungan);

        // Refresh list
        $this->initListSirkuit();

        // Update view
        // $this->viewSirkuit->tampilPesan("Data berhasil di update");
    }
    
    public function hapusSirkuit($id): void {
        // isi ga ya
        if(empty($id)) {
            // $this->viewSirkuit->tampilError("ID tidak valid.");
            return;
        }

        // Arahkan ke model untuk di hapus
        $this->tabelSirkuit->deleteSirkuit($id);

        // Refresh list
        $this->initListSirkuit();

        // Update view
        // $this->viewSirkuit->tampilPesan("Data berhasil di hapus");
    }
}

?>