<?php

//hier kommen die CRUD-Statements rein
namespace app\Model;

require_once './core/Connection.php';
require_once './app/Model/VermisstGefundenTier.php';
require_once './app/Model/Tier.php';

use core\Connection;
use app\Model\VermisstGefundenTier;
use app\Model\Tierart;
use Exception;
use InvalidArgumentException;

class VermisstGefundenTierModel extends AbstractModel {
    private $db;

    public function __construct() {
        $this->db = Connection::getInstance()->getConnection();
    }

   public function insertVermisstGefundenTiere (VermisstGefundenTier $vermisstGefundenTier, Tierart $tierart){
       // Start einer Transaktion, um Konsistenz zu gewährleisten
       $this->db->begin_transaction();

       try {

           //---------------------------------------------Tierart-----------------------------------------------
           $queryTierart = "INSERT INTO Tierart (Tierart) VALUES (?)"; // TODO: statt INSERT abfragen, ob die Art bereits existiert
           $stmtTierart = $this->db->prepare($queryTierart);

           if ($stmtTierart->error !== "") {
               throw new Exception('Fehler bei der Vorbereitung der SQL-Abfrage: ' . $stmtTierart->error);
           }

           $valueTierart = $tierart->getTierart();
           
           $stmtTierart->bind_param('s', $valueTierart1);

           if (!$stmtTierart->execute()) {
               throw new \Exception('Fehler bei der Ausführung der SQL-Abfrage:' . $stmtTierart->error);
           }
           //Hole die generierte TierartID
           $tierartID = $this->db->insert_id;

           //-------------------------------------------------Nutzer-----------------------------------------------

           $nutzerID = 1; //to do: aktuellen Nutzer abfragen

           //--------------------------------------------VermisstGefundenTier---------------------------------------

           $queryVermisstGefundenTier = "INSERT INTO VermisstGefundenTiere (ZuletztGeandertNutzerID, TierartID, Typ, Datum, Ort, Beschreibung, Kontaktaufnahme, Bildadresse, Geloescht, ZuletztGeandert)";

           $stmtVermisstGefundenTier = $this->db->prepare($queryVermisstGefundenTier);

           if ($stmtTierart->error !== "") {
               throw new InvalidArgumentException('Fehler bei der Vorbereitung der SQL-Abfrage: ' . $stmtTierart->error);
           }

           $valuesVermisstGefundenTier = $vermisstGefundenTier->getValuesForInsert($nutzerID, $tierartID);

           $typesVermisstGefundenTier = self::determineType($valuesVermisstGefundenTier);

           $stmtVermisstGefundenTier->bind_param($typesVermisstGefundenTier, $valuesVermisstGefundenTier);

           if (!$stmtTierart->execute()) {
               throw new InvalidArgumentException('Fehler bei der Ausführung der SQL-Abfrage:' . $stmtTierart->error);
               // TODO: PHPDocs; InvalidArgumentException & ohne "\"
           }

       } catch (mysqli_sql_exception $exception) {
            $this->db->rollback();
            throw $exception;
       }
   }
}