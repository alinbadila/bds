
<?php
/* Procedura afiseaza in tabel persoanele aflate in concediu la data primita ca parametru. */
  function afiseazaConcedii($conn) {
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
        echo "<p class=\"text-warning\">Nicio persoana nu se afla in concediu de odihna sau suplimentar in data mentionata.</p>";
    } else {
        echo  "<table class=\"table table-dark table-striped\">";
          echo "<thead class=\"thead-light\">";
            echo "<tr>";
              echo "<th>Nr.crt.</th>";
              echo "<th>Grad</th>";
              echo "<th>Nume și prenume</th>";
              echo "<th>Data inceput</th>";
              echo "<th>Data sfarsit</th>";
              echo "<th>Tip concediu</th>";
              echo "<th>Tura</th>";
            echo "</tr>";
          echo "</thead>";
          echo "<tbody>";
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
          echo "</tbody>";
        echo "</table>";
        }
    $query -> closeCursor();
  }

/* Procedura afiseaza in tabel persoanele aflate in concediu medical la data primita ca parametru */
function afiseazaConcediiMedicale($conn) {
  $sql = "SELECT  BDS.grade.GRAD, BDS.date_pers.NUME, BDS.date_pers.PRENUME,
                  BDS.concedii_medicale.DATA_INCEPUT, BDS.concedii_medicale.DATA_SFARSIT,
                  BDS.concedii_medicale.DIAGNOSTIC, BDS.concedii_medicale.COD_DIAGNOSTIC, BDS.functii.TURA
          FROM BDS.grade
                  INNER JOIN BDS.concedii_medicale ON BDS.grade.ID_CADRU = BDS.concedii_medicale.ID_CADRU
                  INNER JOIN BDS.date_pers ON BDS.grade.ID_CADRU = BDS.date_pers.ID_CADRU
                  INNER JOIN BDS.functii ON BDS.grade.ID_CADRU = BDS.functii.ID_CADRU
          WHERE (BDS.functii.ID_CADRU IS NOT NULL) and
                (CURDATE() >= BDS.concedii_medicale.DATA_INCEPUT and CURDATE() <= BDS.concedii_medicale.DATA_SFARSIT)
          ORDER BY BDS.functii.TURA;";
  $query = $conn->prepare($sql);
  $query -> execute();
  $rezultat = $query -> fetchAll();
  if (!$rezultat) {
      echo "<p class=\"text-warning\">Nicio persoana nu se afla in concediu medical la data mentionata.</p>";
  } else {
      echo  "<table class=\"table table-dark table-striped\">";
        echo "<thead class=\"thead-light\">";
          echo "<tr>";
            echo "<th>Nr.crt.</th>";
            echo "<th>Grad</th>";
            echo "<th>Nume și prenume</th>";
            echo "<th>Data inceput</th>";
            echo "<th>Data sfarsit</th>";
            echo "<th>Diagnostic</th>";
            echo "<th>Cod diagnostic</th>";
            echo "<th>Tura</th>";
          echo "</tr>";
        echo "</thead>";
        echo "<tbody>";
            $nrcrt = 0;
            foreach ($rezultat as $rand) {
                $nrcrt++;
                echo "<tr>";
                echo "<td>" . $nrcrt . "</td>";
                echo "<td>" . $rand["GRAD"] . "</td>";
                echo "<td>" . $rand["NUME"] . " " . $rand["PRENUME"] . "</td>";
                echo "<td>" . $rand["DATA_INCEPUT"] . "</td>";
                echo "<td>" . $rand["DATA_SFARSIT"] . "</td>";
                echo "<td>" . $rand["DIAGNOSTIC"] . "</td>";
                echo "<td>" . $rand["COD_DIAGNOSTIC"] . "</td>";
                echo "<td>" . $rand["TURA"] . "</td>";
                echo "</tr>";
              }
        echo "</tbody>";
      echo "</table>";
      }
  $query -> closeCursor();
  }

  /* Procedura afiseaza in tabel persoanele aflate la cursuri in data primita ca parametru */
  function afiseazaCursuri($conn) {
    $sql = "SELECT  BDS.grade.GRAD, BDS.date_pers.NUME, BDS.date_pers.PRENUME,
                    BDS.cursuri.TIP_CURS, BDS.cursuri.DESCRIERE, BDS.cursuri.LOCATIE,
                    BDS.cursuri.DATA_INCEPUT, BDS.cursuri.DATA_SFARSIT, BDS.functii.TURA
            FROM BDS.grade
                    INNER JOIN BDS.cursuri ON BDS.grade.ID_CADRU = BDS.cursuri.ID_CADRU
                    INNER JOIN BDS.date_pers ON BDS.grade.ID_CADRU = BDS.date_pers.ID_CADRU
                    INNER JOIN BDS.functii ON BDS.grade.ID_CADRU = BDS.functii.ID_CADRU
            WHERE (BDS.functii.ID_CADRU IS NOT NULL) and
                  (CURDATE() >= BDS.cursuri.DATA_INCEPUT and CURDATE() <= BDS.cursuri.DATA_SFARSIT)
            ORDER BY BDS.functii.TURA;";
    $query = $conn->prepare($sql);
    $query -> execute();
    $rezultat = $query -> fetchAll();
    if (!$rezultat) {
        echo "<p class=\"text-warning\">Nicio persoana nu se afla la curs in data mentionata.</p>";
    } else {
        echo  "<table class=\"table table-dark table-striped\">";
          echo "<thead class=\"thead-light\">";
            echo "<tr>";
              echo "<th>Nr.crt.</th>";
              echo "<th>Grad</th>";
              echo "<th>Nume și prenume</th>";
              echo "<th>Tipul cursului</th>";
              echo "<th>Descrierea cursului</th>";
              echo "<th>Locul desfasurarii</th>";
              echo "<th>Data inceput</th>";
              echo "<th>Data sfarsit</th>";
              echo "<th>Tura</th>";
            echo "</tr>";
          echo "</thead>";
          echo "<tbody>";
              $nrcrt = 0;
              foreach ($rezultat as $rand) {
                  $nrcrt++;
                  echo "<tr>";
                  echo "<td>" . $nrcrt . "</td>";
                  echo "<td>" . $rand["GRAD"] . "</td>";
                  echo "<td>" . $rand["NUME"] . " " . $rand["PRENUME"] . "</td>";
                  echo "<td>" . $rand["TIP_CURS"] . "</td>";
                  echo "<td>" . $rand["DESCRIERE"] . "</td>";
                  echo "<td>" . $rand["LOCATIE"] . "</td>";
                  echo "<td>" . $rand["DATA_INCEPUT"] . "</td>";
                  echo "<td>" . $rand["DATA_SFARSIT"] . "</td>";
                  echo "<td>" . $rand["TURA"] . "</td>";
                  echo "</tr>";
                }
          echo "</tbody>";
        echo "</table>";
        }
    $query -> closeCursor();
  }

  /* Procedura afiseaza in tabel persoanele aflate in liber sau recuperare in data mentionata.*/
  function afiseazaLibere($conn) {
    $sql = "SELECT  BDS.grade.GRAD, BDS.date_pers.NUME, BDS.date_pers.PRENUME,
                    BDS.libere.DATA_INCEPUT, BDS.libere.DATA_SFARSIT, BDS.functii.TURA, BDS.libere.OBS
            FROM BDS.grade
                    INNER JOIN BDS.libere ON BDS.grade.ID_CADRU = BDS.libere.ID_CADRU
                    INNER JOIN BDS.date_pers ON BDS.grade.ID_CADRU = BDS.date_pers.ID_CADRU
                    INNER JOIN BDS.functii ON BDS.grade.ID_CADRU = BDS.functii.ID_CADRU
            WHERE (BDS.functii.ID_CADRU IS NOT NULL) and
                  (CURDATE() >= BDS.libere.DATA_INCEPUT and CURDATE() <= BDS.libere.DATA_SFARSIT)
            ORDER BY BDS.functii.TURA;";
    $query = $conn->prepare($sql);
    $query -> execute();
    $rezultat = $query -> fetchAll();
    if (!$rezultat) {
        echo "<p class=\"text-warning\">Nicio persoana nu este in liber la data mentionata.</p>";
    } else {
        echo  "<table class=\"table table-dark table-striped\">";
          echo "<thead class=\"thead-light\">";
            echo "<tr>";
              echo "<th>Nr.crt.</th>";
              echo "<th>Grad</th>";
              echo "<th>Nume și prenume</th>";
              echo "<th>Data inceput</th>";
              echo "<th>Data sfarsit</th>";
              echo "<th>Tura</th>";
              echo "<th>Observatii</th>";
            echo "</tr>";
          echo "</thead>";
          echo "<tbody>";
              $nrcrt = 0;
              foreach ($rezultat as $rand) {
                  $nrcrt++;
                  echo "<tr>";
                  echo "<td>" . $nrcrt . "</td>";
                  echo "<td>" . $rand["GRAD"] . "</td>";
                  echo "<td>" . $rand["NUME"] . " " . $rand["PRENUME"] . "</td>";
                  echo "<td>" . $rand["DATA_INCEPUT"] . "</td>";
                  echo "<td>" . $rand["DATA_SFARSIT"] . "</td>";
                  echo "<td>" . $rand["TURA"] . "</td>";
                  echo "<td>" . $rand["OBS"] . "</td>";
                  echo "</tr>";
                }
          echo "</tbody>";
        echo "</table>";
        }
    $query -> closeCursor();
  }

  /* Procedura afiseaza in tabel persoanele aflate in misiune in data mentionata.*/
  function afiseazaMisiuni($conn) {
    $sql = "SELECT  BDS.grade.GRAD, BDS.date_pers.NUME, BDS.date_pers.PRENUME,
                    BDS.misiuni.DATA_INCEPUT, BDS.misiuni.DATA_SFARSIT, BDS.functii.TURA, BDS.misiuni.DESCRIERE
            FROM BDS.grade
                    INNER JOIN BDS.misiuni ON BDS.grade.ID_CADRU = BDS.misiuni.ID_CADRU
                    INNER JOIN BDS.date_pers ON BDS.grade.ID_CADRU = BDS.date_pers.ID_CADRU
                    INNER JOIN BDS.functii ON BDS.grade.ID_CADRU = BDS.functii.ID_CADRU
            WHERE (BDS.functii.ID_CADRU IS NOT NULL) and
                  (CURDATE() >= BDS.misiuni.DATA_INCEPUT and CURDATE() <= BDS.misiuni.DATA_SFARSIT)
            ORDER BY BDS.functii.TURA;";
    $query = $conn->prepare($sql);
    $query -> execute();
    $rezultat = $query -> fetchAll();
    if (!$rezultat) {
        echo "<p class=\"text-warning\">Nicio persoana nu se afla in misiune la data mentionata.</p>";
    } else {
        echo  "<table class=\"table table-dark table-striped\">";
          echo "<thead class=\"thead-light\">";
            echo "<tr>";
              echo "<th>Nr.crt.</th>";
              echo "<th>Grad</th>";
              echo "<th>Nume și prenume</th>";
              echo "<th>Data inceput</th>";
              echo "<th>Data sfarsit</th>";
              echo "<th>Descriere misiune</th>";
              echo "<th>Tura</th>";
            echo "</tr>";
          echo "</thead>";
          echo "<tbody>";
              $nrcrt = 0;
              foreach ($rezultat as $rand) {
                  $nrcrt++;
                  echo "<tr>";
                  echo "<td>" . $nrcrt . "</td>";
                  echo "<td>" . $rand["GRAD"] . "</td>";
                  echo "<td>" . $rand["NUME"] . " " . $rand["PRENUME"] . "</td>";
                  echo "<td>" . $rand["DATA_INCEPUT"] . "</td>";
                  echo "<td>" . $rand["DATA_SFARSIT"] . "</td>";
                  echo "<td>" . $rand["DESCRIERE"] . "</td>";
                  echo "<td>" . $rand["TURA"] . "</td>";
                  echo "</tr>";
                }
          echo "</tbody>";
        echo "</table>";
        }
    $query -> closeCursor();
  }


  /* Procedura afiseaza in tabel persoanele aflate nascute in data mentionata.*/
  function afiseazaSarbatoriti($conn) {
    $sql = "SELECT  BDS.grade.GRAD, BDS.date_pers.NUME, BDS.date_pers.PRENUME, BDS.functii.TURA
            FROM BDS.grade
                    INNER JOIN BDS.date_pers ON BDS.grade.ID_CADRU = BDS.date_pers.ID_CADRU
                    INNER JOIN BDS.functii ON BDS.grade.ID_CADRU = BDS.functii.ID_CADRU
            WHERE (BDS.functii.ID_CADRU IS NOT NULL) and
                  (MONTH(BDS.date_pers.DATA_NASTERII) = MONTH(CURDATE()) AND DAY(BDS.date_pers.DATA_NASTERII) = DAY(CURDATE()))
            ORDER BY BDS.functii.TURA;";
    $query = $conn->prepare($sql);
    $query -> execute();
    $rezultat = $query -> fetchAll();
    if (!$rezultat) {
        echo "<p class=\"text-warning\">Nicio persoana nu are ziua de nastere in ziua mentionata.</p>";
    } else {
        echo  "<table class=\"table table-dark table-striped\">";
          echo "<thead class=\"thead-light\">";
            echo "<tr>";
              echo "<th>Nr.crt.</th>";
              echo "<th>Grad</th>";
              echo "<th>Nume și prenume</th>";
              echo "<th>Varsta</th>";
              echo "<th>Tura</th>";
            echo "</tr>";
          echo "</thead>";
          echo "<tbody>";
              $nrcrt = 0;
              foreach ($rezultat as $rand) {
                  $nrcrt++;
                  echo "<tr>";
                  echo "<td>" . $nrcrt . "</td>";
                  echo "<td>" . $rand["GRAD"] . "</td>";
                  echo "<td>" . $rand["NUME"] . " " . $rand["PRENUME"] . "</td>";
                  echo "<td>" . intval(date('Y') - date('Y', strtotime($rand["DATA_NASTERII"]))) . $rand["DATA_NASTERII"] . "</td>";
                  echo "<td>" . $rand["TURA"] . "</td>";
                  echo "</tr>";
                }
          echo "</tbody>";
        echo "</table>";
        }
    $query -> closeCursor();
  }
?>
