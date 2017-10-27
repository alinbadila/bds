<?php
/*$conn = mysqli_connect("localhost", "root", "Alin1984", "BDS");*/
$servername = "86.125.149.136";
$username = "root";
$password = "Alin1984";
$database = "BDS";
$port = 3306;
$conn = mysqli_connect($servername, $username, $password, $database, $port);
if (! $conn ) {
	# conectare nereusita
	die("Conectare nereușită:".mysqli_connect_error());
}
?>
