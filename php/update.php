<?php

// Saya Dhiya Ulhaq dengan NIM 2407716 mengerjakan Tugas Praktikum 
// (Konsep OOP & Enkapsulasi) dalam Bahasa Pemrograman "PHP"
// dalam mata kuliah desain & pemrograman berorientasi objek untuk keberkahan-Nya 
// maka saya tidak akan melakukan kecurangan seperti yang telah di spesifikasikan//

// Memulai session agar data produk bisa diakses dan dimodifikasi selama user membuka aplikasi
session_start();

// Mengimpor file Produk.php yang berisi definisi class Produk
require_once "Produk.php";

// Jika session 'produk' belum ada, buat array kosong untuk menampung data produk
if (!isset($_SESSION['produk'])) $_SESSION['produk'] = [];

// Variabel penampung produk yang akan diedit (default = null)
$produkEdit = null;

// Mengecek apakah parameter GET 'edit' ada di URL (contoh: update.php?edit=101)
if (isset($_GET['edit'])) {
    // Looping semua produk yang ada di session
    foreach ($_SESSION['produk'] as $p) {
        // Jika ID produk sama dengan parameter edit, ambil produk tersebut untuk diedit
        if ($p['id'] == $_GET['edit']) {
            $produkEdit = $p; // simpan produk ke variabel $produkEdit
            break; // berhenti setelah ketemu
        }
    }
}

// Mengecek apakah form update disubmit (tombol dengan name="update")
if (isset($_POST['update'])) {
    $id = $_POST['id']; // ambil ID produk dari form hidden input

    // Looping produk dengan reference (&) agar bisa langsung dimodifikasi
    foreach ($_SESSION['produk'] as &$p) {
        if ($p['id'] == $id) {
            // Update semua field sesuai input form
            $p['nama']  = $_POST['nama'];
            $p['merek'] = $_POST['merek'];
            $p['model'] = $_POST['model'];
            $p['harga'] = $_POST['harga'];
            $p['stok']  = $_POST['stok'];

            // Jika user upload gambar baru, ganti gambar lama
            if (!empty($_FILES['gambar']['name'])) {
                $targetDir = "uploads/"; // folder tujuan upload
                // Jika folder belum ada, buat dulu
                if (!is_dir($targetDir)) mkdir($targetDir);
                // Simpan file dengan nama asli ke folder uploads/
                $targetFile = $targetDir . basename($_FILES['gambar']['name']);
                // Pindahkan file sementara ke folder tujuan
                move_uploaded_file($_FILES['gambar']['tmp_name'], $targetFile);
                // Simpan path file ke data produk
                $p['gambar'] = $targetFile;
            }
            break; // keluar dari loop setelah produk ketemu
        }
    }
    unset($p); // hapus reference agar aman

    // Redirect kembali ke main.php
    header("Location: main.php");
    exit;
}

// Jika produk yang ingin diedit tidak ditemukan, tampilkan pesan error
if (!$produkEdit) {
    echo "<p>Data produk tidak ditemukan.</p>";
    exit; // hentikan script
}
?>

<head>
    <title>Update Produk</title>
    <link rel="icon" type="image/png" href="ELEKTRONIX.png">
</head>

<h2>Update Produk</h2>

<!-- Form untuk update produk -->
<!-- method="post" untuk mengirim data ke server -->
<!-- enctype="multipart/form-data" agar bisa upload file -->
<form method="post" enctype="multipart/form-data">
    <!-- Hidden input menyimpan ID produk agar tidak bisa diubah -->
    <input type="hidden" name="id" value="<?= $produkEdit['id'] ?>">

    <!-- Input nama, otomatis terisi nilai lama produk -->
    Nama: <input type="text" name="nama" value="<?= $produkEdit['nama'] ?>"><br>

    <!-- Input merek -->
    Merek: <input type="text" name="merek" value="<?= $produkEdit['merek'] ?>"><br>

    <!-- Input model -->
    Model: <input type="text" name="model" value="<?= $produkEdit['model'] ?>"><br>

    <!-- Input harga -->
    Harga: <input type="number" name="harga" value="<?= $produkEdit['harga'] ?>"><br>

    <!-- Input stok -->
    Stok: <input type="number" name="stok" value="<?= $produkEdit['stok'] ?>"><br>

    <!-- Upload file gambar baru (opsional) -->
    Gambar: <input type="file" name="gambar"><br>

    <!-- Tombol untuk submit form -->
    <button type="submit" name="update">Update</button>
</form>

<style>
    /* Styling untuk seluruh body halaman */
    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; /* font modern */
        background-color: #ffe6f0; /* warna pink lembut */
        color: #333; /* teks abu-abu gelap */
        margin: 0;
        padding: 0;
        text-align: center; /* konten ditengah */
    }

    /* Judul halaman (Update Produk) */
    h2 {
        color: #d5008f; /* warna magenta */
        margin-top: 30px;
        font-size: 32px;
    }

    /* Styling form */
    form {
        background-color: #fff0f6; /* pink muda */
        display: inline-block; /* form tidak full width */
        text-align: left; /* isi form rata kiri */
        padding: 25px 30px;
        border-radius: 10px; /* sudut membulat */
        box-shadow: 0 4px 10px rgba(0,0,0,0.1); /* bayangan halus */
        margin-top: 20px;
    }

    /* Label input */
    form label {
        display: block;
        margin-top: 10px;
        font-weight: bold;
        color: #d5008f; /* magenta */
    }

    /* Input teks, angka, dan file */
    input[type="text"], input[type="number"], input[type="file"] {
        width: 100%; /* memenuhi lebar form */
        padding: 8px 10px;
        margin-top: 5px;
        border-radius: 5px;
        border: 1px solid #f06292; /* pink border */
        box-sizing: border-box;
    }

    /* Tombol submit */
    button {
        background-color: #d5008f; /* magenta */
        color: white;
        border: none;
        padding: 10px 20px;
        margin-top: 15px;
        border-radius: 5px;
        font-weight: bold;
        cursor: pointer;
        transition: background-color 0.3s, transform 0.2s; /* animasi hover */
    }

    /* Efek hover tombol */
    button:hover {
        background-color: #e91e63; /* pink lebih terang */
        transform: scale(1.05); /* sedikit membesar */
    }

    /* Link tombol kembali */
    a.back-btn {
        display: inline-block;
        margin-top: 15px;
        text-decoration: none;
        color: #d5008f; /* magenta */
        font-weight: bold;
    }

    /* Efek hover untuk link back */
    a.back-btn:hover {
        text-decoration: underline;
        color: #e91e63;
    }

</style>
