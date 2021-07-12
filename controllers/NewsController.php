<?php

include_once ROOT. '/models/News.php';

class NewsController{

	public function actionIndex()
	{
		$newsList = array(); 
		$newsList = News::getNewsList(); # обращение к статическому методу из News.php	


		require_once(ROOT. '/views/news/index.php'); # подключаем файл из папки views/news/ для отображения на экране(index.php)

		return true;
	}

	public function actionView($id)
	{
		if ($id) {
			$newsItem = News:: getNewsItemById($id); # обращение к статическому методу из News.php	
		}

		require_once(ROOT. '/views/news/view.php');

		// echo '<pre>';
		// print_r($newsItem);
		// echo '</pre>';

		// echo 'actionView';

		return true;
	}
}