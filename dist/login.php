<?php
// Provjera je li obrazac za prijavu podnesen
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Provjera korisničkih podataka (možete dodati svoju logiku za provjeru baze podataka ili korisničkih podataka)
    $email = $_POST['email'];
    $lozinka = $_POST['lozinka'];

    // Primjer provjere korisničkih podataka (možete promijeniti ovaj dio prema vašim potrebama)
    if ($email == 'korisnik@example.com' && $lozinka == 'lozinka') {
        // Ako su korisnički podaci ispravni, preusmjeri korisnika na dashboard.html
        header("Location: dashboard.html");
        exit(); // Odmah prekinite izvođenje skripte nakon preusmjeravanja
    } else {
        // Ako korisnički podaci nisu ispravni, možete dodati odgovarajuću logiku, kao što je prikazivanje poruke o pogrešci ili preusmjeravanje natrag na prijavu
        echo "Pogrešno korisničko ime ili lozinka.";
    }
}
?>