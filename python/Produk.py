# Saya Dhiya Ulhaq dengan NIM 2407716 mengerjakan Tugas Praktikum 
# (Konsep OOP & Enkapsulasi) dalam Bahasa Pemrograman "Python"
# dalam mata kuliah desain & pemrograman berorientasi objek untuk keberkahan-Nya 
# maka saya tidak akan melakukan kecurangan seperti yang telah di spesifikasikan

class Produk:
    # Class variable untuk menyimpan semua produk
    daftar_produk = []

    def __init__(self, id, nama, merek, model, harga, stok):
        # Konstruktor untuk membuat objek Produk baru
        self.id = id          # Menyimpan ID produk
        self.nama = nama      # Menyimpan nama produk
        self.merek = merek    # Menyimpan merek produk
        self.model = model    # Menyimpan model produk
        self.harga = harga    # Menyimpan harga produk
        self.stok = stok      # Menyimpan jumlah stok produk

    # Fungsi format harga
    @staticmethod
    def format_harga(harga):
        # Format ke ribuan dengan titik, desimal koma
        return f"{harga:,.2f}".replace(",", "X").replace(".", ",").replace("X", ".")

    # Getter
    def get_id(self):
        return self.id        # Mengembalikan ID produk

    def get_nama(self):
        return self.nama      # Mengembalikan nama produk

    def get_merek(self):
        return self.merek     # Mengembalikan merek produk

    def get_model(self):
        return self.model     # Mengembalikan model produk

    def get_harga(self):
        return self.harga     # Mengembalikan harga produk

    def get_stok(self):
        return self.stok      # Mengembalikan stok produk

    # Setter
    def set_nama(self, nama):
        self.nama = nama      # Mengubah nama produk

    def set_merek(self, merek):
        self.merek = merek    # Mengubah merek produk

    def set_model(self, model):
        self.model = model    # Mengubah model produk

    def set_harga(self, harga):
        self.harga = harga    # Mengubah harga produk

    def set_stok(self, stok):
        self.stok = stok      # Mengubah stok produk

    # Tambah Data
    @classmethod # method bisa mengelola data yang bersifat global pada kelas (daftar_produk)
    def tambah_data(cls):
        # Menerima input dari user untuk membuat produk baru
        id = int(input("Masukkan ID: "))
        nama = input("Masukkan Nama Produk: ")
        merek = input("Masukkan Merek: ")
        model = input("Masukkan Model: ")
        harga = float(input("Masukkan Harga: "))
        stok = int(input("Masukkan Stok: "))

        # Membuat objek Produk baru dan menambahkannya ke daftar_produk
        cls.daftar_produk.append(Produk(id, nama, merek, model, harga, stok))
        print("Produk berhasil ditambahkan!")  # Konfirmasi penambahan

    # Cari Produk
    @classmethod
    def cari_produk(cls, id):
        # Mencari produk berdasarkan ID
        for i, p in enumerate(cls.daftar_produk):
            if p.get_id() == id:
                return i  # Mengembalikan index produk jika ditemukan
        return -1        # Mengembalikan -1 jika tidak ditemukan

    # Tampilkan Data
    @classmethod
    def tampilkan_data(cls):
        if not cls.daftar_produk:
            print("Belum ada data produk.")  # Pesan jika daftar kosong
            return

        header = ["ID", "Nama", "Merek", "Model", "Harga", "Stok"]

        # Menentukan lebar kolom berdasarkan header dan panjang data
        col_widths = [len(h) for h in header]
        for p in cls.daftar_produk:
            col_widths[0] = max(col_widths[0], len(str(p.get_id()))) # iD
            col_widths[1] = max(col_widths[1], len(p.get_nama())) # nama
            col_widths[2] = max(col_widths[2], len(p.get_merek())) # merek
            col_widths[3] = max(col_widths[3], len(p.get_model())) # model
            col_widths[4] = max(col_widths[4], len(Produk.format_harga(p.harga))) # harga
            col_widths[5] = max(col_widths[5], len(str(p.get_stok()))) # stok

        # Fungsi internal untuk mencetak garis tabel
        def garis():
            print("+" + "+".join(["-" * (w + 2) for w in col_widths]) + "+")

        # Menampilkan header tabel
        print("\n=== DAFTAR PRODUK ELEKTRONIX ===")
        garis()
        print("| " + " | ".join(h.ljust(col_widths[i]) for i, h in enumerate(header)) + " |")
        garis()

        # Menampilkan semua data produk
        for p in cls.daftar_produk:
            row = [
                str(p.get_id()).ljust(col_widths[0]),
                p.get_nama().ljust(col_widths[1]),
                p.get_merek().ljust(col_widths[2]),
                p.get_model().ljust(col_widths[3]),
                Produk.format_harga(p.harga).ljust(col_widths[4]),
                str(p.get_stok()).ljust(col_widths[5]),
            ]
            print("| " + " | ".join(row) + " |")
        garis()  # Garis penutup tabel

    # Cari Data
    @classmethod
    def cari_data(cls):
        id = int(input("Masukkan ID Produk yang ingin dicari: "))
        index = cls.cari_produk(id)  # Memanggil fungsi cari_produk
        if index == -1:
            print("Produk tidak ditemukan!")  # Produk tidak ada
        else:
            p = cls.daftar_produk[index]  # Produk ditemukan

            # menampilkan data
            header = ["ID", "Nama", "Merek", "Model", "Harga", "Stok"]
            col_widths = [
                max(len(header[0]), len(str(p.get_id()))),
                max(len(header[1]), len(p.get_nama())),
                max(len(header[2]), len(p.get_merek())),
                max(len(header[3]), len(p.get_model())),
                max(len(header[4]), len(Produk.format_harga(p.harga))),
                max(len(header[5]), len(str(p.get_stok()))),
            ]

            def garis():
                print("+" + "+".join(["-" * (w + 2) for w in col_widths]) + "+")

            # Menampilkan data produk yang ditemukan
            print("\nProduk ditemukan:")
            garis()
            print("| " + " | ".join(header[i].ljust(col_widths[i]) for i in range(len(header))) + " |")
            garis()
            row = [
                str(p.get_id()).ljust(col_widths[0]),
                p.get_nama().ljust(col_widths[1]),
                p.get_merek().ljust(col_widths[2]),
                p.get_model().ljust(col_widths[3]),
                Produk.format_harga(p.harga).ljust(col_widths[4]),
                str(p.get_stok()).ljust(col_widths[5]),
            ]
            print("| " + " | ".join(row) + " |")
            garis()

    # Update Data
    @classmethod
    def update_data(cls):
        id = int(input("Masukkan ID produk yang ingin diupdate: "))
        index = cls.cari_produk(id)
        if index == -1:
            print("Produk tidak ditemukan!")  # Produk tidak ada
            return

        # Input data baru
        nama = input("Masukkan Nama baru: ")
        merek = input("Masukkan Merek baru: ")
        model = input("Masukkan Model baru: ")
        harga = float(input("Masukkan Harga baru: "))
        stok = int(input("Masukkan Stok baru: "))

        # Update objek produk di daftar_produk
        p = cls.daftar_produk[index]
        p.set_nama(nama)
        p.set_merek(merek)
        p.set_model(model)
        p.set_harga(harga)
        p.set_stok(stok)

        print("Produk berhasil diupdate!")  # Konfirmasi update

    # Hapus Data
    @classmethod
    def hapus_data(cls):
        id = int(input("Masukkan ID produk yang ingin dihapus: "))
        index = cls.cari_produk(id)
        if index == -1:
            print("Produk tidak ditemukan!")  # Produk tidak ada
            return

        cls.daftar_produk.pop(index)  # Hapus produk dari daftar
        print("Produk berhasil dihapus!")  # Konfirmasi hapus