<?php

// Saya Dhiya Ulhaq dengan NIM 2407716 mengerjakan Tugas Praktikum 
// (Konsep OOP & Enkapsulasi) dalam Bahasa Pemrograman "PHP"
// dalam mata kuliah desain & pemrograman berorientasi objek untuk keberkahan-Nya 
// maka saya tidak akan melakukan kecurangan seperti yang telah di spesifikasikan//

// Memulai sesi PHP agar data dapat disimpan antar request (session storage)
session_start();

// Memanggil file Produk.php yang berisi definisi class Produk
require_once "Produk.php";

// Mengecek apakah session 'produk' sudah ada atau belum
// Jika belum ada, inisialisasi dengan array kosong
if (!isset($_SESSION['produk'])) {
    $_SESSION['produk'] = [];
}

// HAPUS PRODUK
// Mengecek apakah terdapat parameter GET 'hapus' pada URL
if (isset($_GET['hapus'])) {
    $id = $_GET['hapus']; // Ambil ID produk yang akan dihapus
    // Looping seluruh produk di session
    foreach ($_SESSION['produk'] as $i => $p) {
        // Jika ID produk sama dengan yang akan dihapus
        if ($p['id'] == $id) {
            // Hapus produk dari array session
            unset($_SESSION['produk'][$i]);
        }
    }
    // Re-index array agar tidak ada index yang lompat
    $_SESSION['produk'] = array_values($_SESSION['produk']);
}

// CARI PRODUK
// Variabel penampung hasil pencarian, default null
$searchResult = null;
// Mengecek apakah tombol "cari" ditekan (POST request)
if (isset($_POST['cari'])) {
    $idCari = $_POST['id_cari']; // Ambil ID yang dicari dari form input
    // Looping semua produk
    foreach ($_SESSION['produk'] as $p) {
        // Jika ditemukan produk dengan ID sesuai pencarian
        if ($p['id'] == $idCari) {
            $searchResult = $p; // Simpan hasil pencarian
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Manajemen Produk ELEKTRONIX</title> <!-- Judul tab browser -->
    <link rel="icon" type="image/png" href="ELEKTRONIX.png">
</head>
<body>
    <!-- Judul halaman utama -->
    <h2>Manajemen Produk ELEKTRONIX</h2>

    <!-- Tombol untuk pindah ke halaman tambah produk -->
    <div class="button">
        <a href="tambah.php">Tambah Produk</a>
    </div>

    <!-- Jika ada produk tersimpan di session, tampilkan menu cari & tabel -->
    <?php if (!empty($_SESSION['produk'])): ?>
        <!-- Form pencarian produk -->
        <h3>Cari Produk</h3>
        <form method="post" class="search-form">
            <input type="text" name="id_cari" placeholder="Pencarian berdasarkan ID">
            <button type="submit" name="cari">Cari</button>
        </form>

        <!-- Tabel daftar produk -->
        <h3>Daftar Produk</h3>
        <table>
            <tr>
                <!-- Header kolom tabel -->
                <th>ID</th><th>Nama</th><th>Merek</th><th>Model</th>
                <th>Harga</th><th>Stok</th><th>Gambar</th><th>Aksi</th>
            </tr>

            <?php
            // Jika ada hasil pencarian, tampilkan di baris pertama dengan highlight warna
            if ($searchResult) {
                echo '<tr style="background-color:#ffffcc;">';
                echo '<td>' . $searchResult['id'] . '</td>';
                echo '<td>' . $searchResult['nama'] . '</td>';
                echo '<td>' . $searchResult['merek'] . '</td>';
                echo '<td>' . $searchResult['model'] . '</td>';
                // Format harga ke format ribuan dengan 2 digit desimal
                echo '<td>' . number_format($searchResult['harga'], 2, ',', '.') . '</td>';
                echo '<td>' . $searchResult['stok'] . '</td>';
                // Jika ada gambar, tampilkan sebagai <img>, kalau kosong tampilkan kosong
                echo '<td>' . ($searchResult['gambar'] ? '<img src="' . $searchResult['gambar'] . '">' : '') . '</td>';
                // Tombol aksi edit & delete
                echo '<td>
                        <a href="update.php?edit=' . $searchResult['id'] . '" class="action-btn edit-btn">Edit</a>
                        <a href="?hapus=' . $searchResult['id'] . '" onclick="return confirm(\'Hapus produk ini?\')" class="action-btn delete-btn">Delete</a>
                    </td>';
                echo '</tr>';
            }

            // Menampilkan semua produk lain selain yang dicari
            foreach ($_SESSION['produk'] as $p) {
                // Jika produk ini sama dengan hasil pencarian, lewati (karena sudah ditampilkan)
                if ($searchResult && $p['id'] == $searchResult['id']) continue;
                echo '<tr>';
                echo '<td>' . $p['id'] . '</td>';
                echo '<td>' . $p['nama'] . '</td>';
                echo '<td>' . $p['merek'] . '</td>';
                echo '<td>' . $p['model'] . '</td>';
                echo '<td>' . number_format($p['harga'], 2, ',', '.') . '</td>';
                echo '<td>' . $p['stok'] . '</td>';
                echo '<td>' . ($p['gambar'] ? '<img src="' . $p['gambar'] . '">' : '') . '</td>';
                echo '<td>
                        <a href="update.php?edit=' . $p['id'] . '" class="action-btn edit-btn">Edit</a>
                        <a href="?hapus=' . $p['id'] . '" onclick="return confirm(\'Hapus produk ini?\')" class="action-btn delete-btn">Delete</a>
                    </td>';
                echo '</tr>';
            }
            ?>
        </table>
    <?php endif; ?>
</body>
</html>

<style>
    /* Styling body */
    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background-color: #ffe6f0; /* Warna pink muda */
        color: #333;
        margin: 0;
        padding: 0;
        text-align: center; /* Konten rata tengah */
    }

    h2 {
        font-size: 36px;
        font-weight: bold;
        color: #d5008f; /* Warna magenta */
        -webkit-text-stroke: 1px black; /* Outline teks hitam */
        text-stroke: 1px black; /* Standard property */
        display: inline-block;
    }

    h3 {
        color: #d5008f;
        margin-top: 10px; 
        margin-bottom: 5px; 
        font-size: 24px;
    }

    /* Untuk button */
    .button {
        margin: 20px 0;
    }

    .button a {
        display: inline-block;
        text-decoration: none;
        padding: 12px 25px;
        background-color: #d5008f;
        color: white;
        border-radius: 8px;
        font-weight: bold;
        transition: background-color 0.3s, transform 0.2s;
    }

    .button a:hover {
        background-color: #e91e63;
        transform: scale(1.05); /* Animasi zoom */
    }

    /* Untuk tabel */
    table {
        border-collapse: collapse;
        width: 90%;
        margin: 20px auto;
        box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        background-color: #fff0f6;
        border-radius: 8px;
        overflow: hidden;
    }

    th, td {
        border: 1px solid #f06292;
        padding: 12px;
        text-align: center;
    }

    th {
        background-color: #d5008f;
        color: white;
        font-size: 16px;
    }

    td img {
        width: 80px;
        border-radius: 5px;
        box-shadow: 0 2px 5px rgba(0,0,0,0.2);
    }

    tr:hover {
        background-color: #f8bbd0;
        transition: 0.3s;
    }

    input[type="text"], input[type="number"], input[type="file"], button {
        padding: 8px 12px;
        margin: 5px 0;
        border-radius: 5px;
        border: 1px solid #f06292;
        font-size: 14px;
    }

    button {
        background-color: #d5008f;
        color: white;
        border: none;
        cursor: pointer;
        transition: background-color 0.3s, transform 0.2s;
        border-radius: 5px;
    }

    button:hover {
        background-color: #e91e63;
        transform: scale(1.05);
    }

    form {
        margin: 20px auto;
        display: inline-block;
        text-align: left;
        background-color: #ffe6f0;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 3px 8px rgba(0,0,0,0.1);
    }

    input[type="text"], input[type="number"], input[type="file"] {
        width: 250px;
    }

    a {
        color: #d5008f;
        text-decoration: none;
    }

    a:hover {
        text-decoration: underline;
    }

    /* Tombol aksi edit & delete */
    .action-btn {
        display: inline-block;
        padding: 6px 12px;
        margin: 2px;
        font-size: 14px;
        font-weight: bold;
        color: white;
        border-radius: 5px;
        text-decoration: none;
        transition: background-color 0.3s, transform 0.2s;
    }

    .edit-btn {
        background-color: #e91e63;
    }

    .edit-btn:hover {
        background-color: #f06292;
        transform: scale(1.05);
    }

    .delete-btn {
        background-color: #d5008f;
    }

    .delete-btn:hover {
        background-color: #ad1457;
        transform: scale(1.05);
    }

    /* Styling form pencarian */
    .search-form {
        background-color: #fff0f6;
        padding: 15px 20px;
        border-radius: 10px;
        display: inline-block;
        box-shadow: 0 3px 8px rgba(0,0,0,0.1);
        margin-top: 0;
    }

    .search-form input[type="text"] {
        width: 250px;
        padding: 8px 12px;
        border-radius: 5px;
        border: 1px solid #f06292;
        font-size: 14px;
    }

    .search-form button {
        padding: 8px 15px;
        margin-left: 5px;
        border-radius: 5px;
        border: none;
        background-color: #d5008f;
        color: white;
        cursor: pointer;
        font-weight: bold;
        transition: background-color 0.3s, transform 0.2s;
    }

    .search-form button:hover {
        background-color: #e91e63;
        transform: scale(1.05);
    }
</style>
