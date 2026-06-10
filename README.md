<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# Praktikum Pemrograman Web lanjut

Laravel 13 & Livewire 4 Learning Series

Repository ini berisi tahapan pengembangan aplikasi menggunakan **Laravel 13** dan **Livewire 4**.

Tujuan repository ini adalah sebagai media pembelajaran yang memungkinkan peserta mengikuti proses pengembangan aplikasi secara bertahap. Setiap materi disimpan dalam bentuk **commit Git**, sehingga Anda dapat melihat perkembangan aplikasi dari awal hingga akhir sesuai urutan pertemuan.

---

## Teknologi yang Digunakan

* Laravel 13
* Livewire 4
* Tailwind CSS
* MySQL/MariaDB
* DDEV (Opsional)

---

## Cara Mengikuti Materi

Setiap materi disimpan dalam commit yang berbeda.

Lihat daftar commit:

```bash
git log --oneline
```

Contoh hasil:

```text
a1b2c3d Pertemuan 1 - Pengenalan
d4e5f6g Pertemuan 2 - Tambah Data
h7i8j9k Pertemuan 3 - Tampil Data
```

Untuk berpindah ke commit tertentu:

```bash
git checkout <commit-id>
```

Contoh:

```bash
git checkout a1b2c3d
```

Jika ingin kembali ke branch utama:

```bash
git checkout main
```

Atau:

```bash
git switch main
```

---

## Materi Perkuliahan

### Pertemuan 1 - Pengenalan

Materi:
https://docs.google.com/document/d/1_v7oMm6kr5FridpEdNfYvLeemiRiMIUy/edit?usp=drive_link&ouid=104225670723013182666&rtpof=true&sd=true

---

### Pertemuan 2 - Tambah Data

Materi:
https://docs.google.com/document/d/19WuoR62O0h5DNsotLM_YgMQAnWGh2sNK/edit?usp=drive_link&ouid=104225670723013182666&rtpof=true&sd=true

---

### Pertemuan 3 - Tampil Data

Materi:
https://docs.google.com/document/d/1Q6M6sVtQUVCmnkMlalhvz-e12Z5vjxjV/edit?usp=drive_link&ouid=104225670723013182666&rtpof=true&sd=true

---

### Pertemuan 4 - Update Data dan Modal

Materi:
https://docs.google.com/document/d/15kLTqBzJbn6pFhNIrU_XI44cu0H9_Skb/edit?usp=drive_link&ouid=104225670723013182666&rtpof=true&sd=true

---

### Pertemuan 5

Materi akan ditambahkan pada pertemuan berikutnya.

---

### Pertemuan 6 - Delete Data

Materi:
https://docs.google.com/document/d/1ZGqBRPAVaBUcXFEgVPMaCV_JE0M3Do0I/edit?usp=drive_link&ouid=104225670723013182666&rtpof=true&sd=true

---

### Pertemuan 7 - Upload Gambar

Materi:
https://docs.google.com/document/d/1vwBctCnQFQDAKX5zr6PExMQIvkXAsdhi/edit?usp=drive_link&ouid=104225670723013182666&rtpof=true&sd=true

---

### Pertemuan 8 - Layout

Materi:
https://docs.google.com/document/d/1w_e58NyGnFnGyR7GKazQEC0_IM82xMtZ/edit?usp=drive_link&ouid=104225670723013182666&rtpof=true&sd=true

---

### Pertemuan 9 - Autentikasi

Materi:
https://docs.google.com/document/d/10dnykN0xqwdvO8SHBnYk2c0sIbNwUFWC/edit?usp=drive_link&ouid=104225670723013182666&rtpof=true&sd=true

---

## Menjalankan Project

Clone repository:

```bash
git clone <repository-url>
```

Masuk ke folder project:

```bash
cd nama-project
```

Install dependency:

```bash
composer install
npm install
```

Salin file environment:

```bash
cp .env.example .env
```

Generate application key:

```bash
php artisan key:generate
```

Konfigurasi database pada file `.env`, kemudian jalankan migrasi:

```bash
php artisan migrate
```

Jalankan aplikasi:

```bash
composer run dev
```

atau

```bash
php artisan serve
```

---

## Tujuan Pembelajaran

Setelah mengikuti seluruh materi, peserta diharapkan mampu:

* Memahami konsep dasar Laravel 13
* Menggunakan Livewire 4 untuk membangun aplikasi modern
* Melakukan operasi CRUD
* Menggunakan modal pada Livewire
* Mengelola upload file dan gambar
* Membuat layout aplikasi
* Mengimplementasikan autentikasi pengguna
* Mengembangkan aplikasi berbasis Laravel secara bertahap dan terstruktur

---

Selamat belajar dan bereksperimen dengan Laravel 13 dan Livewire 4.

