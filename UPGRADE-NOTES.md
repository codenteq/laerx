# Upgrade notes: Laravel 10 to 13, PHP 8.4

Branch `upgrade/laravel-13`, from upstream master `ed833da` (24 Feb 2026).

| | Before | After |
|---|---|---|
| Laravel | 10.48.20 | 13.39.0 |
| PHP (tested on) | 8.3.6 | 8.4.27 |
| PHPUnit | 10.5 | 12.5 |
| Carbon | 2.72 | 3.15 |
| Laravel Excel | 3.1.58 | 4.0.6 (PhpSpreadsheet 1.29 to 5.10) |
| Intervention Image | 2.7.2 | 4.4.1 |
| Tests | 4 (1 failing) | 18, all passing |

## How it was done

1. Smoke tests first, on Laravel 10 (`tests/Smoke`). They cover log in,
   wrong password, admin pages, manager pages, the unpaid-invoice gate,
   Excel export, creating a question, student pages, the city lookup and
   image conversion to webp.
2. One major version per commit: 10 to 11, 11 to 12, 12 to 13. Tests run
   after each step; logs are kept with the case notes.
3. Two more smoke tests were added during step 3 (Excel import, payment
   callback outside the CSRF check) and also run against the Laravel 12
   commit, where they pass.

## What broke, and the fix

- **Days left on a subscription went negative (Carbon 3, step 1).**
  `invoiceDiffDate()` used `$end->diffInDays(now())`. Carbon 2 returned a
  positive whole number; Carbon 3 returns a signed float, so a plan ending
  in 10 days showed as -9 on the manager dashboard and the admin company
  list. No error was thrown. Fixed by asking for the absolute value.
- **Student import from Excel was a fatal error (Laravel Excel 4, step 3).**
  Excel 4 types `ToModel::model()` natively, so `UserImport::model()`
  without a return type no longer loads. Added the return type; behaviour
  is unchanged (the app still saves the user itself).
- **Intervention Image 2 replaced (step 3).** Version 2 has had no release
  since May 2022 and its static `Image::make()` API is gone in 3 and 4.
  `ImageConvertService` now uses the v4 `ImageManager`, keeps webp quality
  90 (the v2 default) and still reads the driver from `config/image.php`.
  The v2 provider and facade are removed from `config/app.php`.
- **Example test fixed (before the upgrade).** It expected `/` to return
  200, but `/` redirects to `/login`, so it already failed on Laravel 10.

## Package changes

- laravel/framework ^10.0 to ^13.0, php ^8.2 to ^8.3
- maatwebsite/excel ^3.1 to ^4.0 (major)
- intervention/image ^2.6 to ^4.4 (major)
- laravel/tinker ^2.5 to ^3.0 (major)
- barryvdh/laravel-debugbar ^3.6 to ^4.0 (major, dev)
- nunomaduro/collision ^7.0 to ^8.1, phpunit/phpunit ^10.0 to ^12.0 (dev)
- kutia-software-company/larafirebase ^1.3 to ^1.3.9 (first version that
  allows Laravel 11 and later)
- tucker-eric/eloquentfilter ^3.0 to ^3.5, spatie/laravel-ignition to ^2.4

## Left as it was, on purpose

- The pre-Laravel 11 app structure (`app/Http/Kernel.php`, providers in
  `config/app.php`, `RouteServiceProvider`). Laravel 13 still supports it;
  moving to the slim skeleton is a separate change.
- `App\Http\Middleware\VerifyCsrfToken` still extends Laravel's old
  `VerifyCsrfToken`, which Laravel 13 keeps as a deprecated alias of
  `PreventRequestForgery`. The payment callback exclusion still works and
  has a test.
- `config/cache.php` has no `serializable_classes` key, so cached Eloquent
  models (language, companies, test results) unserialize as before. If you
  copy the Laravel 13 default (`false`) into this file, those cached models
  will stop working; list their classes instead.

## Watch on deploy

- Server needs PHP 8.3 or newer (tested on 8.4) with GD, mbstring, intl,
  zip and pdo_mysql. Intervention Image 4 needs GD or Imagick.
- Run `php artisan optimize:clear` after deploying, then cache config,
  routes and views again. The smoke tests also pass with routes cached.
- Clear the application cache once (`php artisan cache:clear`): it holds
  objects serialized by the old framework and Carbon versions.

## Not tested here

- MySQL: tests ran on SQLite. The migrations ran unchanged, but nothing
  was checked against MySQL or MariaDB.
- The front end (`webpack.mix.js`, npm packages) was not built or changed.
- Real iyzico payments, Firebase push messages and email sending: these
  need live credentials. Only the CSRF exclusion of the payment callback
  is tested.
- Imports in the Mebbis format and pages outside the smoke list were not
  checked by hand.
