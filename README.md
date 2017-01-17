# Laravel-Vue SPA Starter [WIP]

> A Laravel-Vue SPA starter project template.

## Features

- Laravel 5.4 + Vue + Vue Router + Vuex
- Pages with custom layouts 
- Examples for login, register and password reset
- Integration with [vform](https://github.com/cretueusebiu/vform)
- Authentication with JWT
- Webpack (with HMR and pre-processors)

## Installation

- `git clone https://github.com/cretueusebiu/laravel-vue-spa.git`
- `cd laravel-vue-spa`
- `cp .env.example .env`
- `composer install`
- `php artisan key:generate`
- `php artisan jwt:secret`
- Edit `.env` and set your database connection details
- `php artisan migrate`
- `npm install` / `yarn`

## Usage

#### Development

```bash
# serve with hot reloading
npm run dev
```

#### Production

```bash
npm run build
```
