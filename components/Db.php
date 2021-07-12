<?php

class Db{

	public static function getConnection()
	{
		$paramsPath = ROOT. '/config/db_params.php'; # файл параметров соединения с БД
		$params = include($paramsPath); # присваеваем в переменную массив из файла db_params.php

		$dsn = "mysql: host = {$params['host']}; dbname={$params['dbname']}"; # переменная для PDO в виде ключей массива из файла db_params.php
		$db = new PDO ($dsn, $params['user'], $params['password']); # присваиваем в переменную соединение с БД

		return $db; # получаем соединение с БД при выполнении метода getConnection()
	}
}