<?php
namespace framework;




class Route
{
    function ErrorPage404()
    {
        $host = 'http://'.$_SERVER['HTTP_HOST'].'/';
        header('HTTP/1.1 404 Not Found');
        header("Status: 404 Not Found");
        header('Location:'.$host.'404');
    }

    static function execute($request)
    {
        // контроллер и действие по умолчанию
        $controller = empty($request->data['controller']) ? 'notexist' : $request->data['controller'] ;
        $action = empty($request->data['action']) ? 'notexist' : $request->data['action'] ;
        if (class_exists($controller)){
               $r = new $controller();
           if(method_exists($r,$action)) {
               $r->$action($request->data);
           }
        }

    }


}