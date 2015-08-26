<?php
namespace framework;


class Request
{
    public $data = array();

    function __construct(){
        if (!empty($_REQUEST['id']))
        $this->data['id'] = $_REQUEST['id'];
        if (!empty($_REQUEST['fname']))
            $this->data['fname'] = $_REQUEST['fname'];
        if (!empty($_REQUEST['age']))
            $this->data['age'] = $_REQUEST['age'];
        if (!empty($_REQUEST['sname']))
            $this->data['sname'] = $_REQUEST['sname'];
        if (!empty($_REQUEST['male']))
            $this->data['male'] = $_REQUEST['male'];
        if (!empty($_REQUEST['group_univer']))
            $this->data['group_univer'] = $_REQUEST['group_univer'];
        if (!empty($_REQUEST['faculty']))
            $this->data['faculty'] = $_REQUEST['faculty'];
        $ready = str_replace(array('/','?'), '/', $_SERVER['REQUEST_URI']);
        $routes = explode('/', $ready);
        if (!empty($routes[1])) {
            $this->data['controller'] = 'src\\Student\\' . $routes[1];
        }
        if (!empty($routes[2])) {
            $this->data['action'] = $routes[2];
        }
    }

}