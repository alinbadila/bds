<?php
  session_start();
  if ($_SESSION['id']): ?>
<!DOCTYPE html>

<html lang="ro">
<head>
    <meta name='description' content='Calendar'>
    <meta charset="utf-8"
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name='keywords' content='pompieri, interventie, calendar, organizare'>
    <meta http-equiv='content-type' content='text/html; charset=utf-8'>

    <meta name="author" content="Alin Bădilă, badila.alin@yahoo.com">

    <title>B.D.S. - Calendar</title>

    <link rel='stylesheet' type='text/css' href='../css/jquery-ui.css'>
	  <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <link rel='stylesheet' type='text/css' href='../css/style.css'>
</head>

<body>
  <div class="container">
    <nav class="navbar navbar-dark navbar-xs" style="background-color: #222222;">
  		<!-- Navbar content -->
  		 <div class="navbar-header">
  		 	<a class="navbar-brand" style="font-size:80%;" href="../index.php">Baza de date a subunității</a>
  		</div>

  		<ul class="nav navbar-nav navbar-right">
  			<li><span class="navbar-text" style="font-size:60%;"><?php echo $_SESSION['username'];?>
  			<a href="deconectare.php"><img src="../icons/logout.png"></a>
  			</span></li>
  		</ul>
  	</nav>
  </div>

  <div class="container">
      <div class="row">
          <div class="col-lg-12 text-center">
              <h2>Agenda subunității</h2>
              <?php echo date("d/m/Y")?>
          </div>
      </div>
      <div class="row">
        <div class="col-lg-6 text-center">
          <h3> Alege altă dată: <input type="text" id="datepicker" maxlength="10" size="10"></h3>
        </div>
        <div class="col-lg-6">
          <input type="image" src="../icons/ok.png"/>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-12 text-left">
            <h3>Sarcinile zilei</h3>
        </div>
      </div>
      <div class="row">
          <div class="col-lg-12 text-left">
              <h3>Concedii de odihna</h3>
          </div>
      </div>
      <!-- Tabel concedii de odihna-->
      <div class="row">
        <table class="table table-dark table-striped">
          <thead class="thead-light">
            <tr>
              <th>Nr.crt.</th>
              <th>Grad</th>
              <th>Nume și prenume</th>
              <th>Data inceput</th>
              <th>Data sfarsit</th>
              <th>Tip concediu</th>
              <th>Tura</th>
            </tr>
          </thead>
          <tbody>
            <?php
                try {
                    $conn = new PDO('mysql:host=aluna.go.ro;dbname=BDS;charset=utf8', $_SESSION['dbusername'], $_SESSION['dbpassword']);
                } catch (Exception $e) {
                    die('Eroare : '.$e->getMessage());
                }
                $sql = "SELECT  BDS.grade.GRAD, BDS.date_pers.NUME, BDS.date_pers.PRENUME,
		                            BDS.concedii.DATA_INCEPUT, BDS.concedii.DATA_SFARSIT, BDS.concedii.TIP,
                                BDS.functii.TURA
	                      FROM BDS.grade
			                          INNER JOIN BDS.concedii ON BDS.grade.ID_CADRU = BDS.concedii.ID_CADRU
			                          INNER JOIN BDS.date_pers ON BDS.grade.ID_CADRU = BDS.date_pers.ID_CADRU
                                INNER JOIN BDS.functii ON BDS.grade.ID_CADRU = BDS.functii.ID_CADRU
                        WHERE (BDS.concedii.VALID = 1) and (BDS.functii.ID_CADRU IS NOT NULL) and
                              (CURDATE() >= BDS.concedii.DATA_INCEPUT and CURDATE() <= BDS.concedii.DATA_SFARSIT)
                        ORDER BY BDS.functii.TURA;";
                $query = $conn->prepare($sql);
                $query -> execute();
                $rezultat = $query -> fetchAll();
                if (!$rezultat) {
                    echo "Nicio persoana nu se afla in concediu de odihna sau suplimentar in data mentionata.";
                } else {
                    $nrcrt = 0;
                    foreach ($rezultat as $rand) {
                        $nrcrt++;
                        echo "<tr>";
                        echo "<td>" . $nrcrt . "</td>";
                        echo "<td>" . $rand["GRAD"] . "</td>";
                        echo "<td>" . $rand["NUME"] . " " . $rand["PRENUME"] . "</td>";
                        echo "<td>" . $rand["DATA_INCEPUT"] . "</td>";
                        echo "<td>" . $rand["DATA_SFARSIT"] . "</td>";
                        echo "<td>" . $rand["TIP"] . "</td>";
                        echo "<td>" . $rand["TURA"] . "</td>";
                        echo "</tr>";
                    }
                }
                $query -> closeCursor();
                $conn = null;
                ?>
          </tbody>
        </table>
      </div>

      <div class="row">
          <div class="col-lg-12 text-left">
              <h3>Concedii medicale</h3>
          </div>
      </div>
      <!-- Tabel concedii medicale-->
      <div class="row">
        <table class="table table-dark table-striped">
          <thead class="thead-light">
            <tr>
              <th>Nr.crt.</th>
              <th>Grad</th>
              <th>Nume și prenume</th>
              <th>Data inceput</th>
              <th>Data sfarsit</th>
              <th>Diagnostic</th>
              <th>Cod diagnostic</th>
              <th>Tura</th>
            </tr>
          </thead>
          <tbody>
            <?php
                try {
                    $conn = new PDO('mysql:host=aluna.go.ro;dbname=BDS;charset=utf8', $_SESSION['dbusername'], $_SESSION['dbpassword']);
                } catch (Exception $e) {
                    die('Eroare : '.$e->getMessage());
                }
                $sql = "SELECT  BDS.grade.GRAD, BDS.date_pers.NUME, BDS.date_pers.PRENUME,
		                            BDS.concedii_medicale.DATA_INCEPUT, BDS.concedii_medicale.DATA_SFARSIT,
                                BDS.concedii_medicale.DIAGNOSTIC, BDS.concedii_medicale.COD_DIAGNOSTIC, BDS.functii.TURA
	                      FROM BDS.grade
			                          INNER JOIN BDS.concedii_medicale ON BDS.grade.ID_CADRU = BDS.concedii_medicale.ID_CADRU
			                          INNER JOIN BDS.date_pers ON BDS.grade.ID_CADRU = BDS.date_pers.ID_CADRU
                                INNER JOIN BDS.functii ON BDS.grade.ID_CADRU = BDS.functii.ID_CADRU
                        WHERE (BDS.functii.ID_CADRU IS NOT NULL) and
                              (CURDATE() >= BDS.concedii_medicale.DATA_INCEPUT and CURDATE() <= BDS.concedii_medicale.DATA_SFARSIT)
                        ORDER BY BDS.functii.TURA;";
                $query = $conn->prepare($sql);
                $query -> execute();
                $rezultat = $query -> fetchAll();
                if (!$rezultat) {
                    echo "Nicio persoana nu se afla in concediu medical in data mentionata.";
                } else {
                    $nrcrt = 0;
                    foreach ($rezultat as $rand) {
                        $nrcrt++;
                        echo "<tr>";
                        echo "<td>" . $nrcrt . "</td>";
                        echo "<td>" . $rand["GRAD"] . "</td>";
                        echo "<td>" . $rand["NUME"] . " " . $rand["PRENUME"] . "</td>";
                        echo "<td>" . $rand["DATA_INCEPUT"] . "</td>";
                        echo "<td>" . $rand["DATA_SFARSIT"] . "</td>";
                        echo "<td>" . $rand["DIAGNOSTIC"] . "</td>";
                        echo "<td>" . $rand["COD_DIAGNOSTIC"] . "</td>";
                        echo "<td>" . $rand["TURA"] . "</td>";
                        echo "</tr>";
                    }
                }
                $query -> closeCursor();
                $conn = null;
                ?>
          </tbody>
        </table>
      </div>

      <div class="row">
          <div class="col-lg-12 text-left">
              <h3>Cursuri</h3>
          </div>
      </div>
      <!-- Tabel cursuri-->
      <div class="row">
        <table class="table table-dark table-striped">
          <thead class="thead-light">
            <tr>
              <th>Nr.crt.</th>
              <th>Grad</th>
              <th>Nume și prenume</th>
              <th>Tipul cursului</th>
              <th>Descrierea cursului</th>
              <th>Locul desfasurarii</th>
              <th>Data inceput</th>
              <th>Data sfarsit</th>
              <th>Tura</th>
            </tr>
          </thead>
          <tbody>
            <?php
                try {
                    $conn = new PDO('mysql:host=aluna.go.ro;dbname=BDS;charset=utf8', $_SESSION['dbusername'], $_SESSION['dbpassword']);
                } catch (Exception $e) {
                    die('Eroare : '.$e->getMessage());
                }
                $sql = "SELECT  BDS.grade.GRAD, BDS.date_pers.NUME, BDS.date_pers.PRENUME,
		                            BDS.cursuri.TIP_CURS, BDS.cursuri.DESCRIERE, BDS.cursuri.LOCATIE,
                                BDS.cursuri.DATA_INCEPUT, BDS.cursuri.DATA_SFARSIT, BDS.functii.TURA
	                      FROM BDS.grade
			                          INNER JOIN BDS.cursuri ON BDS.grade.ID_CADRU = BDS.cursuri.ID_CADRU
			                          INNER JOIN BDS.date_pers ON BDS.grade.ID_CADRU = BDS.date_pers.ID_CADRU
                                INNER JOIN BDS.functii ON BDS.grade.ID_CADRU = BDS.functii.ID_CADRU
                        WHERE (BDS.functii.ID_CADRU IS NOT NULL) and
                              (CURDATE() >= BDS.cursuri.DATA_INCEPUT and CURDATE() <= BDS.cursuri.DATA_SFARSIT)
                        ORDER BY BDS.functii.TURA;";
                $query = $conn->prepare($sql);
                $query -> execute();
                $rezultat = $query -> fetchAll();
                if (!$rezultat) {
                    echo "Nicio persoana nu se afla la curs in data mentionata.";
                } else {
                    $nrcrt = 0;
                    foreach ($rezultat as $rand) {
                        $nrcrt++;
                        echo "<tr>";
                        echo "<td>" . $nrcrt . "</td>";
                        echo "<td>" . $rand["GRAD"] . "</td>";
                        echo "<td>" . $rand["NUME"] . " " . $rand["PRENUME"] . "</td>";
                        echo "<td>" . $rand["TIP_CURS"] . "</td>";
                        echo "<td>" . $rand["DESCRIERE"] . "</td>";
                        echo "<td>" . $rand["LOCATIE"] . "</td>";
                        echo "<td>" . $rand["DATA_INCEPUT"] . "</td>";
                        echo "<td>" . $rand["DATA_SFARSIT"] . "</td>";
                        echo "<td>" . $rand["TURA"] . "</td>";
                        echo "</tr>";
                    }
                }
                $query -> closeCursor();
                $conn = null;
                ?>
          </tbody>
        </table>
      </div>




      <div class="row">
          <div class="col-lg-12 text-left">
              <h3>Misiuni</h3>
          </div>
      </div>
      <!-- Tabel misiuni-->
  </div>

  <script src="../js/jquery.min.js"></script>
  <script src="../js/jquery-ui.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>
  <script>
    $( function() {
      $( "#datepicker" ).datepicker();
      } );
  </script>

<?php else:
      header("Location: loginpage.php");
      endif; ?>
</body>
</html>
