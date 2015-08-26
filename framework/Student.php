<?php
namespace framework {
    use PDO;
    class Student
    {
        private $db;
        public $id;
        private $fname;
        private $sname;
        private $male;
        private $age;
        private $group;
        private $faculty;
        function __construct($name,$pass){
            $this->db = new PDO('mysql:host=localhost;dbname=students', $name, $pass);
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            if (!$this->db) {
                $err=$this->db->errorInfo();
                throw new Exception('Could not connect: ' . $err[2]);
            }
        }

        public function getAll() {
            $st = $this->db->prepare("SELECT * FROM student");
            $st->execute();
            return $st->fetchAll(PDO::FETCH_ASSOC);
        }

        public function create($data) {
            $sql = "INSERT INTO student (fname, sname,".
                       "male ,age, group_univer, faculty) ".
                       "VALUES (:fname, :sname, :male, :age, :group, :faculty)";
            $statement = $this->db->prepare($sql);
            $statement->execute(
                  array(':fname' => $data['fname'],
                      ':sname' => $data['sname'],
                      ':male' => $data['male'],
                      ':age' => $data['age'],
                      ':group' => $data['group_univer'],
                      ':faculty' => $data['faculty']
                 ));
            $this->id = $this->db->lastInsertId();
        }
        public  function remove($data) {
            $sql = "delete from student where id = :id";
            $statement = $this->db->prepare($sql);
            $statement->execute(array(':id' => $data['id']));
        }
        public  function loadStudent($id) {
            $this->id = $id;
        }

        public function update($data) {
            $sql = "UPDATE student SET fname=:fnamr, sname=:sname, ".
            "male=:male, age=:age, group_univer=:group_univer, faculty=:faculty WHERE id=:id";
            $statement = $this->db->prepare($sql);
            $statement->execute(
                array(':fname' => $data['fname'],
                    ':sname' => $data['sname'],
                    ':male' => $data['male'],
                    ':age' => $data['age'],
                    ':group' => $data['group_univer'],
                    ':faculty' => $data['faculty'],
                    ':id' => $data['id']
                ));
        }
        private function getInfo($name) {
            if($this->id) {
                $sql = 'select '.$name.' from student where id = :id';
                $statement = $this->db->prepare($sql);
                $statement->execute(array(':id' => $this->id));
                return $statement->fetch()[0];
            }
            return null;
        }
        private function setInfo($name,$value) {
            if ($this->id) {
                $sql = 'update student set '.$name.' = :value where id = :id';
                $statement = $this->db->prepare($sql);
                $statement->execute(array(':value' => $value,':id' => $this->id));
              //  $statement->fetch();
            } else {

                    $sql = 'INSERT INTO student (' . $name . ') VALUES (:value)';
                    $statement = $this->db->prepare($sql);
                    $statement->execute(array(':value' => $value));
                  //  $statement->fetchAll(PDO::FETCH_ASSOC);
                    $this->id = $this->db->lastInsertId();

            }
        }
        /**
         * @return mixed
         */
        public function getFname()
        {
            $this->fname = $this->getInfo('fname');
            return $this->fname;
        }

        /**
         * @param mixed $fname
         */
        public function setFname($fname)
        {
            $this->fname = $fname;
            $this->setInfo('fname',$fname);
        }

        /**
         * @return mixed
         */
        public function getSname()
        {
            $this->sname = $this->getInfo('sname');
            return $this->sname;
        }

        /**
         * @param mixed $sname
         */
        public function setSname($sname)
        {
            $this->sname = $sname;
            $this->setInfo('sname',$sname);
        }

        /**
         * @return mixed
         */
        public function getMale()
        {
            $this->male = $this->getInfo('male');
            return $this->male;
        }

        /**
         * @param mixed $male
         */
        public function setMale($male)
        {
            $this->male = $male;
            $this->setInfo('male',$male);
        }

        /**
         * @return mixed
         */
        public function getAge()
        {
            $this->age = $this->getInfo('age');
            return $this->age;
        }

        /**
         * @param mixed $age
         */
        public function setAge($age)
        {
            $this->age = $age;
            $this->setInfo('age',$age);
        }

        /**
         * @return mixed
         */
        public function getGroup()
        {
            $this->group = $this->getInfo('group_univer');
            return $this->group;
        }

        /**
         * @param mixed $group
         */
        public function setGroup($group)
        {
            $this->group = $group;
            $this->setInfo('group_univer',$group);
        }

        /**
         * @return mixed
         */
        public function getFaculty()
        {
            $this->faculty = $this->getInfo('faculty');
            return $this->faculty;
        }

        /**
         * @param mixed $faculty
         */
        public function setFaculty($faculty)
        {
            $this->faculty = $faculty;
            $this->setInfo('faculty',$faculty);
        }


    }
}