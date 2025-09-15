<?php

// Saya Dhiya Ulhaq dengan NIM 2407716 mengerjakan Tugas Praktikum 
// (Konsep OOP & Enkapsulasi) dalam Bahasa Pemrograman "PHP"
// dalam mata kuliah desain & pemrograman berorientasi objek untuk keberkahan-Nya 
// maka saya tidak akan melakukan kecurangan seperti yang telah di spesifikasikan//

// Memulai session untuk menyimpan data produk secara sementara di sisi server
session_start();

// Memanggil file Produk.php agar class Produk bisa digunakan
require_once "Produk.php";

// Jika session 'produk' belum ada, inisialisasi sebagai array kosong
if (!isset($_SESSION['produk'])) $_SESSION['produk'] = [];

// Mengecek apakah form disubmit dengan tombol bernama 'tambah'
if (isset($_POST['tambah'])) {
    // Mengambil data input dari form
    $id     = $_POST['id'];
    $nama   = $_POST['nama'];
    $merek  = $_POST['merek'];
    $model  = $_POST['model'];
    $harga  = $_POST['harga'];
    $stok   = $_POST['stok'];
    $gambar = ""; // default kosong jika tidak ada gambar di-upload

    // Mengecek apakah user meng-upload gambar
    if (!empty($_FILES['gambar']['name'])) {
        $targetDir = "uploads/"; // folder penyimpanan gambar
        // Jika folder "uploads/" belum ada, maka dibuat otomatis
        if (!is_dir($targetDir)) mkdir($targetDir);
        
        // Menentukan lokasi file tujuan dengan nama file aslinya
        $targetFile = $targetDir . basename($_FILES['gambar']['name']);
        
        // Memindahkan file dari temporary directory ke folder tujuan
        move_uploaded_file($_FILES['gambar']['tmp_name'], $targetFile);
        
        // Simpan path file ke variabel $gambar
        $gambar = $targetFile;
    }

    // Membuat objek Produk baru dengan data yang sudah diambil
    $produk = new Produk($id, $nama, $merek, $model, $harga, $stok, $gambar);
    
    // Menyimpan produk ke session dalam bentuk array
    $_SESSION['produk'][] = $produk->toArray();

    // Redirect kembali ke halaman main.php agar tidak resubmit form
    header("Location: main.php"); 
    exit;
}
?>

<head>
    <title>Tambah Produk</title>
    <link rel="icon" type="image/png" href="ELEKTRONIX.png">
</head>

<h2>Tambah Produk</h2>
<!-- Form untuk menambahkan produk baru -->
<!-- method="post" digunakan agar data dikirim ke server -->
<!-- enctype="multipart/form-data" diperlukan untuk upload file -->
<form method="post" enctype="multipart/form-data">
    ID: <input type="text" name="id" required><br>
    Nama: <input type="text" name="nama" required><br>
    Merek: <input type="text" name="merek" required><br>
    Model: <input type="text" name="model" required><br>
    Harga: <input type="number" name="harga" required><br>
    Stok: <input type="number" name="stok" required><br>
    Gambar: <input type="file" name="gambar" required><br>
    <!-- Tombol submit, dikirim ke PHP dengan name="tambah" -->
    <button type="submit" name="tambah">Tambah</button>
</form>

<style>
/* Styling keseluruhan halaman */
body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; /* font modern */
    background-color: #ffe6f0; /* warna pink lembut sebagai background */
    color: #333; /* teks utama warna abu-abu gelap */
    margin: 0;
    padding: 0;
    text-align: center; /* teks rata tengah */
}

/* Judul form */
h2 {
    color: #d5008f; /* warna magenta */
    margin-top: 30px;
    font-size: 32px;
}

/* Styling form agar lebih rapi */
form {
    background-color: #fff0f6; /* pink muda untuk form */
    display: inline-block; /* supaya form tidak memenuhi layar */
    text-align: left; /* isi form rata kiri */
    padding: 25px 30px;
    border-radius: 10px; /* sudut membulat */
    box-shadow: 0 4px 10px rgba(0,0,0,0.1); /* efek bayangan */
    margin-top: 20px;
}

/* Label input agar lebih jelas */
form label {
    display: block;
    margin-top: 10px;
    font-weight: bold;
    color: #d5008f; /* magenta */
}

/* Inputan text, number, dan file */
input[type="text"], input[type="number"], input[type="file"] {
    width: 100%; /* agar penuh lebar form */
    padding: 8px 10px;
    margin-top: 5px;
    border-radius: 5px;
    border: 1px solid #f06292; /* border pink */
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

/* Efek saat hover tombol */
button:hover {
    background-color: #e91e63; /* pink lebih terang */
    transform: scale(1.05); /* sedikit membesar */
}

/* Tombol kembali ke main.php (jika ada link tambahan nanti) */
a.back-btn {
    display: inline-block;
    margin-top: 15px;
    text-decoration: none;
    color: #d5008f;
    font-weight: bold;
}

a.back-btn:hover {
    text-decoration: underline;
    color: #e91e63;
}

</style>