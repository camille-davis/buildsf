# BuildSF (Laravel Website)

Live version: [BuildSF.com](https://buildsf.com)

This site uses a custom-built CMS - install locally to test it out!

## Local Installation (includes test user)

```
git clone git@github.com:camille-davis/buildsf.git
cd buildsf
```
Copy environment config:
```
cp .env.example .env
```
Open `.env` and set `DB_CONNECTION=mysql`. Uncomment the rest of the `DB` section (and customize if necessary).

Create and import database (called `laravel` in this example, name may be different if you customized .env):
```
echo "create database laravel" | mysql -u root
mysql -u root laravel < buildsf_db.sql
```

Install dependencies:
```
composer install
npm install
```
Generate app key:
```
php artisan key:generate
```
Start the server:
```
php artisan serve
```
Then visit website at: `http://localhost:8000`

To log in, visit `http://localhost:8000/login` and use the following credentials:
```
username: test_user
password: test_password
```
