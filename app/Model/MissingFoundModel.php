<?php

//hier kommen die CRUD-Statements rein
namespace app\Model;

use Exception;
use InvalidArgumentException;

class MissingFoundModel extends AbstractModel
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @throws Exception
     */
    public function insertVermisstGefundenTiere(MissingFoundAnimal $vermisstGefundenTier, Species $tierart, string $tierbildAdresse): void
    {
       // Start einer Transaktion, um Konsistenz zu gewährleisten
       $this->db->begin_transaction();

       try {

           //---------------------------------------------Species-----------------------------------------------
           $queryTierartSelect = "SELECT TierartID FROM Species WHERE Species = ?";
           $stmtTierartSelect = $this->db->prepare($queryTierartSelect);
           if ($stmtTierartSelect->error !== "") {
               throw new Exception('Fehler bei der Vorbereitung der SQL-Abfrage: ' . $stmtTierartSelect->error);
           }
           $handedTierart = $tierart->getTierart();
           $stmtTierartSelect->bind_param ('s', $handedTierart);
           if (!$stmtTierartSelect->execute()) {
               throw new \Exception('Fehler bei der Ausführung der SQL-Abfrage:' . $stmtTierartSelect->error);
           }


           // Ergebnis abrufen
           $result = $stmtTierartSelect->get_result();
           if ($result->num_rows > 0) {
               // Species existiert bereits -> TierartID abrufen
               $row = $result->fetch_assoc();
               $tierartID = $row['TierartID'];
               $stmtTierartSelect->close();
           } else {
               $queryTierart = "INSERT INTO Species (Species) VALUES (?)";
               $stmtTierart = $this->db->prepare($queryTierart);

               if ($stmtTierart->error !== "") {
                   throw new InvalidArgumentException('Fehler bei der Vorbereitung der SQL-Abfrage: ' . $stmtTierart->error);
               }

               $stmtTierart->bind_param('s', $handedTierart);

               if (!$stmtTierart->execute()) {
                   throw new InvalidArgumentException('Fehler bei der Ausführung der SQL-Abfrage:' . $stmtTierart->error);
               }
               //Hole die generierte TierartID
               $tierartID = $this->db->insert_id;
               $stmtTierart->close();
           }

           //-------------------------------------------------User-----------------------------------------------

           $nutzerID = 1; //TODO: aktuellen User abfragen

           /*$nutzerID = $_SESSION['user_id'] ?? null; // Annahme: User-ID wird in der Session gespeichert
           if (!$nutzerID) {
               throw new Exception('Keine gültige User-ID gefunden.');
           }*/

           //--------------------------------------------MissingFoundAnimal---------------------------------------


           $queryVermisstGefundenTier = "INSERT INTO VermisstGefundenTiere (ZuletztGeaendertNutzerID, TierartID, Typ, Datum, Ort, Beschreibung, Kontaktaufnahme, Bildadresse, Geloescht, ZuletztGeaendert) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

           $stmtVermisstGefundenTier = $this->db->prepare($queryVermisstGefundenTier);

           if ($stmtVermisstGefundenTier->error !== "") {
               throw new InvalidArgumentException('Fehler bei der Vorbereitung der SQL-Abfrage: ' . $stmtVermisstGefundenTier->error);
           }

           $valuesVermisstGefundenTier = $vermisstGefundenTier->getValuesForInsert($nutzerID, $tierartID);

           $typesVermisstGefundenTier = self::determineType($valuesVermisstGefundenTier);

           $stmtVermisstGefundenTier->bind_param($typesVermisstGefundenTier, ...$valuesVermisstGefundenTier);

           if (!$stmtVermisstGefundenTier->execute()) {
               throw new InvalidArgumentException('Fehler bei der Ausführung der SQL-Abfrage:' . $stmtVermisstGefundenTier->error);
           }

           $stmtVermisstGefundenTier->close();
           $this->db->commit();

       } catch (Exception $exception) {
            $this->db->rollback();
            throw $exception;
       }
   }

    /**
     * @throws Exception
     */
    public function findAllVermisstOrGefundenTiere(string $vermisstOrGefunden): array
    {
        $sql = "SELECT * FROM VermisstGefundenTiere AS v 
        JOIN tierart AS t ON v.TierartID = t.TierartID 
         WHERE v.typ = ? AND v.geloescht= 0";
        $stmtVermisstOrGefundenTier = $this->db->prepare($sql);
        if (!$stmtVermisstOrGefundenTier) {
            throw new InvalidArgumentException("Fehler bei der Vorbereitung der SQL-Abfrage: " . $this->db->error);
        }

        $stmtVermisstOrGefundenTier->bind_param('s', $vermisstOrGefunden);

        try {
            $stmtVermisstOrGefundenTier->execute();
            $result = $stmtVermisstOrGefundenTier->get_result();
            if (!$result) {
                throw new Exception("Fehler bei der Abfrage.");
            }
        } catch (Exception $e) { // Hier ist `catch` korrekt positioniert
            throw new Exception("Fehler beim Abrufen der Vermisst/Gefunden-Tierdaten: " . $e->getMessage());
        }

        $alleVermisstTiere = [];
        foreach($result as $row){
            $alleVermisstTiere[] = [
                'ZuletztGeaendertNutzerID' => $row['ZuletztGeaendertNutzerID'],
                'Species' => $row['Species'],
                'Typ' => $row['Typ'],
                'Datum' => $row['Datum'],
                'Beschreibung' => $row['Beschreibung'],
                'Kontaktaufnahme' => $row['Kontaktaufnahme'],
                'Bildadresse' => $row['Bildadresse'],
                'Geloescht' => $row['Geloescht'],
                'ZuletztGeaendert' => $row['ZuletztGeaendertNutzerID'],
            ];
        }
       return [
           'VermisstTiere' => $alleVermisstTiere,
       ];
    }

    public function deleteVermisstOrGefundenTier (MissingFoundAnimal $vermisstOrGefundenTier): void{
        //TODO: hat aktueller User das Animal angelegt? --> dann darf löschen
        //anhand der TierID setzten des Booleans auf geloescht= 1
        //Animal wird nicht aus der Datenbank gelöscht. Es wird nur nicht mehr angezeigt



    }
}