<?php
namespace framework;


class Route
{
    static function execute()
    {
        // ���������� � �������� �� ���������
        $controller = 'Main';
        $action = 'index';

        $routes = explode('/', $_SERVER['REQUEST_URI']);
        // �������� ��� �����������
        if (!empty($routes[1])) {
            $controller = $routes[1];
            error_log("route controller ".$controller);
        }
        // �������� ��� ������
        if (!empty($routes[2])) {
            $action = $routes[2];
            error_log("route action ".$action);
        }
    }
}