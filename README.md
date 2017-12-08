# Laravel-Vue SPA Starter

[![Build Status](https://img.shields.io/travis/cretueusebiu/laravel-vue-spa/master.svg?style=flat-square)](https://travis-ci.org/cretueusebiu/laravel-vue-spa)

> A Laravel-Vue SPA starter project template.

## Features

- Laravel 5.5 
- Vue + VueRouter + Vuex + VueI18n
- Pages with custom layouts 
- Login, register and password reset
- Authentication with [JWT](https://github.com/tymondesigns/jwt-auth)
- Socialite integration
- Bootstrap 4 + Font Awesome 5

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
# build and watch
npm run watch

# serve with hot reloading
npm run hot
```

#### Production

```bash
npm run production
```


## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.
