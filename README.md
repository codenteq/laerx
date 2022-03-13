<p align="center">
    <a href="https://codenteq.com"><img width="300" src="https://codenteq.com/assets/img/codenteq.png" alt="Codenteq"></a>
</p>
<p align="center">
    <a href="https://github.com/karabayyazilim/drive-course-app/blob/master/LICENSE"><img src="https://poser.pugx.org/bagisto/bagisto/license.svg" alt="License"></a>
</p>

<p align="center">
    <a href="https://twitter.com/intent/follow?screen_name=codenteq"><img src="https://img.shields.io/twitter/follow/codenteq?style=social"></a>
</p>

<p align="center">
    ➡️ <a href="https://www.codenteq.com/">Website</a> | <a href="https://www.facebook.com/codenteq/">Community</a> ⬅️
</p>

<p align="center" style="display: inline;">
    <img class="flag-img" src="https://flagicons.lipis.dev/flags/4x3/tr.svg" alt="Turkish" width="24" height="24">
</p>

# Drive Course App

This project offers you a special course management panel for motor vehicle driving courses.


## Table of Contents

1. [Demo](#demo)

2. [Features](#features)

3. [Installation](#installation)

4. [Author](#author)

5. [Licence](#licence)

6. [Sponsor](#sponsor)
  
### Demo
[Visit or live](https://drive-course.app.codenteq.com)

  
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
- [@arsivpro](https://www.github.com/arsivpro)

  
## Licence

[MIT Licence](https://github.com/karabayyazilim/drive-course-app/blob/master/LICENSE)

  
### Sponsor

[Sponsor this project](https://opencollective.com/codenteq).

  
