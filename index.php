<?php
  session_start();
  if ($_SESSION['id']): ?>

  <!DOCTYPE html>
  <html lang="ro">

  <head>
    <title>B.D.S. - pagina principală</title>
    <meta name='description' content='website description' />
    <meta name='keywords' content='website keywords, website keywords' />
    <meta http-equiv='content-type' content='text/html; charset=utf-8' />
    <link rel='stylesheet' type='text/css' href='css/style.css' />
    <!-- modernizr enables HTML5 elements and feature detects -->
    <script type='text/javascript' src='js/modernizr-1.5.min.js'></script>
  </head>

  <body>
    <div id='main'>

  	<nav>
  	  <div id='menubar'>
          <ul id='nav'>
            <li class='current'><a href='index.php'>Acasă</a></li>
            <li><a href='ourwork.html'>Raport intervenție</a></li>
            <li><a href='testimonials.html'>Raport SMURD</a></li>
            <li><a href='testimonials.html'>Raport descarcerare</a></li>
           
            <li class='session'><?php echo "logat ca " . $_SESSION['username'];?></li>
             <li><a href='php/deconectare.php'>Ieșire</a></li>
          </ul>
        </div><!--close menubar-->
        
      </nav>

  	<div id='site_content'>
  		<div class="iconGrid">
	  		<div class="iconContainer">
		  		<a><img class="iconClass" src="icons/organizare.png" alt="Registru organizare"><span class="caption">Registru organizare</span></a>
		  	</div>
	  		<div class="iconContainer">
		  		<a><img class="iconClass" src="icons/prezenta.png" alt="Prezenta"><span class="caption">Prezența</span></a>
		  	</div>
		  	<div class="iconContainer">
		  		<a><img class="iconClass" src="icons/calendar.png" alt="Calendarul zilei"><span class="caption">Calendarul  zilei</span></a>
		  	</div>
		  	<div class="iconContainer">
		  		<a href="angajati.php"><img class="iconClass" src="icons/angajat.png" alt="Angajati"><span class="caption">Angajați</span></a>
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
  	
    <footer>
  		<a href='index.php'>Acasă</a> 
  		| <a href='contact.html'>Contact</a><br/><br/>
    </footer>
    </div>
  	</div>
  	
    <!-- javascript at the bottom for fast page loading -->
    <script type='text/javascript' src='js/jquery.js'></script>

  </body>
  </html>
<?php else: 
  header("Location: loginpage.php");
  endif; ?>
  
