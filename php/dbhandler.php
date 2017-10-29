<?php
$servername = "aluna.go.ro";
$username = "root";
$password = "Alin1984";
$database = "BDS";
$port = 3306;
$conn = mysqli_connect($servername, $username, $password, $database, $port);
if (! $conn ) {
	# conectare nereusita
	die("Conectare nereușită:".mysqli_connect_error());
} else {
	$_SESSION['dbservername'] = $servername;
	$_SESSION['dbusername'] = $username;
	$_SESSION['dbpassword'] = $password;
	$_SESSION['database'] = $database;
	$_SESSION['dbport'] = $port;
}
?>
