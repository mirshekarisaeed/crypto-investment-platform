# Crypto/AI Investment Platform

A modern Laravel + Vue.js investment platform for cryptocurrency and AI-based ROI systems.

## Features

- 💰 Investment Plans with customizable ROI
- 💳 Deposit/Withdrawal Management
- 📊 Real-time Portfolio Tracking
- 🔗 Referral System with Commissions
- 📈 Performance Analytics & Charts
- 🔐 Secure Authentication
- 🌙 Dark Theme UI

## Tech Stack

- **Backend**: Laravel 10
- **Frontend**: Vue 3 + Inertia.js
- **Styling**: Tailwind CSS
- **Database**: MySQL
- **Build**: Vite

## Installation

```bash
# Clone repository
git clone https://github.com/mirshekarisaeed/crypto-investment-platform.git
cd crypto-investment-platform

# Install dependencies
composer install
npm install

# Setup environment
cp .env.example .env
php artisan key:generate

# Create database
php artisan migrate

# Run development server
php artisan serve
npm run dev
```

## Project Structure

```
├── app/
│   ├── Models/          # Database models
│   ├── Http/Controllers # API controllers
│   └── Services/        # Business logic
├── resources/
│   ├── js/Pages/        # Vue components
│   ├── css/             # Tailwind styles
│   └── views/           # Blade templates
├── database/
│   └── migrations/      # Database schema
└── routes/              # API routes
```
