<?php
$conn = mysqli_connect("localhost", "root", "Alin1984", "login");
if (! $conn) {
  # conectare nereusita
  die("Conectare nereușită:".mysqli_connect_error());
}
else {
  # conectare reusita
  //echo "Conexiune reusita!";
  //mysqli_close($conn);
}
 ?>
