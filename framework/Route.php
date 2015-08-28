<?php
namespace framework;
/**
* class for routing requests
*/
class Route
{  
   /**
    * execute routing accordingly to information from Request
	* $request -  Object of Class Request
     */
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