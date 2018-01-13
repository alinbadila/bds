<?php
  session_start();
  if ($_SESSION['id']): ?>
<!DOCTYPE html>

<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name='description' content='Managementul unei subunitati de pompieri'>
    <meta name='keywords' content='pompieri, interventie, calendar, organizare'>
    <meta http-equiv='content-type' content='text/html; charset=utf-8'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    
    <meta name="author" content="Alin Bădilă, badila.alin@yahoo.com">
    
    <title>B.D.S. - pagina principală</title>
    
<!--     <link rel='stylesheet' type='text/css' href='css/style.css'> -->
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<!--

    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    
    <link rel="shortcut icon" href="favicon.png" />
    <link rel="apple-touch-icon" href="faviconsafari.png" />
-->

</head>

<body>
	<nav class="navbar">
		<div class="container-fluid">
	    	<div class="navbar-header">
				<a class="navbar-brand" href="#">B.D.S.</a>
	    	</div>
			<ul class="nav navbar-nav">
				<li class="active"><a href="index.php">Acasă</a></li>
				<li><a href="#">Raport intervenție</a></li>
				<li><a href="#">Raport SMURD</a></li>
	    	</ul>
			<ul class="nav navbar-nav navbar-right">
				<li><span class="glyphicon glyphicon-user"></span> <?php echo "logat ca " . $_SESSION['username'];?></li>
				<li><a href="php/deconectare.php"><span class="glyphicon glyphicon-log-in"></span> Ieșire</a></li>
	    	</ul>
	  	</div>
	</nav>


<!--
    <div class="container">
        <div class="iconGrid">
            <div class="iconContainer">
                <a><img class="iconClass" src="icons/organizare.png" alt="Registru organizare"><span class="caption">Registru organizare</span></a>
            </div>

            <div class="iconContainer">
                <a><img class="iconClass" src="icons/prezenta.png" alt="Prezenta"><span class="caption">Prezența</span></a>
            </div>

            <div class="iconContainer">
                <a href="php/calendar.php"><img class="iconClass" src="icons/calendar.png" alt="Calendarul zilei"><span class="caption">Calendarul zilei</span></a>
            </div>

            <div class="iconContainer">
                <a href="php/angajati.php"><img class="iconClass" src="icons/angajat.png" alt="Angajati"><span class="caption">Angajați</span></a>
            </div>
        </div>

        <div class="iconGrid">
            <div class="iconContainer">
                <a><img class="iconClass" src="icons/autospeciala_incendiu.png" alt="Raport interventie"><span class="caption">Raport intervenție</span></a>
            </div>

            <div class="iconContainer">
                <a><img class="iconClass" src="icons/ambulanta.png" alt="Raport SMURD"><span class="caption">Raport SMURD</span></a>
            </div>

            <div class="iconContainer">
                <a><img class="iconClass" src="icons/raport_desca.png" alt="Raport descarcerare"><span class="caption">Raport descarcerare</span></a>
            </div>

            <div class="iconContainer">
                <a><img class="iconClass" src="icons/cautare.png" alt="Cauta raport"><span class="caption">Caută raport</span></a>
            </div>
        </div>

        <footer><a href='index.php'>Acasă</a> | <a>Contact</a><br>
        <br></footer>
    </div>
-->
    
    <script type='text/javascript' src='js/jquery.js'></script>
	<script type='text/javascript' src='js/bootstrap.js'></script>
<?php else: 
      header("Location: php/loginpage.php");
      endif; ?>
</body>
</html>
