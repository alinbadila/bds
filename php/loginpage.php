<!DOCTYPE html>

<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name='description' content='Managementul unei subunitati de pompieri'>
  <meta name='keywords' content='pompieri, interventie, calendar, organizare'>
  <meta http-equiv='content-type' content='text/html; charset=utf-8'>
  <meta name="author" content="Alin Bădilă, badila.alin@yahoo.com">

  <title>Baza de Date a Subunității</title>

  <link rel="shortcut icon" href="../favicon.png" />
  <link rel="apple-touch-icon" href="../faviconsafari.png" />

  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="../css/loginstyle.css">
</head>

<body>
<!--
    <div class="content">
        <h2>Acces</h2>

        <h3>Baza de date a subunității</h3>

        <form action="autentificare.php" method="post">
            <input type="text" name="uid" placeholder="nume utilizator"><br>
            <input type="password" name="parola" placeholder="parola"><br>
            <button class="button" type="submit" name="butonLogin">Conectare</button>
        </form>
        <?php
        $url =  "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
        if (strpos($url, 'error=nouser') !== false) {
            # code...
            echo "<h6>Utilizatorul nu există în baza de date!</h6>";
        }
        ?>
    </div>
-->
    <div class="container">
    	<div class="d-flex justify-content-center h-100">
    		<div class="card">
    			<div class="card-header">
    				<h3>Acces</h3>
    			</div>
    			<div class="card-body">
    				<form>
    					<div class="input-group form-group">
    						<div class="input-group-prepend">
    							<span class="input-group-text"><i class="fas fa-user"></i></span>
    						</div>
    						<input type="text" name="uid" class="form-control" placeholder="nume utilizator">
    					</div>
    					<div class="input-group form-group">
    						<div class="input-group-prepend">
    							<span class="input-group-text"><i class="fas fa-key"></i></span>
    						</div>
    						<input type="password" name="parola" class="form-control" placeholder="parola">
    					</div>
    					<div class="form-group">
    						<input type="submit" value="Conectare" class="btn float-right login_btn">
    					</div>
    				</form>
          <?php
          $url =  "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
          if (strpos($url, 'error=nouser') !== false) {
              # code...
              echo "<h6>Utilizatorul nu există în baza de date!</h6>";
          }
          ?>
    			</div>
    		</div>
    	</div>
    </div>


  <script type='text/javascript' src='js/jquery.min.js'></script>
  <script type='text/javascript' src='js/bootstrap.min.js'></script>
</body>
</html>
