<?php
// FRONT CONTROLLER

// 1. ОБщие настройки
ini_set('display_errors',1);
error_reporting(E_ALL);

// 2. Подключение файлов системы
define('ROOT', dirname(__FILE__));
require_once(ROOT .'/components/Autoload.php');

// 3. Установка соединения с БД

// 4. Вызов Router
$router = new Router();
$router->run();


// ф-я вывода объекта или массива в виде иерархии
function prePrint($object)
{
    if ($object) {
        echo '<hr><pre>'. print_r($object, 1) . '</pre><hr>';
    } else {
        echo '<hr>Нету объекта/массива<hr>';
    }
}

/* содержимое файла .htaccess:
AddDefaultCharset utf-8

RewriteEngine on

RewriteBase /

RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d

RewriteRule ^(.*)$ index.php

*/
?>
