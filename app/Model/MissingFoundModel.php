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
    public function insertVermisstGefundenTiere(MissingFoundAnimal $vermisstGefundenTier, Species $tierart, ?string $tierbildAdresse): void
    {
       // Start einer Transaktion, um Konsistenz zu gewährleisten
       $this->db->begin_transaction();

       try {

           //--------------------------------------------NutzerID-----------------------------------------------
           session_start();
           $nutzerID = $_SESSION['nutzer_id']??null;
           if(!$nutzerID){
               $nutzerID= 1;
               /*TODO: später diesen Teil verwenden
               throw new Exception('Keine gültige User-ID gefunden. Bitte einloggen.');*/
           }

           //---------------------------------------------Species-----------------------------------------------
           $queryTierartSelect = "SELECT TierartID FROM Tierart WHERE Tierart = ?";
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
               $queryTierart = "INSERT INTO Tierart (Tierart) VALUES (?)";
               $stmtTierart = $this->db->prepare($queryTierart);

               if ($stmtTierart->error !== "") {
                   throw new InvalidArgumentException('Fehler bei der Vorbereitung der SQL-Abfrage: ' . $stmtTierart->error);
               }

               $stmtTierart->bind_param('s', $handedTierart);

               if (!$stmtTierart->execute()) {
                   throw new InvalidArgumentException('Fehler bei der Ausführung der SQL-Abfrage:' . $stmtTierart->error);
               } else {
                   //Holt die generierte TierartID
                   $tierartID = $this->db->getInsertId();
               }
               $stmtTierart->close();
           }

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
    public function getAllMissingOrFoundAnimals(string $vermisstOrGefunden): array
    {
        $sql = "SELECT * FROM VermisstGefundenTiere AS v 
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

    public function getMissingFoundAnimalById(int $missingFoundAnimalId) {
        $sql = "SELECT * FROM VermisstGefundenTiere WHERE VermisstGefundenTiereID = ?";
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

        return new MissingFoundAnimal(
            $animal['VermisstGefundenTierID'],
            $animal['TierartID'],
            $animal['Typ'],
            $animal['Datum'],
            $animal['Beschreibung'],
            $animal['Kontaktaufnahme'],
            $animal['Bildadresse'],
            $animal['Geloescht'],
            $animal['ZuletztGeaendert']
        );
    }

    /**
     * @throws Exception
     */
    public function creatorIsCurrentUserHasEditDeleteOwnRights(int $createdById){
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }
        if (!isset($_SESSION['nutzer_id'])){
            throw new InvalidArgumentException('Nutzer ist nicht eingeloggt oder Nutzer-ID ist nicht gesetzt.');
        }

        $currentUserId = (int)$_SESSION['nutzer_id'];

        //Rechte des Nutzers beim Attribut KannEigenesBearbeitenUndLoeschen überprüfen
        $userRoleModel = new UserRoleModel();
        $userRoleArray = $userRoleModel->getUserRoles($currentUserId);

        $canEditAndDeleteOwn = $userRoleArray->isKannEigenesBearbeitenUndLoeschen();

        if (!$canEditAndDeleteOwn && $createdById === $currentUserId) {
            return true;
        } else {
            return false;
        }
    }
    /**
     * @throws Exception
     */
    public function deleteMissingFoundAnimal (int $missingFoundAnimalId): void{
        //Animal wird nicht aus der Datenbank gelöscht. Es wird nur nicht mehr angezeigt indem geloescht= 1 gesetzt wird
        //TODO: vermisstGefundenID hidden im HTML Code und von dort holen

        $missingFoundAnimal = $this->getMissingFoundAnimalById($missingFoundAnimalId);

        $missingFoundAnimalCreatorId= $missingFoundAnimal->getZuletztGeaendertNutzerID();

        if ($this->creatorIsCurrentUserHasEditDeleteOwnRights($missingFoundAnimalCreatorId)) {
            $sql = "UPDATE VermisstGefundenTier SET Geloescht=? WHERE VermisstGefundenTiereID = ?";
            $stmt = $this->db->prepare($sql);
            if (!$stmt) {
                throw new InvalidArgumentException("Fehler bei der Vorbereitung der SQL-Abfrage: " . $this->db->getError());
            }
            $animalDeleted= 1;
            $stmt->bind_param('ii', $animalDeleted, $missingFoundAnimalId);
            if (!$stmt->execute()) {
                throw new Exception('Fehler bei der Ausführung des SQL-Statements: ' . $stmt ->error);
            }
        }
        else {
            throw new Exception("Der aktuelle Nutzer hat keine Berechtigung, dieses Tier zu löschen.");
        }
    }

    public function editMissingFoundAnimal (int $missingFoundAnimalId): void{
        //TODO: implementieren
        if ($this->creatorIsCurrentUserHasEditDeleteOwnRights($missingFoundAnimalId)) {
            //TODO: implementieren
        }
        else {
            throw new Exception("Der aktuelle Nutzer hat keine Berechtigung, dieses Tier zu löschen.");
        }
    }
}