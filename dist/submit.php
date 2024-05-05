<?php
// Povezivanje na bazu podataka
$servername = "localhost";
$username = "root";
$password = "sifra123";
$dbname = "registracija_vozila";

$conn = new mysqli($servername, $username, $password, $dbname);

// Provjera konekcije
if ($conn->connect_error) {
    die("Neuspjela konekcija: " . $conn->connect_error);
}

// Prihvaćanje podataka iz forme
$ime = $_POST['ime'];
$prezime = $_POST['prezime'];
$email = $_POST['email'];
$lozinka = $_POST['lozinka'];
$model = $_POST['model'];
$datum_registracije = $_POST['datum_registracije'];
$broj_telefona = $_POST['broj_telefona'];
$adresa_vlasnika = $_POST['adresa_vlasnika'];
$marka_vozila = $_POST['marka_vozila'];
$godina_proizvodnje = $_POST['godina_proizvodnje'];

// Ubacivanje vlasnika u tabelu 'vlasnik'
$sql_vlasnik = "INSERT INTO vlasnik (ime, prezime, adresa, broj_telefona, username, password) 
                VALUES ('$ime', '$prezime', '$adresa_vlasnika', '$broj_telefona', '$email', '$lozinka')";
if ($conn->query($sql_vlasnik) === TRUE) {
    echo "Podaci o vlasniku su uspješno uneseni.";
} else {
    echo "Greška prilikom unosa podataka o vlasniku: " . $conn->error;
}



// Ubacivanje vozila u tabelu 'vozilo'
$sql_vozilo = "INSERT INTO vozilo (ID_vlasnik, marka, model, godina_proizvodnje) 
               VALUES ('$last_vlasnik_id', '$marka_vozila', '$model', '$godina_proizvodnje')";
if ($conn->query($sql_vozilo) === TRUE) {
    $last_vozilo_id = $conn->insert_id;
} else {
    echo "Error: " . $sql_vozilo . "<br>" . $conn->error;
}

// Ubacivanje registracije u tabelu 'registracija'
$sql_registracija = "INSERT INTO registracija (ID_vozilo, datum_registracije, datum_isteka_reg, cijena_registracije, kategorija) 
                     VALUES ('$last_vozilo_id', '$datum_registracije', DATE_ADD('$datum_registracije', INTERVAL 1 YEAR), '450.00 KM', 'Lični automobil')";
if ($conn->query($sql_registracija) === TRUE) {
    echo "Podaci su uspješno uneseni.";
} else {
    echo "Error: " . $sql_registracija . "<br>" . $conn->error;
}

$conn->close();







?>
