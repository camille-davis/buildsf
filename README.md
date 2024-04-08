# BuildSF (Laravel Website)

Live version: [BuildSF.com](https://buildsf.com)

## Local Installation

```
git clone git@github.com:camille-davis/buildsf.git
cd buildsf
```
Copy environment config:
```
cp .env.example .env
```
Open it and set `DB_CONNECTION=mysql`, uncomment rest of section.

Install dependencies:
```
composer install
npm install
npm run build
```
Generate app key:
```
php artisan key:generate
```
Import database:
```
mysql -u root laravel < buildsf_db.sql
```
Start the server:
```
php artisan serve
```
Then visit website at: `http://localhost:8000`
