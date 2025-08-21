# 📚 Booknest

Booknest adalah aplikasi web manajemen perpustakaan sederhana yang membantu pengguna dalam **mengelola koleksi buku, transaksi peminjaman, pengembalian, dan laporan**. Aplikasi ini dibuat untuk mempermudah pengelolaan data buku baik di perpustakaan pribadi maupun organisasi.

---

## ✨ Fitur Utama

* 👤 **Manajemen User**
  * Register & Login  
  * Role: Admin & User  

* 📖 **Manajemen Buku**
  * Tambah, edit, hapus data buku  
  * Kategori & pencarian buku  

* 📦 **Transaksi Peminjaman & Pengembalian**
  * Peminjaman buku oleh user  
  * Pengembalian dengan status dan denda  

* 💸 **Pembayaran Denda (Midtrans)**
  * Integrasi dengan Midtrans Snap untuk pembayaran denda keterlambatan  
  * Mendukung berbagai metode pembayaran (transfer bank, e-wallet, kartu, dll.)

* 📊 **Laporan & Dashboard**
  * Jumlah user, jumlah buku, jumlah peminjaman  
  * Laporan transaksi  
  * Laporan pembayaran denda

---

## 🛠️ Tech Stack

* **Backend**: Laravel
* **Frontend**: Tailwind
* **Database**: MySQL

---

## 🚀 Instalasi & Setup

1. Clone repository

   ```bash
   git clone https://github.com/SurAwall17/Aplikasi-Perpustakaan-Berbasis-Web.git
   cd booknest
   composer install
   npm install && npm run dev
   cp .env.example .env
   php artisan key:generate
   php artisan migrate --seed
   php artisan serve
   http://127.0.0.1:8000
   ```

---
