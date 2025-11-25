<?php

class Sirkuit{

    private $id;
    private $nama;
    private $negara;
    private $panjang_km;
    private $jumlah_tikungan;


    public function __construct($id, $nama, $negara, $panjang_km, $jumlah_tikungan){
        $this->id = $id;
        $this->nama = $nama;
        $this->negara = $negara;
        $this->panjang_km = $panjang_km;
        $this->jumlah_tikungan = $jumlah_tikungan;
    }

    public function getId(){
        return $this->id;
    }
    public function getNama(){
        return $this->nama;
    }
    public function getNegara(){
        return $this->negara;
    }
    public function getPanjang_km(){
        return $this->panjang_km;
    }
    public function getjumlah_tikungan(){
        return $this->jumlah_tikungan;
    }

    public function setNama($nama){
        $this->nama = $nama;
    }
    public function setNegara($negara){
        $this->negara = $negara;
    }
    public function setPanjang_km($panjang_km){
        $this->panjang_km = $panjang_km;
    }
    public function setjumlah_tikungan($jumlah_tikungan){
        $this->jumlah_tikungan = $jumlah_tikungan;
    }
}
?>