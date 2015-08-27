<?php
namespace framework;
class Route
{
    static function execute($request)
    {
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