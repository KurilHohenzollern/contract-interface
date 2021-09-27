<?php

require_once 'Singleton.php';
class Router extends Singleton 
{
    
    const Routes = [
        '/' => 'index.php',
        '/index' => 'index.php',
        '/create' => 'createNew.php',
        '/update' => 'updateDoc.php',
        '/userlist?id=3' => 'userUpdate.php' ,
        '/useradd' => 'createNewUsers.php',
        '/list' => 'list.php',
        '/userlist' => 'listUsers.php',
        '/docupdate' => 'docUpdate.php'
    ];

    protected function getMethod() {
        $uri = $_SERVER['REQUEST_URI'];
        foreach (self::Routes as $route => $val) {       
            if ($route == $uri) {
                return $val;
            }
        }
    
        return $this->notFound();
    }

    protected function notFound() {
        http_response_code(404);
        echo '404';
        die();
    }

    public function run() {
        
        $val = $this->getMethod();
        $_SERVER['QUERY_STRING'] = $val;
    
        require $val;
        
    }

    public function getVar($name, $default = null) {
            return trim($_POST[$name]);
    }
}
/*
$router = Router::getInstance();
$router->run();
$router = Router::getInstance();
$router->getVar();*/
