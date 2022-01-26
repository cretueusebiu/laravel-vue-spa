#  Laravel-Vue SPA Coding Challenge

## References
- https://laravel.com/docs/8.x/sail#redis
- https://github.com/cretueusebiu/laravel-vue-spa

## Features
- Laravel 8
- Vue + VueRouter + Vuex + VueI18n + ESlint
- Pages with dynamic import and custom layouts
- Login, register, email verification and password reset
- Authentication with JWT
- Bootstrap 5 + Font Awesome 5

## Objective

To create a note taking app using Laravel and VueJS and to create a page to get rates from the Stallion API.

## Insructions

You are going to use a pre-configured dockerized application to create a simple CRUD application. Laravel is used on the back-end Vuejs is used on the front end as a SPA.

_Note: There is already JWT authentication implemented for the app._

**TODO:** The application should allow you to create, edit, and delete delete notes. Notes will be save to the database. Notes will have a title, content, and created_at displayed on the front end.

### Part 1: Note Taking App
1.  Save the created notes in the database
2.  Create the necessary table with Laravel migrations
3.  Create all require restful routes to achieve the CRUD functionality
4.  Create required Front End components to access the API you created
5.  Authenticated user needs to be able to view all notes, create new notes, edit existing notes, and delete notes.
6.  Create phpunit tests for the new feature

### Part 2: Shipment Rate API
https://app.swaggerhub.com/apis-docs/outgive-inc/stallionexpress/3.0
Testing URL: https://sandbox.stallionexpress.ca/api/v3
Bearer Token: {sent via email}

1.  Create a page where a user can fill out a form to get rates for the United States using the Stallion API
2.  Display these rates to the user showing the cost information

## Grading Scheme

Functionality: Out of 10
UX/Design: Out of 10
DB Design: Out of 5
Validation: Out of 10
Coding Style: Out of 10
Testing: Out of 5

Include front-end and back-end validation.
Feel free to use your creativity and design skills to make the existing site design your own.
## Installation

```
cp .env.example .env

docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v $(pwd):/var/www/html \
    -w /var/www/html \
    laravelsail/php81-composer:latest \
    composer install --ignore-platform-reqs

./vendor/bin/sail up
./vendor/bin/sail artisan key:generate 
./vendor/bin/sail artisan jwt:secret
./vendor/bin/sail artisan migrate 
./vendor/bin/sail npm install
./vendor/bin/sail npm run build

```

## Usage

#### Development

```bash
./vendor/bin/sail npm run dev
```

#### Production

```bash
./vendor/bin/sail npm run build
```

## Testing

```bash
# Run unit and feature tests
./vendor/bin/sail test