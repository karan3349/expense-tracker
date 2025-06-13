# 💸 PHP Expense Tracker

A simple Laravel 12-based Expense Tracker application that allows users to track their income, expenses, and view their net balance and transaction history.

---

## 📋 Features

-   ✅ Add income and expenses
-   🗑️ Delete transactions
-   📊 Live balance, income, and expense calculation
-   🕒 View transaction history
-   ⚡ Built with Laravel 12 and PHP 8.2

---

## 🛠️ Tech Stack

-   Laravel 12
-   PHP 8.2
-   Blade (Laravel templating engine)
-   Tailwind CSS (optional for styling)
-   MySQL or SQLite for storage

---

## 🧑‍💻 Setup Instructions

1. **Clone the repository**

```bash
git clone git@github.com:karan3349/expense-tracker.git
cd expense-tracker
```

2. **Install dependencies**

```bash
composer install
npm install && npm run build
```

2. **Set up environment variables**

```bash
cp .env.example .env
php artisan key:generate
php artisan migrate --seed

```

2. **Serve the app**

```bash
php artisan serve
```
