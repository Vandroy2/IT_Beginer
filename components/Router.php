<?php

class Router{

private $routes; # Массив в котором будут храниться маршруты

public function __construct(){

	$routesPath = ROOT.'/config/routes.php'; # путь к роутам(ROOT - путь до папки проэкта на диске)
	$this-> routes = include($routesPath); # присваиваем свойству routes массив который хранится в routes.php'

}

private function getURI(){
	if (!empty($_SERVER['REQUEST_URI'])) {  #получаем строку запроса

		return trim($_SERVER['REQUEST_URI'], '/'); # метод возвращает строку
		
	}
}

public function run(){

	// echo "test run()";
	// echo '<br>';
	// echo '<hr>';

	# Получить строку запроса

	# Проверить наличие такого запроса в файле  routes.php

	# Если есть совпадение, определить какой контролер и экшн
	//  обрабатывает запрос

	// Подключить нужный контролер

	//  Создать объект класса контролера и вызвать метод контролера (action) 

  $url = $this-> getURI(); # обращение к методу getURI

foreach ($this ->routes as $urlPattern => $path){ # в массив routes помещаем переменные по схеме в маршрутах  'news' => 'news/index' и получам доступ к этим элементам(строка запроса($urlPattern) =>запрос/метод($path))
	if (preg_match("~$urlPattern~", $url)){# передаем данные из routes и строку запроса в параметры функции для поиска соответствия

		$internalRoute = preg_replace("~$urlPattern~", $path, $url); # получение внутреннего пути из внешнего с помощью регулярного выражения из routes.php

		// echo '<br><br>Нужно сформировать : '.$internalRoute;

		$segments = explode('/', $path); # делим строку 'news/index' для получения контролера и метода

		$controllerName = array_shift($segments).'Controller'; # получаем назване контролера из массива(роута) 'news/index' и добавляем слово Controller(функция получает первый элемент массива и удаляет его из массива)

		$controllerName = ucfirst($controllerName); # делаем первую букву заглавной для совпадения названия в проекте

		$actionName = 'action'.ucFirst(array_shift($segments)); # получаем название метода из массива(роута) news/index

		$parametrs = $segments; # присваиваем в переменную параметры(массив) из routes.php($1/$2)

		// print_r ($parametrs);

		// --------------------------------------------------------------------------------------------------------------------------------------------------------

		$controllerFile = ROOT.'\controllers\\'.$controllerName.'.php'; # присваиваем в переменную путь к контролеру и название контролера

		if (file_exists($controllerFile)) { # если контролер сущеструет, подключам его функцией include_once($controllerFile)
			include_once($controllerFile);

			
		}

		$controllerObject = new $controllerName; # создаем объект класса контроллера и записываем в переменную строку с названием нужным названием(см. строку 48)

		$result = call_user_func_array(array($controllerObject, $actionName),$parametrs); # функция вызывает экшн $actionName у объекта $controllerObject и передает массив с параметрами $parametrs в экшн 

		// print_r($result);

		if ($result !=null) { # если метод сработал, заканчаваем цикл foreach(строка 41)
			break;
		}
	}
	}



}

}