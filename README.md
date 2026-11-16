# School Management System

Laravel app for running a school: academic structure, students, and fees. The interface is localized, and student forms use Livewire.

## What it includes

- Grades, classrooms, and sections
- Teachers, students, promotions, and graduation
- Student attachments
- Fees, invoices, receipts, and payments
- Parent accounts linked to students

## Stack

PHP 7.2 / 8, Laravel 7, Livewire 2, Laravel Localization, Spatie Translatable

## Run locally

```bash
cp .env.example .env
composer install
php artisan key:generate
php artisan migrate
php artisan serve
```
