<?php
require_once __DIR__."/../core/Connection.php";

use core\Connection;

$conn = Connection::getInstance()->getConnection();


$sql_befehle = [
    'CREATE DATABASE IF NOT EXISTS tierheimat;',
]; // TODO: erstmal diesen Befehl ausführen, speichert den SQL Befehl als String in einen Array

$sql_befehle = [
    'CREATE TABLE IF NOT EXISTS Nutzerrollen (
        NutzerrollenID INT AUTO_INCREMENT PRIMARY KEY,
        Rolle VARCHAR(100) NOT NULL UNIQUE
    );',

    'CREATE TABLE IF NOT EXISTS Nutzer (
        NutzerID INT AUTO_INCREMENT PRIMARY KEY,
        NutzerrollenID INT NOT NULL,
        Name VARCHAR(100) NOT NULL,
        Email VARCHAR(100) NOT NULL UNIQUE,
        Passwort VARCHAR(250) NOT NULL,
        FOREIGN KEY (NutzerrollenID) REFERENCES Nutzerrollen(NutzerrollenID) ON DELETE RESTRICT
    );',

    'CREATE TABLE IF NOT EXISTS Tierart (
        TierartID INT AUTO_INCREMENT PRIMARY KEY,
        Tierart VARCHAR(100) NOT NULL UNIQUE
    );',

    'CREATE TABLE IF NOT EXISTS Rasse (
        RasseID INT AUTO_INCREMENT PRIMARY KEY,
        TierartID INT NOT NULL,
        Rasse VARCHAR(100) NOT NULL UNIQUE,
        FOREIGN KEY (TierartID) REFERENCES Tierart(TierartID) ON DELETE RESTRICT
    );',

    'CREATE TABLE IF NOT EXISTS VermisstGefundenTiere (
        VermisstGefundenTiereID INT AUTO_INCREMENT PRIMARY KEY,
        ZuletztGeaendertNutzerID INT,
        TierartID INT NOT NULL,
        Typ VARCHAR(100) NOT NULL, 
        Datum DATETIME NOT NULL,
        Ort VARCHAR(250) NOT NULL,
        Beschreibung VARCHAR(500) NOT NULL,
        Kontaktaufnahme VARCHAR(50) NOT NULL,
        Bildadresse VARCHAR(255) NOT NULL,
        Geloescht BOOLEAN NOT NULL,
        ZuletztGeaendert DATETIME NOT NULL,
        FOREIGN KEY (TierartID) REFERENCES Tierart(TierartID) ON DELETE RESTRICT,
        FOREIGN KEY (ZuletztGeaendertNutzerID) REFERENCES Nutzer(NutzerID) ON DELETE SET NULL
    );',

    'CREATE TABLE IF NOT EXISTS Tiere (
        TierID INT AUTO_INCREMENT PRIMARY KEY,
        TierartID INT NOT NULL,
        Geschlecht VARCHAR(50),
        Beschreibung VARCHAR(500) NOT NULL,
        Geburtsjahr INT,
        Name VARCHAR(100),
        Charakter VARCHAR(255),
        Datum DATE NOT NULL,
        FOREIGN KEY (TierartID) REFERENCES Tierart(TierartID) ON DELETE RESTRICT
    );',

    'CREATE TABLE IF NOT EXISTS Bilder (
        BilderID INT AUTO_INCREMENT PRIMARY KEY,
        TierID INT NOT NULL,
        Bildadresse VARCHAR(255) NOT NULL,
        Hauptbild BOOLEAN NOT NULL,
        Alternativtext VARCHAR(255) NOT NULL,
        FOREIGN KEY (TierID) REFERENCES Tiere(TierID) ON DELETE RESTRICT
    );',

    'CREATE TABLE IF NOT EXISTS ArtikelArten (
        ArtID INT AUTO_INCREMENT PRIMARY KEY,
        Art VARCHAR(100) NOT NULL UNIQUE
    );',

    'CREATE TABLE IF NOT EXISTS Artikel (
        ArtikelID INT AUTO_INCREMENT PRIMARY KEY,
        NutzerID INT,
        ArtID INT NOT NULL,
        Ueberschrift VARCHAR(200) NOT NULL,
        Zwischenueberschrift VARCHAR(200),
        Text VARCHAR(500) NOT NULL,
        Datum DATE NOT NULL,
        Bildadresse VARCHAR(255),
        FOREIGN KEY (NutzerID) REFERENCES Nutzer(NutzerID) ON DELETE SET NULL,
        FOREIGN KEY (ArtID) REFERENCES ArtikelArten(ArtID) ON DELETE RESTRICT
    );',

    'CREATE TABLE IF NOT EXISTS ArtDerHilfe (
        ArtID INT AUTO_INCREMENT PRIMARY KEY,
        ArtDerHilfe VARCHAR(255) NOT NULL UNIQUE
    );',

    'CREATE TABLE IF NOT EXISTS Helfen (
        HelfenID INT AUTO_INCREMENT PRIMARY KEY,
        NutzerID INT,
        ArtDerHilfe INT NOT NULL,
        Angenommen BOOLEAN NOT NULL,
        Zeit TIME,
        Datum DATE,
        Wochentag VARCHAR(50),
        FOREIGN KEY (NutzerID) REFERENCES Nutzer(NutzerID) ON DELETE SET NULL,
        FOREIGN KEY (ArtDerHilfe) REFERENCES ArtDerHilfe(ArtID) ON DELETE RESTRICT
    );'
];

/*foreach ($sql_befehle as $befehl) {
    if ($conn->query($befehl) === TRUE) { TODO: query existiert nicht -> mit stmt arbeiten (s. ServiceInfoModel.php) -> auch unten im foreach
        echo 'Befehl erfolgreich ausgeführt: {$befehl}\n';
    } else {
        echo 'Fehler bei Befehl: {$befehl}\n' . $conn->error . '\n'; TODO: error existiert nicht -> mit stmt arbeiten (s. ServiceInfoModel.php) -> auch unten im foreach
    }
} noch offen für die Dokumentation, Snip incl. ins.
*/
// bei Service Händler diesen Try Catch mit raussuchen, verstehen und einbinden
foreach ($sql_befehle as $befehl) {
    try {
        $stmt = $conn->prepare($befehl);
    } catch (Exception $e) { // catch verhindert den Absturz des Skripts → fehler werden ignoriert

    } //prepare erstellt php statement, verhindert SQL-Injection
    if ($stmt && $stmt->execute()) { //wenn die Vorbereitung des Statements erfolgreich war und der execute des SQL Zeug abgeschlossen wird es positiv ausgegeben
        echo "Befehl erfolgreich ausgeführt: {$befehl}\n";
    } else {
        echo "Fehler bei Befehl: {$befehl}\n" . $conn->error() . "\n"; //error ebenfalss abändern, die Funktion existiert nicht
    }
}


echo 'Alle Tabellen erfolgreich erstellt.\n';


$insert_befehle = [

    'INSERT INTO Tierart (Tierart) VALUES
    ("Hunde"),
    ("Katzen"),
    ("Kleintiere"),
    ("Exoten");',

'INSERT INTO Rasse (TierartID, Rasse) VALUES
    (1, "Golden Retriever"),
    (1, "Beagle"),
    (1, "Deutscher Schäferhund"),
    (1, "Bulldogge"),
    (1, "Labrador"),
    (1, "Cocker Spaniel"),
    (2, "Perser"),
    (2, "Siam"),
    (2, "Maine Coon"),
    (2, "Britisch Kurzhaar"),
    (2, "Bengal"),
    (2, "Ragdoll"),
    (3, "Wellensittich"),
    (3, "Papagei"),
    (3, "Kanarienvogel"),
    (3, "Ara"),
    (4, "Python"),
    (4, "Kornnatter"),
    (4, "Gecko"),
    (4, "Chamäleon"),
    (3, "Maus"),
    (3, "Hase"),
    (3, "Kaninchen"),
    (3, "Hamster"),
    (3, "Meerschweinchen"),
    (4, "Axolotl"),
    (4, "Schmetterling"),
    (4, "Ameise");',

'INSERT INTO Nutzerrollen (Rolle) VALUES
    ("Administrator"),
    ("Nutzer"),
    ("Gast");',

'INSERT INTO Nutzer (NutzerrollenID, Name, Email, Passwort) VALUES
    (1, "Max Mustermann", "admin@example.com", "securepassword1"),
    (1, "Lisa Meier", "betreuer@example.com", "securepassword2"),
    (2, "Dr. Maier", "tierarzt@example.com", "securepassword3"),
    (2, "Jonas Schulz", "freiwilliger@example.com", "securepassword4"),
    (2, "Anna Berger", "besucher@example.com", "securepassword5");', // TODO: pw sichern, sollen die mit hashing erstellt werden?

'INSERT INTO Tiere (TierartID, Geschlecht, Beschreibung, Geburtsjahr, Name, Charakter, Datum) VALUES
    (1, "Weiblich", "Freundliche Hündin, liebt Kinder.", 2001, "Lila", "Verspielt", "2024-11-01"),
    (4, "Weiblich", "Ruhige Schlange, pflegeleicht.", 2011, "Tiger", "Ruhig", "2024-11-02"),
    (4, "Weiblich", "Kleine Maus, sehr aktiv.", 2008, "Greta", "Neugierig", "2024-11-03"),
    (3, "Weiblich", "Gesellige Sittiche in großer Gruppe.", 2011, "Wellis", "Fröhlich", "2024-11-04"),
    (2, "Männlich", "Kuschelt gerne, ideal für Familien.", 2001, "Simba", "Zutraulich", "2024-11-05"),
    (1, "Weiblich", "Lebhafte Hündin, liebt Spaziergänge.", 2013, "Bella", "Energisch", "2024-11-10"),
    (1, "Männlich", "Treuer Begleiter, liebt Aufmerksamkeit.", 2012, "Rex", "Treu", "2024-11-11"),
    (1, "Weiblich", "Sanfter Hund, eher zurückhaltend.", 2011, "Mila", "Sanft", "2024-11-12"),
    (3, "Männlich", "Fluffy ist sehr liebevoll zu Kindern.", 2011, "Fluffy", "Liebevoll", "2024-10-12"),
    (3, "Weiblich", "Hoppel ist gut mit Fluffy befreundet.", 2011, "Hoppel", "Liebevoll", "2024-10-12"),
    (4, "Weiblich", "Diese Kornnatter liebt es zu fressen.", 2011, "Korni", "Fressgierig", "2024-10-12"),
    (3, "Weiblich", "Lora spricht gerne alles nach.", 2011, "Lora", "Verspielt", "2024-10-12"),
    (3, "Weiblich", "Rosella ist sehr bunt.", 2011, "Rosella", "prächtig", "2024-10-12"),
    (4, "Weiblich", "Unser liebevoll getauftes Mosnter ist rasend schnell unterwegs.", 2011, "Monster", "Fressgierig", "2024-02-12");',

    // TODO: korrekte Inserts -> noch alle anderen erstellen
'INSERT INTO VermisstGefundenTiere (ZuletztGeaendertNutzerID, TierartID, Typ, Datum, Ort, Beschreibung, Kontaktaufnahme, Bildadresse, Geloescht, ZuletztGeaendert) VALUES
    (1, 1, "vermisst", "2024-01-02 00:00:000", "Weimar", "Wir waren am Samstag Abend mit Pablo in Weimar am Park an der Ilm spazieren und haben ihn nur kurz aus den Augen gelassen. Wir vermissen ihn sehr. Jeder Hinweis könnte uns bei der Suche helfen.", "telefon", "pablo.jpg", 0, "2024-01-02 00:00:000"),
    (2, 3, "vermisst", "2024-03-02 00:00:000", "Vieselbach", "Luke ist...", "telefon", "luke.jpg", 0, "2024-01-02 00:00:000"),
    (2, 2, "vermisst", "2024-01-03 00:00:000", "Vieselbach", "Lotta ist...", "email", "lotta.jpg", 0, "2024-01-04 00:00:000");',

'INSERT INTO Bilder (TierID, Bildadresse, Hauptbild, Alternativtext) VALUES
    (6, "bella.jpeg", TRUE, "Bella"),
    (6, "bella2.jpeg", FALSE, ""),
    (3, "greta.jpg", TRUE, "Greta, eine aktive Ratte"),
    (3, "greta2.jpg", FALSE, ""),
    (2, "tigerpython.jpg", TRUE, "eine tolle Tigerpython"),
    (2, "tigerpython2.jpg", FALSE, ""),
    (4, "wellensittiche.jpg", TRUE, "eine Gruppe Wellensittiche"),
    (4, "wellensittiche2.jpg", FALSE, ""),
    (5, "simba.jpg", TRUE, "Katze"),
    (5, "simba2.jpg", FALSE, ""),
    (7, "rocky.jpg", TRUE, "Hund Rex"),
    (7, "rocky2.jpg", FALSE, ""),
    (8, "lilly.jpg", TRUE, "Hund Mila"),
    (8, "lilly2.jpg", FALSE, ""),
    (1, "lila.jpg", TRUE, "Lila"),
    (1, "lila2.jpg", FALSE, ""),
    (9, "fluffy.jpg", TRUE, "Hase Fluffy"),
    (9, "fluffy2.jpg", FALSE, ""),
    (10, "hoppel.jpg", TRUE, "Hase Hoppel"),
    (10, "hoppel2.jpg", FALSE, ""),
    (11, "kornnatter.jpg", TRUE, "Kornnatter Korni"),
    (11, "kornnatter2.jpg", FALSE, ""),
    (12, "loraJendayasittich.jpg", TRUE, "Jendayasittich Lora"),
    (12, "loraJendayasittich2.jpg", FALSE, ""),
    (13, "prachtrosella.jpg", TRUE, "Rosella"),
    (13, "prachtrosella2.jpg", FALSE, ""),
    (14, "kornnatter2.jpg", TRUE, "Kornnatter Monster"),
    (14, "kornnatter.jpg", FALSE, "");',

'INSERT INTO ArtikelArten (Art) VALUES
    ("ServiceInfo"),
    ("Aktuelles");',

/* hier ebenfalls die Bildpfade abändern
'INSERT INTO Artikel (NutzerID, ArtID, Ueberschrift, Zwischenueberschrift, Text, Datum, Bildadresse) VALUES
    (1, 1, "Pflege von Hunden", "Wichtige Tipps", "Erfahren Sie alles zur artgerechten Pflege.", "2024-12-01", $bildPfad = "/Projekt/ws2425_dwp_wachs_herpe_burger/public/img/bella.jpg"),
    (2, 2, "Lunas neues Zuhause", "Erfolgsstory", "Luna fand ihr Glück.", "2024-12-05", $bildPfad = "/Projekt/ws2425_dwp_wachs_herpe_burger/public/img/anlage.jpg"),
    (3, 3, "Neue Tiere in Erfurt", "Willkommen!", "5 neue Tiere warten auf ein Zuhause.", "2024-12-10", $bildPfad = "/Projekt/ws2425_dwp_wachs_herpe_burger/public/img/tierheimFest");',
*/

'INSERT INTO ArtDerHilfe (ArtDerHilfe) VALUES
    ("Tiere füttern"),
    ("Spazieren gehen"),
    ("Reinigung der Gehege"),
    ("Transport von Tieren"),
    ("Kleintiersitting");'
];

foreach ($insert_befehle as $befehl) {
    if ($conn->query($befehl) === TRUE) { //identitätsoperator, prüft ob die Werte gleich sind und deren Datentyp
        echo 'Eintrag erfolgreich hinzugefügt: $befehl\n';
    } else {
        echo 'Fehler beim Hinzufügen: $befehl\n' . $conn->error . '\n';
    }
}
echo 'Alle SQL-Befehle erfolgreich ausgeführt.\n';
?>



/*Legende mit Beschreibung
ON DELETE CASCADE, stellt eine Referenz zwischen den Tabellen her, sprich die Informationen stehen in Abhängigkeit zueinander.
Wird aus einer Tabelle etwas mit dem neuen Feature delete entfernt werden die zugehörigen Informationen aus den in Verbindung stehenden Tabelle ebenfalls gelöscht.
ON DELETE SET NULL, definiert was passiert wenn ein Übergeordneter Datensatz → Fremdschlüssel gelöscht wird
Die Untergeordneten Daten werden auf NUll gesetzt, dies ist zB bei UserID etc. hinterlegt um eine Referenz zu haben und dass die Daten der bisherigen gespeicherten Personen nicht verloren gehen

$stmt, "Prepared Statement" wird verwendet um SQL Anweisungen vorzubreiten und sicher auszuführen, diese dienen ebenfalls als Platzhalter, diese werden aber während bzw. nach der Ausführung ersetzt
übergibt Parameter, wird verwendet um SQL Injection vorzubeugen

require once bindet "connection.php" einmalig ein und nicht mehrmals

_DIR_ dient asl "magische konstante" in php, diese gibt den absoluten pfad des verzeichnisses zurück, d.h. es ist egal wo sich die bezogene Datei befindet, sie kann auch verschoben werden und wird ausgeführt

use_core/connection Namespaces dienen dazu, Klassen und Funktionen logisch zu organisieren und Namenskollisionen zu vermeiden. Wenn mehrere Klassen denselben Namen (z. B. Connection) haben, hilft der Namespace dabei, die richtige Klasse zu verwenden.

Das Singleton-Pattern stellt sicher, dass es nur eine einzige Instanz der Klasse Connection im gesamten Skript gibt.
Wenn getInstance() aufgerufen wird:
Erstellt die Methode eine neue Instanz der Connection-Klasse, falls sie noch nicht existiert.

