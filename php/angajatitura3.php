<?php
  session_start();
  if ($_SESSION['id']): ?>
<!DOCTYPE html>

<html lang="ro">
<head>
    <title>B.D.S. - Angajați tura 3</title>
    <meta name='description' content='Angajatii subunitatii'>
    <meta name='keywords' content='website keywords, website keywords'>
    <meta http-equiv='content-type' content='text/html; charset=utf-8'>
    <link rel='stylesheet' type='text/css' href='../css/style.css'>
    <link rel="stylesheet" type="text/css" href="../css/jquery-ui.css">
    <script type="text/javascript" src="../js/jquery.js"></script>
    <script type="text/javascript" src="../js/jquery-ui.js"></script>
    <script type="text/javascript">
    $( function() {
            $( "#accordion" ).accordion();
        } );
    </script>
</head>

<body>
    <div id='main'>
        <nav>
            <div id='menubar'>
                <ul id='nav'>
                    <li class='current'><a href='../index.php'>Acasă</a></li>

                    <li class='current'><a href='angajati.php'>&lt; Angajați</a></li>

                    <li><a href='deconectare.php'>Ieșire</a></li>

                    <li class='session'><?php echo "logat ca " . $_SESSION['username'];?></li>
                </ul>
            </div><!--close menubar-->
        </nav>

        <div id='site_content'>
            <h2>Tura 3</h2>

            <div class="iconGrid">
                <?php
	            try {
					$conn = new PDO('mysql:host=aluna.go.ro;dbname=BDS;charset=utf8', $_SESSION['dbusername'], $_SESSION['dbpassword']);
				}
				catch(Exception $e) {
					die('Eroare : '.$e->getMessage());
				}    
	            $sql = "SELECT BDS.grade.GRAD, BDS.date_pers.NUME, BDS.date_pers.PRENUME, BDS.functii.FUNCTIE_DETALIATA
                        FROM BDS.grade
                            INNER JOIN BDS.functii ON BDS.grade.ID_CADRU = BDS.functii.ID_CADRU
                            INNER JOIN BDS.date_pers ON BDS.functii.ID_CADRU = BDS.date_pers.ID_CADRU
                        WHERE (BDS.functii.TURA = 3) and (BDS.functii.ID_CADRU IS NOT NULL);";    
	            $query = $conn->prepare($sql);    
	            $query -> execute();
	            $rezultat = $query -> fetchAll();
	            if (!$rezultat) {
		            echo "Niciun rezultat.";
	            } else {
		            $nrcrt = 0;
		            echo "<div id=\"accordion\">";
		            foreach ($rezultat as $rand) {
			            $nrcrt++;
			            echo "<h3>" . $nrcrt . ". " . $rand["GRAD"]. " " . $rand["NUME"] . " " . $rand["PRENUME"]. " - " . $rand["FUNCTIE_DETALIATA"] . "</h3>";
                        echo "<div>" . "<p> Test accordion </p> <p>Test 2</p>" . "</div>";
		            }
		            echo "</div>";   
	            }
	            $query -> closeCursor();
				$conn = NULL;
                ?>
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
