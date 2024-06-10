<p align="center"><img src="https://codenteq.com/wp-content/uploads/2022/12/laerx-default.webp" width="250" alt="Laerx Course Management Logo" /></p>

<h1 align="center">Laerx Course Management</h1>

<p align="center">
  <a href="https://packagist.org/packages/codenteq/laerx"><img src="https://poser.pugx.org/codenteq/laerx/v/stable.svg" alt="Latest Stable Version"></a>
  <a href="https://github.com/codenteq/laerx/blob/master/LICENSE"><img src="https://poser.pugx.org/codenteq/laerx/license.svg" alt="License"></a>
  <a href="https://packagist.org/packages/codenteq/laerx"><img src="https://poser.pugx.org/codenteq/laerx/d/total.svg" alt="Total Downloads"></a>
</p>

Laerx is a course management system provided by [Codenteq](https://github.com/codenteq) to create a consistent driver license for app users.

Get detailed information about your clients, exams and courses to create an effective report and track your progress. You can also use audio lessons, online quizzes, and the tool/teacher appointment system.

## Getting Started

First, install the package:

```bash
    composer create-project codenteq/laerx
```

### Docker Installation

Run the following command
```bash
  docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v $(pwd):/var/www/html \
    -w /var/www/html \
    laravelsail/php81-composer:latest \
    composer install --ignore-platform-reqs
```

```bash
    ./vendor/sail/bin artisan storage link
```

Configure the database connection is going to be using in `.env`

```bash
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=laerx
    DB_USERNAME=sail
    DB_PASSWORD=password
```

```bash
    ./vendor/bin/sail artisan migrate --seed
```

### Composer Installation

Run the following command

```bash
    composer install
```

```bash
    php artisan storage:link
```

Configure the database connection is going to be using in `.env`

```bash
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=laerx
    DB_USERNAME=root
    DB_PASSWORD=
```

```bash
    php artisan migrate --seed
```

## How to contribute
Laerx Course Management is always open for direct contributions. Contributions can be in the form of design suggestions, documentation improvements, new component suggestions, code improvements, adding new features or fixing problems. For more information please check our [Contribution Guideline document.](https://github.com/codenteq/laerx/blob/master/CONTRIBUTING.md)

## Useful Links

* [Open Laerx](https://laerx.codenteq.com/)
