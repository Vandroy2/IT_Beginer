<?php

class News
{
	public static function getNewsList(){

		

		$db = Db:: getConnection(); # переменная подключения к БД

		$newsList = array();

		$result = $db->query("SELECT `id`, `title`, `date`, `short_content`, `content`, `author_name`# получаем в переменную данные из БД с помощью нужного запроса
		
						FROM `news`
						ORDER BY `date` DESC
						LIMIT 10");

		$i = 0;

		while ($row = $result->fetch()) { # $row строка из БД
			$newsList[$i]['id']= $row['id']; # записываем в массив данные из строк в БД
			$newsList[$i]['title'] = $row['title']; # записываем в массив данные из строк в БД
			$newsList[$i]['date'] = $row['date']; # записываем в массив данные из строк в БД
			$newsList[$i]['short_content'] = $row['short_content']; # записываем в массив данные из строк в БД
			$newsList[$i]['content'] = $row['content'];
			$newsList[$i]['author_name'] = $row['author_name'];
			$i ++;
		}
		return $newsList; # возвращаем массив с данными из БД

	}
	
	
	
	
	
	public static function getNewsItemById($id){

		$id = intval($id); # функция intval возвращает целое значение переменной

		if ($id) { # проверка переменной на true
			
	$db = Db:: getConnection(); # переменная подключения к БД

		$result = $db->query("SELECT * FROM `news` # получаем в переменную данные из БД с помощью нужного запроса

						WHERE id =" .$id);

		$result->setFetchMode(PDO::FETCH_ASSOC); # оставляем индексы только ввиде названия колонок

		$newsItem = $result->fetch();

		return $newsItem;

		print_r ($newsItem);

	}

	


}

}