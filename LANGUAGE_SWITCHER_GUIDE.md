# 📚 Panduan Implementasi Language Switcher

## Deskripsi Tugas
Saat ini masih ada beberapa teks di aplikasi yang belum support multi-language (ID/EN). Contohnya pada halaman **Categories**, teks "Kategori" masih hardcoded dalam Bahasa Indonesia dan tidak berubah ketika user switch ke English.

**Tujuan:** Implementasikan language switcher untuk semua teks yang masih hardcoded agar aplikasi fully support bilingual (ID/EN).

---

## 🎯 Objektif

1. Identifikasi teks yang masih hardcoded
2. Tambahkan translation key ke file JSON language
3. Update view untuk menggunakan helper `__()` atau `trans()`
4. Test language switcher berfungsi dengan baik

---

## 📁 Struktur File Language

Aplikasi menggunakan **JSON-based translation**. File language ada di:

```
lang/
├── id.json    # Bahasa Indonesia
└── en.json    # English
```

### Format File JSON

**`lang/id.json`** (Bahasa Indonesia):
```json
{
    "Categories": "Kategori",
    "Campaign Management": "Manajemen Kampanye",
    "View all campaigns": "Lihat semua kampanye"
}
```

**`lang/en.json`** (English):
```json
{
    "Categories": "Categories",
    "Campaign Management": "Campaign Management",
    "View all campaigns": "View all campaigns"
}
```

**⚠️ PENTING:**
- Key (kiri) harus **SAMA** di kedua file
- Key biasanya dalam Bahasa Inggris
- Value (kanan) adalah terjemahan sesuai bahasa

---

## 🔧 Cara Implementasi

### Step 1: Identifikasi Teks Hardcoded

Cari file Blade yang masih punya teks hardcoded. Contoh lokasi yang perlu dicek:

```bash
resources/views/admin/
resources/views/creator/
resources/views/layouts/
```

**Contoh teks hardcoded:**
```blade
<!-- ❌ SALAH - Hardcoded -->
<h1>Kategori</h1>
<p>Manage platform categories</p>

<!-- ✅ BENAR - Menggunakan translation -->
<h1>{{ __('Categories') }}</h1>
<p>{{ __('Manage platform categories') }}</p>
```

---

### Step 2: Tambahkan Translation ke File JSON

Buka file `lang/id.json` dan `lang/en.json`, lalu tambahkan key-value baru:

**`lang/id.json`:**
```json
{
    "Categories": "Kategori",
    "Manage platform categories": "Kelola kategori platform",
    "Add New Category": "Tambah Kategori Baru",
    "Category Name": "Nama Kategori",
    "Description": "Deskripsi",
    "Actions": "Aksi",
    "Edit": "Edit",
    "Delete": "Hapus"
}
```

**`lang/en.json`:**
```json
{
    "Categories": "Categories",
    "Manage platform categories": "Manage platform categories",
    "Add New Category": "Add New Category",
    "Category Name": "Category Name",
    "Description": "Description",
    "Actions": "Actions",
    "Edit": "Edit",
    "Delete": "Delete"
}
```

---

### Step 3: Update View Files

Ganti semua teks hardcoded dengan helper translation `__()`.

**Contoh - File: `resources/views/admin/categories/index.blade.php`**

**SEBELUM:**
```blade
<h1 class="text-2xl font-bold">Kategori</h1>
<p class="text-gray-600">Manage platform categories</p>

<button>Tambah Kategori Baru</button>

<table>
    <thead>
        <tr>
            <th>Nama Kategori</th>
            <th>Deskripsi</th>
            <th>Aksi</th>
        </tr>
    </thead>
</table>
```

**SESUDAH:**
```blade
<h1 class="text-2xl font-bold">{{ __('Categories') }}</h1>
<p class="text-gray-600">{{ __('Manage platform categories') }}</p>

<button>{{ __('Add New Category') }}</button>

<table>
    <thead>
        <tr>
            <th>{{ __('Category Name') }}</th>
            <th>{{ __('Description') }}</th>
            <th>{{ __('Actions') }}</th>
        </tr>
    </thead>
</table>
```

---

### Step 4: Translation dengan Parameter (Opsional)

Jika teks memiliki variabel dinamis, gunakan format ini:

**`lang/id.json`:**
```json
{
    "Total Categories": "Total :count Kategori",
    "Created by": "Dibuat oleh :name"
}
```

**`lang/en.json`:**
```json
{
    "Total Categories": "Total :count Categories",
    "Created by": "Created by :name"
}
```

**Cara pakai di Blade:**
```blade
<p>{{ __('Total Categories', ['count' => $totalCategories]) }}</p>
<p>{{ __('Created by', ['name' => $user->name]) }}</p>
```

---

## 🧪 Testing

### 1. Test Manual

1. Jalankan aplikasi: `php artisan serve`
2. Login ke admin panel
3. Klik language switcher (bendera ID/EN di navbar)
4. Verify semua teks berubah sesuai bahasa

**Checklist:**
- [ ] Navbar menu
- [ ] Page titles
- [ ] Buttons
- [ ] Table headers
- [ ] Form labels
- [ ] Error messages
- [ ] Success notifications

### 2. Cara Kerja Language Switcher

File route sudah ada di `routes/web.php`:
```php
Route::get('/language/{locale}', function ($locale) {
    if (in_array($locale, ['id', 'en'])) {
        session(['locale' => $locale]);
    }
    return redirect()->back();
})->name('language.switch');
```

Component switcher ada di `resources/views/components/language-switcher.blade.php`.

---

## 📋 Daftar File yang Perlu Dicek

Prioritas file yang kemungkinan besar punya teks hardcoded:

### High Priority
- [ ] `resources/views/admin/categories/index.blade.php`
- [ ] `resources/views/admin/categories/create.blade.php`
- [ ] `resources/views/admin/categories/edit.blade.php`
- [ ] `resources/views/admin/campaigns/index.blade.php`
- [ ] `resources/views/admin/users/index.blade.php`
- [ ] `resources/views/layouts/admin.blade.php` (sidebar menu)

### Medium Priority
- [ ] `resources/views/creator/dashboard.blade.php`
- [ ] `resources/views/creator/campaigns/index.blade.php`
- [ ] `resources/views/creator/campaigns/create.blade.php`
- [ ] `resources/views/auth/login.blade.php`
- [ ] `resources/views/auth/register.blade.php`

### Low Priority
- [ ] `resources/views/welcome.blade.php`
- [ ] `resources/views/campaigns/show.blade.php`
- [ ] `resources/views/profile.blade.php`

---

## 💡 Tips & Best Practices

### 1. **Gunakan Key Bahasa Inggris**
```json
// ✅ BENAR
{
    "Categories": "Kategori"
}

// ❌ SALAH
{
    "Kategori": "Categories"
}
```

### 2. **Konsisten dengan Capitalization**
```json
{
    "Edit": "Edit",
    "Delete": "Hapus",
    "Save Changes": "Simpan Perubahan"
}
```

### 3. **Grouping dengan Dot Notation (Opsional)**
Untuk project besar, bisa gunakan dot notation:

**`lang/id/admin.php`:**
```php
return [
    'categories' => [
        'title' => 'Kategori',
        'create' => 'Tambah Kategori',
        'edit' => 'Edit Kategori',
    ],
];
```

**Cara pakai:**
```blade
{{ __('admin.categories.title') }}
```

### 4. **Hindari Terjemahan di Controller**
Jika perlu terjemahan di Controller (untuk flash messages, dll):

```php
// Gunakan helper __()
return redirect()->back()->with('success', __('Category created successfully'));
```

---

## 🚀 Quick Start Guide

### Langkah Cepat Mulai Kerja:

1. **Clone & Setup**
   ```bash
   git pull origin main
   composer install
   php artisan serve
   ```

2. **Buat Branch Baru**
   ```bash
   git checkout -b feature/language-switcher-categories
   ```

3. **Mulai dari File Kecil**
   - Pilih 1 file dulu (misal: `categories/index.blade.php`)
   - Identifikasi semua teks hardcoded
   - Tambahkan ke `lang/id.json` dan `lang/en.json`
   - Update view dengan `__('key')`

4. **Test**
   - Buka halaman tersebut
   - Switch language (ID ↔ EN)
   - Pastikan teks berubah

5. **Commit & Push**
   ```bash
   git add .
   git commit -m "feat: add language support for categories page"
   git push origin feature/language-switcher-categories
   ```

6. **Ulangi untuk file lain**

---

## 📝 Contoh Lengkap

### File: `resources/views/admin/categories/index.blade.php`

**BEFORE (Hardcoded):**
```blade
@extends('layouts.admin')

@section('content')
<div class="mb-6">
    <h1 class="text-2xl font-bold">Kategori</h1>
    <p class="text-gray-600">Kelola kategori platform untuk kampanye</p>
</div>

<div class="mb-4">
    <a href="{{ route('admin.categories.create') }}" class="btn btn-primary">
        Tambah Kategori Baru
    </a>
</div>

<table class="table">
    <thead>
        <tr>
            <th>Nama</th>
            <th>Slug</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($categories as $category)
        <tr>
            <td>{{ $category->name }}</td>
            <td>{{ $category->slug }}</td>
            <td>
                <span class="badge">Aktif</span>
            </td>
            <td>
                <a href="{{ route('admin.categories.edit', $category->id) }}">Edit</a>
                <button>Hapus</button>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
```

**AFTER (Translated):**
```blade
@extends('layouts.admin')

@section('content')
<div class="mb-6">
    <h1 class="text-2xl font-bold">{{ __('Categories') }}</h1>
    <p class="text-gray-600">{{ __('Manage platform categories for campaigns') }}</p>
</div>

<div class="mb-4">
    <a href="{{ route('admin.categories.create') }}" class="btn btn-primary">
        {{ __('Add New Category') }}
    </a>
</div>

<table class="table">
    <thead>
        <tr>
            <th>{{ __('Name') }}</th>
            <th>{{ __('Slug') }}</th>
            <th>{{ __('Status') }}</th>
            <th>{{ __('Actions') }}</th>
        </tr>
    </thead>
    <tbody>
        @foreach($categories as $category)
        <tr>
            <td>{{ $category->name }}</td>
            <td>{{ $category->slug }}</td>
            <td>
                <span class="badge">{{ __('Active') }}</span>
            </td>
            <td>
                <a href="{{ route('admin.categories.edit', $category->id) }}">{{ __('Edit') }}</a>
                <button>{{ __('Delete') }}</button>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
```

**JSON Files:**

**`lang/id.json`:**
```json
{
    "Categories": "Kategori",
    "Manage platform categories for campaigns": "Kelola kategori platform untuk kampanye",
    "Add New Category": "Tambah Kategori Baru",
    "Name": "Nama",
    "Slug": "Slug",
    "Status": "Status",
    "Actions": "Aksi",
    "Active": "Aktif",
    "Edit": "Edit",
    "Delete": "Hapus"
}
```

**`lang/en.json`:**
```json
{
    "Categories": "Categories",
    "Manage platform categories for campaigns": "Manage platform categories for campaigns",
    "Add New Category": "Add New Category",
    "Name": "Name",
    "Slug": "Slug",
    "Status": "Status",
    "Actions": "Actions",
    "Active": "Active",
    "Edit": "Edit",
    "Delete": "Delete"
}
```

---

## ❓ FAQ

**Q: Apakah semua teks harus ditranslate?**
A: Ya, untuk konsistensi. Kecuali data dinamis dari database (nama campaign, nama user, dll).

**Q: Bagaimana dengan teks di JavaScript?**
A: Bisa pass translation dari Blade ke JS:
```blade
<script>
const translations = {
    confirm_delete: "{{ __('Are you sure you want to delete?') }}"
};
</script>
```

**Q: Bagaimana clear cache translation?**
A: Jalankan: `php artisan cache:clear`

**Q: Apakah perlu restart server setelah edit JSON?**
A: Tidak, tapi kadang perlu refresh browser dengan hard reload (Cmd+Shift+R).

---

## 📞 Bantuan

Jika stuck atau ada pertanyaan:
1. Cek dokumentasi Laravel Translation: https://laravel.com/docs/11.x/localization
2. Lihat file yang sudah ada translation sebagai referensi
3. Tanya di group chat

---

## ✅ Checklist Sebelum Submit

- [ ] Semua teks hardcoded sudah diganti dengan `__('key')`
- [ ] Key sudah ditambahkan di `lang/id.json` DAN `lang/en.json`
- [ ] Sudah test switch language (ID ↔ EN)
- [ ] Tidak ada typo di JSON (gunakan JSON validator)
- [ ] Code sudah di-commit dengan message yang jelas
- [ ] Branch sudah di-push ke GitHub

---

**Good luck! 🚀**
