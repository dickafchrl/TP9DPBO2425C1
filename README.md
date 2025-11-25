# TP9DPBO2425C1

## JANJI

## 1. Desain Program (Arsitektur MVP)
- Proyek ini menggunakan pola MVP – Passive View, artinya:
- Model hanya menyimpan data & berkomunikasi dengan database.
- View hanya menampilkan HTML.
- Presenter mengatur alur, termasuk apa yang ditampilkan dan apa yang diproses.
- View tidak boleh memproses data — semua keputusan diambil oleh Presenter.

### Struktur File 
    C:.
    │   index.php
    │   mvp_db.sql
    │   
    ├───models
    │       DB.php
    │       KontrakModel.php
    │       KontrakModelSirkuit.php
    │       Pembalap.php
    │       Sirkuit.php
    │       TabelPembalap.php
    │       TabelSirkuit.php
    │
    ├───presenters
    │       KontrakPresenter.php
    │       KontrakPresenterSirkuit.php
    │       PresenterPembalap.php
    │       PresenterSirkuit.php
    │
    ├───template
    │       form.html
    │       formSirkuit.html
    │       navbar.php
    │       skin.html
    │       skinSirkuit.html
    │
    └───views
            KontrakView.php
            KontrakViewSirkuit.php
            ViewPembalap.php
            ViewSirkuit.php

## 2. Models
    a. DB.php
    Mengatur koneksi database (PDO).
    Dipakai oleh semua tabel model.
    
    b. Interface KontrakModel
    Menjamin semua tabel model memiliki fungsi standar:
    getAll
    getById
    add
    update
    delete
    (dan variasi untuk entitas lain seperti Sirkuit)
    
    c. TabelPembalap.php
    Mengimplementasikan operasi CRUD pembalap.
    Mengubah hasil query menjadi objek Pembalap.
    
    d. TabelSirkuit.php
    Sama seperti TabelPembalap tetapi khusus untuk entitas sirkuit.
    
    e. Pembalap.php / Sirkuit.php
    Class entitas yang memiliki getter dan setter.
    Digunakan untuk mempermudah pengolahan data dalam Presenter dan View.

## 3. View
    Folder views/ berisi kelas untuk menampilkan halaman.
    - ViewPembalap :
    Meng-generate tampilan daftar pembalap menggunakan template skinPembalap.html.
    Meng-generate tampilan form tambah/edit menggunakan template formPembalap.html.
    - ViewSirkuit :
    Sama seperti pembalap tetapi menggunakan template sirkuit.
    View : 
    Hanya mengolah data menjadi HTML.

## 4. Presenter
    Folder presenters/ berisi logika yang menghubungkan Model dan View.
    - PresenterPembalap :
    Mengambil data dari TabelPembalap.
    Mengirimkan ke ViewPembalap.
    - Mengurus aksi:
    tambahPembalap()
    ubahPembalap()
    hapusPembalap()
    Mengatur tampilan form (add/edit).
    - PresenterSirkuit :
    Fungsinya identik dengan presenter pembalap tetapi untuk entitas sirkuit.
    
    Presenter bertugas : 
    memastikan View mendapat data yang tepat dan tindakan pengguna diproses oleh Model.

## DOKUMENTASI
https://github.com/user-attachments/assets/485ddefa-584e-437b-8bb3-bb003bf16eac


