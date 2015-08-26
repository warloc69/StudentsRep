<?php
namespace src\Student;
use framework;
class controller
{
    public function showStudent()
    {
        header('Location: /web/index.php');
    }
    public function removeStudent($data)
    {
        error_log("controller remove student");
        $re = new framework\Student('root','root');
        $re->remove($data);
    }
    public function addStudent($data)
    {
        error_log("controller add student");
        $re = new framework\Student('root','root');
        $re->create($data);

    }
    public function editStudent($data)
    {
        $re = new framework\Student('root','root');
        $re->update($data);
    }


}