<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Početna</title>
    <link rel="stylesheet" href="admin.css">
    <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js"></script>
</head>
<body>
<header class="header">
    <div class="logo">
        <img src="1.png" alt="Logo">
    </div>
    <div class="navigation">
        <a class="button" href="index.html">
            <img src="3.png">
            <div class="logout">odjava</div>
        </a>
    </div>
    <br>
    <br>
</header>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<h1>Dobrodošli u RegAuto.</h1>
<div class="registration-details">
    <h2>Detalji o registraciji auta:</h2>
    <table>
        <thead>
        <tr>
            <th>Ime</th>
            <th>Prezime</th>
            <th>Vrsta vozila</th>
            <th>Model vozila</th>
            <th>Datum registracije</th>
            <th>Istek registracije</th>
            <th>Cijena registracije</th>
            <th colspan="2">Akcija</th>
        </tr>
        </thead>
        <tbody>
        <?php
        // Povezivanje s bazom podataka
        $servername = "localhost";
        $username = "root";
        $password = "sifra123";
        $database = "registracija_vozila";

        $conn = new mysqli($servername, $username, $password, $database);

        // Provjera konekcije
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // SQL upit za dohvaćanje korisnika i njihovih vozila
        $sql = "SELECT v.ID_vlasnik, v.ime, v.prezime, voz.marka, voz.model, r.datum_registracije, r.datum_isteka_reg, r.cijena_registracije
                FROM vlasnik v
                INNER JOIN vozilo voz ON v.ID_vlasnik = voz.ID_vlasnik
                INNER JOIN registracija r ON voz.ID_vozilo = r.ID_vozilo";

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Prikaz svih korisnika i njihovih vozila u tabeli
            while($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>".$row["ime"]."</td>
                        <td>".$row["prezime"]."</td>
                        <td>".$row["marka"]."</td>
                        <td>".$row["model"]."</td>
                        <td>".$row["datum_registracije"]."</td>
                        <td>".$row["datum_isteka_reg"]."</td>
                        <td>".$row["cijena_registracije"]."</td>
                        <td><a href='azuriraj.php?id=".$row["ID_vlasnik"]."'>AŽURIRAJ</a></td>
                        <td><a href='izbrisi.php?id=".$row["ID_vlasnik"]."' class='action-button delete-button'>IZBRIŠI</a></td>
                    </tr>";
            }
        } else {
            echo "<tr><td colspan='9'>Nema rezultata</td></tr>";
        }
        $conn->close();
        ?>
        </tbody>
    </table>
    
</div>
<div style="color:#1d1812">aaaa<br>aaaaa<br></div>
</body>
</html>
