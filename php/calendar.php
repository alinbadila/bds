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
      <?php
        include 'apicalendar.php';
        afiseazaConcedii();
      ?>

      <div class="row">
          <div class="col-lg-12 text-left">
              <h3>Libere planificate sau recuperari</h3>
          </div>
      </div>
      <!-- Tabel libere -->

      <div class="row">
          <div class="col-lg-12 text-left">
              <h3>Concedii medicale</h3>
          </div>
      </div>
      <!-- Tabel concedii medicale-->
      <?php
        include 'apicalendar.php';
        afiseazaConcediiMedicale();
      ?>

      <div class="row">
          <div class="col-lg-12 text-left">
              <h3>Cursuri</h3>
          </div>
      </div>
      <!-- Tabel cursuri-->
      <?php
        include 'apicalendar.php';
        afiseazaCursuri();
      ?>

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
