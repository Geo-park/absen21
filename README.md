📌 Absen21

Sistem Absensi Berbasis Web (PHP & MySQL)

Project ini adalah website absensi sederhana yang dibuat untuk kebutuhan pembelajaran. Sistem memiliki fitur autentikasi pengguna, input data absensi, serta panel Admin dan Super Admin untuk pengelolaan data.

👥 Tim Pengembang
Nama	Tanggung Jawab
Kupat	Frontend (Tampilan UI & Layout Website)
Rio	Frontend + Backend Admin Biasa
Kamu	Backend Developer Utama (Login, Register, Input Absen, Sistem Role, & Super Admin)
🧠 Fitur Utama Sistem
🔐 Autentikasi Pengguna

Login user

Register akun baru

Logout

Manajemen session

Proteksi halaman berdasarkan role

📝 Input Data Absensi

User login mengisi form absensi

Data dikirim ke backend

Disimpan ke database berdasarkan user & waktu

🛠 Panel Admin (Admin Biasa) — (Rio)

Melihat data absensi

Mengedit data absensi

Menghapus data absensi tertentu

👑 Panel Super Admin — (Kamu)

Mengelola seluruh data user

Mengelola seluruh data absensi

Mengubah role user

Menghapus user

Kontrol penuh sistem

⚙️ Modul Backend
🔑 Autentikasi — (Kamu)
File	Fungsi
login.php	Proses login & pembuatan session
register.php	Pendaftaran user baru
logout.php	Menghapus session
📝 Proses Absensi — (Kamu)
File	Fungsi
proses-input.php	Menyimpan data absensi ke database
🛠 Admin Biasa — (Rio)
File	Fungsi
admin.php	Dashboard admin
edit.php	Edit data absensi
hapus.php	Hapus data absensi
👑 Super Admin — (Kamu)
File	Fungsi
super_admin.php	Dashboard super admin
super.php	Manajemen user & role
🔧 Konfigurasi
File	Fungsi
config.php	Koneksi database
Session check	Proteksi akses halaman
🗄 Struktur Database
CREATE TABLE users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(100),
  password VARCHAR(255),
  role ENUM('user','admin','superadmin') DEFAULT 'user'
);

CREATE TABLE absensi (
  id INT AUTO_INCREMENT PRIMARY KEY,
  user_id INT,
  tanggal DATE,
  jam_masuk TIME,
  jam_pulang TIME
);

🔄 Diagram Alur Sistem
1️⃣ Alur Login & Akses Role
flowchart TD
A[User buka website] --> B[Pilih Login / Register]

B -->|Register| C[Isi Form Daftar]
C --> D[Simpan ke Database sebagai User]

B -->|Login| E[Input Username & Password]
E --> F{Valid?}

F -->|Tidak| G[Tampilkan Error]
F -->|Ya| H[Buat Session Login]

H --> I{Cek Role User}

I -->|User| J[Masuk Dashboard User]
I -->|Admin| K[Masuk Dashboard Admin]
I -->|Super Admin| L[Masuk Dashboard Super Admin]

2️⃣ Alur Input Absensi
flowchart TD
A[User Login] --> B[Buka Halaman Absensi]
B --> C[Isi Form Absen]
C --> D[Kirim ke proses-input.php]
D --> E[Simpan ke Database]
E --> F[Tampilkan Notifikasi Berhasil]

3️⃣ Alur Admin Mengelola Data
flowchart TD
A[Admin Login] --> B[Masuk Dashboard Admin]
B --> C[Lihat Data Absensi]
C --> D{Pilih Aksi}
D -->|Edit| E[Update Data]
D -->|Hapus| F[Delete Data]

4️⃣ Alur Super Admin Mengelola Sistem
flowchart TD
A[Super Admin Login] --> B[Dashboard Super Admin]
B --> C[Kelola Data User]
B --> D[Kelola Semua Absensi]

C --> E[Ubah Role User]
C --> F[Hapus User]

🚀 Cara Menjalankan Project

Clone repository

git clone https://github.com/Geo-park/absen21.git


Buat database MySQL & import tabel

Atur koneksi database di config.php

Jalankan via XAMPP / Laragon / WAMP

Akses:

Login → login.php

Register → register.php

Admin → admin.php

Super Admin → super_admin.php
