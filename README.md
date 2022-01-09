# Nginx PHP MySQL

Docker running Nginx, PHP-FPM, MySQL and PHPMyAdmin.

### Installation
- docker compose up --build
- composer install
- create database with name "my.symf.test"
- check current MySQL ip by command: `docker inspect mysql | grep IPAddress`
- your config for connection from OS: `DATABASE_URL="mysql://root:root@127.0.0.1:8989/my.symf.test?serverVersion=8.0`
- your config for connection from docker: `DATABASE_URL="mysql://root:root@172.18.0.2:3306/my.symf.test?serverVersion=8.0"`

- php bin/console doctrine:migrations:migrate
- php bin/console doctrine:fixtures:load
- open url "http://localhost:8000/"
### Images to use

* [Nginx](https://hub.docker.com/_/nginx/)
* [MySQL](https://hub.docker.com/_/mysql/)
* [PHP-FPM](https://hub.docker.com/r/nanoninja/php-fpm/)
* [Composer](https://hub.docker.com/_/composer/)
* [PHPMyAdmin](https://hub.docker.com/r/phpmyadmin/phpmyadmin/)
* [Generate Certificate](https://hub.docker.com/r/jacoelho/generate-certificate/)

You should be careful when installing third party web servers such as MySQL or Nginx.

This project use the following ports :

| Server     | Port |
|------------|------|
| MySQL      | 8989 |
| PHPMyAdmin | 8080 |
| Nginx      | 8000 |
| Nginx SSL  | 3000 |

#### Connecting MySQL from [PDO](http://php.net/manual/en/book.pdo.php)

```php
<?php
    try {
        $dsn = 'mysql:host=mysql;dbname=test;charset=utf8;port=3306';
        $pdo = new PDO($dsn, 'dev', 'dev');
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
```

___

### Sources

- https://github.com/nanoninja/docker-nginx-php-mysql