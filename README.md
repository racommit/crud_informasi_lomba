# Aplikasi CRUD Informasi Lomba dengan CodeIgniter 4

Aplikasi ini adalah implementasi dasar dari operasi CRUD (Create, Read, Update, Delete) menggunakan framework PHP CodeIgniter 4. Dengan aplikasi ini, Anda dapat mengelola informasi lomba, termasuk data mahasiswa, lomba, dan prestasi mereka.

## Panduan Instalasi

1. **Klon Repositori:**
   ```bash
   git clone https://github.com/racommit/crud_informasi_lomba
   ```

2. **Database MySQL:**
   - Buat database MySQL.
   - Sesuaikan file konfigurasi di `app/config/Database.php` dengan informasi koneksi database Anda.

3. **Migrasi Database:**
   ```bash
   php spark migrate
   ```

4. **Jalankan Aplikasi:**
   ```bash
   php spark serve
   ```

5. **Akses Aplikasi:**
   - Buka browser dan akses `http://localhost:8080`.

## Fitur Utama

- **Manajemen Mahasiswa:** Tambah, edit, dan hapus informasi mahasiswa, termasuk nama, kelas, dan prestasi lomba.
- **Manajemen Lomba:** Tambah, edit, dan hapus informasi lomba, termasuk nama lomba, kategori, dan detail lainnya.
- **Pencatatan Prestasi:** Pantau dan catat prestasi mahasiswa dalam berbagai lomba.
- **Otentikasi Pengguna:** Pengelolaan akun pengguna dengan otentikasi berbasis grup dan peran.

## Teknologi yang Digunakan

- **CodeIgniter 4:** Penggunaan versi terbaru dari framework PHP CodeIgniter untuk menghasilkan kode yang bersih, terstruktur, dan mudah dielola.
- **MySQL Database:** Penyimpanan data menggunakan database MySQL untuk kehandalan dan performa.
- **Bootstrap 4:** Tampilan yang responsif dan mudah digunakan dengan bantuan Bootstrap 4.

## Kontribusi

Kami mengundang dan menerima kontribusi dari komunitas. Silakan buat *issue* atau kirimkan *pull request* untuk meningkatkan aplikasi ini.

## Lisensi

Aplikasi ini dilisensikan di bawah Lisensi MIT. Lihat berkas [LICENSE](LICENSE) untuk informasi lebih lanjut.
