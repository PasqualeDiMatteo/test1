<?php
//use PHPMailer\PHPMailer\PHPMailer;

//require '.\vendor\phpmailer\phpmailer\src\Exception.php';
//require '.\vendor\phpmailer\phpmailer\src\PHPMailer.php';
//require '.\vendor\phpmailer\phpmailer\src\SMTP.php';

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test1";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verifico la connessione
if ($conn->connect_error) {
    echo "Connessione fallita: " . $conn->connect_error;
    $conn->close();
}

// Prelevo i dati
$nome = $_POST['nome'];
$cognome = $_POST['cognome'];
$indirizzo = $_POST['indirizzo'];
$email = $_POST['email'];
$codice_fiscale = $_POST['codice_fiscale'];
$partita_iva = $_POST['partita_iva'];

// Preparo l'inserimento
$statement = $conn->prepare("INSERT INTO dati_acquisto (nome, cognome, indirizzo, email, codice_fiscale, partita_iva) VALUES (?, ?, ?, ?, ?, ?)");


if ($statement) {
    // Inserisco i parametri
    $statement->bind_param("ssssss", $nome, $cognome, $indirizzo, $email, $codice_fiscale, $partita_iva);

    if ($statement->execute()) {
        echo "Dati inseriti con successo!";
        //Metodo finto
        $to = $email;
        $subject = "Conferma acquisto";
        $message = "Grazie per il tuo acquisto, $nome $cognome!";
        $headers = "From: noreply@tuosito.com";
        echo "Email di conferma inviata.";
        //Metodo PHPMailer
        /*$mail = new PHPMailer(true);
        try {
            // Impostazioni del server SMTP
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = ''; // Email Gmail
            $mail->Password = ''; // La password dell'email Gmail
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;
            $mail->setFrom(''); // Mittente
            $mail->addAddress($email); // Destinatario
            // Contenuto dell'email
            $mail->isHTML(true);
            $mail->Subject = 'Conferma acquisto';
            $mail->Body = "Grazie per il tuo acquisto, $nome $cognome!";
            $mail->send();
            echo ' Email di conferma inviata.';
        } catch (Exception $e) {
            echo "Errore nell'invio dell'email. Errore: {$mail->ErrorInfo}";
        }*/
    }
}

$conn->close();
