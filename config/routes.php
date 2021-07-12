<?php

return array(

'' => 'news/index',

'news/([0-9]+)' => 'news/view/$1', # $1/$2 - дополнительные параметры action из регулярного выражения

'news' => 'news/index',  #запрос => строка запроса / метод action в NewsController.php

// 'products' => 'product/list',



);