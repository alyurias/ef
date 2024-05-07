<?php
$servername = "localhost";
$username = "root"; 
$password = "sifra123"; 
$dbname = "bp_registracija_vozila"; 

$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $lozinka = $_POST['lozinka'];

    // SQL upit za provjeru korisnika u bazi
    $sql = "SELECT * FROM vlasnik WHERE username='$email' AND password='$lozinka'";
    $result = $conn->query($sql);

   
    if ($result->num_rows > 0) {
      
        $row = $result->fetch_assoc();
        $vlasnikID = $row['ID_vlasnik'];

        // Informacije o vlasniku
        $vlasnik_sql = "SELECT * FROM vlasnik WHERE ID_vlasnik='$vlasnikID'";
        $vlasnik_result = $conn->query($vlasnik_sql);
        $vlasnik_row = $vlasnik_result->fetch_assoc();

        // Informacije o vozilu
        $vozilo_sql = "SELECT * FROM vozilo WHERE ID_vlasnik='$vlasnikID'";
        $vozilo_result = $conn->query($vozilo_sql);
        $vozilo_row = $vozilo_result->fetch_assoc();

        // Informacije o registraciji
        $registracija_sql = "SELECT * FROM registracija WHERE ID_vozilo='{$vozilo_row['ID_vozilo']}'";
        $registracija_result = $conn->query($registracija_sql);
        $registracija_row = $registracija_result->fetch_assoc();

       
        $html_content = "
        <!DOCTYPE html>
        <html lang='en'>
        <head>
            <meta charset='UTF-8'>
            <meta name='viewport' content='width=device-width, initial-scale=1.0'>
            <title>Početna</title>
            <link rel='stylesheet' href='dashboard.css'>
            <script src='https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js'></script>
        </head>
        <body>
            <header class='header'>
                <div class='logo'>
                    <img src='1.png' alt='Logo'>
                </div>
                <div class='navigation'>
                    <a class='button' href='index.html'>
                        <img src='3.png'>
                        <div class='logout'>odjava</div>
                    </a>
                </div>
                <br>
                <br>
            </header>
            <h1>Dobrodošli u RegAuto.</h1>
            <div class='registration-details'>
                <h2>Vaši detalji o registraciji auta:</h2>
                <table>
                    <thead>
                        <tr>
                            <th>Vrsta vozila</th>
                            <th>Model vozila</th>
                            <th>Datum registracije</th>
                            <th>Istek registracije</th>
                            <th>Cijena registracije</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>" . $vozilo_row['marka'] . "</td>
                            <td>" . $vozilo_row['model'] . "</td>
                            <td>" . $registracija_row['datum_registracije'] . "</td>
                            <td>" . $registracija_row['datum_isteka_reg'] . "</td>
                            <td>" . $registracija_row['cijena_registracije'] . "</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </body>
        </html>";

       
        echo $html_content;
    } else {
        
        echo "Pogrešno korisničko ime ili lozinka.";
    }
}


$conn->close();
?>
