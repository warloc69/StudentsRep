<?php
require_once("../framework/Loader.php");
//$r = new src\Student\Controller();
//$r->addStudent();
//require_once("../framework/Student.php");
//include "../framework/Student.php";
//$conn = \framework\db::connect();
//    $re = new framework\Student($conn);
//$all = $re->find(array('id'=>35));
//$all = $re->getAll();
//print_r($all);
//$re->createStudent("test","strst","men",12,"ssss","wasda");
   // $re->id = 1;
   // echo $re->getFname();
// $re->setFname("curvam25");
//$re->setAge(22);
//echo $re->id;
// echo uniqid();
  //  echo phpinfo();

$r = new \framework\Request();
 print_r($r->data);
//print_r($_REQUEST);
//print_r($_SERVER);
//print_r($_POST);

 include_once "Renderer.php";
   \framework\Route::execute($r);
	?>