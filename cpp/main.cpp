// Saya Dhiya Ulhaq dengan NIM 2407716 mengerjakan Tugas Praktikum 
// (Konsep OOP & Enkapsulasi) dalam Bahasa Pemrograman "C++"
// dalam mata kuliah desain & pemrograman berorientasi objek untuk keberkahan-Nya 
// maka saya tidak akan melakukan kecurangan seperti yang telah di spesifikasikan

#include "Produk.cpp" // Meng-include file Produk.cpp yang berisi definisi kelas Produk
using namespace std;

int main() {
    // Membuat objek daftarProduk dari kelas Produk
    // Objek ini akan digunakan untuk menyimpan dan memanipulasi data produk
    Produk daftarProduk;

    int pilihan; // Variabel untuk menyimpan pilihan menu user

    // Loop menu utama, akan terus berjalan sampai user memilih 0 untuk keluar
    do {
        // Menampilkan judul program dan menu pilihan
        cout << "\n=== ELEKTRONIX - Household Electronics ===\n";
        cout << "================= MENU ===================\n";
        cout << "1. Tambah Produk\n";
        cout << "2. Tampilkan Produk\n";
        cout << "3. Update Produk\n";
        cout << "4. Hapus Produk\n";
        cout << "5. Cari Produk\n";
        cout << "0. Keluar\n";
        cout << "Pilih: ";

        cin >> pilihan; // User memasukkan pilihan menu

        // Struktur switch untuk menangani aksi berdasarkan pilihan user
        switch (pilihan) {
            case 1: 
                // Memanggil fungsi tambahData() untuk menambahkan produk baru
                daftarProduk.tambahData(); 
                break;
            case 2: 
                // Memanggil fungsi tampilkanData() untuk menampilkan semua produk
                daftarProduk.tampilkanData(); 
                break;
            case 3: 
                // Memanggil fungsi updateData() untuk memperbarui data produk tertentu
                daftarProduk.updateData(); 
                break;
            case 4: 
                // Memanggil fungsi hapusData() untuk menghapus produk berdasarkan ID
                daftarProduk.hapusData(); 
                break;
            case 5: 
                // Memanggil fungsi cariData() untuk mencari dan menampilkan produk tertentu
                daftarProduk.cariData(); 
                break;
            case 0: 
                // Memberi pesan saat user memilih keluar
                cout << "Keluar program...\n"; 
                break;
            default: 
                // Jika user memasukkan pilihan di luar menu yang tersedia
                cout << "Pilihan tidak valid!\n";
        }

    // Perulangan do-while akan terus berjalan sampai user memilih 0
    } while (pilihan != 0);

    return 0; // Mengembalikan 0 menandakan program selesai dengan normal
}