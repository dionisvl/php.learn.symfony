<?php

//--error_reporting(E_ALL);
error_reporting(E_ERROR | E_WARNING | E_PARSE);


const DB_HOST = 'mysql';
const DB_USER = 'root';
const DB_PASSWORD = 'root';

const DB_NAME = 'test';
const DB_PORT = 3306;

function getLink()
{
    $link = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME, DB_PORT);

    if ($link === false) {
        dd('Ошибка подключения: ' . mysqli_connect_error());
    } else {
        return $link;
    }
}

function dd($var)
{
    print_r($var);
    die;
}


try {
    $dsn = 'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8;port=' . DB_PORT;

    $pdo = new PDO($dsn, DB_USER, DB_PASSWORD);

    $pdo->exec(
        "CREATE TABLE IF NOT EXISTS `city` (
        `id` INT(10) NOT NULL AUTO_INCREMENT,
        `name` VARCHAR(50) NULL DEFAULT NULL COLLATE 'utf8mb4_0900_ai_ci',
        PRIMARY KEY (`id`) USING BTREE
    )
    COLLATE='utf8mb4_0900_ai_ci'
    ENGINE=InnoDB
    ;"
    );

    $pdo->exec("INSERT INTO city (name) VALUES ('supercity')");

    echo 'ok' . PHP_EOL;

    $stmt = $pdo->query("SELECT * FROM `city`");

    while ($row = $stmt->fetch()) {
        echo $row['id'] . ' - ' . $row['name'] . "<br />" . PHP_EOL;
    }
} catch (PDOException $e) {
    echo $e->getMessage();
}
