<?php
$servername = "localhost";
$username = "root";
$password = "sifra123";
$database = "registracija_vozila";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Provjera je li primljen ID korisnika
if(isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];
    
    // SQL upit za dohvaćanje podataka korisnika prema primljenom ID-u
    $sql = "SELECT vlasnik.*, vozilo.marka, vozilo.model, vozilo.godina_proizvodnje, registracija.datum_registracije, registracija.datum_isteka_reg, registracija.cijena_registracije FROM vlasnik 
            LEFT JOIN vozilo ON vlasnik.ID_vlasnik = vozilo.ID_vlasnik 
            LEFT JOIN registracija ON vozilo.ID_vozilo = registracija.ID_vozilo 
            WHERE vlasnik.ID_vlasnik = $id";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
       
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Ažuriranje podataka korisnika</title>
            <link rel="stylesheet" href="azuriraj.css">
        </head>
        <body>
        
        <div class="container">
        <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
            <h1>Ažuriranje podataka korisnika</h1>
            <form action="azuriraj_podatke.php" method="POST">
                <input type="hidden" name="id" value="<?php echo $row['ID_vlasnik']; ?>">
                <label for="ime">Ime:</label>
                <input type="text" id="ime" name="ime" value="<?php echo $row['ime']; ?>"><br><br>
                <label for="prezime">Prezime:</label>
                <input type="text" id="prezime" name="prezime" value="<?php echo $row['prezime']; ?>"><br><br>
                <label for="adresa">Adresa:</label>
                <input type="text" id="adresa" name="adresa" value="<?php echo $row['adresa']; ?>"><br><br>
                <label for="telefon">Broj telefona:</label>
                <input type="text" id="telefon" name="telefon" value="<?php echo $row['broj_telefona']; ?>"><br><br>
                <label for="marka">Marka vozila:</label>
                <input type="text" id="marka" name="marka" value="<?php echo $row['marka']; ?>"><br><br>
                <label for="model">Model vozila:</label>
                <input type="text" id="model" name="model" value="<?php echo $row['model']; ?>"><br><br>
                <label for="godina_proizvodnje">Godina proizvodnje:</label>
                <input type="text" id="godina_proizvodnje" name="godina_proizvodnje" value="<?php echo $row['godina_proizvodnje']; ?>"><br><br>
                <label for="datum_registracije">Datum registracije:</label>
                <input type="text" id="datum_registracije" name="datum_registracije" value="<?php echo $row['datum_registracije']; ?>"><br><br>
                <label for="datum_isteka_reg">Datum isteka registracije:</label>
                <input type="text" id="datum_isteka_reg" name="datum_isteka_reg" value="<?php echo $row['datum_isteka_reg']; ?>"><br><br>
                <label for="cijena">Cijena registracije:</label>
                <input type="text" id="cijena" name="cijena" value="<?php echo $row['cijena_registracije']; ?>"><br><br>
               

                <button type="submit">Ažuriraj podatke</button>
            </form>
        </div>
        </body>
        </html>
        <?php
    } else {
        echo "Nema rezultata za ID: " . $id;
    }
} else {
    echo "ID korisnika nije primljen.";
}

$conn->close();
?>
