<?php

// Saya Dhiya Ulhaq dengan NIM 2407716 mengerjakan Tugas Praktikum 
// (Konsep OOP & Enkapsulasi) dalam Bahasa Pemrograman "PHP"
// dalam mata kuliah desain & pemrograman berorientasi objek untuk keberkahan-Nya 
// maka saya tidak akan melakukan kecurangan seperti yang telah di spesifikasikan//

// Mendefinisikan sebuah kelas bernama Produk
class Produk {
    // Properti bersifat private, hanya bisa diakses dari dalam class
    private $id;      // ID unik untuk setiap produk
    private $nama;    // Nama produk
    private $merek;   // Merek produk
    private $model;   // Model produk
    private $harga;   // Harga produk
    private $stok;    // Jumlah stok produk
    private $gambar;  // Path/file gambar produk

    // Constructor
    // Menerima parameter untuk mengisi semua properti produk
    public function __construct($id, $nama, $merek, $model, $harga, $stok, $gambar) {
        $this->id = $id;           // Menyimpan ID ke properti id
        $this->nama = $nama;       // Menyimpan nama ke properti nama
        $this->merek = $merek;     // Menyimpan merek ke properti merek
        $this->model = $model;     // Menyimpan model ke properti model
        $this->harga = $harga;     // Menyimpan harga ke properti harga
        $this->stok = $stok;       // Menyimpan stok ke properti stok
        $this->gambar = $gambar;   // Menyimpan nama/path gambar ke properti gambar
    }

    // GETTER
    // Method untuk mengambil nilai dari properti private

    public function getId() { // Mengambil ID produk
        return $this->id;
    }
    public function getNama() { // Mengambil Nama produk
        return $this->nama; 
    }
    public function getMerek() { // Mengambil Merek produk
        return $this->merek; 
    }
    public function getModel() { // Mengambil Model produk
        return $this->model; 
    }
    public function getHarga() { // Mengambil Harga produk
        return $this->harga; 
    }
    public function getStok() { // Mengambil Stok produk
        return $this->stok; 
    }
    public function getGambar() { // Mengambil Gambar produk
        return $this->gambar; 
    }

    // SETTER
    // Method untuk mengubah nilai dari properti private
    public function setNama($nama) { 
        $this->nama = $nama;   // Mengubah Nama produk
    }
    public function setMerek($merek) { 
        $this->merek = $merek; // Mengubah Merek produk
    }
    public function setModel($model) { 
        $this->model = $model; // Mengubah Model produk
    }
    public function setHarga($harga) { 
        $this->harga = $harga; // Mengubah Harga produk
    }
    public function setStok($stok) { 
        $this->stok = $stok;   // Mengubah Stok produk
    }
    public function setGambar($gambar) { 
        $this->gambar = $gambar; // Mengubah path/nama file gambar produk
    }

    // Method untuk mengubah objek Produk menjadi array
    // Ini berguna untuk menyimpan data ke session (karena session tidak bisa menyimpan objek langsung dengan baik)
    public function toArray() {
        return [
            "id" => $this->id,           // ID produk
            "nama" => $this->nama,       // Nama produk
            "merek" => $this->merek,     // Merek produk
            "model" => $this->model,     // Model produk
            "harga" => $this->harga,     // Harga produk
            "stok" => $this->stok,       // Stok produk
            "gambar" => $this->gambar    // Gambar produk
        ];
    }
}
?>