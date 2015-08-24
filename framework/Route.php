<?php
namespace framework;


class Route
{
    static function execute()
    {
        // контроллер и действие по умолчанию
        $controller = 'Main';
        $action = 'index';

        $routes = explode('/', $_SERVER['REQUEST_URI']);
        // получаем имя контроллера
        if (!empty($routes[1])) {
            $controller = $routes[1];
            error_log("route controller ".$controller);
        }
        // получаем имя экшена
        if (!empty($routes[2])) {
            $action = $routes[2];
            error_log("route action ".$action);
        }
    }
}