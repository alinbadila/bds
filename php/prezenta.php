<?php
  session_start();
  if ($_SESSION['id']): ?>
<!DOCTYPE html>

<html lang="ro">
<head>
    <title>B.D.S. - Prezența</title>
    <meta name='description' content='Angajatii subunitatii'>
    <meta name='keywords' content='website keywords, website keywords'>
    <meta http-equiv='content-type' content='text/html; charset=utf-8'>
    <link rel='stylesheet' type='text/css' href='../css/style.css'>
</head>

<body>
    <div id='main'>
        <nav>
            <div id='menubar'>
                <ul id='nav'>
                    <li class='current'><a href='../index.php'>Acasă</a></li>

                    <li><a href='deconectare.php'>Ieșire</a></li>

                    <li class='session'><?php echo "logat ca " . $_SESSION['username'];?></li>
                </ul>
            </div><!--close menubar-->
        </nav>

        <div id='site_content'>
            <h2>Personalul subunității</h2>

            <div class="iconGrid">
	            <div class="iconContainer">
                    <a href="angajati8ore.php"><img class="iconClass" src="../icons/8ore.png" alt="Angajati 8 ore"><span class="caption">Program de 8 ore</span></a>
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

            <footer><a href='../index.php'>Acasă</a> | <a>Contact</a><br>
            <br></footer>
        </div>
    </div>
    <?php else: 
      header("Location: loginpage.php");
      endif; ?>
</body>
</html>
