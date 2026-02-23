# 🏠 EasyColoc

**EasyColoc** is a web application for managing shared housing (colocation). It tracks common expenses, automatically calculates individual balances, and shows a clear view of who owes what to whom — eliminating manual calculations.

---

## ✨ Features

### 👤 Users
- Registration, login, and profile management
- The first registered user is automatically promoted to **Global Admin**
- Banned users are automatically logged out and blocked from access

### 🏡 Colocations
- Create a colocation (creator becomes the **Owner**)
- Invite members via email/token link
- One active colocation per user at a time
- Members can leave (`left_at` timestamp)
- Owner can cancel the colocation (`status = cancelled`)

### 💸 Expenses
- Add expenses with title, amount, date, category, and payer
- Full expense history
- Monthly filter on the colocation expense view
- Statistics by category and by month

### ⚖️ Balances & Debts
- Automatic calculation: total paid, individual share, balance
- Simplified "who owes whom" settlement view
- Debt reduction via payment recording

### 💳 Payments
- "Mark as Paid" action directly from the settlements list

### ⭐ Reputation System
| Event | Effect |
|---|---|
| Leave/cancel **with** outstanding debt | −1 |
| Leave/cancel **without** debt | +1 |
| Owner removes a member with a debt | Debt is transferred to the Owner |

### 🛡️ Global Admin Dashboard
- View global statistics (users, colocations, expenses)
- Ban / unban users

---

## 🏗️ Architecture & Tech Stack

| Layer | Technology |
|---|---|
| Framework | Laravel (Monolithic MVC) |
| Database | MySQL / PostgreSQL |
| ORM | Eloquent (`hasMany`, `belongsToMany`) |
| Auth | Laravel Breeze / Jetstream |
| Migrations | Laravel Migrations |

---

## 👥 Roles

| Role | Description |
|---|---|
| **Member** | Standard colocation member |
| **Owner** | Colocation administrator (initial creator) |
| **Global Admin** | Platform administrator — manages users and views global stats |

> A Global Admin can also be an Owner or Member within one or more colocations.

---

## 🚀 Getting Started

### Prerequisites
- PHP >= 8.1
- Composer
- Node.js & npm
- MySQL or PostgreSQL

### Installation

```bash
# Clone the repository
git clone https://github.com/your-username/easycoloc.git
cd easycoloc

# Install PHP dependencies
composer install

# Install JS dependencies
npm install && npm run build

# Configure environment
cp .env.example .env
php artisan key:generate

# Configure your database in .env, then run migrations
php artisan migrate

# (Optional) Seed with demo data
php artisan db:seed

# Start the development server
php artisan serve
```

### First Admin
The **first user to register** on the platform is automatically granted the Global Admin role.

---

