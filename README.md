# 🎓 SISFO Akademik

**Sistem Informasi Akademik berbasis Laravel untuk mengelola data akademik sekolah secara terstruktur, responsif, dan terintegrasi dengan database.**

---

## 📌 Tentang Project

**SISFO Akademik** adalah aplikasi web Sistem Informasi Akademik yang dibuat untuk membantu pengelolaan data akademik sekolah.

Project ini menggunakan **Laravel** sebagai backend framework, **MariaDB/MySQL** sebagai database, dan **SB Admin 2** sebagai template antarmuka.

Aplikasi dirancang agar dapat digunakan pada berbagai ukuran layar, mulai dari smartphone, tablet, hingga desktop.

---

## ✨ Fitur

### 📊 Dashboard
- Ringkasan sistem akademik
- Navigasi terpusat
- Responsive layout

### 🏫 Data Kelas
- Menampilkan data kelas
- Tambah kelas
- Edit kelas
- Hapus kelas

### 👨‍🎓 Data Siswa
- Menampilkan data siswa
- Tambah siswa
- Edit siswa
- Hapus siswa
- Relasi siswa dengan kelas

### 👨‍🏫 Data Guru
- Menampilkan data guru
- Tambah data guru
- Edit data guru
- Hapus data guru
- Validasi NIP

### 📚 Mata Pelajaran
- Menampilkan data mata pelajaran
- Tambah mata pelajaran
- Edit mata pelajaran
- Hapus mata pelajaran
- Pengaturan KKM

### 📝 Nilai Siswa
- Menampilkan data nilai siswa
- Tambah nilai
- Edit nilai
- Hapus nilai
- Nilai Tugas
- Nilai UTS
- Nilai UAS
- Perhitungan nilai akhir otomatis
- Status kelulusan berdasarkan KKM

---

## 🧮 Perhitungan Nilai

Nilai akhir menggunakan bobot:

**Nilai Akhir = (Tugas × 30%) + (UTS × 30%) + (UAS × 40%)**

Status kelulusan:

- ✅ **Lulus** → Nilai Akhir ≥ KKM
- ❌ **Tidak Lulus** → Nilai Akhir < KKM

---

## 🛠️ Teknologi

| Teknologi | Penggunaan |
|---|---|
| PHP | Bahasa pemrograman |
| Laravel | Backend framework |
| MariaDB / MySQL | Database |
| Blade | Template engine |
| Bootstrap | UI framework |
| SB Admin 2 | Admin dashboard template |
| Font Awesome | Icon |
| JavaScript | Interaksi antarmuka |
| Git | Version control |

---

## 🗂️ Struktur Sistem

```text
SISFO Akademik
│
├── Dashboard
│
├── Data Master
│   ├── Data Kelas
│   ├── Data Siswa
│   ├── Data Guru
│   └── Mata Pelajaran
│
└── Akademik
    └── Nilai Siswa


---

🔗 Relasi Data

Kelas
  │
  └── Siswa
        │
        └── Nilai
              ├── Mata Pelajaran
              └── Guru

Relasi tersebut digunakan untuk menghubungkan data akademik agar dapat dikelola secara terstruktur.


---

📱 Responsive Design

SISFO Akademik menggunakan desain responsive sehingga dapat digunakan pada:

📱 Smartphone

📱 Tablet

💻 Laptop

🖥️ Desktop


Pada perangkat mobile, sidebar menggunakan hamburger menu untuk menghemat ruang layar.


---

⚙️ Requirements

Sebelum menjalankan project, pastikan tersedia:

PHP 8.2+

Composer

MariaDB / MySQL

Git

Web Browser



---

🚀 Installation

Clone repository:

git clone https://github.com/USERNAME/sisfo-akademik.git

Masuk ke folder project:

cd sisfo-akademik

Install dependency:

composer install

Buat file environment:

cp .env.example .env

Generate application key:

php artisan key:generate


---

🗄️ Database Configuration

Buka file:

.env

Sesuaikan konfigurasi database:

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=sisfo_akademik
DB_USERNAME=root
DB_PASSWORD=

Buat database:

sisfo_akademik

Kemudian jalankan migration:

php artisan migrate


---

▶️ Menjalankan Project

Jalankan server Laravel:

php artisan serve

Kemudian buka:

http://127.0.0.1:8000


---

📱 Development via Android

Project ini dikembangkan menggunakan perangkat Android dengan bantuan:

Termux — menjalankan PHP, Composer, MariaDB, dan Laravel

Acode — mengedit source code


Workflow ini memungkinkan proses development Laravel dilakukan langsung melalui perangkat Android.


---

🔐 Security

File .env tidak boleh di-upload ke repository public karena dapat berisi konfigurasi database dan informasi sensitif.

Gunakan:

.env.example

sebagai template konfigurasi.


---

🎯 Tujuan Project

Project ini dibuat sebagai implementasi pembelajaran:

Laravel

MVC Architecture

CRUD

Relational Database

Eloquent ORM

Migration

Routing

Controller

Blade Template

Form Validation

Responsive Web Design

Git & GitHub



---

📈 Pengembangan Selanjutnya

Beberapa fitur yang dapat dikembangkan:

[ ] Sistem Login & Authentication

[ ] Role Admin / Guru / Siswa

[ ] Cetak laporan nilai

[ ] Export PDF

[ ] Export Excel

[ ] Rekap nilai per kelas

[ ] Grafik statistik akademik

[ ] Search & Pagination

[ ] Dashboard dengan statistik real-time



---

📄 License

Project ini dibuat untuk keperluan pembelajaran dan pengembangan Sistem Informasi Akademik.


---

> SISFO Akademik — Mengelola data akademik dengan lebih terstruktur.



**Catatan:** ganti `USERNAME` pada bagian `git clone` nanti dengan username GitHub kamu. Jangan masukkan `.env` ke GitHub.# sisfo-akademik-tugas
