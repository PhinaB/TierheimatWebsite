<?php

//hier kommen die CRUD-Statements rein
namespace app\Model;

require_once './core/Connection.php';
require_once './app/Model/VermisstGefundenTier.php';
require_once './app/Model/Tier.php';
require_once './app/Model/TypTier.php';

use core\Connection;
use app\Model\Tier;
use app\Model\TypTier;
use app\Model\Tierart;

class VermisstGefundenTierModel extends AbstractModel {
    private $db;

    public function __construct() {
        $this->db = Connection::getInstance()->getConnection();
    }

    public function insertVermisstGefundenTiere (Tier $tier, VermisstGefundenTier $vermisstGefundenTier, Tierart $tierart, TypTier $typTier, ?Bilder $bilder = null)
    {

        // Start einer Transaktion, um Konsistenz zu gewährleisten
        $this->db->begin_transaction();

        try {
            /* -------------------typTier- im Formular: Anliegen (vermisst/gefunden)------------------*/
            $stmtTyp = $this->db->prepare("INSERT INTO ArtDerHilfeTyp (Typ) VALUES (?)");
            $typ = $typTier->getTyp();
            $stmtTyp->bind_param('s', $typ); // TODO: statt INSERT abfragen, ob die Art bereits existiert

            if (!$stmtTyp->execute()) {
                throw new \Exception('Fehler beim Speichern des Tieres: ' . $stmtTyp->error);
            } // TODO: PHPDocs; InvalidArgumentException & ohne "\"

            // Hole die generierte TypID
            $typID = $this->db->insert_id;

            /* -------------------TierartID- im Formular: Tierart (Katze, Hund, Vogel, Sonstiges)------------------*/
            $tierart->getTierart()
            // TO DO: wenn Tierart bereits existiert sollte einfach ID verwenden
            $tierart::read("Tierart", , '*');


            $stmtTierart = $this->db->prepare("INSERT INTO tierart (Tierart) VALUES (?)");
            $valuesTierart = $tierart->getTierart();

            //determine Types läuft durch den Array $valuesTierart und bestimmt den Typ
            $types = self::determineType((array)$valuesTierart);

            $stmtTierart->bind_param($types, $valuesTierart);

            if (!$stmtTierart->execute()) {
                throw new \Exception('Fehler beim Speichern des Tieres: ' . $stmtTyp->error);
            }
            //Hole die generierte TierartID
            $tierartID = $this->db->insert_id;

            /* -------------------ZuletztGeänderterNutzerID-Nutzer der ausführt-----------------*/

            //TO DO !!!!!!

            $zuletztGeandertNutzerID = $this->db->insert_id;

            /* -------------------Tier- im Formular: Datum (verschwunden/gefunden), Beschreibung-----------------*/

            $stmtTier = $this->db->prepare("INSERT INTO tiere (RasseID, ZuletztGeaendertNutzerID, TypID, Geschlecht, Beschreibung, Geburtsjahr, 
            Name, Kastriert, Gesundheitszustand, Charakter, Datum, Geloescht, ZuletztGeaendert) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");


            $valuesTiere = $tier->getValuesForInsert($typID, $tierartID, $zuletztGeandertNutzerID);

            $types = self::determineType($valuesTiere);

            $stmtTier->bind_param($types, ...$valuesTiere);

            if (!$stmtTier->execute()) {
                throw new \Exception('Fehler beim Speichern des Tieres: ' . $stmtTier->error);
            }

            // Hole die generierte TierID
            $tierID = $this->db->insert_id;

            /* -------------------VermisstGefundenTiere- Formular: Ort, Kontaktaufnahme------------------*/

            $stmtVermisstGefundenTier = $this->db->prepare("INSERT INTO vermisstGefundenTiere (TierID, Ort, Knontaktaufnahme) VALUE (?, ?, ?)");

            $valuesVermisstGefundenTier = $vermisstGefundenTier->getValuesForInsert($tierID);

            $types = self::determineType((array)$valuesVermisstGefundenTier);

            $stmtVermisstGefundenTier->bind_param($types, ...$valuesVermisstGefundenTier);

            if (!$stmtVermisstGefundenTier->execute()) {
                throw new \Exception('Fehler beim Speichern der Vermisst-/Gefunden-Meldung: ' . $stmtVermisstGefundenTier->error);
            }

            /* -------------------Bilder- Formular: Bild vom Tier-----------------*/
            //TO DO: $hauptbild muss 1 sein, damit es als Hauptbild gesehen wird, da bei vemissten und gefundenen Tieren nur ein Bild hochgeladen werden kann

            if ($bilder !== null) {


                $stmtBild = $this->db->prepare("INSERT INTO bilder (TierID, Bildadresse, Hauptbild, Alternativtext) VALUE (?, ?, ?, ?)");

                //Es lässt sich nur ein Bild bei vermissten/gefundenen Tieren einfügen - somit ist es automatisch Hauptbild
                $hauptbild = 1;
                //der Alternativtext wird aus der Tierart entwickelt
                $alternativtext = $tierart->getTierart();

                $valuesBild = $bilder->getValuesForInsert($tierID, $hauptbild, $alternativtext);

                $typesBilder = self::determineType($valuesBild);
                $stmtBild->bind_param($typesBilder, ...$valuesBild);
                if (!$stmtBild->execute()) {
                    throw new \Exception('Fehler beim Speichern der Vermisst-/Gefunden-Meldung: ' . $stmtVermisstGefundenTier->error);
                }
            }
            $this->db->commit();
        } catch (mysqli_sql_exception $exception) {
            $this->db->rollback();
            throw $exception;
        }
    }

}