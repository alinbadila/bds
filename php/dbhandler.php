<?php
$conn = mysqli_connect("localhost", "root", "Alin1984", "BDS");
if (! $conn ) {
	# conectare nereusita
	die("Conectare nereușită:".mysqli_connect_error());
}
?>
