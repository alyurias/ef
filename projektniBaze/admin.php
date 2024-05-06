<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $email = $_POST['email'];
    $lozinka = $_POST['lozinka'];

    if ($email == 'korisnik@example.com' && $lozinka == 'lozinka') {
        
        header("Location: admin2.php");
        exit();
    } else {
        
        echo "Pogrešno korisničko ime ili lozinka.";
    }
}
?>