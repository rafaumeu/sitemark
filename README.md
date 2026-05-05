<div align="center">
  <img width="100%" src="https://capsule-render.vercel.app/api?type=waving&color=FFCA28&height=180&section=header&text=Sitemark&fontSize=42&fontColor=fff&animation=fadeIn&fontAlignY=35&desc=Modern%20Landing%20Page%20Template&descSize=18&descAlignY=52"/>
</div>

# 🔗 Sitemark

<img alt="License" src="https://img.shields.io/badge/license-MIT-blue.svg?style=for-the-badge&logoScale=20"/>
<a href="https://github.com/rafaumeu/sitemark/actions/workflows/lint.yml"><img alt="Lint" src="https://github.com/rafaumeu/sitemark/actions/workflows/lint.yml/badge.svg"/></a>
<img alt="PHP" src="https://img.shields.io/badge/php-8.2+-777BB4.svg?style=for-the-badge&logo=php&logoColor=white&logoScale=20"/>
<img alt="Laravel" src="https://img.shields.io/badge/laravel-12.x-FF2D20.svg?style=for-the-badge&logo=laravel&logoColor=white&logoScale=20"/>

**Sitemark** is a powerful, professional "link-in-bio" platform. Built with Laravel 12, it provides a fast and SEO-optimized solution to consolidate your social media presence.

## ✨ Features

- **🌐 Public Profile Pages**: Every user gets a dedicated public URL (e.g., `biolinks.com/handler`).
- **👤 Profile Customization**: Update your name, bio, and upload custom avatars.
- **🔗 Link Management**: Complete CRUD with intuitive link reordering.
- **🎨 Modern UI**: Built with TailwindCSS v4 and DaisyUI components.
- **⚡ High Performance**: Powered by Laravel 12 and Vite 7.
- **🛡️ Security**: Secure authentication, middleware protection, and GPG signed commits.
- **🧪 Quality Assured**: 100% type safety with PHPStan and robust testing with Pest.

## 🚀 Getting Started

### Prerequisites

- **PHP 8.2+**
- **Composer**
- **Node.js & NPM**

### Installation

1.  Clone the repository:
    ```bash
    git clone https://github.com/rafaumeu/sitemark.git
    cd sitemark
    ```

2.  **Environment Setup**:
    Copy the example environment file and generate your encryption key:
    ```bash
    cp .env.example .env
    php artisan key:generate
    ```

3.  Install dependencies:
    ```bash
    composer install
    npm install
    ```

4.  **Database & Migrations**:
    Setup your database in `.env` and run migrations:
    ```bash
    php artisan migrate
    ```

5.  **Run Application**:
    Start the development server:
    ```bash
    composer run dev
    ```
    Access at http://localhost:8000.

## 🛠️ Tech Stack

- **Framework**: Laravel 12.x
- **Language**: PHP 8.2+
- **Frontend**: Blade, TailwindCSS 4, Vite 7
- **Testing**: Pest PHP
- **Tooling**: Laravel Pint, Larastan

## 📂 Project Structure

```
sitemark/
├── app/                # Application Core Code
│   ├── Http/           # Controllers & Middleware
│   └── Models/         # Eloquent Models
├── bootstrap/          # Framework Bootstrap
├── config/             # Application Configuration
├── database/           # Migrations & Factories
├── public/             # Web Entry Point
├── resources/          # Views & Assets (CSS/JS)
├── routes/             # Web & API Routes
├── storage/            # Logs & Compiled Blade Views
├── tests/              # Pest Tests
└── vendor/             # Composer Dependencies
```

## 🤝 Contributing

We strictly follow the [**GitHub Flow**](CONTRIBUTING.md).

1.  **Fork** the project.
2.  Create your feature branch (`git checkout -b feature/amazing-feature`).
3.  Commit your changes following **Conventional Commits** (`feat: add new theme support`).
4.  Push to the branch.
5.  Open a **Pull Request**.

## 👨💻 Author

<div align="center">
<img style="border-radius: 50%;" src="https://avatars.githubusercontent.com/u/30784471?v=4" width="100px;" alt=""/>

Made with 💜 by <strong><a href="https://github.com/rafaumeu">Rafael Dias Zendron</a></strong>

<a href="https://www.linkedin.com/in/rafael-dias-zendron/"><img alt="Linkedin Badge" src="https://img.shields.io/badge/-Rafael-blue?style=flat-square&logo=Linkedin&logoColor=white&link=https://www.linkedin.com/in/rafael-dias-zendron/"/></a>
<a href="mailto:mmmarckos@gmail.com"><img alt="Gmail Badge" src="https://img.shields.io/badge/-mmmarckos@gmail.com-c14438?style=flat-square&logo=Gmail&logoColor=white&link=mailto:mmmarckos@gmail.com"/></a>
</div>

<div align="center">
  <img width="100%" src="https://capsule-render.vercel.app/api?type=waving&color=FFCA28&height=100&section=footer"/>
  <br/><sub>Built with ❤️ by <a href="https://github.com/rafaumeu">Rafael Zendron</a></sub>
</div>
