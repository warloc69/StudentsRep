<?php
namespace src\Controller;
use \framework\ConfigHolder;

class controller
{
    public function showStudent()
    {
        header('Location: /web/index.php');
    }
    public function removeStudent($data)
    {
        $re = new \src\Model\Student(\framework\db::connect(
                       ConfigHolder::getConfig('connection_string'),
                       ConfigHolder::getConfig('user'),
                       ConfigHolder::getConfig('pass')
        ));
        $re->remove($data);
        header('Location: /web/index.php');
    }
    public function addStudent($data)
    {
        $re = new \src\Model\Student(\framework\db::connect(
            ConfigHolder::getConfig('connection_string'),
            ConfigHolder::getConfig('user'),
            ConfigHolder::getConfig('pass')
        ));
        $re->create($data);
        header('Location: /web/index.php');

    }
        public function editStudent($data)
    {
        $re = new \src\Model\Student(\framework\db::connect(
            ConfigHolder::getConfig('connection_string'),
            ConfigHolder::getConfig('user'),
            ConfigHolder::getConfig('pass')
        ));
        $re->update($data);
        header('Location: /web/index.php');
    }


}