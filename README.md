<p align="center"><img src="https://webgunea.jangou.eus/wp-content/uploads/2020/05/ezgif.com-video-to-gif.gif" width="400"></p>
<p align="center">
**[JanGou](https://jangou.eus)**
</p>
<p align="center"><img src="https://res.cloudinary.com/dtfbvvkyp/image/upload/v1566331377/laravel-logolockup-cmyk-red.svg" width="400"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 1500 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.



- **[Vehikl](https://vehikl.com/)**

 

## Instalation and init server
El despliegue no se hace en la carpeta publica del servidor sino en las carpetas del spacio privado del mismo.
Don't do it git clone at public server folder. 
```
git clone https://github.com/JanGouEUS/JanGouServer.git
cd JangouServer
composer install
```
## .env config
```
cp .env.example .env
php artisan key:generate
```

# .env
```
APP_NAME=Laravel
APP_ENV=local <-- on production is production
APP_KEY=your_aplication_key
APP_DEBUG=true
APP_URL=http://localhost <-- your domain

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database
DB_USERNAME=your_username
DB_PASSWORD=your_password

MAIL_MAILER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS=null
MAIL_FROM_NAME="${APP_NAME}"

RECAPTCHA_SITE_KEY=your_site_key
RECAPTCHA_SECRET_KEY=your_secret_key
```
## Database MIGRATE
```
php artisan migrate
```

### ADD mapbox key
resources\js\components\Taberna\CreateTaberna.vue
```
line 705                 accessToken: 'mapbox_access_token', <-- add mapbox token
```
resources\js\components\Taberna\UpdateTaberna.vue
```
line 720                 accessToken: 'mapbox_access_token', <-- add mapbox token
```


### ADD telegram key
config\telegram.php
```
line 37              'token'               => env('TELEGRAM_BOT_TOKEN', 'Bot_api_key'), <-- add telegram bot token
```

### COPY proyect public folder on server public folder
```
cp public ../your_public_server_folder
```

### Change on server public folder index.php
```
line 24      require __DIR__.'/../vendor/autoload.php'; <-- change to your new path 
line 38      $app = require_once __DIR__.'/../bootstrap/app.php';  <-- change to your new path  


```
