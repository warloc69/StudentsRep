<?php include "Header.php"; ?>

<?php
  try {
      include "SuccessBody.php";
  } catch (Exception $e) {
      include "ErrorBody.php";
  }
?>

<?php include "Footer.php"; ?>

