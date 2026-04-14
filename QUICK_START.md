# 🚀 সম্পূর্ণ সেটআপ এবং কুইক স্টার্ট গাইড

## আপনার সিস্টেমে কি কি যোগ হয়েছে

আপনার Laravel প্রকল্পে একটি সম্পূর্ণ **Visa Management System** যুক্ত করা হয়েছে যাতে রয়েছে:

✅ **Authentication System** - রেজিস্ট্রেশন, লগইন, লগআউট
✅ **User Profile Management** - প্রোফাইল দেখা, এডিট, ফটো আপলোড
✅ **Visa CRUD** - ভিসা তৈরি, পড়া, আপডেট, মুছুন
✅ **Dashboard** - সম্পূর্ণ ডেটা ড্যাশবোর্ড এবং রিপোর্ট
✅ **Search System** - ভিসা অনুসন্ধান ফিচার
✅ **Responsive UI** - Bootstrap 5 সহ সুন্দর ইন্টারফেস

---

## ✅ ইতিমধ্যে সম্পন্ন কাজ

- ✅ Database Migrations চালানো হয়েছে
- ✅ সমস্ত Controllers তৈরি করা হয়েছে
- ✅ সমস্ত Views তৈরি করা হয়েছে
- ✅ সমস্ত Routes কনফিগার করা হয়েছে
- ✅ User Model আপডেট করা হয়েছে
- ✅ Visa Model আপডেট করা হয়েছে

---

## 📋 প্রথম সেটআপ ধাপ

### ১. ডেটাবেস রিফ্রেশ এবং সিড করুন (ডেমো ডেটা সহ)

```bash
php artisan migrate:fresh --seed
```

এটি করবে:
- সব টেবিল তৈরি করবে
- ডেমো ব্যবহারকারী তৈরি করবে
- ডেমো ভিসা যোগ করবে

**তৈরি হওয়া ডেমো ব্যবহারকারী:**
- ইমেইল: `demo@example.com`
- পাসওয়ার্ড: `password123`

### ২. সার্ভার চালু করুন

```bash
php artisan serve
```

সার্ভার শুরু হবে: `http://127.0.0.1:8000`

### ৩. ব্রাউজার খুলুন এবং লিংকে যান

```
http://127.0.0.1:8000
```

---

## 🧪 সিস্টেম টেস্ট করুন

### টেস্ট ১: রেজিস্ট্রেশন
1. `http://127.0.0.1:8000/register` এ যান
2. নতুন অ্যাকাউন্ট তৈরি করুন
3. স্বয়ংক্রিয়ভাবে লগ ইন হবেন এবং ড্যাশবোর্ডে পাঠানো হবেন

### টেস্ট ২: লগইন
1. লগআউট করুন (উপরের ডানে মেনু)
2. `http://127.0.0.1:8000/login` এ যান
3. ডেমো অ্যাকাউন্ট দিয়ে লগ ইন করুন:
   - ইমেইল: `demo@example.com`
   - পাসওয়ার্ড: `password123`

### টেস্ট ৩: ড্যাশবোর্ড
1. লগ ইন করার পর স্বয়ংক্রিয়ভাবে ড্যাশবোর্ডে যাবেন
2. সমস্ত স্ট্যাটিস্টিক্স দেখুন
3. সাম্প্রতিক ভিসা এবং ব্যবহারকারী লিস্ট দেখুন

### টেস্ট ৪: প্রোফাইল
1. বাম সাইডবার থেকে "My Profile" ক্লিক করুন
2. প্রোফাইল তথ্য দেখুন
3. "Edit Profile" বোতাম ক্লিক করুন
4. তথ্য আপডেট করুন এবং ফটো আপলোড করুন

### টেস্ট ৫: ভিসা সিস্টেম
1. বাম সাইডবার থেকে "Manage Visas" ক্লিক করুন
2. সব ভিসা দেখুন
3. "Add New Visa" ক্লিক করে নতুন ভিসা যোগ করুন
4. ভিসা বিস্তারিত দেখুন
5. ভিসা এডিট করুন (যে কোন ভিসায় এডিট বোতাম)
6. ভিসা মুছুন (যত্ন সহকারে!)
7. সার্চ বক্স দিয়ে ভিসা অনুসন্ধান করুন

### টেস্ট ৬: পাবলিক ভিসা যাচাই API
```bash
# টার্মিনালে কমান্ড চালান
curl -X POST http://127.0.0.1:8000/verify \
  -H "Content-Type: application/json" \
  -d '{"visa_number":"DEMO-VISA-001"}'
```

---

## 📁 ফাইল লোকেশন

সমস্ত নতুন ফাইল এখানে অবস্থিত:

### Controllers
```
app/Http/Controllers/
├── Auth/
│   ├── LoginController.php
│   └── RegisterController.php
├── DashboardController.php
├── ProfileController.php
└── VisaSearchController.php
```

### Views
```
resources/views/
├── layout.blade.php (মূল টেমপ্লেট)
├── dashboard.blade.php
├── auth/
│   ├── login.blade.php
│   └── register.blade.php
├── profile/
│   ├── show.blade.php
│   └── edit.blade.php
└── visas/
    ├── index.blade.php
    ├── create.blade.php
    ├── edit.blade.php
    └── show.blade.php
```

### Database
```
database/
├── migrations/
│   ├── 2026_04_14_000000_add_profile_fields_to_users_table.php (নতুন)
│   └── ... (অন্যান্য নতুন)
└── seeders/
    ├── DatabaseSeeder.php (আপডেট করা হয়েছে)
    └── VisaSeeder.php (আপডেট করা হয়েছে)
```

### Routes
```
routes/web.php (সম্পূর্ণভাবে আপডেট করা হয়েছে)
```

---

## 🔧 কনফিগারেশন

### পরিবর্তনযোগ্য সেটিংস

**`config/auth.php` তে সাইন-ইন-আপ রক্ষা করতে পারেন:**
```php
'defaults' => [
    'guard' => 'web',
    'passwords' => 'users',
],
```

**`config/filesystems.php` এ ফাইল স্টোরেজ:**
```php
'disks' => [
    'public' => [
        'driver' => 'local',
        'root' => storage_path('app/public'),
        'url' => env('APP_URL').'/storage',
    ],
],
```

---

## 🔐 নিরাপত্তা টিপস

1. **প্রোডাকশনে `.env` রক্ষা করুন**
   - `APP_DEBUG=false` সেট করুন
   - `APP_KEY` নিরাপদ রাখুন

2. **অনুমতি সেট করুন**
   ```bash
   chmod 755 storage
   chmod 755 bootstrap/cache
   ```

3. **নিয়মিত ব্যাকআপ নিন**
   ```bash
   php artisan backup:run
   ```

---

## 🐛 সমস্যা সমাধান

### সমস্যা: "Class not found" ত্রুটি
```bash
composer dump-autoload
```

### সমস্যা: মাইগ্রেশন ত্রুটি
```bash
php artisan migrate:rollback
php artisan migrate
```

### সমস্যা: ফাইল আপলোড কাজ করছে না
```bash
php artisan storage:link
```

### সমস্যা: সম্পূর্ণ রিসেট করতে হবে
```bash
php artisan migrate:fresh --seed
```

---

## 📊 ডেটাবেস স্কিম

### Users Table
```sql
CREATE TABLE users (
  id, name, email, email_verified_at, password,
  phone_number, date_of_birth, gender, address,
  profile_photo_path, bio, remember_token,
  created_at, updated_at
)
```

### Visas Table
```sql
CREATE TABLE visas (
  id, visa_number, surname, firstname, date_of_birth,
  citizenship, passport_number, visa_status,
  visa_validity, visa_type, visit_purpose,
  photo_path, created_at, updated_at
)
```

---

## 🎯 সিস্টেম ফাংশনালিটি সারসংক্ষেপ

### প্রতিটি রুট কি করে:

| রুট | পদ্ধতি | বর্ণনা |
|------|--------|---------|
| `/` | GET | স্বাগত পৃষ্ঠা |
| `/register` | GET/POST | রেজিস্ট্রেশন |
| `/login` | GET/POST | লগইন |
| `/logout` | POST | লগআউট |
| `/dashboard` | GET | ড্যাশবোর্ড |
| `/profile` | GET | প্রোফাইল ভিউ |
| `/profile/edit` | GET | প্রোফাইল এডিট ফর্ম |
| `/profile` | PUT | প্রোফাইল আপডেট |
| `/visas` | GET | ভিসা তালিকা |
| `/visas/create` | GET | নতুন ভিসা ফর্ম |
| `/visas` | POST | ভিসা সংরক্ষণ |
| `/visas/{id}` | GET | ভিসা বিস্তারিত |
| `/visas/{id}/edit` | GET | ভিসা এডিট ফর্ম |
| `/visas/{id}` | PUT | ভিসা আপডেট |
| `/visas/{id}` | DELETE | ভিসা মুছুন |
| `/visas/search` | GET | ভিসা অনুসন্ধান |
| `/verify` | POST | পাবলিক ভিসা যাচাই |

---

## 📚 ডকুমেন্টেশন ফাইল

সম্পূর্ণ ডকুমেন্টেশন পাবেন এখানে:
- [`VISA_MANAGEMENT_GUIDE.md`](./VISA_MANAGEMENT_GUIDE.md) - সম্পূর্ণ গাইড
- [`README.md`](./README.md) - প্রধান README

---

## 🚀 পরবর্তী ধাপ

আপনি এখন এই সিস্টেমে যোগ করতে পারেন:

1. **Email Notifications** - রেজিস্ট্রেশন এবং ভিসা স্ট্যাটাস নোটিফিকেশন
2. **PDF Export** - ভিসা রিপোর্ট PDF এ এক্সপোর্ট
3. **Advanced Search** - আরও ফিল্টার বিকল্প
4. **User Roles & Permissions** - Admin, Manager, User ভূমিকা
5. **API Authentication** - Token-based API
6. **SMS Notifications** - SMS নোটিফিকেশন
7. **Analytics Dashboard** - উন্নত বিশ্লেষণ

---

## 💬 প্রশ্ন বা সমস্যা?

1. প্রথমে ডকুমেন্টেশন পড়ুন
2. Laravel ডকুমেন্টেশন চেক করুন: https://laravel.com/docs
3. লগ ক্যাপাসিটি আউট করুন:
   ```bash
   tail -f storage/logs/laravel.log
   ```

---

## ✨ উপভোগ করুন!

আপনার সিস্টেম এখন সম্পূর্ণভাবে কাজ করার জন্য প্রস্তুত। 🎉

**শুরু করতে:**
```bash
php artisan serve
# এরপর ধুলো করুন: http://127.0.0.1:8000
```

---

**সর্বশেষ আপডেট:** এপ্রিল ১৪, ২০২৬
**সংস্করণ:** ১.০.০
