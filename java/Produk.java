// Saya Dhiya Ulhaq dengan NIM 2407716 mengerjakan Tugas Praktikum 
// (Konsep OOP & Enkapsulasi) dalam Bahasa Pemrograman "Java"
// dalam mata kuliah desain & pemrograman berorientasi objek untuk keberkahan-Nya 
// maka saya tidak akan melakukan kecurangan seperti yang telah di spesifikasikan

import java.util.ArrayList;
import java.util.Scanner;
import java.text.NumberFormat;  
import java.util.Locale;

public class Produk {
    // Atribut private untuk menyimpan data produk
    private int id;       // ID unik produk
    private String nama;  // Nama produk
    private String merek; // Merek produk
    private String model; // Model produk
    private double harga; // Harga produk
    private int stok;     // Jumlah stok produk

    // ArrayList untuk menyimpan semua produk
    private final ArrayList<Produk> daftarProduk = new ArrayList<>();

    // Konstruktor default
    public Produk() {}

    // Konstruktor dengan parameter untuk membuat objek Produk baru
    public Produk(int id, String nama, String merek, String model, double harga, int stok) {
        this.id = id;
        this.nama = nama;
        this.merek = merek;
        this.model = model;
        this.harga = harga;
        this.stok = stok;
    }

    // Getter
    public int getId() { // Mengembalikan ID produk
        return id; 
    }        
    public String getNama() { // Mengembalikan nama produk
        return nama; 
    }
    public String getMerek() { // Mengembalikan merek produk
        return merek; 
    }
    public String getModel() { // Mengembalikan model produk
        return model; 
    }
    public double getHarga() { // Mengembalikan harga produk
        return harga; 
    }
    public int getStok() { // Mengembalikan stok produk
        return stok; 
    }

    // Setter
    public void setNama(String nama) { // Mengubah nama produk
        this.nama = nama; 
    }
    public void setMerek(String merek) { // Mengubah merek produk
        this.merek = merek; 
    }
    public void setModel(String model) { // Mengubah model produk
        this.model = model; 
    }
    public void setHarga(double harga) { // Mengubah harga produk
        this.harga = harga; 
    }
    public void setStok(int stok) {  // Mengubah stok produk
        this.stok = stok; 
    }

    // Tambah Data
    public void tambahData(Scanner sc) {
        // Meminta input user untuk setiap atribut produk
        System.out.print("Masukkan ID: ");
        this.id = sc.nextInt();
        System.out.print("Masukkan Nama Produk: ");
        this.nama = sc.next();
        System.out.print("Masukkan Merek: ");
        this.merek = sc.next();
        System.out.print("Masukkan Model: ");
        this.model = sc.next();
        System.out.print("Masukkan Harga: ");
        this.harga = sc.nextDouble();
        System.out.print("Masukkan Stok: ");
        this.stok = sc.nextInt();

        // Menambahkan produk baru ke daftarProduk
        daftarProduk.add(new Produk(id, nama, merek, model, harga, stok));

        // Menampilkan pesan sukses
        System.out.println("Produk berhasil ditambahkan!");
    }

    // Atribut formatter sebagai field class
    private final NumberFormat nf;

    {
        // initializer block → langsung dieksekusi saat objek dibuat
        nf = NumberFormat.getNumberInstance(new Locale("id", "ID"));
        nf.setMinimumFractionDigits(2);
        nf.setMaximumFractionDigits(2);
    }


    // Tampilkan Data
    public void tampilkanData() {
        // Jika daftarProduk kosong, tampilkan pesan dan hentikan
        if (daftarProduk.isEmpty()) {
            System.out.println("Belum ada data produk.");
            return;
        }

        // Header tabel
        String[] header = {"ID", "Nama", "Merek", "Model", "Harga", "Stok"};

        // Array untuk menyimpan lebar tiap kolom agar tabel rapi
        int[] colWidth = new int[header.length];
        for (int i = 0; i < header.length; i++) {
            colWidth[i] = header[i].length(); // Lebar minimal = panjang header
        }

        // Hitung panjang maksimal tiap kolom berdasarkan data produk
        for (Produk p : daftarProduk) {
            colWidth[0] = Math.max(colWidth[0], String.valueOf(p.getId()).length()); // ID
            colWidth[1] = Math.max(colWidth[1], p.getNama().length()); // nama
            colWidth[2] = Math.max(colWidth[2], p.getMerek().length()); // merek
            colWidth[3] = Math.max(colWidth[3], p.getModel().length()); // model
            colWidth[4] = Math.max(colWidth[4], nf.format(p.getHarga()).length()); // harga
            colWidth[5] = Math.max(colWidth[5], String.valueOf(p.getStok()).length()); // stok
        }

        // Membuat border tabel
        StringBuilder border = new StringBuilder("+");
        for (int w : colWidth) {
            border.append("-".repeat(w + 2)).append("+"); // Tambahkan padding + border
        }

        // Menampilkan header tabel
        System.out.println("\n=== DAFTAR PRODUK ELEKTRONIX ===");
        System.out.println(border);
        // cetak tabel
        System.out.print("|");
        for (int i = 0; i < header.length; i++) {
            System.out.printf(" %-" + colWidth[i] + "s |", header[i]);
        }
        System.out.println();
        System.out.println(border);

        // Menampilkan semua data produk
        for (Produk p : daftarProduk) {
            String hargaStr = nf.format(p.getHarga());
            System.out.printf("| %-" + colWidth[0] + "d ", p.getId());
            System.out.printf("| %-" + colWidth[1] + "s ", p.getNama());
            System.out.printf("| %-" + colWidth[2] + "s ", p.getMerek());
            System.out.printf("| %-" + colWidth[3] + "s ", p.getModel());
            System.out.printf("| %-" + colWidth[4] + "s ", hargaStr);
            System.out.printf("| %-" + colWidth[5] + "d |\n", p.getStok());
        }

        System.out.println(border); // Cetak border akhir
    }

    // Cari Produk
    private int cariProduk(int id) {
        // Loop untuk mencari index produk berdasarkan ID
        for (int i = 0; i < daftarProduk.size(); i++) {
            if (daftarProduk.get(i).getId() == id) {
                return i; // Mengembalikan index produk jika ditemukan
            }
        }
        return -1; // Jika tidak ditemukan, kembalikan -1
    }

    // cari data
    public void cariData(Scanner sc) {
        // input
        System.out.print("Masukkan ID Produk yang ingin dicari: ");
        int idCari = sc.nextInt();

        int index = cariProduk(idCari); // Cari index produk
        if (index == -1) {
            System.out.println("Produk tidak ditemukan!");
        } else {
            Produk p = daftarProduk.get(index); // Ambil produk yang ditemukan

            // Header dan lebar kolom seperti pada tampilkanData()
            String[] header = {"ID", "Nama", "Merek", "Model", "Harga", "Stok"};
            int[] colWidth = new int[header.length];
            for (int i = 0; i < header.length; i++) colWidth[i] = header[i].length();

            // Sesuaikan lebar kolom dengan data produk
            colWidth[0] = Math.max(colWidth[0], String.valueOf(p.getId()).length());
            colWidth[1] = Math.max(colWidth[1], p.getNama().length());
            colWidth[2] = Math.max(colWidth[2], p.getMerek().length());
            colWidth[3] = Math.max(colWidth[3], p.getModel().length());
            colWidth[4] = Math.max(colWidth[4], nf.format(p.getHarga()).length());
            colWidth[5] = Math.max(colWidth[5], String.valueOf(p.getStok()).length());

            // Buat border tabel
            StringBuilder border = new StringBuilder("+");
            for (int w : colWidth) border.append("-".repeat(w + 2)).append("+");

            System.out.println("\nProduk ditemukan:");
            System.out.println(border);

            // Cetak header
            System.out.print("|");
            for (int i = 0; i < header.length; i++) {
                System.out.printf(" %-" + colWidth[i] + "s |", header[i]);
            }
            System.out.println();
            System.out.println(border);

            // Cetak data produk
            String hargaStr = nf.format(p.getHarga());
            System.out.printf("| %-" + colWidth[0] + "d ", p.getId()); // ID
            System.out.printf("| %-" + colWidth[1] + "s ", p.getNama()); // nama
            System.out.printf("| %-" + colWidth[2] + "s ", p.getMerek()); // merek
            System.out.printf("| %-" + colWidth[3] + "s ", p.getModel()); // model
            System.out.printf("| %-" + colWidth[4] + "s ", hargaStr); // harga
            System.out.printf("| %-" + colWidth[5] + "d |\n", p.getStok()); // stok
            System.out.println(border);
        }
    }

    // Update Data
    public void updateData(Scanner sc) {
        System.out.print("Masukkan ID produk yang ingin diupdate: ");
        this.id = sc.nextInt(); // Ambil ID produk untuk diupdate

        int index = cariProduk(id); // Cari index produk
        if (index == -1) {
            System.out.println("Produk tidak ditemukan!");
            return;
        }

        // Ambil input baru dari user
        System.out.print("Masukkan Nama baru: ");
        this.nama = sc.next();
        System.out.print("Masukkan Merek baru: ");
        this.merek = sc.next();
        System.out.print("Masukkan Model baru: ");
        this.model = sc.next();
        System.out.print("Masukkan Harga baru: ");
        this.harga = sc.nextDouble();
        System.out.print("Masukkan Stok baru: ");
        this.stok = sc.nextInt();

        // Update data produk di daftarProduk
        Produk p = daftarProduk.get(index);
        p.setNama(nama);
        p.setMerek(merek);
        p.setModel(model);
        p.setHarga(harga);
        p.setStok(stok);

        System.out.println("Produk berhasil diupdate!");
    }

    // Hapus Data
    public void hapusData(Scanner sc) {
        System.out.print("Masukkan ID produk yang ingin dihapus: ");
        this.id = sc.nextInt(); // Ambil ID produk untuk dihapus

        int index = cariProduk(id); // Cari index produk
        if (index == -1) {
            System.out.println("Produk tidak ditemukan!");
            return;
        }

        daftarProduk.remove(index); // Hapus produk dari daftarProduk
        System.out.println("Produk berhasil dihapus!");
    }
}