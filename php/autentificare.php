<?php
session_start();
include 'dbhandler.php';

$uid = $_POST['uid'];
$parola = $_POST['parola'];

$sql = "SELECT * FROM utilizatori
        WHERE uid = '$uid' AND parola = '$parola'";

$rezultat = $conn -> query($sql);

if (!$row = $rezultat -> fetch_assoc()) {
  # nume utilizator si/sau incorecte
  header("Location: ../loginpage.php?error=nouser");
} else {
  # nume utilizator si parola corecte
  //echo "Autentificare reusita.";
  $_SESSION['id'] = $row['id'];
  header("Location: ../index.php");
  }
?>
