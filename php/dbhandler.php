<?php
$servername = "aluna.go.ro";
$username = "root";
$password = "Alin1984";
$database = "BDS";
$port = 3306;

try
{
	$conn = new PDO('mysql:host=aluna.go.ro;dbname=BDS;charset=utf8', $username, $password);
	if ($conn) {
		$_SESSION['dbservername'] = $servername;
		$_SESSION['dbusername'] = $username;
		$_SESSION['dbpassword'] = $password;
		$_SESSION['database'] = $database;
		$_SESSION['dbport'] = $port;
	}
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

?>
