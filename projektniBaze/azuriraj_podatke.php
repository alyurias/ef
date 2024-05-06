<?php
$servername = "localhost";
$username = "root";
$password = "sifra123";
$database = "registracija_vozila";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Provjera jesu li primljeni podaci iz forme
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Priprema podataka za bazu
    $id = $_POST['id'];
    $ime = $_POST['ime'];
    $prezime = $_POST['prezime'];
    $adresa = $_POST['adresa'];
    $broj_telefona = $_POST['telefon'];
    $marka = $_POST['marka'];
    $model = $_POST['model'];
    $godina_proizvodnje = $_POST['godina_proizvodnje'];
    $datum_registracije = $_POST['datum_registracije'];
    $datum_isteka_reg = $_POST['datum_isteka_reg'];
    $cijena_registracije = $_POST['cijena'];

    // SQL ažuriranje podataka korisnika
    $sql = "UPDATE vlasnik 
            LEFT JOIN vozilo ON vlasnik.ID_vlasnik = vozilo.ID_vlasnik 
            LEFT JOIN registracija ON vozilo.ID_vozilo = registracija.ID_vozilo 
            SET vlasnik.ime='$ime', vlasnik.prezime='$prezime', vlasnik.adresa='$adresa', vlasnik.broj_telefona='$broj_telefona',
            vozilo.marka='$marka', vozilo.model='$model', vozilo.godina_proizvodnje='$godina_proizvodnje',
            registracija.datum_registracije='$datum_registracije', registracija.datum_isteka_reg='$datum_isteka_reg',
            registracija.cijena_registracije='$cijena_registracije' 
            WHERE vlasnik.ID_vlasnik=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Podaci uspješno ažurirani.";
    } else {
        echo "Greška prilikom ažuriranja podataka: " . $conn->error;
    }
} else {
    echo "Podaci nisu primljeni putem forme.";
}

$conn->close();
?>
