<?php
  session_start();

  require_once('dbhandler.php');
  $sql = "SELECT id, TITLU, CULOARE, START, END FROM evenimente ";
  $req = $conn->prepare($sql);
  $req->execute();
  $events = $req->fetchAll();
  
  if ($_SESSION['id']): ?>
<!DOCTYPE html>

<html lang="ro">
<head>
    <meta name='description' content='Calendar'>
    <meta charset="utf-8"
    <meta name='keywords' content='pompieri, interventie, calendar, organizare'>
    <meta http-equiv='content-type' content='text/html; charset=utf-8'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Alin Bădilă, badila.alin@yahoo.com">
    
    <title>B.D.S. - Calendar</title>
    
    <link rel='stylesheet' type='text/css' href='../css/style.css'>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
   
</head>

<body>

	<nav class="navbar navbar-dark navbar-xs" style="background-color: #222222;"> 
		<!-- Navbar content -->	
		 <div class="navbar-header">
		 	<a class="navbar-brand" style="font-size:80%;" href="#">Baza de date a subunității</a>
		</div>

		<ul class="nav navbar-nav navbar-right">
			<li><span class="navbar-text" style="font-size:60%;"><?php echo $_SESSION['username'];?>
			<a href="deconectare.php"><img src="../icons/logout.png"></a>
			</span></li>
		</ul>
	</nav>
	
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h3>Agenda subunității</h3>
            </div>
        </div>
    </div>
			
	<footer><a href='../index.php'>Acasă</a> | <a>Contact</a><br><br></footer>
      
<script src='../js/jquery.js'></script>
<script src="../js/popper.js"></script>
<script src="../js/bootstrap.js"></script>


<?php else: 
      header("Location: loginpage.php");
      endif; ?>
</body>
</html>
