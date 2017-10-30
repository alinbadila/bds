<?php
session_start();
include 'dbhandler.php';

$uid = $_POST['uid'];
$parola = $_POST['parola'];

$sql = "SELECT * FROM utilizatori
        WHERE uid = '$uid' AND parola = '$parola'";

$query = $conn->prepare($sql);
	
if ($query == false) {
	 print_r($conn->errorInfo());
	 die ('Eroare la pregatire query');
}

$query->execute();
$rezultat = $query->fetch(PDO::FETCH_ASSOC);
if ($rezultat == false) {
	# nume utilizator si/sau incorecte
	$query = null;
	$conn = null;
	session_destroy();
	header("Location: loginpage.php?error=nouser");
} else {
	# nume utilizator si parola corecte
	$_SESSION['id'] = $rezultat['ID_UTILIZATOR'];
	$_SESSION['username'] = $rezultat['nume'] . " " . $rezultat['prenume'];
	$query -> closeCursor();
	header("Location: ../index.php");
}

?>
