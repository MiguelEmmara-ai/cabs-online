<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# Cabs Online
Overview
The aim of this assignment is to develop a better understanding of building web
applications using simple Ajax techniques, PHP, and MySQL. It is assumed that have
the knowledge and programming skills to work with PHP and MySQL PHP on the
server, as learned in Assignment One and the first part of this course.

For This Version I Use Laravel Web Framework
<br>
Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Getting Started
```shell
git clone https://github.com/MiguelEmmara-ai/cabs-online.git cabs-online
cd cabs-online
cp .env.example .env
composer install OR composer update
php artisan key:generate
nano .env << Configure .env
```
After opning your .env file, change the database name (DB_DATABASE) to whatever you have, username (DB_USERNAME) and password (DB_PASSWORD) field correspond to your configuration.

Then we can run
```shell
php artisan migrate:fresh
php artisan serve
```

# Demo
[CabsOnlineLaravel.MiguelEmmara.Me](https://cabsonlinelaravel.miguelemmara.me/)

# How To Use
1. Book A Ride      - This page allow the passengers to book their taxi
2. Become A Driver  - This page is for drivers to create their new account
3. Login            - Login drivers, check if the drivers is on the system

# Documentation
Full documentation can be found over on [docscabs.miguelemmara.me](https://docscabs.miguelemmara.me/).

### Built With

This section should list any major frameworks/libraries used to bootstrap your project. Leave any add-ons/plugins for the acknowledgements section. Here are a few examples.

* [![HTML][HTML.com]][html-url]
* [![CSS][CSS.com]][css-url]
* [![Bootstrap][Bootstrap.com]][Bootstrap-url]
* [![Laravel][Laravel.com]][Laravel-url]

<p align="right">(<a href="#readme-top">back to top</a>)</p>

### Software Architecture

Laravel framework app deployed on aws ec2
<br>
![Screenshot 1](https://github.com/MiguelEmmara-ai/cabs-online/blob/master/public/screenshots/Aws%20Cloud%20Architecture%20-%20Laravel.png)

<p align="right">(<a href="#readme-top">back to top</a>)</p>

# Screenshots
![Screenshot 1](https://github.com/MiguelEmmara-ai/Assignment02-Comp721/blob/release/v1.0/screenshots/screencapture-localhost-assignment02-release-v1.png)

# License
Copyright 2022. Code released under the MIT license.

<!-- MARKDOWN LINKS & IMAGES -->
<!-- https://www.markdownguide.org/basic-syntax/#reference-style-links -->
[HTML.com]: https://img.shields.io/badge/HTML5-E34F26?style=for-the-badge&logo=html5&logoColor=white
[html-url]: https://www.w3schools.com/html/
[CSS.com]: https://img.shields.io/badge/CSS3-1572B6?style=for-the-badge&logo=css3&logoColor=white
[css-url]: https://www.w3schools.com/css/
[Bootstrap.com]: https://img.shields.io/badge/Bootstrap-563D7C?style=for-the-badge&logo=bootstrap&logoColor=white
[Bootstrap-url]: https://getbootstrap.com
[Laravel.com]: https://img.shields.io/badge/Laravel-FF2D20?style=for-the-badge&logo=laravel&logoColor=white
[Laravel-url]: https://laravel.com
