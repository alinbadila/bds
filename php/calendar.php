<?php
  session_start();
  if ($_SESSION['id']): ?>

<?php
  include 'apicalendar.php';
  try {
      $conn = new PDO('mysql:host=aluna.go.ro;dbname=BDS;charset=utf8', $_SESSION['dbusername'], $_SESSION['dbpassword']);
  } catch (Exception $e) {
      die('Eroare : '.$e->getMessage());
  }
?>

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
              <?php echo "<p class=\"text-white bg-dark\">" . date("d/m/Y") . "</p>"?>
          </div>
      </div>
      <div class="row">
        <div class="col-lg-12 text-center">
          <p> Alege altă dată: <input type="text" id="datepicker" maxlength="20" size="25" readonly>
              <input class="btn btn-primary btn-sm" id="butonOkData" type="submit" value="ok">
              Data selectata: <input type="text" id="rezdatepicker" maxlength="10" size="12">
          <p>
        </div>
      </div>
      <div class="row">
          <div class="col-lg-12 text-left">
              <h3>Sarcinile zilei</h3>
          </div>
      </div>
      <!-- Tabel concedii de odihna-->
      <div class="row">
          <div class="col-lg-12 text-left">
              <h3>Concedii de odihna</h3>
          </div>
      </div>
      <?php
        afiseazaConcedii($conn);
      ?>
      <!----------------------------->

      <!-- Tabel zile de nastere-->
      <div class="row">
          <div class="col-lg-12 text-left">
              <h3>Zile de nastere</h3>
          </div>
      </div>
      <?php
        afiseazaSarbatoriti($conn);
      ?>
      <!-------------------------->

      <!-- Tabel libere -->
      <div class="row">
          <div class="col-lg-12 text-left">
              <h3>Libere planificate sau recuperari</h3>
          </div>
      </div>
      <?php
        afiseazaLibere($conn);
      ?>
      <!------------------>

      <!-- Tabel concedii medicale-->
      <div class="row">
          <div class="col-lg-12 text-left">
              <h3>Concedii medicale</h3>
          </div>
      </div>
      <?php
        afiseazaConcediiMedicale($conn);
      ?>
      <!---------------------------->

      <!-- Tabel cursuri-->
      <div class="row">
          <div class="col-lg-12 text-left">
              <h3>Cursuri</h3>
          </div>
      </div>
      <?php
      afiseazaCursuri($conn);
      ?>
      <!------------------>

      <!-- Tabel misiuni-->
      <div class="row">
          <div class="col-lg-12 text-left">
              <h3>Misiuni</h3>
          </div>
      </div>
      <?php
      afiseazaMisiuni($conn);
      ?>
      <!------------------>
  </div>
  <?php
    $conn = null;
   ?>

  <script src="../js/jquery.min.js"></script>
  <script src="../js/jquery-ui.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>
  <script>
    var data_aleasa = $("#datepicker").datepicker({
                      onSelect: function() {
                          var dateObject = $(this).datepicker('getDate');
                        },
                        dateFormat:'yyyy-mm-dd'}).val();
    document.getElementById('rezdatepicker').value = data_aleasa;
  </script>

<?php else:
      header("Location: loginpage.php");
      endif; ?>
</body>
</html>
