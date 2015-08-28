<?php
namespace src\Controller;
use \framework\ConfigHolder;
   /**
    * Representation of Controller class
     */
class controller
{
     /**
    * called by Route class for showing table with Students
     */
    public function showStudent()
    {
        header('Location: /web/index.php');
    }
	/**
    * called by Route class for deliting Student from DB
	* $data - array with information from request 
     */
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
		/**
    * called by Route class for adding Student into DB
	* $data - array with information from request 
     */
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
		/**
    * called by Route class for updating Student in DB
	* $data - array with information from request 
     */
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