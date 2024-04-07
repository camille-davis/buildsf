# BuildSF (Laravel Website)

Live version: [BuildSF.com](https://buildsf.com)

## Local Installation

```
git clone git@github.com:camille-davis/buildsf.git
cd buildsf
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate
php artisan serve
```
Then visit website at: `http://localhost:8000`
