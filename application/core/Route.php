<?php
class Route{
    
    static public function start(){
        $routes = explode('/', $_SERVER['REQUEST_URI']);
        $controllerName = 'Main';
        $actionName = 'index';

        if(!empty($routes[1])){
            $controllerName = $routes[1];
        }

        if(!empty($routes[2])){
            $actionName = $routes[2];
        }

        $modelName = 'Model_'.$controllerName.'.php'; 
        $modelPath = 'application/models/'.$modelName;
        if(file_exists($modelPath)){
            require_once $modelPath;
        }

        $controllerName = 'Controller_'.$controllerName; 
        $actionName = 'action_'.$actionName;

        $controllerPath ='application/controllers/' .$controllerName . '.php';
        if(file_exists($controllerPath)){
            require_once $controllerPath;
        }else{
            Route::error404();
        }

        $controller = new $controllerName();
        if(method_exists($controller, $actionName)){
            if(!empty($routes[3])){
                $controller->$actionName($routes[3]);
            }else{
                $controller->$actionName();
            }
        }else{
            Route::error404();
        }

    }

    static public function error404(){
        die('Page doesn\'t exist!');
    }
}