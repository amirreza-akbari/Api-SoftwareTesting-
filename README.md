# Laravel Score API

![Laravel Logo](https://laravel.com/img/logomark.min.svg)

یک **API RESTful** برای مدیریت کاربران و نمرات آنها با استفاده از **Laravel**.

## ویژگی‌ها:
- **ثبت‌نام کاربر**: کاربران می‌توانند با ارسال اطلاعات شامل نام، نام خانوادگی، ایمیل و رمز عبور خود ثبت‌نام کنند.
- **ورود کاربر و دریافت نمره**: کاربران می‌توانند وارد سیستم شوند و نمره خود را دریافت کنند.
- **ذخیره نمره**: پس از انجام آزمون، نمره کاربر ذخیره می‌شود.
- **دریافت کاربران برتر**: مشاهده لیست کاربران با نمرات بالای ۱۵ به ترتیب نزولی.

## پیش‌نیازها

برای استفاده از این پروژه باید ابزارهای زیر را نصب داشته باشید:

- **PHP** >= 7.3
- **Composer** (مدیر پکیج PHP)
- **Laravel** >= 8
- **MySQL** یا **SQLite** برای مدیریت پایگاه داده

## نصب و راه‌اندازی

### 1. کلون کردن پروژه

برای شروع، مخزن را از GitHub کلون کنید:

```bash
git clone https://github.com/username/laravel-score-api.git
cd laravel-score-api
