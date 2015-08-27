<?php
namespace src\Controller;

class controller
{
    public function showStudent()
    {
        header('Location: /web/index.php');
    }
    public function removeStudent($data)
    {
        $re = new \src\Model\Student(\framework\db::connect());
        $re->remove($data);
        header('Location: /web/index.php');
    }
    public function addStudent($data)
    {
        $re = new \src\Model\Student(\framework\db::connect());
        $re->create($data);
        header('Location: /web/index.php');

    }
    public function editStudent($data)
    {
        $re = new \src\Model\Student(\framework\db::connect());
        $re->update($data);
        header('Location: /web/index.php');
    }


}