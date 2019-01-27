<!-- Procedura afiseaza in tabel persoanele aflate in concediu la data primita ca parametru-->
<?php
  function afiseazaConcedii() {
    try {
        $conn = new PDO('mysql:host=aluna.go.ro;dbname=BDS;charset=utf8', $_SESSION['dbusername'], $_SESSION['dbpassword']);
    } catch (Exception $e) {
        die('Eroare : '.$e->getMessage());
    }
    $sql = "SELECT  BDS.grade.GRAD, BDS.date_pers.NUME, BDS.date_pers.PRENUME,
                    BDS.concedii.DATA_INCEPUT, BDS.concedii.DATA_SFARSIT, BDS.concedii.TIP,
                    BDS.functii.TURA
            FROM BDS.grade
                    INNER JOIN BDS.concedii ON BDS.grade.ID_CADRU = BDS.concedii.ID_CADRU
                    INNER JOIN BDS.date_pers ON BDS.grade.ID_CADRU = BDS.date_pers.ID_CADRU
                    INNER JOIN BDS.functii ON BDS.grade.ID_CADRU = BDS.functii.ID_CADRU
            WHERE (BDS.concedii.VALID = 1) and (BDS.functii.ID_CADRU IS NOT NULL) and
                  (CURDATE() >= BDS.concedii.DATA_INCEPUT and CURDATE() <= BDS.concedii.DATA_SFARSIT)
            ORDER BY BDS.functii.TURA;";
    $query = $conn->prepare($sql);
    $query -> execute();
    $rezultat = $query -> fetchAll();
    if (!$rezultat) {
        echo "Nicio persoana nu se afla in concediu de odihna sau suplimentar in data mentionata.";
    } else: ?>
        <table class="table table-dark table-striped">
          <thead class="thead-light">
            <tr>
              <th>Nr.crt.</th>
              <th>Grad</th>
              <th>Nume și prenume</th>
              <th>Data inceput</th>
              <th>Data sfarsit</th>
              <th>Tip concediu</th>
              <th>Tura</th>
            </tr>
          </thead>
          <tbody>
          <?php
              $nrcrt = 0;
              foreach ($rezultat as $rand) {
                  $nrcrt++;
                  echo "<tr>";
                  echo "<td>" . $nrcrt . "</td>";
                  echo "<td>" . $rand["GRAD"] . "</td>";
                  echo "<td>" . $rand["NUME"] . " " . $rand["PRENUME"] . "</td>";
                  echo "<td>" . $rand["DATA_INCEPUT"] . "</td>";
                  echo "<td>" . $rand["DATA_SFARSIT"] . "</td>";
                  echo "<td>" . $rand["TIP"] . "</td>";
                  echo "<td>" . $rand["TURA"] . "</td>";
                  echo "</tr>";
                }
          ?>
          </tbody>
        </table>
    <? endif; ?>
    <?
    $query -> closeCursor();
    $conn = null;
  }
?>
