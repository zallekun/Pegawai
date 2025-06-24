# 🏢 Aplikasi CRUD Pegawai - CodeIgniter 4

<div align="center">

![CodeIgniter](https://img.shields.io/badge/CodeIgniter-4.x-EF4223?style=for-the-badge&logo=codeigniter&logoColor=white)
![PHP](https://img.shields.io/badge/PHP-8.x-777BB4?style=for-the-badge&logo=php&logoColor=white)
![MySQL](https://img.shields.io/badge/MySQL-4479A1?style=for-the-badge&logo=mysql&logoColor=white)
![Bootstrap](https://img.shields.io/badge/Bootstrap-5-7952B3?style=for-the-badge&logo=bootstrap&logoColor=white)


**Aplikasi web sederhana untuk manajemen data pegawai dan jabatan berbasis CodeIgniter 4**

*Cocok untuk pembelajaran CRUD, role user, pagination, notifikasi, dan fitur dashboard statistik*

[📖 Dokumentasi](#setup-instructions) • [🚀 Demo](#cara-login-ke-dashboard) • [🐛 Issues](https://github.com/zallekun/Pegawai/issues) • [💬 Discussions](https://github.com/zallekun/Pegawai/discussions)

</div>

---

## 📋 Daftar Isi
- [✨ Fitur Utama](#-fitur-utama)
- [🛠️ Teknologi](#️-teknologi)
- [📦 Instalasi](#-instalasi)
- [🔐 Login Dashboard](#-login-dashboard)
- [📸 Screenshot](#-screenshot)
- [🤖 AI Support](#-ai-support)
- [📞 Kontak](#-kontak)
- [📄 Lisensi](#-lisensi)

---

## ✨ Fitur Utama

### 🎯 Core Features
- **CRUD Pegawai & Jabatan** - Kelola data pegawai dan jabatan dengan lengkap
- **Role Management** - Sistem peran Admin (full access) dan User (read-only)
- **Authentication** - Login/logout dengan sistem keamanan yang baik
- **Change Password** - User dapat mengganti password sendiri

### 📊 Dashboard & Analytics
- **Dashboard Statistik** - Overview jumlah pegawai, jabatan, dan user
- **Interactive Charts** - Grafik distribusi pegawai per jabatan menggunakan Chart.js
- **Data Visualization** - Tampilan data yang informatif dan menarik

### 🔧 Advanced Features
- **Smart Pagination** - Navigasi data yang efisien
- **Sorting System** - Pengurutan data berdasarkan kolom
- **PDF Export** - Export data pegawai ke format PDF
- **Toast Notifications** - Notifikasi real-time untuk setiap aksi
- **About Page** - Profil kontributor dengan link LinkedIn

---

## 🛠️ Teknologi

| Kategori | Teknologi | Versi |
|----------|-----------|-------|
| **Backend** | PHP | 8.x |
| **Framework** | CodeIgniter | 4.x |
| **Database** | MySQL/MariaDB | Latest |
| **Frontend** | Bootstrap | 5.x |
| **Charts** | Chart.js | Latest |
| **PDF Generator** | Dompdf | Latest |
| **Version Control** | Git & GitHub | - |

---

## 📦 Instalasi

### 1️⃣ Clone Repository
```bash
git clone https://github.com/zallekun/Pegawai.git
cd Pegawai
```

### 2️⃣ Setup Environment
```bash
# Install dependencies
composer install

# Copy environment file
cp env .env
```

### 3️⃣ Konfigurasi Database
Edit file `.env` dan sesuaikan konfigurasi database:
```env
database.default.hostname = localhost
database.default.database = pegawai_db
database.default.username = root
database.default.password = 
database.default.DBDriver = MySQLi
```

### 4️⃣ Setup Database
```bash
# Buat database
CREATE DATABASE pegawai_db;

# Jalankan migration
php spark migrate

# Atau import file SQL (jika tersedia)
```

### 5️⃣ Deploy ke Web Server
| Server | Path |
|--------|------|
| **Laragon** | `C:\laragon\www\Pegawai` |
| **XAMPP** | `C:\xampp\htdocs\Pegawai` |

### 6️⃣ Akses Aplikasi
```
🌐 http://localhost/Pegawai/public
```

---

## 🔐 Login Dashboard

### Default Credentials
```
👤 Username: admin
🔒 Password: admin1234
🛡️  Role: Administrator
```

### Login URL
```
🔗 http://localhost/Pegawai/public/login
```

> **⚠️ Keamanan:** Password sudah di-hash menggunakan enkripsi yang aman

---

## 📸 Screenshot

| Dashboard | CRUD Pegawai | Export PDF |
|-----------|--------------|------------|
| ![Dashboard](https://github.com/user-attachments/assets/59767389-3fe2-4aa8-a16f-4cc769457989) | ![CRUD](https://github.com/user-attachments/assets/4566638b-6dca-4f5b-bedd-8fd3146e2d39) | ![PDF](https://github.com/user-attachments/assets/248d8517-6665-4c8b-8b92-131a60903944) |

---

## 🤖 AI Support

Aplikasi ini dikembangkan dengan bantuan **IBM Granite AI** untuk:
- ⚡ Mempercepat penulisan kode
- 📚 Pembuatan dokumentasi yang komprehensif  
- 🔧 Solusi otomatis untuk masalah pengembangan CodeIgniter 4
- 🎯 Optimisasi performa dan best practices

---

## 📞 Kontak

<div align="center">

### 👨‍💻 Developer

**REZAL SURYADI PUTRA**

[![Email](https://img.shields.io/badge/Email-D14836?style=for-the-badge&logo=gmail&logoColor=white)](mailto:suryadirezal@gmail.com)
[![LinkedIn](https://img.shields.io/badge/LinkedIn-0077B5?style=for-the-badge&logo=linkedin&logoColor=white)](https://www.linkedin.com/in/rezalsuryadiputra/)
[![GitHub](https://img.shields.io/badge/GitHub-100000?style=for-the-badge&logo=github&logoColor=white)](https://github.com/zallekun)

</div>

### 📧 Contact Information
- **Email:** suryadirezal@gmail.com
- **LinkedIn:** [Rezal Suryadi Putra](https://www.linkedin.com/in/rezalsuryadiputra/)
- **GitHub:** [@zallekun](https://github.com/zallekun)

---

## 🤝 Kontribusi

Kontribusi selalu diterima! Untuk berkontribusi:

1. Fork project ini
2. Buat feature branch (`git checkout -b feature/AmazingFeature`)
3. Commit changes (`git commit -m 'Add some AmazingFeature'`)
4. Push ke branch (`git push origin feature/AmazingFeature`)
5. Buka Pull Request

---

## 📄 Lisensi

Distributed under the MIT License. See `LICENSE` for more information.

---

## 🙏 Acknowledgments

- [CodeIgniter](https://codeigniter.com/) - The PHP framework
- [Bootstrap](https://getbootstrap.com/) - CSS framework
- [Chart.js](https://www.chartjs.org/) - Chart library
- [Dompdf](https://github.com/dompdf/dompdf) - PDF generator

---

<div align="center">

**⭐ Jangan lupa berikan star jika project ini membantu! ⭐**

Made with ❤️ by [REZAL SURYADI PUTRA](https://github.com/zallekun)

</div>
