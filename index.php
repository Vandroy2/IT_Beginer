<?php

// 1. Общие настройки
// 2. Подключение файлов системы
// 3. Соединение с БД
// 4. Вызов Роутера



// echo "Hello";



ini_set('display_errors', 1);
error_reporting(E_ALL);

define('ROOT' , dirname(__FILE__)); # dirname получаем полный путь к файлу Router.php 
require_once(ROOT. '/components/Router.php'); # подключаем Router.php
require_once(ROOT. '/components/Db.php'); # подключаем класс Db(соединение с базой данных)

$router = new Router(); # объект класса Router 
$router->run(); # метод run класса Router 




?>