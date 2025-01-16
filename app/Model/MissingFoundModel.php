<?php

declare(strict_types=1);

namespace app\Model;

use app\Model\Entity\MissingFoundAnimal;
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
    public function insertOrUpdateMissedFoundAnimal(MissingFoundAnimal $vermisstGefundenTier, string $tierart, bool $editMode): void
    {
       $this->db->begin_transaction();

       try {
           $tierartID = $this->getSpeciesFromSpeciesName($tierart);

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

               $queryVermisstGefundenTier = 'UPDATE vermisstgefundentiere
                    SET TierartID = ?, Typ = ?, Datum = ?, Ort = ?, Beschreibung = ?, Kontaktaufnahme = ?, Bildadresse = ?, ZuletztGeaendert = ?
                    WHERE VermisstGefundenTiereID = ?;';

               $stmtVermisstGefundenTier = $this->db->prepare($queryVermisstGefundenTier);

               if ($stmtVermisstGefundenTier->error !== "") {
                   throw new InvalidArgumentException('Fehler bei der Vorbereitung der SQL-Abfrage: ' . $stmtVermisstGefundenTier->error);
               }

               $bildadresse = $vermisstGefundenTier->getBildadresse();
               if ($bildadresse === null || $bildadresse === 'null') {
                   if ($thisAnimal['Bildadresse'] !== null) {
                       $bildadresse = $thisAnimal['Bildadresse'];
                   }
                   else {
                       $bildadresse = '';
                   }
               }
               else {
                   $bildadresse = '';
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
           http_response_code(400);

           $this->db->rollback();
           throw $exception;
       }
    }

    /**
     * @throws Exception
     */
    public function getSpeciesFromSpeciesName(string $tierart): int
    {
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
            $stmtTierartSelect->close();
            return (int)$row['TierartID'];
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
                $stmtTierart->close();
                return $this->db->getInsertId();
            }
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
    public function getMissingFoundAnimalById(int $missingFoundAnimalId): array
    {
        $sql = "SELECT * FROM vermisstgefundentiere WHERE VermisstGefundenTiereID = ?";
        $stmtMissingFoundAnimal = $this->db->prepare($sql);
        if (!$stmtMissingFoundAnimal) {
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
    public function deleteMissingFoundAnimal (int $missingFoundAnimalId): bool
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