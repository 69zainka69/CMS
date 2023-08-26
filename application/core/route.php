<?php

class Route
{
	static function start()
	{
		// контроллер и действие по умолчанию
		$controller_name = 'Main';
		$action_name = 'index';
		$systemresource = explode('?', $_SERVER['REQUEST_URI']);

		$routes = explode('/', $systemresource[0]);


        require_once 'startup.php';
        $sql = "SELECT * FROM `cms_SEO` WHERE `link` LIKE '/".$routes[1]."'";
        $result = $dbcnx->query($sql);
foreach($result as $v){
    $link = $v['link'];
    $controller_name = $v['Controller'];
    $action_name = $v['action'];
}
        if(isset($link) && $link!=NULL && $k==1){

        }else{

		// получаем имя контроллера
		if ( !empty($routes[1]) )
		{	
			$controller_name = $routes[1];
         
		}
		
		// получаем имя экшена
		if ( !empty($routes[2]) )
		{
			$action_name = $routes[2];
          
		}
    //}
 
        if(isset($_GET)){
           
            foreach($_GET as $k=>$v){
                    $datas[$k] = $v;
            }
            
        }

		// добавляем префиксы
		$model_name = 'Model_'.$controller_name;
		$controller_name = 'Controller_'.$controller_name;
		$action_name = 'action_'.$action_name;

		// подцепляем файл с классом модели (файла модели может и не быть)

		$model_file = strtolower($model_name).'.php';
		$model_path = "application/models/".$model_file;
		if(file_exists($model_path))
		{
			include "application/models/".$model_file;
		}

		// подцепляем файл с классом контроллера
		$controller_file = strtolower($controller_name).'.php';
		$controller_path = "application/controllers/".$controller_file;
		if(file_exists($controller_path) || isset($_GET))
		{
			include "application/controllers/".$controller_file;
		}
		else
		{
			/*
			правильно было бы кинуть здесь исключение,
			но для упрощения сразу сделаем редирект на страницу 404
			*/
			Route::ErrorPage404();
		}
		
		// создаем контроллер
		
		$controller = new $controller_name;
		$action = $action_name;
		
		if(method_exists($controller, $action) || $datas)
		{
                if(isset($datas)){
			$controller->$action($datas);
        }else{
            $controller->$action();
        }
		}
		else
		{
			// здесь также разумнее было бы кинуть исключение
			Route::ErrorPage404();
		}
	
	}
}
	function ErrorPage404()
	{
        $host = 'http://'.$_SERVER['HTTP_HOST'].'/';
        header('HTTP/1.1 404 Not Found');
		header("Status: 404 Not Found");
		header('Location:'.$host.'404');
    }
}