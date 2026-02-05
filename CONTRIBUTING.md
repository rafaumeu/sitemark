# Contributing to Sitemark

First off, thanks for taking the time to contribute! ❤️

## How Can I Contribute?

### Contributing to Sitemark

Thank you for considering contributing to Sitemark! This document outlines our development workflow and standards.

## 🌊 Development Workflow

We follow **GitHub Flow** for all contributions:

1. **Fork** the repository
2. Create a **feature branch** from `main`
3. Make your changes following our standards
4. **Commit** using conventional commits (see below)
5. **Push** to your fork
6. Open a **Pull Request** to `main`

---

## 📝 Commit Message Standards

We use **Conventional Commits** with **scopes** for better organization and automated changelog generation.

### Format

```
<type>(<scope>): <subject>

<body>

<footer>
```

### Types

| Type | Description | Example |
|------|-------------|---------|
| `feat` | New feature | `feat(auth): add Google OAuth login` |
| `fix` | Bug fix | `fix(links): resolve duplicate URL validation` |
| `docs` | Documentation only | `docs(readme): update installation steps` |
| `style` | Code style/formatting | `style(app): run Laravel Pint` |
| `refactor` | Code refactoring | `refactor(controllers): extract validation logic` |
| `perf` | Performance improvement | `perf(queries): add eager loading to links` |
| `test` | Adding/updating tests | `test(auth): add login feature tests` |
| `chore` | Maintenance tasks | `chore(deps): update Laravel to 12.1` |
| `ci` | CI/CD changes | `ci(workflows): add browser tests` |

### Scopes

Common scopes for this project:

- `auth` - Authentication system
- `links` - Link management features
- `profile` - User profile features
- `ui` - Frontend/UI components
- `api` - API endpoints
- `db` - Database/migrations
- `tests` - Testing infrastructure
- `ci` - CI/CD workflows
- `deps` - Dependencies
- `repo` - Repository configuration
- `docs` - Documentation

### Examples

#### ✅ Good Commits

```bash
# Simple feature
feat(links): add link ordering functionality

# Feature with detailed body
feat(auth): implement user registration

- Add RegisterController with validation
- Create registration form with Blade
- Add Form Request for validation rules
- Include password confirmation

Closes #42

# Bug fix
fix(profile): resolve avatar upload validation error

The file size validation was rejecting valid images.
Changed max size from 1MB to 5MB.

Fixes #128

# Breaking change
feat(api)!: change links endpoint response structure

BREAKING CHANGE: The /api/links endpoint now returns
paginated results instead of a flat array.

Migration guide available in docs/migrations/v2.md
```

#### ❌ Bad Commits

```bash
# Too vague
fix: bug fix

# No scope
feat: add feature

# Not descriptive
chore: update stuff

# Mixing concerns
feat(links): add ordering + fix validation + update docs
```

### Multi-line Commit Template

For complex changes, use this structure:

```bash
git commit -m "<type>(<scope>): <subject> (max 72 chars)

Implementation:
- Detailed list of technical changes
- Specific files or logic updated
- New classes or methods added

Context:
- Why this change is necessary
- What problem it solves
- Links to design docs or requirements

Refs: #123, #456"
```

#### Example

```bash
feat(ui): finalize dashboard implementation and fix routing issues

Implementation:
- Update `dashboard.blade.php` to use absolute component positioning and strict `:href` binding.
- Modify `bio-links.blade.php` to center link items and use `justify-center`.
- Update `routes/web.php` to serve Dashboard on `/` (root) for authenticated users.

Context:
- Completes the UI polish for Phase 5.
- Resolves syntax errors in Blade templates caused by incorrect attribute interpolation.

Refs: #28, #29
```

---

## 🧪 Testing Requirements

All contributions must include tests:

- **Feature Tests**: For new features and bug fixes
- **Unit Tests**: For models, policies, and business logic
- **Browser Tests**: For critical user flows (optional but recommended)

Run tests before submitting:

```bash
php artisan test
```

---

## 🎨 Code Style

We use **Laravel Pint** for code formatting:

```bash
./vendor/bin/pint
```

All code must pass:
- ✅ Laravel Pint (PSR-12)
- ✅ PHPStan Level 5
- ✅ All tests

---

## 📋 Pull Request Checklist

Before submitting your PR, ensure:

- [ ] Code follows Laravel conventions
- [ ] Commits follow Conventional Commits format
- [ ] Tests added/updated and passing
- [ ] Code formatted with Pint
- [ ] PHPStan passes with no errors
- [ ] Documentation updated (if needed)
- [ ] PR description explains the change
- [ ] **Must close related issues**: Use `Closes #IssueID` in description

---

## 🚀 Getting Started

1. Clone your fork:
   ```bash
   git clone https://github.com/YOUR_USERNAME/sitemark.git
   cd sitemark
   ```

2. Install dependencies:
   ```bash
   composer install
   yarn install
   ```

3. Setup environment:
   ```bash
   cp .env.example .env
   php artisan key:generate
   touch database/database.sqlite
   php artisan migrate
   ```

4. Run development server:
   ```bash
   php artisan serve
   yarn dev
   ```

---

## 🤝 Code Review Process

1. Automated checks run on every PR (CI, Lint, Tests)
2. Code owner (@rafaumeu) reviews the code
3. At least 1 approval required to merge
4. All conversations must be resolved
5. Squash and merge to `main`

---

## 📞 Questions?

- Open a [Discussion](https://github.com/rafaumeu/sitemark/discussions)
- Create an [Issue](https://github.com/rafaumeu/sitemark/issues/new/choose)
- Check existing [Issues](https://github.com/rafaumeu/sitemark/issues)

Thank you for contributing! 🎉