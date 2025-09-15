// Saya Dhiya Ulhaq dengan NIM 2407716 mengerjakan Tugas Praktikum 
// (Konsep OOP & Enkapsulasi) dalam Bahasa Pemrograman "Java"
// dalam mata kuliah desain & pemrograman berorientasi objek untuk keberkahan-Nya 
// maka saya tidak akan melakukan kecurangan seperti yang telah di spesifikasikan

import java.util.Scanner; // Mengimpor Scanner untuk menerima input dari user

public class Main { // Kelas utama program
    public static void main(String[] args) { // Method utama program, titik masuk eksekusi
        try (Scanner sc = new Scanner(System.in)) { // Membuat Scanner untuk input user, menggunakan try-with-resources agar otomatis ditutup
            Produk daftarProduk = new Produk(); // Membuat objek Produk untuk mengelola daftar produk
            int pilihan; // Variabel untuk menyimpan pilihan menu user

            do { // Loop menu utama, akan terus berjalan sampai user memilih keluar (0)
                // Menampilkan judul program
                System.out.println("\n=== ELEKTRONIX - Household Electronics ===");
                System.out.println("================= MENU ===================");

                // Menampilkan daftar menu CRUD
                System.out.println("1. Tambah Produk");   // Menu tambah produk
                System.out.println("2. Tampilkan Produk"); // Menu menampilkan semua produk
                System.out.println("3. Update Produk");    // Menu update data produk
                System.out.println("4. Hapus Produk");     // Menu hapus produk
                System.out.println("5. Cari Produk");      // Menu cari produk berdasarkan ID
                System.out.println("0. Keluar");           // Menu keluar program

                System.out.print("Pilih: "); // Meminta user memasukkan pilihan
                pilihan = sc.nextInt();      // Membaca input angka dari user dan simpan ke variabel pilihan

                // Switch-case untuk menentukan aksi berdasarkan pilihan user
                switch (pilihan) {
                    case 1 -> daftarProduk.tambahData(sc); // Jika 1, panggil method tambahData dengan Scanner
                    case 2 -> daftarProduk.tampilkanData(); // Jika 2, panggil method tampilkanData untuk menampilkan semua produk
                    case 3 -> daftarProduk.updateData(sc);  // Jika 3, panggil method updateData dengan Scanner
                    case 4 -> daftarProduk.hapusData(sc);   // Jika 4, panggil method hapusData dengan Scanner
                    case 5 -> daftarProduk.cariData(sc);    // Jika 5, panggil method cariData dengan Scanner
                    case 0 -> System.out.println("Keluar program..."); // Jika 0, tampilkan pesan keluar
                    default -> System.out.println("Pilihan tidak valid!"); // Jika input tidak sesuai menu, tampilkan pesan error
                }
            } while (pilihan != 0); // Ulangi menu selama pilihan bukan 0 (keluar)
        } // Scanner otomatis tertutup di sini karena try-with-resources
    }
}