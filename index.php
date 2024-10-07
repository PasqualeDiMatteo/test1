<?php
// Connessione al database
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

// Recupero delle opzioni dalle categorie specifiche
$sqlSedi = "SELECT nome_opzione, prezzo FROM opzioni_prodotto WHERE categoria = 'Numero sedi'";
$sedi = $conn->query($sqlSedi);

$sqlUtenti = "SELECT nome_opzione, prezzo FROM opzioni_prodotto WHERE categoria = 'Numero di utenti'";
$utenti = $conn->query($sqlUtenti);

$sqlMovimenti = "SELECT nome_opzione, prezzo FROM opzioni_prodotto WHERE categoria = 'Numero di movimenti'";
$movimenti = $conn->query($sqlMovimenti);

$conn->close();
?>


<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Configuratore Prodotto</title>
    <style>
        .container {
            margin: 20px;
        }

        .riepilogo {
            border: 1px solid #ccc;
            padding: 20px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Seleziona le opzioni del prodotto</h2>

        <label for="sedi">Numero di sedi:</label>
        <select id="sedi" onchange="aggiornaPrezzo()">
            <?php foreach ($sedi as $opzione) : ?>
                <option value="<?= $opzione['prezzo'] ?>"><?= $opzione['nome_opzione'] ?> (€<?= $opzione['prezzo'] ?>)</option>
            <?php endforeach; ?>
        </select><br><br>

        <label for="utenti">Numero di utenti:</label>
        <select id="utenti" onchange="aggiornaPrezzo()">
            <?php foreach ($utenti as $opzione) : ?>
                <option value="<?= $opzione['prezzo'] ?>"><?= $opzione['nome_opzione'] ?> (€<?= $opzione['prezzo'] ?>)</option>
            <?php endforeach; ?>
        </select><br><br>

        <label for="movimenti">Numero di movimenti annui:</label>
        <select id="movimenti" onchange="aggiornaPrezzo()">
            <?php foreach ($movimenti as $opzione) : ?>
                <option value="<?= $opzione['prezzo'] ?>"><?= $opzione['nome_opzione'] ?> (€<?= $opzione['prezzo'] ?>)</option>
            <?php endforeach; ?>
        </select><br><br>

        <label for="abbonamento">Tipo di abbonamento:</label>
        <select id="abbonamento" onchange="aggiornaPrezzo()">
            <option value="mensile">Mensile</option>
            <option value="annuale">Annuale (-20% di sconto)</option>
        </select><br><br>


        <div class="riepilogo">
            <h2>Riepilogo</h2>
            <p>Prezzo Totale: <span id="prezzo-totale">€ 0.00</span></p>
        </div>

        <!-- Form per inserire i dati di acquisto -->
        <h2>Inserisci i tuoi dati per l'acquisto</h2>
        <form action="acquisto.php" method="POST">
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" required><br><br>

            <label for="cognome">Cognome:</label>
            <input type="text" id="cognome" name="cognome" required><br><br>

            <label for="indirizzo">Indirizzo:</label>
            <input type="text" id="indirizzo" name="indirizzo" required><br><br>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required><br><br>

            <label for="codice_fiscale">Codice Fiscale:</label>
            <input type="text" id="codice_fiscale" name="codice_fiscale" required><br><br>

            <label for="partita_iva">Partita IVA:</label>
            <input type="text" id="partita_iva" name="partita_iva" required><br><br>

            <input type="submit" value="Acquista">
        </form>
    </div>

    <script>
        function aggiornaPrezzo() {
            let sedePrezzo = document.getElementById('sedi').value;
            let utentiPrezzo = document.getElementById('utenti').value;
            let movimentiPrezzo = document.getElementById('movimenti').value;
            let abbonamento = document.getElementById('abbonamento').value;
            let prezzoBase = parseFloat(sedePrezzo) + parseFloat(utentiPrezzo) + parseFloat(movimentiPrezzo);
            // Applica sconto per abbonamento annuale
            if (abbonamento === 'annuale') {
                prezzoBase = prezzoBase * 0.80;
            }
            document.getElementById('prezzo-totale').innerText = '€ ' + prezzoBase.toFixed(2);
        }
        aggiornaPrezzo();
    </script>
</body>

</html>