<div align="center">
  <img width="100%" src="https://capsule-render.vercel.app/api?type=waving&color=FFCA28&height=180&section=header&text=Sitemark&fontSize=42&fontColor=fff&animation=fadeIn&fontAlignY=35&desc=Modern%20Landing%20Page%20Template%20with%20Laravel%2012&descSize=18&descAlignY=52"/>
</div>

<p align="center">
  <img alt="Laravel" src="https://img.shields.io/badge/Laravel_12-FF2D20?style=for-the-badge&logo=laravel&logoColor=white"/>
  <img alt="PHP" src="https://img.shields.io/badge/PHP_8.2+-777BB4?style=for-the-badge&logo=php&logoColor=white"/>
  <img alt="TailwindCSS" src="https://img.shields.io/badge/TailwindCSS_4-38B2AC?style=for-the-badge&logo=tailwindcss"/>
  <img alt="DaisyUI" src="https://img.shields.io/badge/DaisyUI-570DF8?style=for-the-badge"/>
  <img alt="Pest" src="https://img.shields.io/badge/Pest-FF4F4F?style=for-the-badge"/>
  <img alt="PHPStan" src="https://img.shields.io/badge/PHPStan-263238?style=for-the-badge"/>
</p>

<p align="center">
  <a href="https://github.com/rafaumeu/sitemark/generate"><img src="https://img.shields.io/badge/Use_This_Template-FFCA28?style=for-the-badge&logo=github&logoColor=white" alt="Use this template"/></a>
</p>

---

## Overview

A powerful, professional **link-in-bio** platform built with **Laravel 12**. Provides fast, SEO-optimized landing pages to consolidate your social media presence with customizable themes, analytics tracking, and a modern UI.

## Features

- Public profile pages with dedicated URLs
- Profile customization — name, bio, and custom avatars
- Link management with intuitive reordering
- Modern UI with TailwindCSS v4 and DaisyUI
- High performance with Laravel 12 and Vite 7
- Secure authentication with middleware protection
- 100% type safety with PHPStan and Pest testing

## Tech Stack

| Technology | Purpose |
|---|---|
| **Laravel 12** | PHP framework |
| **PHP 8.2+** | Language |
| **TailwindCSS 4** | Utility-first CSS |
| **DaisyUI** | Component library |
| **Vite 7** | Build tool |
| **Pest** | Testing framework |
| **PHPStan** | Static analysis |
| **Pint** | Code styling |

## Getting Started

### Prerequisites

- PHP 8.2+
- Composer
- Node.js & NPM

### Install

```bash
git clone https://github.com/rafaumeu/sitemark.git
cd sitemark
composer install
npm install
cp .env.example .env
php artisan key:generate
php artisan migrate
composer run dev
```

Access at http://localhost:8000.

## Project Structure

```
sitemark/
├── app/                # Application Core Code
│   ├── Http/           # Controllers & Middleware
│   └── Models/         # Eloquent Models
├── config/             # Application Configuration
├── database/           # Migrations & Factories
├── resources/          # Views & Assets (CSS/JS)
├── routes/             # Web & API Routes
└── tests/              # Pest Tests
```

## Contributing

1. Fork the project
2. Create your feature branch (`git checkout -b feature/amazing-feature`)
3. Commit with Conventional Commits (`feat: add new theme support`)
4. Push and open a Pull Request

## License

MIT

<div align="center">
  <img width="100%" src="https://capsule-render.vercel.app/api?type=waving&color=FFCA28&height=100&section=footer"/>
  <br/><sub>Built with ❤️ by <a href="https://github.com/rafaumeu">Rafael Zendron</a></sub>
</div>
