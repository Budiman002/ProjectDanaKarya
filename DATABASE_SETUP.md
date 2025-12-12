# 🗄️ Database Setup Guide

## Cara Import Database untuk Development

File database sudah di-export dan siap digunakan untuk development local.

---

## 📥 Step-by-Step Import Database

### **Step 1: Download File Database**

Download file SQL yang sudah dibagikan:
- File: `danakarya_for_team.sql`
- Simpan di folder project Anda

---

### **Step 2: Buat Database Baru**

**Via Command Line:**
```bash
mysql -u root -p
```

Lalu ketik:
```sql
CREATE DATABASE danakarya CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
EXIT;
```

**Via phpMyAdmin:**
1. Buka phpMyAdmin di browser
2. Klik "New" di sidebar
3. Database name: `danakarya`
4. Collation: `utf8mb4_unicode_ci`
5. Klik "Create"

---

### **Step 3: Import File SQL**

**Via Command Line (Recommended):**
```bash
mysql -u root -p danakarya < danakarya_for_team.sql
```

Masukkan password MySQL Anda, tunggu sampai selesai.

**Via phpMyAdmin:**
1. Buka phpMyAdmin
2. Klik database "danakarya" di sidebar
3. Tab "Import"
4. Klik "Choose File" → Pilih `danakarya_for_team.sql`
5. Scroll ke bawah, klik "Go"
6. Tunggu sampai selesai

---

### **Step 4: Verify Import Berhasil**

Check apakah semua table sudah ada:

```bash
mysql -u root -p danakarya
```

Lalu:
```sql
SHOW TABLES;
```

**Output yang benar** (harus ada tables seperti):
```
+-------------------------+
| Tables_in_danakarya     |
+-------------------------+
| campaigns               |
| campaign_updates        |
| categories              |
| donations               |
| disbursements           |
| failed_jobs             |
| migrations              |
| notifications           |
| password_reset_tokens   |
| sessions                |
| users                   |
+-------------------------+
```

Check jumlah data:
```sql
SELECT COUNT(*) FROM users;
SELECT COUNT(*) FROM campaigns;
SELECT COUNT(*) FROM categories;
EXIT;
```

---

### **Step 5: Update File .env**

Pastikan file `.env` Anda sudah benar:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=danakarya
DB_USERNAME=root
DB_PASSWORD=your_mysql_password
```

Ganti `your_mysql_password` dengan password MySQL Anda.

---

### **Step 6: Test Aplikasi**

```bash
php artisan serve
```

Buka browser: http://localhost:8000

---

## 🔐 Login Credentials

Gunakan akun ini untuk login:

| Role    | Email                   | Password    |
|---------|-------------------------|-------------|
| Admin   | admin@danakarya.com     | password123 |
| Creator | creator@danakarya.com   | password123 |
| Backer  | backer@danakarya.com    | password123 |

---

## 📊 Data yang Tersedia

Setelah import, database akan memiliki:

- **Users:** Admin, Creator, Backer
- **Categories:** UMKM, Education, Health, Environment, Social, Arts, Seni & Budaya
- **Campaigns:** Beberapa campaign untuk testing
- **Donations:** Data donasi (jika ada)
- **Dan lainnya...**

Data ini **SAMA PERSIS** dengan database development utama, jadi cocok untuk testing layout atau fitur baru.

---

## ❌ Troubleshooting

### Problem: "ERROR 1045 (28000): Access denied"

**Penyebab:** Password MySQL salah.

**Solusi:**
- Pastikan password di command benar
- Atau coba tanpa password: `mysql -u root danakarya < danakarya_for_team.sql`

---

### Problem: "ERROR 1007 (HY000): Can't create database; database exists"

**Penyebab:** Database `danakarya` sudah ada.

**Solusi:** Drop dulu, baru buat lagi:
```sql
mysql -u root -p
DROP DATABASE danakarya;
CREATE DATABASE danakarya;
EXIT;
```

Lalu import ulang.

---

### Problem: "Unknown database 'danakarya'"

**Penyebab:** Database belum dibuat.

**Solusi:** Buat database dulu (lihat Step 2).

---

### Problem: Import sukses tapi table kosong

**Penyebab:** File SQL corrupt atau salah file.

**Solusi:**
- Download ulang file SQL
- Pastikan ukuran file ~35KB
- Check isi file dengan text editor (harus ada SQL commands)

---

### Problem: "The 'danakarya' database is not empty"

**Penyebab:** Ada table lama di database.

**Solusi:** Drop semua table atau drop database lalu buat lagi:
```sql
DROP DATABASE danakarya;
CREATE DATABASE danakarya;
```

---

## 🔄 Update Database (Jika Ada Perubahan)

Jika nanti ada export database terbaru:

1. **Backup database lama** (opsional):
   ```bash
   mysqldump -u root -p danakarya > backup_old.sql
   ```

2. **Drop & re-create database:**
   ```sql
   DROP DATABASE danakarya;
   CREATE DATABASE danakarya;
   ```

3. **Import database baru:**
   ```bash
   mysql -u root -p danakarya < danakarya_for_team_v2.sql
   ```

---

## 📝 Notes

- Database ini untuk **development/testing only**
- Jangan connect ke database production Railway
- Kalau ada perubahan struktur database (migration baru), akan ada instruksi terpisah
- File SQL ini **jangan di-commit** ke Git (sudah ada di `.gitignore`)

---

## 🆘 Need Help?

Jika stuck:
1. Check error message dengan teliti
2. Coba troubleshooting di atas
3. Google error message-nya
4. Tanya di group chat dengan screenshot error

---

**Selamat coding! 🚀**
