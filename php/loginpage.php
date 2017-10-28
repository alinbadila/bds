<?php
session_start();
?>
<!DOCTYPE html>

<html>
<head>
    <meta charset="utf-8">

    <title>Baza de Date a Subunității</title>
    <link rel="stylesheet" type="text/css" href="../css/loginstyle.css">
</head>

<body>
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
</body>
</html>
