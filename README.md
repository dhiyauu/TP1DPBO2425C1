# TP1DPBO2425C1
## Janji

Saya Dhiya Ulhaq dengan NIM 2407716 Mengerjakan Tugas Praktikum (OOP & Encapsulation) dalam Mata Kuliah Desain Pemrograman Berorientasi Objek untuk Keberkahan-Nya Maka Saya Tidak Akan Melakukan Kecurangan Seperti Yang Telah di Spesifikasikan. Aamiin

## Penjelasan Desain

Program ini menampilkan data produk apa saja pada Toko Elektronik yang dinamakan Elektronix, sehingga membuat class yang bernama Produk.

### Atribut

Di dalamnya terdapat beberapa atribut, diantaranya:
1. **ID** : Identitas unik tiap produk agar membedakan produk jika nama produk sama.
2. **Nama** : Identitas deskriptif saat menampilkan daftar produk.
3. **Merek** : Penting karena banyak produk memiliki fungsi sama tetapi merek/brand berbeda.
4. **Model** : Berguna untuk memudahkan identifikasi lebih spesifik selain nama  dn merek.
5. **Harga** : Harga dipakai saat menampilkan produk, transaksi, atau perhitungan.
6. **Stok** : Untuk mengetahui ketersediaan barang.
7. **Gambar** : Untuk memberikan visualisasi produk kepada pelanggan.

### Getter & Setter

Terdapat getter dan setter untuk akses/mengubah data produk, diantaranya:

`getId()` : Mengambil nilai ID produk

`getNama()` : Mengambil nama produk

`getMerek()` : Mengambil merek produk

`getModel()` : Mengambil model produk

`getHarga()` : Mengambil harga produk

`getStok()` : Mengambil stok produk

`getGambar()` : Mengambil gambar produk

`setNama(string nama)` : Mengubah nama produk

`setMerek(string merek)` : Mengubah merek produk

`setModel(string model)` : Mengubah modul produk

`setHarga(double harga)` : Mengubah harga produk

`setStok(int stok)` : Mengubah stok produk

`setGambar($gambar)` : Mengubah gambar produk

### Metode

Metode digunakan yaitu CRUD dan format ribuan untuk harga, diantaranya:

`tambahData()` : menambah produk baru ke daftar.

`tampilkanData()` : menampilkan semua produk dalam bentuk tabel.

`cariData()` : mencari produk berdasarkan ID.

`updateData()` : memperbarui data produk tertentu.

`hapusData()` : menghapus produk berdasarkan ID.

`cariProduk()` : fungsi utilitas untuk mencari index produk di vector.

`formatRibuan()` : memformat harga ke format ribuan (pakai titik .).

### Vector `daftarProduk`

Menyimpan semua produk dalam bentuk objek Produk.

## Penjelasan Alur Program/ Flow Kode

### a. Inisialisasi Class

```cpp
class Produk {
    private:
        int id, stok;
        string nama, merek, model;
        double harga;
        vector<Produk> daftarProduk; 
    ...
};
```

Setiap produk punya data sendiri, dan daftarProduk adalah koleksi semua produk.

### b. Konstruktor

```cpp
Produk(int id, string nama, string merek, string model, double harga, int stok);
```

Digunakan saat membuat produk baru, langsung mengisi semua field.

### c. Getter & Setter

```cpp
int getId() { return id; }
void setNama(string nama) { this->nama = nama; }
```

Memberi akses ke atribut yang private.

### d. Menambahkan Produk

```cpp
void tambahData() {
    daftarProduk.push_back(Produk(id, nama, merek, model, harga, stok));
}
```

Data baru ditambahkan ke dalam vector daftarProduk.

### e. Menampilkan Produk (tabel)

```cpp
void tampilkanData() {
    ...
}
```

Program menampilkan data produk serta menghitung panjang kolom (setw()) supaya tabel
rapi, lalu mencetak data produk dalam format tabel ASCII.

### f. Format Harga

```cpp
string formatRibuan(long long nilai);
```

Harga dikonversi menjadi string, lalu diberi titik (.) setiap 3 digit dari belakang.

### g. Mencari Produk

```cpp
int cariProduk(int id);
```

Mengembalikan index produk jika ditemukan, atau -1 kalau tidak ada.

Kemudian dipakai di:

```cpp
void cariData() {
    int find = cariProduk(id);
    if (find == -1) { cout << "Produk tidak ditemukan!"; }
}
```

### h. Update Produk

```cpp
void updateData() {
    int update = cariProduk(id);
    daftarProduk[update].setNama(nama);
    ...
}
```

Mengubah data produk di dalam vector.

### i. Hapus Produk

```cpp
void hapusData() {
    int del = cariProduk(id);
    daftarProduk.erase(daftarProduk.begin() + del);
}
```
Menghapus produk dari vector berdasarkan index.

User dapat memilih beberapa menu pada Toko Elektronix dan program meminta input data produk tersebut. Program terus berjalan sampai user pilih keluar.

## Dokumentasi
### 1. C++
<img src="https://github.com/user-attachments/assets/6ddd0d22-5427-477a-85db-5a9b159d906d" alt="cpp" width="600"/>

### 2. Java
<img src="https://github.com/user-attachments/assets/4393db8d-8243-44a8-9d5e-1a7f436c7940" alt="java" width="600"/>

### 3. Python
<img src="https://github.com/user-attachments/assets/71d6596e-7a78-41ee-9786-0438dffeb617" alt="python" width="600"/>

### 4. PHP
<img src="https://github.com/user-attachments/assets/d29c4eaf-17e9-48c9-b362-daac2172ea05" alt="php" width="600"/>
<img src="https://github.com/user-attachments/assets/0e029c13-f168-4043-99ee-228345d4638a" alt="php_tambah" width="600"/>
<img src="https://github.com/user-attachments/assets/9767c339-2f2e-409e-b290-c9be00470beb" alt="php_update" width="600"/>
