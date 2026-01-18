# DanaKarya - Crowdfunding Platform

DanaKarya adalah platform crowdfunding yang didedikasikan untuk membantu UMKM Indonesia berkembang dan mewujudkan impian mereka. Platform ini memungkinkan creator untuk membuat campaign dan mendapatkan dukungan dana dari backers.

## Tech Stack

- **Framework**: Laravel 11.x
- **Database**: MySQL 8.0
- **Frontend**: Blade Templates, TailwindCSS
- **PHP Version**: 8.2 atau lebih tinggi

## Features

- User authentication dengan multi-role (Admin, Creator, Backer)
- Campaign management untuk Creator
- Donation system dengan mock payment
- Campaign categories browsing
- Disbursement request untuk Creator
- Notification system
- Admin dashboard untuk approval

## Prerequisites

Sebelum memulai, pastikan sistem Anda sudah memiliki:

- PHP >= 8.2
- Composer
- MySQL >= 8.0
- Node.js & NPM (untuk asset compilation)
- Git

## Installation

### 1. Clone Repository

```bash
git clone https://github.com/Budiman002/ProjectDanaKarya.git
cd ProjectDanaKarya
```

### 2. Install Dependencies

Install PHP dependencies:

```bash
composer install
```

Install NPM dependencies:

```bash
npm install
```

### 3. Environment Configuration

Copy file `.env.example` menjadi `.env`:

```bash
cp .env.example .env
```

Generate application key:

```bash
php artisan key:generate
```

Edit file `.env` dan sesuaikan konfigurasi database:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=danakarya
DB_USERNAME=root
DB_PASSWORD=your_password
```

### 4. Database Setup

Buat database baru di MySQL:

```sql
CREATE DATABASE danakarya;
```

Jalankan migration:

```bash
php artisan migrate
```

Jalankan seeder untuk dummy data:

```bash
php artisan db:seed
```

### 5. Storage Link

Buat symbolic link untuk storage:

```bash
php artisan storage:link
```

### 6. Build Assets

Compile frontend assets:

```bash
npm run build
```

Atau untuk development dengan hot reload:

```bash
npm run dev
```

### 7. Run Application

Jalankan development server:

```bash
php artisan serve
```

Aplikasi akan berjalan di `http://localhost:8000`

## Default Users

Setelah menjalankan seeder, Anda dapat login dengan akun berikut:

### Admin Account

- Email: `admin@danakarya.com`
- Password: `password`
- Role: Admin (akses penuh ke dashboard admin)

### Creator Account

- Email: `creator@danakarya.com`
- Password: `password`
- Role: Creator (dapat membuat dan mengelola campaign)

### Backer Account

- Email: `ahmad@example.com`
- Password: `password`
- Role: Backer (dapat melakukan donasi)

## Available Categories

Project ini sudah memiliki 6 kategori campaign:

1. UMKM
2. Teknologi
3. Pendidikan
4. Kesehatan
5. Lingkungan
6. Seni & Budaya

## Payment System

Saat ini aplikasi menggunakan **mock/dummy payment system**. Ketika user melakukan donasi:

- Status langsung menjadi `confirmed`
- Tidak ada integrasi dengan payment gateway
- Transaction code di-generate otomatis

## Project Structure

```
danakarya/
├── app/
│   ├── Http/Controllers/     # Controllers
│   ├── Models/               # Eloquent Models
│   └── Services/             # Service classes
├── database/
│   ├── migrations/           # Database migrations
│   └── seeders/              # Database seeders
├── resources/
│   ├── views/                # Blade templates
│   └── js/                   # JavaScript files
├── routes/
│   └── web.php               # Web routes
└── public/                   # Public assets
```

## Common Commands

### Clear Cache

```bash
php artisan cache:clear
php artisan config:clear
php artisan view:clear
```

### Reset Database

```bash
php artisan migrate:fresh --seed
```

### Run Tests

```bash
php artisan test
```

## Deployment

Project ini sudah di-deploy di Railway dengan URL:
`https://projectdanakarya-production.up.railway.app`

Untuk deploy ke production:

1. Push code ke repository
2. Railway akan otomatis detect dan deploy
3. Pastikan environment variables sudah di-set di Railway dashboard

## Database Import

Jika ingin import database dari backup SQL:

```bash
mysql -u root -p danakarya < railway_production_backup.sql
```

## Troubleshooting

### Error: Class not found

```bash
composer dump-autoload
```

### Permission denied on storage

```bash
chmod -R 775 storage bootstrap/cache
```

### Migration error

```bash
php artisan migrate:fresh
```
