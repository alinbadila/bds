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
  <!--Bootsrap 4 CDN-->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <!--Fontawesome CDN-->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="../css/loginstyle.css">
</head>

<body>
    <div class="container">
    	<div class="d-flex justify-content-center h-100">
    		<div class="card">
    			<div class="card-header">
    				<h3>Acces</h3>
    			</div>
    			<div class="card-body">
    				<form action="autentificare.php" method="post">
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
