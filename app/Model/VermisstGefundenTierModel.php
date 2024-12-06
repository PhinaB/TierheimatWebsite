<?php

//hier kommen die CRUD-Statements rein
namespace app\Model;

require_once './app/core/connection.php';
require_once './app/Model/VermisstGefundenTier.php';
require_once './app/Model/Tier.php';
require_once './app/Model/TypTier.php';

use app\core\Connection;
use app\Model\Tier;
use app\Model\TypTier;

class VermisstGefundenTierModel {
    private $db;

    public function __construct() {
        $this->db = Connection::getInstance()->getConnection();
    }

    /**
     * @throws \Exception
     */
    public function insertVermisstGefundenTiere (Tier $tier, VermisstGefundenTier $vermisstGefundenTier, TypTier $typTier){

        // Start einer Transaktion, um Konsistenz zu gewährleisten
        $this->db->begin_transaction();

        try {
            /* -------------------typTier- im Formular: Anliegen (vermisst/gefunden)------------------*/
                $stmtTyp = $this->db->prepare ("INSERT INTO ArtDerHilfeTyp (Typ) VALUES (?)");
                $typ = $typTier->getTyp();
                $stmtTyp->bind_param('s', $typTier->$typ);

            if (!$stmtTyp->execute()) {
                throw new \Exception('Fehler beim Speichern des Tieres: ' . $stmtTyp->error);
            }

            // Hole die generierte TypID
            $typID = $this->db->insert_id;
            /* -------------------TierartID- im Formular: Tierart (Katze, Hund, Vogel, Sonstiges)------------------*/

            /* -------------------ZuletztGeänderterNutzerID-Nutzer der ausführt-----------------*/

            /* -------------------Tier- im Formular: Datum (verschwunden/gefunden), Beschreibung-----------------*/

               $stmtTier = $this->db->prepare("INSERT INTO Tiere (RasseID, ZuletztGeaendertNutzerID, TypID, Geschlecht, Beschreibung, Geburtsjahr, 
                Name, Kastriert, Gesundheitszustand, Charakter, Datum, Geloescht, ZuletztGeaendert) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

            $values = $tier->getValuesForInsert();

            $types = 'iiissisisssss';

            $stmtTier->bind_param($types, ...$values);

            if (!$stmtTier->execute()) {
                throw new \Exception('Fehler beim Speichern des Tieres: ' . $stmtTier->error);
            }

            // Hole die generierte TierID
            $tierID = $this->db->insert_id;

            /* -------------------VermisstGefundenTiere- Formular: Ort, Kontaktaufnahme------------------*/


            $stmtVermisstGefundenTier= $this->db->prepare("INSERT INTO VermisstGefundenTiere (TierID, Ort, Knontaktaufnahme) VALUE (?, ?, ?)");
            $stmtVermisstGefundenTier->bind_param('iss', $tierID, $vermisstGefundenTier->ort, $vermisstGefundenTier->kontaktaufnahme);

            if (!$stmtVermisstGefundenTier->execute()) {
                throw new \Exception('Fehler beim Speichern der Vermisst-/Gefunden-Meldung: ' . $stmtVermisstGefunden->error);
            }

            /* -------------------Bilder- Formular: Bild vom Tier-----------------*/

            $this->db->commit();
        } catch(mysqli_sql_exception $exception){
            $this->db->rollback();

            throw $exception;
        }
    }

}