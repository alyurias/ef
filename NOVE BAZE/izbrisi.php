<?php
$servername = "localhost";
$username = "root";
$password = "sifra123";
$database = "bp_registracija_vozila";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Provjera da li je poslan ID korisnika za brisanje
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // SQL upit za brisanje korisnika iz baze
    $sql = "DELETE FROM vlasnik WHERE ID_vlasnik = $id";

    if ($conn->query($sql) === TRUE) {
        echo "Korisnik je uspješno obrisan.";
    } else {
        echo "Greška prilikom brisanja korisnika: " . $conn->error;
    }
} else {
    echo "Nije poslan ID korisnika za brisanje.";
}


$conn->close();
?>