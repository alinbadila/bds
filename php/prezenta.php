<?php
  session_start();
  if ($_SESSION['id']): ?>
<!DOCTYPE html>

<html lang="ro">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name='description' content='Managementul unei subunitati de pompieri'>
  <meta name='keywords' content='pompieri, interventie, calendar, organizare'>
  <meta http-equiv='content-type' content='text/html; charset=utf-8'>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="author" content="Alin Bădilă, badila.alin@yahoo.com">

  <title>B.D.S. - Prezența</title>

	<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="../css/style.css">
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
    			    <a href="..php/deconectare.php"><img src="icons/logout.png"></a>
    			  </span>
          </li>
    		</ul>
    	</nav>
    </div>
  </header>

	<div class="container-fluid">
        <h2>Prezența cadrelor</h2>
        <div class="iconGrid">
            <div class="iconContainer">
                <a href="angajati8ore.php"><img class="iconClass" src="../icons/8ore.png" alt="Angajati 8 ore">
	                <span class="caption">Program de 8 ore</span></a>
            </div>

            <div class="iconContainer">
                <a href="angajatitura1.php"><img class="iconClass" src="../icons/1.png" alt="Tura 1"><span class="caption">Tura 1</span></a>
            </div>

            <div class="iconContainer">
                <a href="angajatitura2.php"><img class="iconClass" src="../icons/2.png" alt="Tura 2"><span class="caption">Tura 2</span></a>
            </div>

            <div class="iconContainer">
                <a href="angajatitura3.php"><img class="iconClass" src="../icons/3.png" alt="Tura 3"><span class="caption">Tura 3</span></a>
            </div>
        </div>
        <footer><a href='../index.php'>Acasă</a> | <a>Contact</a></footer>
    </div>

    <script type='text/javascript' src='../js/jquery.min.js'></script>
    <script type='text/javascript' src='../js/popper.min.js'></script>
  	<script type='text/javascript' src='../js/bootstrap.min.js'></script>
<?php else:
      header("Location: loginpage.php");
      endif; ?>
</body>
</html>
