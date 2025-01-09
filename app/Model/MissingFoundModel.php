<?php

declare(strict_types=1);

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
    public function insertVermisstGefundenTiere(MissingFoundAnimal $vermisstGefundenTier, string $tierart, bool $editMode): void
    {
       $this->db->begin_transaction();

       try {
           $queryTierartSelect = "SELECT TierartID FROM tierart WHERE Tierart = ?";
           $stmtTierartSelect = $this->db->prepare($queryTierartSelect);
           if ($stmtTierartSelect->error !== "") {
               throw new Exception('Fehler bei der Vorbereitung der SQL-Abfrage: ' . $stmtTierartSelect->error);
           }
           $stmtTierartSelect->bind_param ('s', $tierart);
           if (!$stmtTierartSelect->execute()) {
               throw new Exception('Fehler bei der Ausführung der SQL-Abfrage:' . $stmtTierartSelect->error);
           }

           $result = $stmtTierartSelect->get_result();
           if ($result->num_rows > 0) {
               $row = $result->fetch_assoc();
               $tierartID = $row['TierartID'];
           } else {
               $queryTierart = "INSERT INTO tierart (Tierart) VALUES (?)";
               $stmtTierart = $this->db->prepare($queryTierart);

               if ($stmtTierart->error !== "") {
                   throw new InvalidArgumentException('Fehler bei der Vorbereitung der SQL-Abfrage: ' . $stmtTierart->error);
               }

               $stmtTierart->bind_param('s', $tierart);

               if (!$stmtTierart->execute()) {
                   throw new InvalidArgumentException('Fehler bei der Ausführung der SQL-Abfrage:' . $stmtTierart->error);
               } else {
                   $tierartID = $this->db->getInsertId();
               }
               $stmtTierart->close();
           }
           $stmtTierartSelect->close();


           if ($editMode === true) {
               $queryAnimalSelect = "SELECT * FROM vermisstgefundentiere WHERE VermisstGefundenTiereID = ?";
               $stmtAnimalSelect = $this->db->prepare($queryAnimalSelect);
               if ($stmtAnimalSelect->error !== "") {
                   throw new Exception('Fehler bei der Vorbereitung der SQL-Abfrage: ' . $stmtAnimalSelect->error);
               }
               $vermisstGefundenTierID = $vermisstGefundenTier->getVermisstGefundenTierID();
               $stmtAnimalSelect->bind_param ('i', $vermisstGefundenTierID);
               if (!$stmtAnimalSelect->execute()) {
                   throw new Exception('Fehler bei der Ausführung der SQL-Abfrage:' . $stmtAnimalSelect->error);
               }

               $resultAnimal = $stmtAnimalSelect->get_result();
               $thisAnimal = $resultAnimal->fetch_assoc();

               $queryUser = "SELECT r.* FROM nutzer n
                             JOIN nutzerrollen r ON n.NutzerrollenID = r.NutzerrollenID WHERE NutzerID = ?";
               $stmtUserSelect = $this->db->prepare($queryUser);
               if ($stmtUserSelect->error !== "") {
                   throw new Exception('Fehler bei der Vorbereitung der SQL-Abfrage: ' . $stmtUserSelect->error);
               }
               $theUser = $vermisstGefundenTier->getZuletztGeaendertNutzerID();
               $stmtUserSelect->bind_param ('i', $theUser);
               if (!$stmtUserSelect->execute()) {
                   throw new Exception('Fehler bei der Ausführung der SQL-Abfrage:' . $stmtUserSelect->error);
               }

               $resultUser = $stmtUserSelect->get_result();
               $thisUser = $resultUser->fetch_assoc();

               if ($thisUser['kannAllesLoeschen'] === 0 && $thisAnimal['ZuletztGeaendertNutzerID'] !== $thisUser['NutzerrollenID']) {
                   throw new Exception('Dieser Nutzer darf diesen Beitrag nicht bearbeiten!');
               }

               $queryVermisstGefundenTier = 'UPDATE vermisstgefundentiere
                    SET TierartID = ?, Typ = ?, Datum = ?, Ort = ?, Beschreibung = ?, Kontaktaufnahme = ?, Bildadresse = ?, ZuletztGeaendert = ?
                    WHERE VermisstGefundenTiereID = ?;';

               $stmtVermisstGefundenTier = $this->db->prepare($queryVermisstGefundenTier);

               if ($stmtVermisstGefundenTier->error !== "") {
                   throw new InvalidArgumentException('Fehler bei der Vorbereitung der SQL-Abfrage: ' . $stmtVermisstGefundenTier->error);
               }

               $bildadresse = $vermisstGefundenTier->getBildadresse();
               if ($bildadresse === null || $bildadresse === 'null') {
                   $bildadresse = $thisAnimal['Bildadresse'];
               }

               $valuesVermisstGefundenTier = $vermisstGefundenTier->getValuesForEdit($tierartID, $bildadresse);

           }
           else {
               $queryVermisstGefundenTier = "INSERT INTO vermisstgefundentiere (ZuletztGeaendertNutzerID, TierartID, Typ, Datum, Ort, Beschreibung, Kontaktaufnahme, Bildadresse, Geloescht, ZuletztGeaendert) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

               $stmtVermisstGefundenTier = $this->db->prepare($queryVermisstGefundenTier);

               if ($stmtVermisstGefundenTier->error !== "") {
                   throw new InvalidArgumentException('Fehler bei der Vorbereitung der SQL-Abfrage: ' . $stmtVermisstGefundenTier->error);
               }

               $valuesVermisstGefundenTier = $vermisstGefundenTier->getValuesForInsert($tierartID);

           }

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
    public function getAllMissingOrFoundAnimals(string $vermisstOrGefunden): array
    {
        $sql = "SELECT * FROM vermisstgefundentiere AS v 
        JOIN Tierart AS t ON v.TierartID = t.TierartID 
         WHERE v.typ = ? AND v.geloescht=0 ORDER BY v.Datum DESC";
        $stmtVermisstOrGefundenTier = $this->db->prepare($sql);
        if (!$stmtVermisstOrGefundenTier) {
            throw new InvalidArgumentException("Fehler bei der Vorbereitung der SQL-Abfrage: " . $this->db->getError());
        }

        $stmtVermisstOrGefundenTier->bind_param('s', $vermisstOrGefunden);


        if (!$stmtVermisstOrGefundenTier->execute()) {
            throw new Exception(
                "Fehler beim Ausführen der SQL-Abfrage: " . $stmtVermisstOrGefundenTier->error
            );
        }

        $result = $stmtVermisstOrGefundenTier->get_result();
        if (!$result) {
            throw new Exception("Fehler bei der Abfrage der Daten.");
        }

        $alleVermisstTiere = $result->fetch_all(MYSQLI_ASSOC);
        $stmtVermisstOrGefundenTier->close();
        return $alleVermisstTiere;
    }

    /**
     * @throws Exception
     */
    public function getMissingFoundAnimalById(int $missingFoundAnimalId) {
        $sql = "SELECT * FROM vermisstgefundentiere WHERE VermisstGefundenTiereID = ?";
        $stmtMissingFoundAnimal = $this->db->prepare($sql);
        if (!$stmtMissingFoundAnimal ) {
            throw new InvalidArgumentException("Fehler bei der Vorbereitung der SQL-Abfrage: " . $this->db->getError());
        }
        $stmtMissingFoundAnimal ->bind_param('i', $missingFoundAnimalId);
        if (!$stmtMissingFoundAnimal ->execute()) {
            throw new Exception('Fehler bei der Ausführung des SQL-Statements: ' . $stmtMissingFoundAnimal ->error);
        }
        $animal = $stmtMissingFoundAnimal ->get_result()->fetch_assoc();
        $stmtMissingFoundAnimal->close();

        if (!$animal) {
            throw new Exception("Kein Tier mit der angegebenen ID gefunden.");
        }

        return $animal;
    }

    /**
     * @throws Exception
     */
    public function deleteMissingFoundAnimal (int $missingFoundAnimalId): true
    {
        //Tier wird nicht aus der Datenbank gelöscht. Es wird nur nicht mehr angezeigt, indem geloescht= 1 gesetzt wird
        $sql = "UPDATE vermisstgefundentiere SET Geloescht = ? WHERE VermisstGefundenTiereID = ?";
        $stmt = $this->db->prepare($sql);
        if (!$stmt) {
            throw new Exception("Fehler bei der Vorbereitung der SQL-Abfrage: " . $stmt->error);
        }
        $animalDeleted= 1;
        $stmt->bind_param('ii', $animalDeleted, $missingFoundAnimalId);
        if (!$stmt->execute()) {
            throw new Exception("Fehler beim Ausführen der SQL-Abfrage: " . $stmt->error);
        }
        if($stmt->affected_rows >0){
            return true;
        } else{
            throw new InvalidArgumentException("Kein Tier wurde gelöscht.");
        }
    }
}