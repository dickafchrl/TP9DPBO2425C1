<?php

include_once("models/DB.php");
include("models/TabelPembalap.php");
include("views/ViewPembalap.php");
include("presenters/PresenterPembalap.php");

include("models/TabelSirkuit.php");
include("views/ViewSirkuit.php");
include("presenters/PresenterSirkuit.php");

include("template/Navbar.php");

$tabelPembalap = new TabelPembalap('localhost', 'mvp_db', 'root', '');
$viewPembalap = new ViewPembalap();
$presenterPembalap = new PresenterPembalap($tabelPembalap, $viewPembalap);

$tabelSirkuit = new TabelSirkuit('localhost', 'mvp_db', 'root', '');
$viewSirkuit = new ViewSirkuit();
$presenterSirkuit = new PresenterSirkuit($tabelSirkuit, $viewSirkuit);

// default ke pembalap
$page = $_GET['page'] ?? 'pembalap';
navbar($page);

switch ($page) {

    case 'pembalap':

        // FORM (ADD / EDIT)
        if(isset($_GET['screen'])){

            if($_GET['screen'] == 'add'){
                echo $presenterPembalap->tampilkanFormPembalap();
                exit;
            }
            if($_GET['screen'] == 'edit' && isset($_GET['id'])){
                echo $presenterPembalap->tampilkanFormPembalap($_GET['id']);
                exit;
            }
        }

        // ACTION (POST)
        if(isset($_POST['action'])){

            if($_POST['action'] == 'add'){
                $presenterPembalap->tambahPembalap(
                    $_POST['nama'], $_POST['tim'], $_POST['negara'],
                    $_POST['poinMusim'], $_POST['jumlahMenang']
                );
            }

            if($_POST['action'] == 'edit'){
                $presenterPembalap->ubahPembalap(
                    $_POST['id'], $_POST['nama'], $_POST['tim'], $_POST['negara'],
                    $_POST['poinMusim'], $_POST['jumlahMenang']
                );
            }

            if($_POST['action'] == 'delete'){
                $presenterPembalap->hapusPembalap($_POST['id']);
            }

            header("Location: index.php?page=pembalap");
            exit;
        }

        // TAMPILKAN LIST PEMBALAP
        echo $presenterPembalap->tampilkanPembalap();
        break;

    case 'sirkuit':

        // FORM (ADD / EDIT)
        if(isset($_GET['screen'])){

            if($_GET['screen'] == 'add'){
                echo $presenterSirkuit->tampilkanFormSirkuit();
                exit;
            }
            if($_GET['screen'] == 'edit' && isset($_GET['id'])){
                echo $presenterSirkuit->tampilkanFormSirkuit($_GET['id']);
                exit;
            }
        }

        // ACTION (POST)
        if(isset($_POST['action'])){

            if($_POST['action'] == 'add'){
                $presenterSirkuit->tambahSirkuit(
                    $_POST['nama'], $_POST['negara'],
                    $_POST['panjang_km'], $_POST['jumlah_tikungan']
                );
            }

            if($_POST['action'] == 'edit'){
                $presenterSirkuit->ubahSirkuit(
                    $_POST['id'], $_POST['nama'], $_POST['negara'],
                    $_POST['panjang_km'], $_POST['jumlah_tikungan']
                );
            }

            if($_POST['action'] == 'delete'){
                $presenterSirkuit->hapusSirkuit($_POST['id']);
            }

            header("Location: index.php?page=sirkuit");
            exit; 
        }

        // TAMPILKAN LIST SIRKUIT
        echo $presenterSirkuit->tampilkanSirkuit();
        break;


    default:
        echo "<h3>Halaman tidak ditemukan.</h3>";
}
?>