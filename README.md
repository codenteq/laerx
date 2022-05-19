<p align="center">
    <a href="https://codenteq.com"><img width="200" src="https://github.com/codenteq/laerx/blob/master/public/images/laerx.png" alt="Codenteq"></a>
</p>
<p align="center">
    <a href="https://packagist.org/packages/codenteq/laerx"><img src="https://poser.pugx.org/codenteq/laerx/d/total.svg" alt="Total Downloads"></a>
    <a href="https://packagist.org/packages/codenteq/laerx"><img src="https://poser.pugx.org/codenteq/laerx/v/stable.svg" alt="Latest Stable Version"></a>
    <a href="https://github.com/codenteq/laerx/blob/master/LICENSE"><img src="https://poser.pugx.org/codenteq/laerx/license.svg" alt="License"></a>
    <a href="#backers"><img src="https://opencollective.com/codenteq/backers/badge.svg" alt="Backers on Open Collective"></a>
    <a href="https://github.com/codenteq/actions"><img src="https://github.com/bagisto/bagisto/workflows/CI/badge.svg" alt="Actions on Github"></a>
    <a href="#contributors"><img src="https://opencollective.com/codenteq/contributors/badge.svg" alt="Contributors on Open Collective"></a>
    <a href="#sponsors"><img src="https://opencollective.com/codenteq/sponsors/badge.svg" alt="Sponsors on Open Collective"></a>
</p>

<p align="center">
    <a href="https://twitter.com/intent/follow?screen_name=codenteq"><img src="https://img.shields.io/twitter/follow/codenteq?style=social"></a>
</p>

<p align="center">
    ➡️ <a href="https://www.codenteq.com/">Website</a> | <a href="https://devdocs.codenteq.com/">Documentation</a> | <a href="https://www.facebook.com/codenteq/">Community</a> ⬅️
</p>

<p align="center" style="display: inline;">
    <img class="flag-img" src="https://flagicons.lipis.dev/flags/4x3/tr.svg" alt="Turkish" width="24" height="24">
</p>

# Laerx

**Get detailed information about your clients, exams and courses to create an effective report and track your progress. You can also use audio lessons, online quizzes, and the tool/teacher appointment system.**


**Read our documentation: [Laerx Docs](https://devdocs.codenteq.com/)**


## Topics

1. [Documentation](#documentation)
2. [Features](#features)
3. [Installation](#installation)
4. [Author](#author)
5. [Licence](#licence)
6. [Sponsor](#sponsor)
  
# Visit our live [Demo](https://laerx.codenteq.com)

### Documentation
#### Documentation [https://devdocs.codenteq.com](https://devdocs.codenteq.com)

### Requirements

* **OS**: Ubuntu 16.04 LTS or higher / Windows 7 or Higher (WAMP / XAMP).
* **SERVER**: Apache 2 or NGINX.
* **RAM**: 2 GB or higher.
* **PHP**: 8.0 or higher.
* **For MySQL users**: 5.7.23 or higher.
* **Composer**: 1.6.5 or higher.
* **Docker**: 7.4 or higher.
  
### Features

- Admin Module
  - Question Module
  - Audio Lesson Module
  - Company Module
  - Payment Module
  - Setting Module
    - Multi Language
    - Licence Group
    - Periods
    - Car Types
    - Payment Module
      - Discount Coupon
      - Payment Plans
      - Payment Packages
      - Invoices Module
- Manager Module
  - Student Module
    - Report Module
    - Excel Student İmport Module
  - Question Module
  - Live Lesson Module
  - Group Exam Module
  - Notification Module
  - Booking Module
  - Support Module
  - Payment Module
      - Invoices Module
      - Iyzico Payment Services
      - Bank Transfer Services
- Teacher Module
  - My Booking Module
- Students Module
  - My Lesson Module
    - Live Lesson Module
  - Online Exam Module
    - Default Exam
    - Custom Exam
    - My Exam Results
  - Group Exam Module
  - My Booking Module
  - Notification Module
  - Support Module

  
### Installation

> If you are using Docker run the following command

```bash
  docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v $(pwd):/var/www/html \
    -w /var/www/html \
    laravelsail/php81-composer:latest \
    composer install --ignore-platform-reqs
```

> Or

```bash
    composer install
```

> Run the following command for the file system and If you are using Docker 

```bash
    ./vendor/sail/bin artisan storage link
```

> Or

```bash
    php artisan storage link
```

> Configure the database connection is going to be using in .env

```bash
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=drivecourseapp
    DB_USERNAME=root
    DB_PASSWORD=
```

> If you are using Docker and run this:

```bash
    ./vendor/bin/sail artisan migrate --seed
```

> Or 

```bash
    php artisan migrate --seed
```

  
### Author

- [@karabayyazilim](https://www.github.com/karabayyazilim)
- [@ahmetarsiv](https://www.github.com/ahmetarsiv)
- [@arsivpro](https://www.github.com/arsivpro)

  
## Licence

[MIT Licence](https://github.com/codenteq/laerx/blob/master/LICENSE)

  
### Sponsor

Support this project by becoming a sponsor. Your logo will show up here with a link to your website.

[Sponsor this project](https://opencollective.com/codenteq).

<div>
    <a href="https://opencollective.com/codenteq/contribute/sponsor-7372/checkout" target="_blank">
        <img src="https://images.opencollective.com/static/images/become_sponsor.svg">
    </a>
</div>

<a href="https://github.com/codenteq/laerx/graphs/contributors"><img src="https://opencollective.com/codenteq/contributors.svg?width=890&button=false"/></a>
