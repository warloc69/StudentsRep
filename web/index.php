<?php
require_once("../framework/Loader.php");
$r = new src\Student\Controller();
$r->addStudent();
//require_once("../framework/Student.php");
//include "../framework/Student.php";
 //   $re = new framework\Student('root','root');
   // $re->id = 1;
   // echo $re->getFname();
// $re->setFname("curvam25");
//$re->setAge(22);
//echo $re->id;
// echo uniqid();
  //  echo phpinfo();
   \framework\Route::execute();
	?>