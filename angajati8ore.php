<?php
  session_start();
  if ($_SESSION['id']): ?>

  <!DOCTYPE html>
  <html lang="ro">

  <head>
    <title>B.D.S. - Angajați</title>
    <meta name='description' content='Angajatii subunitatii' />
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
            <li class='current'><a href='angajati.php'> &lt; Angajați</a></li>
            <li><a href='php/deconectare.php'>Ieșire</a></li>
            <li class='session'><?php echo "logat ca " . $_SESSION['username'];?></li>
          </ul>
        </div><!--close menubar-->
        
      </nav>

  	<div id='site_content'>
  		<div class="iconGrid">
	  		<div class="iconContainer">
		  		<a><img class="iconClass" src="icons/8ore.png" alt="Program de 8 ore"><span class="caption">Program de 8 ore</span></a>
		  	</div>
	  		<div class="iconContainer">
		  		<a><img class="iconClass" src="icons/1.png" alt="Tura 1"><span class="caption">Tura 1</span></a>
		  	</div>
	  		<div class="iconContainer">
		  		<a><img class="iconClass" src="icons/2.png" alt="Tura 2"><span class="caption">Tura 2</span></a>
		  	</div>
		  	<div class="iconContainer">
		  		<a><img class="iconClass" src="icons/3.png" alt="Tura 3"><span class="caption">Tura 3</span></a>
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
    <script type='text/javascript' src='js/image_slide.js'></script>

  </body>
  </html>
<?php else: 
  header("Location: loginpage.php");
  endif; ?>
  
