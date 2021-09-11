# Laravel 5, lsapp Tutorial by traversy media

**_Built using Laravel 6_**

1. _The purpose of the dashboard is to show individual posts by each user_
2. _The purpose of the blog is to show all posts by every user_
3. _Didn't follow the SASS part as it was deemed unnecessary_
4. _Couldn't add the unisharp/laravel-ckeditor package as it's incompatible with Laravel 6_

# Composer commands

When adding a new package

```bash
composer require <packagename>:<version>
```

For Laravel 5.\*, Update `/config/app.php`

```php
'providers' => [
    // Add new package's Provider
];

'aliases' => [
    // Add new package's Alias
];
```

# Artisan commands

> ## View

Blade templates can be found in `/resources/views`

Non-compiled and non-bundled files can be found in `/public`

#### Generate authentication templates

Laravel 5.\*

```bash
php artisan make:auth
```

Laravel 6

Add sass variable file if it doesn't exist

```bash
touch /resources/sass/_variables.scss
```

Install package

```bash
composer require laravel/ui --dev
npm install && npm run dev
```

> ## Routes

Can be found in `/routes`

#### List Routes

```bash
php artisan route:list
```

> ## Controller

New Controller in `/app/Htpp/Controllers`

```bash
php artisan make:controller NewController
```

> ## Model Controller

#### Create Model Controller

Adds resource controllers that manipulate the database via the Model

```bash
php artisan make:controller NewController --resource
```

> ## Model

#### Create Database connection

Edit `/.env` file e.g.

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=newdatabase
DB_USERNAME=uname
DB_PASSWORD=pass
```

#### Create Model

New Model in `/app`

```bash
php artisan make:model New
```

Create New Model and corresponding migrations that
manipulate the database.

New Migration in `/database/migrations`

```bash
php artisan make:model New -m
```

#### Create Migration

The name of the migration should be as descriptive as possible

```bash
php artisan make:migration add_user_id_to_users
```

#### Migrate Tables

i.e. create or manipulate tables

```bash
php artisan migrate
```

#### Access Eloquent ORM

Used for interacting with the database directly

```bash
php artisan tinker
```

> ## File Upload

Creates a shortcut/symbolic link of `/storage/app/public` in `/public` folders so that files uploaded in the backend are accessible in the frontend

```bash
php artisan storage:link
```

# Eloquent commands

_After accessing Eloquent ORM with `php artisan tinker` command_

#### Count table rows

Uses the NewTable Model for the table with the same name

```php
App\ModelForTable::count()
```

#### Insert new row/record

```php
$row = new App\ModelForTable();
$row->nameofcolumn = 'string';
$row->save();
```
