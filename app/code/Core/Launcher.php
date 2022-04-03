<?php

namespace Core;

class Launcher
{
    public function start($routeInfo)
    {
        //user
        list($controller, $method, $param) = $routeInfo;
        //User
        $controller = ucfirst($controller);
        // \Controller\User
        $controller = '\Controller\\'.$controller;
        $controllerObject = new $controller();
        $controllerObject->$method($param);

    }
}
