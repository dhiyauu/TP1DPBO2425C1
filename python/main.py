# Saya Dhiya Ulhaq dengan NIM 2407716 mengerjakan Tugas Praktikum 
# (Konsep OOP & Enkapsulasi) dalam Bahasa Pemrograman "Python"
# dalam mata kuliah desain & pemrograman berorientasi objek untuk keberkahan-Nya 
# maka saya tidak akan melakukan kecurangan seperti yang telah di spesifikasikan

from Produk import Produk  # Import kelas Produk dari file Produk.py

def main():
    # Fungsi utama program yang menampilkan menu dan menerima input user
    while True:  # Looping terus-menerus sampai user memilih keluar
        # Menampilkan judul program
        print("\n=== ELEKTRONIX - Household Electronics ===")
        print("================= MENU ===================")
        # Menampilkan opsi menu
        print("1. Tambah Produk")
        print("2. Tampilkan Produk")
        print("3. Update Produk")
        print("4. Hapus Produk")
        print("5. Cari Produk")
        print("0. Keluar")

        # Menerima input user untuk memilih menu
        pilihan = input("Pilih: ")

        # Mengecek pilihan user dan memanggil method class sesuai pilihan
        if pilihan == "1":
            Produk.tambah_data()  # Memanggil class method tambah_data untuk menambahkan produk baru
        elif pilihan == "2":
            Produk.tampilkan_data()  # Memanggil class method tampilkan_data untuk menampilkan semua produk
        elif pilihan == "3":
            Produk.update_data()  # Memanggil class method update_data untuk mengubah data produk berdasarkan ID
        elif pilihan == "4":
            Produk.hapus_data()  # Memanggil class method hapus_data untuk menghapus produk berdasarkan ID
        elif pilihan == "5":
            Produk.cari_data()  # Memanggil class method cari_data untuk mencari produk berdasarkan ID
        elif pilihan == "0":
            print("Keluar program...")  # Memberi pesan bahwa program akan berhenti
            break  # Keluar dari loop while, menghentikan program
        else:
            print("Pilihan tidak valid!")  # Jika input tidak sesuai menu, tampilkan pesan error

# Mengecek apakah file ini dijalankan langsung
if __name__ == "__main__":
    main()  # Memanggil fungsi main() untuk menjalankan program