# e-commerce-project
## Installation
### Server Requirements:
PHP >= 7.2.5<br/>
for more information please go to : https://laravel.com/docs/7.x <br>
### Setup projects
create database "ecommerce" and import "ecommerce.sql" file into it<br>
create database "payment-gateway" and import "payment-gateway.sql" file into it<br>
Go to ".env" file in each project and update only your user name and password (DB_USERNAME, DB_PASSWORD values)<br>
### Run projects
Run Apache and mysql<br>
Open cmd and change directory to "ecommerce" project then run this command:<br><br>
`php arisan serv `<br><br>
Open another cmd and change directory to "payment-gateway" project then run it with port 8001 or type this command:<br><br>
` php artisan serv --port 8001 `
<br><br>
### *Notes:
###### the port in the last command should be 8001 <br>
###### all js code in ecommerce project is written in file \ecommerce\public\js\functions.js<br>
###### Framework used is an mvc php framework<br>


<br><br><br>
### Demo
[![Audi R8](http://img.youtube.com/vi/d2GNP9c56kQ/0.jpg)](https://youtu.be/d2GNP9c56kQ "Audi R8") 
<br><br><br>
## Framework used:
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
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.


