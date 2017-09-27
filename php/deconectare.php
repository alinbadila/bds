<?php
include 'dbhandler.php';
session_start();
session_destroy();
if (!mysqli_close($conn)) {
  # code...
  echo "Baza de date nu a fost inchisa".mysql_error();
} else {
  # code...
  header("Location: ../loginpage.php");
}
?>
