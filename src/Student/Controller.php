<?php
namespace src\Student;
use framework;
class Controller
{
    public function showStudent()
    {

    }
    public function removeStudent($id)
    {

    }
    public function addStudent()
    {
        error_log("controller add student");
        $re = new framework\Student('root','root');
        // $_REQUEST["first_name"]
    }
    public function editStudent($id)
    {

    }


}