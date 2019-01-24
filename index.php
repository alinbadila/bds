<?php
  session_start();
  if ($_SESSION['id']): ?>
<!DOCTYPE html>

<html lang="en">
<head>
	<meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name='description' content='Managementul unei subunitati de pompieri'>
  <meta name='keywords' content='pompieri, interventie, calendar, organizare'>
  <meta http-equiv='content-type' content='text/html; charset=utf-8'>

  <meta name="author" content="Alin Bădilă, badila.alin@yahoo.com">

  <title>B.D.S. - pagina principală</title>

  <link rel="shortcut icon" href="favicon.png" />
  <link rel="apple-touch-icon" href="faviconsafari.png" />

	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body>
  <!-- HEADERUL si BARA DE NAVIGARE -->
  <header class="top" role="header">
    <div class="container">
      <!-- Continut bara de navigare -->
      <nav class="navbar navbar-dark navbar-xs" role="navigation" style="background-color: #222222;">
    	  <a class="navbar-brand navbar-header" style="font-size:80%;" href="#">Baza de date a subunității</a>
    		<ul class="nav navbar-nav navbar-right">
    			<li>
            <span class="navbar-text" style="font-size:60%;"><?php echo $_SESSION['username'];?>
    			    <a href="php/deconectare.php"><img src="icons/logout.png"></a>
    			  </span>
          </li>
    		</ul>
    	</nav>
    </div>
  </header>

  <div class="container">
      <div class="row">
          <div class="col-xs-6 col-sm-6 col-md-3 iconContainer">
              <a><img class="iconClass" src="icons/organizare.png" alt="Registru organizare"><span class="caption">Registru organizare</span></a>
          </div>

          <div class="col-xs-6 col-sm-6 col-md-3 iconContainer">
              <a><img class="iconClass" src="icons/prezenta.png" alt="Prezenta"><span class="caption">Prezența</span></a>
          </div>

          <div class="col-xs-6 col-sm-6 col-md-3 iconContainer">
              <a href="php/calendar.php"><img class="iconClass" src="icons/calendar.png" alt="Agenda zilei"><span class="caption">Agenda zilei</span></a>
          </div>

          <div class="col-xs-6 col-sm-6 col-md-3 iconContainer">
              <a href="php/angajati.php"><img class="iconClass" src="icons/angajat.png" alt="Angajati"><span class="caption">Angajați</span></a>
          </div>
      </div>

      <div class="row">
          <div class="col-xs-6 col-sm-6 col-md-3 iconContainer">
              <a><img class="iconClass" src="icons/autospeciala_incendiu.png" alt="Raport interventie"><span class="caption">Raport intervenție</span></a>
          </div>

          <div class="col-xs-6 col-sm-6 col-md-3 iconContainer">
              <a><img class="iconClass" src="icons/ambulanta.png" alt="Raport SMURD"><span class="caption">Raport SMURD</span></a>
          </div>

          <div class="col-xs-6 col-sm-6 col-md-3 iconContainer">
              <a><img class="iconClass" src="icons/raport_desca.png" alt="Raport descarcerare"><span class="caption">Raport descarcerare</span></a>
          </div>

          <div class="col-xs-6 col-sm-6 col-md-3 iconContainer">
              <a><img class="iconClass" src="icons/cautare.png" alt="Cauta raport"><span class="caption">Caută raport</span></a>
          </div>
      </div>
  </div>

  <script type='text/javascript' src='js/jquery.min.js'></script>
  <script type='text/javascript' src='js/popper.min.js'></script>
	<script type='text/javascript' src='js/bootstrap.min.js'></script>
<?php else:
      header("Location: php/loginpage.php");
      endif; ?>
</body>
</html>
