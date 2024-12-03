<?php
$servername = "127.0.0.1";
$username = "root";
$password = ""; // Standardpasswort ist bei root wohl leer, musste auch nichts anlegen
$dbname = "tierheimat";

$conn = new mysqli($servername, $username, $password, $dbname);//wenn Verbindung erfolgreich sollte ein mysqli Objekt zurückgegeben werden das in der Variablen $conn gespeichert wird

// Verbindung pruefen
if ($conn->connect_error) {
    die("Verbindung fehlgeschlagen: " . $conn->connect_error);
}
echo "Verbindung erfolgreich\n";
//"die" Funktion beendet direkt da php skript, heißt danach wird nichts mehr ausgeführt und nur die Fehlermeldung ausgegeben
$sql_befehle = [ // TODO: erst CREATE TABLE, dann INSERT
    "CREATE TABLE IF NOT EXISTS Tierart (TierartID INT AUTO_INCREMENT PRIMARY KEY, Tierart VARCHAR(50) NOT NULL)",
    "INSERT INTO Tierart (Tierart) VALUES ('Hund')",
    "INSERT INTO Tierart (Tierart) VALUES ('Katze')",
    "INSERT INTO Tierart (Tierart) VALUES ('Vogel')",
    "CREATE TABLE IF NOT EXISTS Rasse (RasseID INT AUTO_INCREMENT PRIMARY KEY, TierartID INT NOT NULL, Rasse VARCHAR(50) NOT NULL, FOREIGN KEY (TierartID) REFERENCES Tierart(TierartID))",
    "INSERT INTO Rasse (TierartID, Rasse) VALUES (1, 'Golden Retriever')",
    "INSERT INTO Rasse (TierartID, Rasse) VALUES (2, 'Perser')",
    "CREATE TABLE IF NOT EXISTS Nutzerrollen (NutzerrollenID INT AUTO_INCREMENT PRIMARY KEY, Rolle VARCHAR(50) NOT NULL)",
    "INSERT INTO Nutzerrollen (Rolle) VALUES ('Administrator')",
    "INSERT INTO Nutzerrollen (Rolle) VALUES ('Betreuer')",
    // Weitere Befehle erst wenn das hier wirklich klappen sollte →trial
];
//query → Anfrage | Befehl welcher an die DB gesendet wird, Rückgabe ist dabei wahr oder falsch  
foreach ($sql_befehle as $befehl) {
    if ($conn->query($befehl) === TRUE) {
        echo "Befehl erfolgreich ausgefuehrt: $befehl\n";
    } else {
        echo "Fehler bei Befehl: $befehl\n" . $conn->error . "\n";
    }
}
/* for each beispiel aus dem Netz in zusammenhang mit Arrays war zb:
  $alter = [
    "Hund" => 5,
    "Katze" => 7,
    "Vogel" => 2
];

foreach ($alter as $tier => $jahre) {
    echo "$tier ist $jahre Jahre alt\n";
}
*/  
$conn->close(); //con close wird aus best practice Gründen gemacht, ist eigentlich nicht notwendig, da php anscheinend das skript selber beendet
echo "Verbindung geschlossen.\n";
?>