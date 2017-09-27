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
            <li><a href='projects.html'>Projects</a></li>
            <li><a href='contact.html'>Contact Us</a></li>
            <li><a href='php/deconectare.php'>Ieșire</a></li>
          </ul>
        </div><!--close menubar-->
      </nav>

  	<div id='site_content'>

  	  <div id='content'>
          <div class='content_item'>
  		  <h1>Welcome To Your Website</h1>
            <p>This standards compliant, simple, fixed width website template is
            released as an 'open source' design (under the Creative Commons Attribution
            3.0 Licence), which means that you are free to download and use it for anything
            you want (including modifying and amending it). If you wish to remove the
            &ldquo;website template by Free HTML5 Templates&rdquo;, all I ask is for a
            donation of &pound;20.00 GBP. Please feel free to contact me with any questions
            you may have about my free HTML5 website templates or bespoke work.</p>

  		  <div class='content_imagetext'>
  		    <div class='content_image'>
  		      <img src='images/image1.jpg' alt='image1'/>
  	        </div>
  		    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi elit sapien, tempus sit amet hendrerit volutpat, euismod vitae risus. Etiam consequat, sem et 			vulputate dapibus, diam enim tristique est, vitae porta eros mauris ut orci. Praesent sed velit odio. Ut massa arcu, suscipit viverra molestie at, aliquet a metus. 			Nullam sit amet tellus dui, ut tincidunt justo. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec iaculis egestas laoreet. Nunc non ipsum metus, non 			laoreet urna. Vestibulum quis risus quis diam mattis tempus. Vestibulum suscipit pretium tempor. </p>
  		  </div><!--close content_imagetext-->

  		  <div class='content_container'>
  		    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque cursus tempor enim. Aliquam facilisis neque non nunc posuere eget volutpat metus 					tincidunt.</p>
  		  	<div class='button_small'>
  		      <a href='#'>Read more</a>
  		    </div><!--close button_small-->
  		  </div><!--close content_container-->
            <div class='content_container'>
  		    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque cursus tempor enim. Aliquam facilisis neque non nunc posuere eget volutpat metus 					tincidunt.</p>
  		  	<div class='button_small'>
  		      <a href='#'>Read more</a>
  		    </div><!--close button_small-->
  		  </div><!--close content_container-->
            <div class='content_container'>
  		    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque cursus tempor enim. Aliquam facilisis neque non nunc posuere eget volutpat metus 					tincidunt.</p>
  		  	<div class='button_small'>
  		      <a href='i#'>Read more</a>
  		    </div><!--close button_small-->
  		  </div><!--close content_container-->

  		</div><!--close content_item-->
        </div><!--close content-->
  	</div><!--close site_content-->
    </div><!--close main-->

      <footer>
  	  <a href='index.php'>Home</a> | <a href='ourwork.html'>Our Work</a> | <a href='testimonials.html'>Testimonials</a> | <a href='projects.html'>Projects</a> | <a href='contact.html'>Contact</a><br/><br/>
      </footer>

    <!-- javascript at the bottom for fast page loading -->
    <script type='text/javascript' src='js/jquery.js'></script>
    <script type='text/javascript' src='js/image_slide.js'></script>

  </body>
  </html>
<?php else: 
  header("Location: loginpage.php");
  endif; ?>
  
