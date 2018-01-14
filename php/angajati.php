<?php
  session_start();
  if ($_SESSION['id']): ?>
<!DOCTYPE html>

<html lang="ro">
<head>
    <title>B.D.S. - Angajați</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name='description' content='Managementul unei subunitati de pompieri'>
    <meta name='keywords' content='pompieri, interventie, calendar, organizare'>
    <meta http-equiv='content-type' content='text/html; charset=utf-8'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    
    <meta name="author" content="Alin Bădilă, badila.alin@yahoo.com">
    
    <link rel="shortcut icon" href="../favicon.png" />
    <link rel="apple-touch-icon" href="../faviconsafari.png" />
	<link rel='stylesheet' type='text/css' href='../css/style.css'>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
</head>

<body>
	<nav class="navbar navbar-dark navbar-xs" style="background-color: #222222;"> 
		<!-- Navbar content -->
		 <div class="navbar-header">
		 	<a class="navbar-brand" style="font-size:80%;" href="../index.php">Baza de date a subunității</a>
		</div>
		<ul class="nav navbar-nav">
			<li><a href="../index.php">Acasă</a></li>			
		</ul>
		<ul class="nav navbar-nav navbar-right">
			<li><span class="navbar-text" style="font-size:60%;"><?php echo $_SESSION['username'];?>
			<a href="php/deconectare.php"><img src="../icons/logout.png"></a>
			</span></li>
		</ul>
	</nav>

    <div id='site_content'>
        <h2>Personalul subunității</h2>

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
    
    <script type='text/javascript' src='../js/jquery.js'></script>
	<script type='text/javascript' src='../js/bootstrap.js'></script>
    <?php else: 
      header("Location: loginpage.php");
      endif; ?>
</body>
</html>
