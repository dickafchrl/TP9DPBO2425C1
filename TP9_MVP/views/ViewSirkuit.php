<?php

include_once ("KontrakViewSirkuit.php");
include_once ("models/Sirkuit.php");

class ViewSirkuit implements KontrakViewSirkuit{

    public function __construct(){
        // Konstruktor kosong
    }

    // Method untuk menampilkan daftar Sirkuit
    public function tampilSirkuit($listSirkuit): string {
        // Build table rows
        $tbody = '';
        $no = 1;
        foreach($listSirkuit as $sirkuit){
            $tbody .= '<tr>';
            $tbody .= '<td class="col-id">'. $no .'</td>';
            $tbody .= '<td>'. htmlspecialchars($sirkuit->getNama()) .'</td>';
            $tbody .= '<td>'. htmlspecialchars($sirkuit->getNegara()) .'</td>';
            $tbody .= '<td>'. htmlspecialchars($sirkuit->getPanjang_km()) .'</td>';
            $tbody .= '<td>'. htmlspecialchars($sirkuit->getJumlah_tikungan()) .'</td>';
            $tbody .= '<td class="col-actions">
                    <a href="index.php?page=sirkuit&screen=edit&id='. $sirkuit->getId() .'" class="btn btn-edit">Edit</a>
                    <button data-id="'. $sirkuit->getId() .'" class="btn btn-delete">Hapus</button>
                  </td>';
            $tbody .= '</tr>';
            $no++;
        }

        // Load the page template and inject rows + total count
        $templatePath = __DIR__ . '/../template/skinSirkuit.html';
        $template = '';
        if (file_exists($templatePath)) {
            $template = file_get_contents($templatePath);
            $template = str_replace('<!-- PHP will inject rows here -->', $tbody, $template);
            $total = count($listSirkuit);
            $template = str_replace('Total:', 'Total: ' . $total, $template);
            return $template;
        }

        // Fallback: just return the rows if template is missing
        return $tbody;
    }

    // Method untuk menampilkan form tambah/ubah sirkuit
    public function tampilFormSirkuit($data = null): string {
        $template = file_get_contents(__DIR__ . '/../template/formSirkuit.html');
        if ($data) {
            $template = str_replace('value="add" id="sirkuit-action"', 'value="edit" id="sirkuit-action"', $template);
            $template = str_replace('value="" id="sirkuit-id"', 'value="' . htmlspecialchars($data['id']) . '" id="sirkuit-id"', $template);
            $template = str_replace('id="nama" name="nama" type="text" placeholder="Nama sirkuit"', 'id="nama" name="nama" type="text" placeholder="Nama sirkuit" value="' . htmlspecialchars($data['nama']) . '"', $template);
            $template = str_replace('id="negara" name="negara" type="text" placeholder="Negara (mis. Indonesia)"', 'id="negara" name="negara" type="text" placeholder="Negara (mis. Indonesia)" value="' . htmlspecialchars($data['negara']) . '"', $template);
            $template = str_replace('id="panjang_km" name="panjang_km" type="number" min="0" step="1" placeholder="0"', 'id="panjang_km" name="panjang_km" type="number" min="0" step="1" placeholder="0" value="' . htmlspecialchars($data['panjang_km']) . '"', $template);
            $template = str_replace('id="jumlah_tikungan" name="jumlah_tikungan" type="number" min="0" step="1" placeholder="0"', 'id="jumlah_tikungan" name="jumlah_tikungan" type="number" min="0" step="1" placeholder="0" value="' . htmlspecialchars($data['jumlah_tikungan']) . '"', $template);
        }
        return $template;
    }
}

?>