<?php
  session_start();
  if ($_SESSION['id']): ?>
<!DOCTYPE html>

<html lang="ro">
<head>
    <title>B.D.S. - Angajați tura 2</title>
    <meta name='description' content='Angajatii subunitatii'>
    <meta name='keywords' content='website keywords, website keywords'>
    <meta http-equiv='content-type' content='text/html; charset=utf-8'>
    <link rel='stylesheet' type='text/css' href='css/style.css'>
    <link rel="stylesheet" type="text/css" href="css/jquery-ui.css">
    <script type="text/javascript" src="js/jquery.js">
</script>
    <script type="text/javascript" src="js/jquery-ui.js">
</script>
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
                    <li class='current'><a href='index.php'>Acasă</a></li>

                    <li class='current'><a href='angajati.php'>&lt; Angajați</a></li>

                    <li><a href='php/deconectare.php'>Ieșire</a></li>

                    <li class='session'><?php echo "logat ca " . $_SESSION['username'];?></li>
                </ul>
            </div><!--close menubar-->
        </nav>

        <div id='site_content'>
            <h2>Tura 2</h2>

            <div class="iconGrid">
                <?php 
                            $conn = mysqli_connect("localhost", "root", "Alin1984", "BDS");
                            if (! $conn ) {
                                # conectare nereusita
                                die("Conectare nereușită:".mysqli_connect_error());
                            }
                            $sql = "SELECT BDS.grade.GRAD, BDS.date_pers.NUME, BDS.date_pers.PRENUME, BDS.functii.FUNCTIE_DETALIATA 
                                    FROM BDS.grade
                                        INNER JOIN BDS.functii ON BDS.grade.ID_CADRU = BDS.functii.ID_CADRU
                                        INNER JOIN BDS.date_pers ON BDS.functii.ID_CADRU = BDS.date_pers.ID_CADRU
                                    WHERE BDS.functii.TURA = 2 and BDS.functii.ID_CADRU IS NOT NULL;";
                            $rezultat = $conn -> query($sql);
                            if (mysqli_num_rows($rezultat) > 0) {
                                // output data of each row
                                $nrcrt = 0;
                                echo "<div id=\"accordion\">";
                                while($row = mysqli_fetch_assoc($rezultat)) {
                                    $nrcrt++;
                                    echo "<h3>" . $nrcrt . ". " . $row["GRAD"]. " " . $row["NUME"] . " " . $row["PRENUME"]. " - " . $row["FUNCTIE_DETALIATA"] . "</h3>";
                                    echo "<div>" . "<p> Test accordion </p> <p>Test 2</p>" . "</div>";  
                                }
                                echo "</div>";
                            } else {
                                echo "0 rezultate";
                                }
                            mysqli_close($conn);    
                        ?>
            </div>

            <footer><a href='index.php'>Acasă</a> | <a href='contact.html'>Contact</a><br>
            <br></footer>
        </div>
    </div>
    <?php else: 
      header("Location: loginpage.php");
      endif; ?>
</body>
</html>
