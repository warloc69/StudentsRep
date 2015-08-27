<?php
namespace src\Model {

    use framework\ActiveRecord;

    class Student extends ActiveRecord
    {
        public $id = NULL;
        public $fname = NULL;
        public $sname = NULL;
        public $male = NULL;
        public $age = null;
        public $group_univer = null;
        public $faculty = null;
        function __construct($db){
            $this->db = $db;
        }

        public function getPrimaryIdName()
        {
            return 'id';
        }
        public function getTableName()
        {
            return 'student';
        }
    }
}