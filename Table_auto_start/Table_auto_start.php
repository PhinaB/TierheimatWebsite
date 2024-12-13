<?php
require_once __DIR__."/../core/Connection.php";

use core\Connection;

$conn = Connection::getInstance()->getConnection();
//$conn = new Connection();

$sql_befehle = [

    'CREATE TABLE IF NOT EXISTS Nutzerrollen (
        NutzerrollenID INT AUTO_INCREMENT PRIMARY KEY,
        Rolle VARCHAR(100) NOT NULL UNIQUE
    )',

    'CREATE TABLE IF NOT EXISTS Nutzer (
        NutzerID INT AUTO_INCREMENT PRIMARY KEY,
        NutzerrollenID INT NOT NULL,
        Name VARCHAR(100) NOT NULL,
        Email VARCHAR(100) NOT NULL UNIQUE,
        Passwort VARCHAR(250) NOT NULL,
        FOREIGN KEY (NutzerrollenID) REFERENCES Nutzerrollen(NutzerrollenID) ON DELETE RESTRICT
    )',

    'CREATE TABLE IF NOT EXISTS Tierart (
        TierartID INT AUTO_INCREMENT PRIMARY KEY,
        Tierart VARCHAR(100) NOT NULL UNIQUE
    )',

    'CREATE TABLE IF NOT EXISTS Rasse (
        RasseID INT AUTO_INCREMENT PRIMARY KEY,
        TierartID INT NOT NULL,
        Rasse VARCHAR(100) NOT NULL UNIQUE,
        FOREIGN KEY (TierartID) REFERENCES Tierart(TierartID) ON DELETE RESTRICT
    )',

    'CREATE TABLE IF NOT EXISTS VermisstGefundenTiere (
        VermisstGefundenTiereID INT AUTO_INCREMENT PRIMARY KEY,
        ZuletztGeaendertNutzerID INT,
        TierartID INT NOT NULL,
        Typ VARCHAR(100) NOT NULL UNIQUE, 
        Datum DATE NOT NULL,
        Ort VARCHAR(250) NOT NULL,
        Beschreibung VARCHAR(500) NOT NULL,
        Kontaktaufnahme VARCHAR(50) NOT NULL,
        Bildadresse VARCHAR(255) NOT NULL,
        Geloescht BOOLEAN NOT NULL,
        ZuletztGeaendert DATE NOT NULL,
        FOREIGN KEY (TierartID) REFERENCES Tierart(TierartID) ON DELETE RESTRICT,
        FOREIGN KEY (ZuletztGeaendertNutzerID) REFERENCES Nutzer(NutzerID) ON DELETE SET NULL
    )',

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
    )',

    'CREATE TABLE IF NOT EXISTS Bilder (
        BilderID INT AUTO_INCREMENT PRIMARY KEY,
        TierID INT NOT NULL,
        Bildadresse VARCHAR(255) NOT NULL,
        Hauptbild BOOLEAN NOT NULL,
        Alternativtext VARCHAR(255) NOT NULL,
        FOREIGN KEY (TierID) REFERENCES Tiere(TierID) ON DELETE CASCADE
    )',

    'CREATE TABLE IF NOT EXISTS ArtikelArten (
        ArtID INT AUTO_INCREMENT PRIMARY KEY,
        Art VARCHAR(100) NOT NULL UNIQUE
    )',

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
    )',

    'CREATE TABLE IF NOT EXISTS ArtDerHilfe (
        ArtID INT AUTO_INCREMENT PRIMARY KEY,
        ArtDerHilfe VARCHAR(255) NOT NULL UNIQUE
    )',

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
    )'
];

/*foreach ($sql_befehle as $befehl) {
    if ($conn->query($befehl) === TRUE) { TODO: query existiert nicht -> mit stmt arbeiten (s. ServiceInfoModel.php) -> auch unten im foreach
        echo 'Befehl erfolgreich ausgeführt: {$befehl}\n';
    } else {
        echo 'Fehler bei Befehl: {$befehl}\n' . $conn->error . '\n'; TODO: error existiert nicht -> mit stmt arbeiten (s. ServiceInfoModel.php) -> auch unten im foreach
    }
}
*/
// bei Service Händler diesen Try Catch mit raussuchen, verstehen und einbinden
foreach ($sql_befehle as $befehl) {
    try {
        $stmt = $conn->prepare($befehl);
    } catch (Exception $e) {

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
    ("Hund"),
    ("Katze"),
    ("Vogel"),
    ("Reptil"),
    ("Nagetier"),
    ("Amphibie"),
    ("Insekt");',

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
    (5, "Maus"),
    (5, "Hase"),
    (5, "Kaninchen"),
    (5, "Hamster"),
    (5, "Meerschweinchen"),
    (6, "Axolotl"),
    (7, "Schmetterling"),
    (7, "Ameise");',

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
    //hashing ist eine nicht umkehrbare Zeichenkette, diese ermöglicht einen sicheren Schutz vor Datenleaks


'INSERT INTO Tiere (RasseID, ZuletztGeaendertNutzerID, TypID, Geschlecht, Beschreibung, Geburtsjahr, Name,
    Kastriert, Gesundheitszustand, Charakter, Datum, Geloescht, ZuletztGeaendert
) VALUES
    (1, 2, 3, "Weiblich", "Freundliche Hündin, liebt Kinder.", 4, "Lila", TRUE, "Gesund", "Verspielt", "2024-11-01", FALSE, "2024-11-20"),
    (15, 2, 3, "Weiblich", "Ruhige Schlange, pflegeleicht.", 3, "Tiger", FALSE, "Gesund", "Ruhig", "2024-11-02", FALSE, "2024-11-20"),
    (25, 2, 3, "Weiblich", "Kleine Maus, sehr aktiv.", 1, "Greta", FALSE, "Gesund", "Neugierig", "2024-11-03", FALSE, "2024-11-20"),
    (9, 3, 3, "Weiblich", "Geselliger Sittich.", 5, "Lora", FALSE, "Gesund", "Fröhlich", "2024-11-04", FALSE, "2024-11-20"),
    (5, 2, 3, "Männlich", "Kuschelt gerne, ideal für Familien.", 3, "Simba", TRUE, "Gesund", "Zutraulich", "2024-11-05", FALSE, "2024-11-20"),
    (1, 2, 2, 3, "Weiblich", "Lebhafte Hündin, liebt Spaziergänge.", 2, "Bella", TRUE, "Gesund", "Energisch", "2024-11-10", FALSE, "2024-11-20"),
    (1, 3, 3, 3, "Männlich", "Treuer Begleiter, liebt Aufmerksamkeit.", 5, "Rex", TRUE, "Gesund", "Treu", "2024-11-11", FALSE, "2024-11-20"),
    (2, 7, 2, 3, "Weiblich", "Sanfte Katze, eher zurückhaltend.", 3, "Mila", FALSE, "Gesund", "Sanft", "2024-11-12", FALSE, "2024-11-20");',

'INSERT INTO VermisstGefundenTiere (TierID, Ort, Kontaktaufnahme) VALUES
    (1, "Weimar", "Telefon"),
    (2, "Jena", "Email"),
    (3, "Erfurt", "Telefon"),
    (4, "Apolda", "Telefon"),
    (5, "Arnstadt", "Email"),
    (6, "Weimar", "Telefon"),
    (7, "Erfurt", "Telefon"),
    (8, "Jena", "Email"),
    (9, "Apolda", "Telefon"),
    (10, "Gera", "Email");',


'INSERT INTO Bilder (TierID, Bildadresse, Hauptbild, Alternativtext) VALUES
    (1, $bildPfad = "/Projekt/ws2425_dwp_wachs_herpe_burger/public/img/lila.jpg", TRUE, "Lila, eine freundliche Hündin"),
    (4, $bildPfad = "/Projekt/ws2425_dwp_wachs_herpe_burger/public/img/tigerpython.jpg", TRUE, "Tiger, eine ruhige Python"),
    (5, $bildPfad = "/Projekt/ws2425_dwp_wachs_herpe_burger/public/img/greta2.jpg", TRUE, "Greta, eine aktive Maus"),
    (9, $bildPfad = "/Projekt/ws2425_dwp_wachs_herpe_burger/public/img/prachtrosella.jpg", TRUE, "Lora, ein fröhlicher Sittich"),
    (10, $bildPfad = "/Projekt/ws2425_dwp_wachs_herpe_burger/public/img/wellensittiche2.jpg", TRUE, "Melody, eine musikalische Kanarienvogel-Dame"),
    (6, "bella.jpg", TRUE, "Bella, eine lebhafte Hündin"), //nur Bildname wird mit Java dann erweitert bzw. ausgeführt, Hauptsächlich Hunde und Katzen einbauen mit paar anderen Tierchen
    (7, $bildPfad = "/Projekt/ws2425_dwp_wachs_herpe_burger/public/img/flo.jpg", TRUE, "Mila, eine sanfte Katze"),
    (8, $bildPfad = "/Projekt/ws2425_dwp_wachs_herpe_burger/public/img/prachtrosella2.jpg", TRUE, "Charlie, ein lustiger Papagei"),
    (9, $bildPfad = "/Projekt/ws2425_dwp_wachs_herpe_burger/public/img/tigerpython2.jpg", TRUE, "Spike, eine ruhige Schlange"),
    (10, $bildPfad = "/Projekt/ws2425_dwp_wachs_herpe_burger/public/img/fluffy.jpg", TRUE, "Buddy, ein aktiver Hamster");',

'INSERT INTO ArtikelArten (Art) VALUES
    ("Pflegehinweise"),
    ("Erfolgsstory"),
    ("News"),
    ("Veranstaltungen");',

/* hier ebenfalls die Bildpfade abändern
'INSERT INTO Artikel (NutzerID, ArtID, Ueberschrift, Zwischenueberschrift, Text, Datum, Bildadresse) VALUES
    (1, 1, "Pflege von Hunden", "Wichtige Tipps", "Erfahren Sie alles zur artgerechten Pflege.", "2024-12-01", $bildPfad = "/Projekt/ws2425_dwp_wachs_herpe_burger/public/img/bella.jpg"),
    (2, 2, "Lunas neues Zuhause", "Erfolgsstory", "Luna fand ihr Glück.", "2024-12-05", $bildPfad = "/Projekt/ws2425_dwp_wachs_herpe_burger/public/img/anlage.jpg"),
    (3, 3, "Neue Tiere in Erfurt", "Willkommen!", "5 neue Tiere warten auf ein Zuhause.", "2024-12-10", $bildPfad = "/Projekt/ws2425_dwp_wachs_herpe_burger/public/img/tierheimFest");',
*/

'INSERT INTO ArtDerHilfe (ArtDerHilfe) VALUES
    ("Pflege von Tieren"),
    ("Spenden sammeln"),
    ("Reinigung der Gehege"),
    ("Transport von Tieren"),
    ("Aufbau von Unterkünften");',


'INSERT INTO Helfen (NutzerID, ArtDerHilfe, Angenommen, Zeit, Datum, Wochentag) VALUES
    (4, 1, TRUE, "10:00:00", "2024-12-01", "Montag"),
    (4, 2, TRUE, "14:00:00", "2024-12-02", "Dienstag"),
    (3, 3, FALSE, "09:00:00", "2024-12-03", "Mittwoch"),
    (5, 4, TRUE, "11:00:00", "2024-12-04", "Donnerstag"),
    (2, 5, TRUE, "16:00:00", "2024-12-05", "Freitag")'

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

















/*
CREATE TABLE IF NOT EXISTS Nutzerrollen (
NutzerrollenID INT AUTO_INCREMENT PRIMARY KEY,
Rolle VARCHAR(100) NOT NULL UNIQUE
);

CREATE TABLE IF NOT EXISTS Nutzer (
NutzerID INT AUTO_INCREMENT PRIMARY KEY,
NutzerrollenID INT NOT NULL,
Name VARCHAR(100) NOT NULL,
Email VARCHAR(100) NOT NULL UNIQUE,
Passwort VARCHAR(250) NOT NULL,
FOREIGN KEY (NutzerrollenID) REFERENCES Nutzerrollen(NutzerrollenID) ON DELETE RESTRICT
);

CREATE TABLE IF NOT EXISTS Tierart (
TierartID INT AUTO_INCREMENT PRIMARY KEY,
Tierart VARCHAR(100) NOT NULL UNIQUE
);

CREATE TABLE IF NOT EXISTS Rasse (
RasseID INT AUTO_INCREMENT PRIMARY KEY,
TierartID INT NOT NULL,
Rasse VARCHAR(100) NOT NULL UNIQUE,
FOREIGN KEY (TierartID) REFERENCES Tierart(TierartID) ON DELETE RESTRICT
);

CREATE TABLE IF NOT EXISTS VermisstGefundenTiere (
VermisstGefundenTiereID INT AUTO_INCREMENT PRIMARY KEY,
ZuletztGeaendertNutzerID INT,
TierartID INT NOT NULL,
Typ VARCHAR(100) NOT NULL UNIQUE,
Datum DATE NOT NULL,
Ort VARCHAR(250) NOT NULL,
Beschreibung VARCHAR(500) NOT NULL,
Kontaktaufnahme VARCHAR(50) NOT NULL,
Bildadresse VARCHAR(255) NOT NULL,
Geloescht BOOLEAN NOT NULL,
ZuletztGeaendert DATE NOT NULL,
FOREIGN KEY (TierartID) REFERENCES Tierart(TierartID) ON DELETE RESTRICT,
FOREIGN KEY (ZuletztGeaendertNutzerID) REFERENCES Nutzer(NutzerID) ON DELETE SET NULL
);

CREATE TABLE IF NOT EXISTS Tiere (
TierID INT AUTO_INCREMENT PRIMARY KEY,
TierartID INT NOT NULL,
Geschlecht VARCHAR(50),
Beschreibung VARCHAR(500) NOT NULL,
Geburtsjahr INT,
Name VARCHAR(100),
Charakter VARCHAR(255),
Datum DATE NOT NULL,
FOREIGN KEY (TierartID) REFERENCES Tierart(TierartID) ON DELETE RESTRICT
);

CREATE TABLE IF NOT EXISTS Bilder (
BilderID INT AUTO_INCREMENT PRIMARY KEY,
TierID INT NOT NULL,
Bildadresse VARCHAR(255) NOT NULL,
Hauptbild BOOLEAN NOT NULL,
Alternativtext VARCHAR(255) NOT NULL,
FOREIGN KEY (TierID) REFERENCES Tiere(TierID) ON DELETE CASCADE
);

CREATE TABLE IF NOT EXISTS ArtikelArten (
ArtID INT AUTO_INCREMENT PRIMARY KEY,
Art VARCHAR(100) NOT NULL UNIQUE
);

CREATE TABLE IF NOT EXISTS Artikel (
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
);

CREATE TABLE IF NOT EXISTS ArtDerHilfe (
ArtID INT AUTO_INCREMENT PRIMARY KEY,
ArtDerHilfe VARCHAR(255) NOT NULL UNIQUE
);

CREATE TABLE IF NOT EXISTS Helfen (
HelfenID INT AUTO_INCREMENT PRIMARY KEY,
NutzerID INT,
ArtDerHilfe INT NOT NULL,
Angenommen BOOLEAN NOT NULL,
Zeit TIME,
Datum DATE,
Wochentag VARCHAR(50),
FOREIGN KEY (NutzerID) REFERENCES Nutzer(NutzerID) ON DELETE SET NULL,
FOREIGN KEY (ArtDerHilfe) REFERENCES ArtDerHilfe(ArtID) ON DELETE RESTRICT
);
*/