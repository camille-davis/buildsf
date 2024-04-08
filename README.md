# BuildSF (Laravel Website)

Live version: [BuildSF.com](https://buildsf.com)

## Local Installation

```
git clone git@github.com:camille-davis/buildsf.git
cd buildsf
composer install
npm install
npm run build
```

Copy config:
```
cp .env.example .env
```
Open it and set `DB_CONNECTION=mysql`, uncomment rest of section.
Run:
```
php artisan key:generate
php artisan migrate
php artisan serve
```
Then visit website at: `http://localhost:8000`
