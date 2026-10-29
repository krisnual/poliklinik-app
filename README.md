# 🏥 Sistem Informasi Poliklinik

Sistem Informasi Poliklinik merupakan aplikasi berbasis web yang dibangun menggunakan framework **Laravel** dan database **MySQL**.

Aplikasi ini dikembangkan untuk membantu pengelolaan data dan pelayanan poliklinik, mulai dari pengelolaan data dokter, pasien, poli, obat, hingga proses pendaftaran dan pemeriksaan pasien.

## 📋 Fitur Aplikasi

### 🔐 Autentikasi
- Login dan logout.
- Hak akses berdasarkan role pengguna.
- Tiga role pengguna: Admin, Dokter, dan Pasien.

### 👨‍💼 Admin
- Dashboard Admin.
- CRUD Data Poli.
- CRUD Data Dokter.
- CRUD Data Pasien.
- CRUD Data Obat.

### 👨‍⚕️ Dokter
- Dashboard Dokter.
- Pengelolaan jadwal pemeriksaan.
- Melihat daftar pasien.
- Melakukan pemeriksaan pasien.
- Melihat riwayat pemeriksaan pasien.

### 🧑 Pasien
- Dashboard Pasien.
- Melihat daftar poli.
- Melakukan pendaftaran poli.

## 🛠️ Teknologi yang Digunakan

| Teknologi | Keterangan |
|---|---|
| PHP | Bahasa pemrograman backend |
| Laravel | Framework aplikasi web |
| MySQL | Database |
| Blade | Template engine |
| HTML, CSS, JavaScript | Pengembangan antarmuka |
| Vite | Pengelolaan aset frontend |
| Laragon | Lingkungan pengembangan lokal |
| Git & GitHub | Version control |

## ⚙️ Cara Instalasi

### 1. Clone Repository

```bash
git clone https://github.com/krisnual/poliklinik-app.git
```

### 2. Masuk ke Folder Proyek

```bash
cd poliklinik-app
```

### 3. Instal Dependensi

```bash
composer install
npm install
```

### 4. Konfigurasi Environment

Salin file `.env.example` menjadi `.env`.

Kemudian sesuaikan konfigurasi database:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=poliklinik_db
DB_USERNAME=root
DB_PASSWORD=
```

### 5. Generate Application Key

```bash
php artisan key:generate
```

### 6. Buat Database

Buat database baru dengan nama:

```text
poliklinik_db
```

### 7. Jalankan Migration

```bash
php artisan migrate
```

Jika proyek menyediakan seeder untuk data awal dan akun pengguna, jalankan seeder sesuai konfigurasi proyek.

### 8. Jalankan Aplikasi

```bash
php artisan serve
```

Pada terminal lain, jalankan:

```bash
npm run dev
```

Aplikasi dapat diakses melalui alamat lokal yang ditampilkan oleh Laravel.

## 📁 Struktur Direktori

```text
poliklinik-app/
├── app/
│   ├── Http/
│   │   └── Controllers/
│   └── Models/
├── bootstrap/
├── config/
├── database/
│   ├── migrations/
│   └── seeders/
├── public/
├── resources/
│   └── views/
├── routes/
│   └── web.php
├── storage/
├── tests/
├── .env.example
├── artisan
├── composer.json
├── package.json
└── README.md
```

## 📸 Screenshot Aplikasi

Dokumentasi screenshot aplikasi dapat ditambahkan pada bagian ini.

Contoh halaman yang dapat ditampilkan:
- Halaman Login.
- Dashboard Admin.
- Halaman Data Poli.
- Halaman Data Dokter.
- Halaman Data Pasien.
- Halaman Data Obat.
- Halaman Pemeriksaan Pasien.
- Halaman Riwayat Pasien.

## 👨‍💻 Pengembang

**Nama:** Krisna Nur Alamsyah  
**NIM:** A11.2023.15229  
**Program:** Bengkel Koding  
**Proyek:** Sistem Informasi Poliklinik  
**Framework:** Laravel

## 📄 Tentang Proyek

Proyek ini dibuat sebagai bagian dari kegiatan pembelajaran Bengkel Koding untuk mengimplementasikan konsep pengembangan aplikasi web menggunakan Laravel, pengelolaan database, autentikasi pengguna, dan operasi CRUD.
