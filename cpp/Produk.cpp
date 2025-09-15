// Saya Dhiya Ulhaq dengan NIM 2407716 mengerjakan Tugas Praktikum 
// (Konsep OOP & Enkapsulasi) dalam Bahasa Pemrograman "C++"
// dalam mata kuliah desain & pemrograman berorientasi objek untuk keberkahan-Nya 
// maka saya tidak akan melakukan kecurangan seperti yang telah di spesifikasikan

#include <iostream>
#include <string>
#include <vector>
#include <iomanip> // Untuk setw(), setprecision()
#include <locale>   // untuk locale dan numpunct
#include <sstream>  // untuk stringstream
using namespace std;

// Kelas Produk merepresentasikan data sebuah produk elektronik
class Produk {
private:
    int id;         // ID unik produk
    string nama;    // Nama produk
    string merek;   // Merek produk
    string model;   // Model produk
    double harga;   // Harga produk
    int stok;       // Jumlah stok produk

    // Vector untuk menyimpan daftar semua produk
    vector<Produk> daftarProduk;

public:
    // Konstruktor default
    Produk() {}

    // Konstruktor dengan parameter
    Produk(int id, string nama, string merek, string model, double harga, int stok) {
        this->id = id; // set ID
        this->nama = nama; // set nama
        this->merek = merek; // set merek
        this->model = model; // set model
        this->harga = harga; // set harga
        this->stok = stok; // set stok
    }

    // Getter
    int getId() { 
        return id; // mengambil ID
    }
    string getNama() { 
        return nama; // mengambil nama produk
    }
    string getMerek() { 
        return merek; // mengambil merek produk
    }
    string getModel() { 
        return model; // mengambil model produk
    }
    double getHarga() { 
        return harga; // mengambil harga produk
    }
    int getStok() { 
        return stok; // mengambil stok produk
    }

    // Setter
    void setNama(string nama) { 
        this->nama = nama; // menyimpan nama
    }
    void setMerek(string merek) { 
        this->merek = merek; // menyimpan merek
    }
    void setModel(string model) { 
        this->model = model; // menyimpan model
    }
    void setHarga(double harga) { 
        this->harga = harga; // menyimpan harga
    }
    void setStok(int stok) { 
        this->stok = stok; // menyimpan stok
    }

    // Fungsi tampilkan satu produk
    void tampilkan() { // posisi judul tabel
        cout << "| " << setw(4) << left << id
             << "| " << setw(14) << left << nama
             << "| " << setw(14) << left << merek
             << "| " << setw(14) << left << model
             << "| " << setw(10) << right << fixed << setprecision(2) << harga
             << " | " << setw(6) << right << stok << " |" << endl;
    }

    // Tambah data produk baru
    void tambahData() {
        // inisialisasi
        int id, stok;
        string nama, merek, model;
        double harga;

        // Input data dari pengguna
        cout << "Masukkan ID: ";
        cin >> id;
        cout << "Masukkan Nama Produk: ";
        cin >> nama;
        cout << "Masukkan Merek: ";
        cin >> merek;
        cout << "Masukkan Model: ";
        cin >> model;
        cout << "Masukkan Harga: ";
        cin >> harga;
        cout << "Masukkan Stok: ";
        cin >> stok;

        // Masukkan produk baru ke dalam vector daftarProduk
        daftarProduk.push_back(Produk(id, nama, merek, model, harga, stok));
        cout << "Produk berhasil ditambahkan!\n";
    }

    string formatRibuan(long long nilai) {
        string s = to_string(nilai);
        string hasil;
        int hitung = 0;

        for (int i = s.size() - 1; i >= 0; i--) {
            hasil.insert(hasil.begin(), s[i]);
            hitung++;
            if (hitung == 3 && i != 0) {
                hasil.insert(hasil.begin(), '.'); // tambahkan titik
                hitung = 0;
            }
        }
        return hasil;
    }

    // Tampilkan seluruh data produk dalam bentuk tabel
    void tampilkanData() {
        cout << "\n=== DAFTAR PRODUK ELEKTRONIX ===\n";

        // kondisi jika produk tidak ada
        if (daftarProduk.empty()) {
            cout << "Belum ada data produk.\n"; // tampilkan
            return;
        }

        // Tentukan lebar kolom minimal
        int wId = 2, wNama = 4, wMerek = 5, wModel = 5, wHarga = 5, wStok = 4;

        // Menentukan lebar kolom sesuai data terpanjang
        for (auto &p : daftarProduk) {
            wId = max(wId, (int)to_string(p.getId()).size()); // ID
            wNama = max(wNama, (int)p.getNama().size()); // nama
            wMerek = max(wMerek, (int)p.getMerek().size()); // merek
            wModel = max(wModel, (int)p.getModel().size()); // model
            string hargaStr = formatRibuan((long long)p.getHarga()) + ",00";
            int panjangHarga = (int)hargaStr.size();
            wHarga = max(wHarga, panjangHarga); // harga
            wStok = max(wStok, (int)to_string(p.getStok()).size()); // stok
        }

        // Tambah padding 2 karakter
        wId += 2; wNama += 2; wMerek += 2; wModel += 2; wHarga += 2; wStok += 2;

        // Lambda untuk membuat garis horizontal
        auto garis = [&](int len) { cout << "+" << string(len, '-'); };

        // Cetak header tabel
        garis(wId); garis(wNama); garis(wMerek); garis(wModel); garis(wHarga); garis(wStok); cout << "+\n";
        cout << "| " << left << setw(wId-1) << "ID"
             << "| " << setw(wNama-1) << "Nama"
             << "| " << setw(wMerek-1) << "Merek"
             << "| " << setw(wModel-1) << "Model"
             << "| " << setw(wHarga-1) << "Harga"
             << "| " << setw(wStok-1) << "Stok" << "|\n";
        garis(wId); garis(wNama); garis(wMerek); garis(wModel); garis(wHarga); garis(wStok); cout << "+\n";

        // Cetak isi tabel
        for (auto &p : daftarProduk) {
            cout << "| " << left << setw(wId-1) << p.getId() // ID
                 << "| " << setw(wNama-1) << p.getNama() // nama
                 << "| " << setw(wMerek-1) << p.getMerek() // merek
                 << "| " << setw(wModel-1) << p.getModel() // model
                 << "| " << setw(wHarga-1) << formatRibuan((long long)p.getHarga()) + ",00" // harga
                 << "| " << setw(wStok-1) << p.getStok() << "|\n"; // stok
        }

        // Cetak garis penutup tabel
        garis(wId); garis(wNama); garis(wMerek); garis(wModel); garis(wHarga); garis(wStok); cout << "+\n";
    }

    // Fungsi cari produk berdasarkan ID, mengembalikan index
    int cariProduk(int id) {
        // Looping melalui seluruh produk dalam vector
        for (size_t i = 0; i < daftarProduk.size(); i++) { 
            // Cek apakah ID produk saat ini sama dengan ID yang dicari
            if (daftarProduk[i].getId() == id) return i;
        }
        return -1; // Jika tidak ditemukan
    }

    // Cari data produk dan tampilkan
    void cariData() {
        int id;
        // input ID produk
        cout << "Masukkan ID Produk yang ingin dicari: ";
        cin >> id;

        // Panggil fungsi cariProduk untuk mencari index produk berdasarkan ID
        int find = cariProduk(id);
        // Jika fungsi mengembalikan -1, berarti produk tidak ditemukan
        if (find == -1) {
            cout << "Produk tidak ditemukan!\n";
            return;
        }

        // mengubah data produk di vector tanpa membuat salinan
        auto &p = daftarProduk[find];

        // Inisialisasi lebar kolom minimal
        int wId = 2, wNama = 4, wMerek = 5, wModel = 5, wHarga = 5, wStok = 4;
        wId = max(wId, (int)to_string(p.getId()).size());
        wNama = max(wNama, (int)p.getNama().size());
        wMerek = max(wMerek, (int)p.getMerek().size());
        wModel = max(wModel, (int)p.getModel().size());
        string hargaStr = formatRibuan((long long)p.getHarga()) + ",00";
        int panjangHarga = (int)hargaStr.size();
        wHarga = max(wHarga, panjangHarga);
        wStok = max(wStok, (int)to_string(p.getStok()).size());

        // Tambah padding
        wId += 2; wNama += 2; wMerek += 2; wModel += 2; wHarga += 2; wStok += 2;

        auto garis = [&](int len) { cout << "+" << string(len, '-'); };

        cout << "\nProduk ditemukan:\n";
        // tampilan hasil pencarian
        garis(wId); garis(wNama); garis(wMerek); garis(wModel); garis(wHarga); garis(wStok); cout << "+\n";
        cout << "| " << left << setw(wId-1) << "ID"
             << "| " << setw(wNama-1) << "Nama"
             << "| " << setw(wMerek-1) << "Merek"
             << "| " << setw(wModel-1) << "Model"
             << "| " << setw(wHarga-1) << "Harga"
             << "| " << setw(wStok-1) << "Stok" << "|\n";
        garis(wId); garis(wNama); garis(wMerek); garis(wModel); garis(wHarga); garis(wStok); cout << "+\n";

        // Cetak satu baris produk
        cout << "| " << left << setw(wId-1) << p.getId()
             << "| " << setw(wNama-1) << p.getNama()
             << "| " << setw(wMerek-1) << p.getMerek()
             << "| " << setw(wModel-1) << p.getModel()
             << "| " << setw(wHarga-1) << formatRibuan((long long)p.getHarga()) + ",00"
             << "| " << setw(wStok-1) << p.getStok() << "|\n";
        garis(wId); garis(wNama); garis(wMerek); garis(wModel); garis(wHarga); garis(wStok); cout << "+\n";
    }

    // Update data produk
    void updateData() {
        int id;
        // input
        cout << "Masukkan ID produk yang ingin diupdate: ";
        cin >> id;

        // Panggil fungsi cariProduk untuk mencari index produk berdasarkan ID
        int update = cariProduk(id);
        if (update == -1) {
            cout << "Produk tidak ditemukan!\n";
            return;
        }

        // inisialisasi
        string nama, merek, model;
        double harga;
        int stok;

        // Input data baru
        cout << "Masukkan Nama baru: ";
        cin >> nama;
        cout << "Masukkan Merek baru: ";
        cin >> merek;
        cout << "Masukkan Model baru: ";
        cin >> model;
        cout << "Masukkan Harga baru: ";
        cin >> harga;
        cout << "Masukkan Stok baru: ";
        cin >> stok;

        // Update data
        daftarProduk[update].setNama(nama); // nama
        daftarProduk[update].setMerek(merek); // merek
        daftarProduk[update].setModel(model); // model
        daftarProduk[update].setHarga(harga); // harga
        daftarProduk[update].setStok(stok); // stok

        cout << "Produk berhasil diupdate!\n";
    }

    // Hapus data produk
    void hapusData() {
        int id;
        // input
        cout << "Masukkan ID produk yang ingin dihapus: ";
        cin >> id;

        // Panggil fungsi cariProduk untuk mencari index produk berdasarkan ID
        int del = cariProduk(id);
        if (del == -1) {
            cout << "Produk tidak ditemukan!\n";
            return;
        }

        // Hapus dari vector
        daftarProduk.erase(daftarProduk.begin() + del);
        cout << "Produk berhasil dihapus!\n";
    }
};