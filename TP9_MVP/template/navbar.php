<?php
// --- NAVBAR TEMPLATE ---
function navbar($activePage) {
    ?>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        .navbar {
            background: #222;
            padding: 12px;
            margin-bottom: 25px;
        }
        .navbar a {
            color: #bbb;
            margin-right: 20px;
            text-decoration: none;
            font-weight: bold;
        }
        .navbar a.active {
            color: #fff;
            border-bottom: 2px solid #0f9;
            padding-bottom: 3px;
        }
        .navbar a:hover {
            color: #fff;
        }
    </style>

    <div class="navbar">
        <a href="index.php?page=pembalap" 
           class="<?= $activePage == 'pembalap' ? 'active' : '' ?>">
           Pembalap
        </a>

        <a href="index.php?page=sirkuit" 
           class="<?= $activePage == 'sirkuit' ? 'active' : '' ?>">
           Sirkuit
        </a>
    </div>
    <?php
}
?>