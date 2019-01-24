<?php
  session_start();
  if ($_SESSION['id']): ?>
<!DOCTYPE html>

<html lang="ro">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name='description' content='Managementul unei subunitati de pompieri'>
  <meta name='keywords' content='pompieri, interventie, calendar, organizare'>
  <meta http-equiv='content-type' content='text/html; charset=utf-8'>

  <meta name="author" content="Alin Bădilă, badila.alin@yahoo.com">

  <title>B.D.S. - Angajați 8 ore</title>

	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
  <link rel='stylesheet' type='text/css' href='../css/style.css'>
</head>

<body>
  <!-- HEADERUL si BARA DE NAVIGARE -->
  <header class="top" role="header">
    <div class="container">
      <!-- Continut bara de navigare -->
      <nav class="navbar navbar-dark navbar-xs" role="navigation" style="background-color: #222222;">
    	  <a class="navbar-brand navbar-header" style="font-size:80%;" href="../index.php">Baza de date a subunității</a>
    		<ul class="nav navbar-nav navbar-right">
    			<li>
            <span class="navbar-text" style="font-size:60%;"><?php echo $_SESSION['username'];?>
    			    <a href="deconectare.php"><img src="../icons/logout.png"></a>
    			  </span>
          </li>
    		</ul>
    	</nav>
    </div>
  </header>

  <div class="container">
    <h2>Personal angajat la program zilnic de 8 ore</h2>
    <table class="table">
      <thead class="thead-light">
        <tr>
          <th>Nr.crt.</th>
          <th>Grad</th>
          <th>Nume și prenume</th>
          <th>Funcția ocupată</th>
        </tr>
      </thead>
      <tbody>
        <?php
            try {
                $conn = new PDO('mysql:host=aluna.go.ro;dbname=BDS;charset=utf8', $_SESSION['dbusername'], $_SESSION['dbpassword']);
            } catch (Exception $e) {
                die('Eroare : '.$e->getMessage());
            }
            $sql = "SELECT BDS.grade.GRAD, BDS.date_pers.NUME, BDS.date_pers.PRENUME, BDS.functii.FUNCTIE_DETALIATA
                    FROM BDS.grade
                        INNER JOIN BDS.functii ON BDS.grade.ID_CADRU = BDS.functii.ID_CADRU
                        INNER JOIN BDS.date_pers ON BDS.functii.ID_CADRU = BDS.date_pers.ID_CADRU
                    WHERE (BDS.functii.TURA = 0) and (BDS.functii.ID_CADRU IS NOT NULL);";
            $query = $conn->prepare($sql);
            $query -> execute();
            $rezultat = $query -> fetchAll();
            if (!$rezultat) {
                echo "Niciun rezultat.";
            } else {
                $nrcrt = 0;
                foreach ($rezultat as $rand) {
                    $nrcrt++;
                    echo "<tr>";
                    echo "<td>" . $nrcrt . "</td>";
                    echo "<td>" . $rand["GRAD"] . "</td>";
                    echo "<td>" . $rand["NUME"] . " " . $rand["PRENUME"] . "</td>";
                    echo "<td>" . $rand["FUNCTIE_DETALIATA"] . "</td>";
                    echo "</tr>";
                }
            }
            $query -> closeCursor();
            $conn = null;
            ?>
      </tbody>
    </table>
  </div>
<?php else:
    header("Location: loginpage.php");
endif; ?>
</body>
</html>
