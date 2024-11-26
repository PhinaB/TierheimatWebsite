<?php

//hier kommen die CRUD-Statements rein
namespace app\model;

require_once './app/core/connection.php';
require_once './app/model/VermisstGefundenTier.php';
require_once './app/model/Tier.php';
require_once './app/model/TypTier.php';

use app\core\Connection;
use app\model\Tier;
use app\model\TypTier;

class VermisstGefundenTierModel {
    private $db;
    public function __construct() {
        $this->db = Connection::getInstance()->getConnection();
    }

    public function insertVermisstGefundenTiere (Tier $tier, VermisstGefundenTier $vermisstGefundenTier, TypTier $typTier){

        // Start einer Transaktion, um Konsistenz zu gewährleisten
        $this->db->begin_transaction();

        try {

                $stmtTyp = $this->db->prepare ("INSERT INTO ArtDerHilfeTyp (Typ) VALUES (?)");
                $stmtTyp->bind_param('s', $typTier->typ);

            if (!$stmtTyp->execute()) {
                throw new \Exception('Fehler beim Speichern des Tieres: ' . $stmtTyp->error);
            }

            // Hole die generierte TypID
            $typID = $this->db->insert_id;

               $stmtTier = $this->db->prepare("INSERT INTO Tiere (RasseID, ZuletztGeaendertNutzerID, TypID, Geschlecht, Beschreibung, Geburtsjahr, 
                Name, Kastriert, Gesundheitszustand, Charakter, Datum, Geloescht, ZuletztGeaendert) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)
                ");

                $stmtTier->bind_param(
                    'iiissisisssss',
                    $tier->rasseID,
                    $tier->zuletztGeaendertNutzerID,
                    $typID,
                    $tier->geschlecht,
                    $tier->beschreibung,
                    $tier->geburtsjahr,
                    $tier->name,
                    $tier->kastriert,
                    $tier->gesundheitszustand,
                    $tier->charakter,
                    $tier->datum,
                    $tier->geloescht,
                    $tier->zuletztGeaendert
                );

            if (!$stmtTier->execute()) {
                throw new \Exception('Fehler beim Speichern des Tieres: ' . $stmtTier->error);
            }

            // Hole die generierte TierID
            $tierID = $this->db->insert_id;

            $stmtVermisstGefundenTier= $this->db->prepare("INSERT INTO VermisstGefundenTiere (TierID, Ort, Knontaktaufnahme) VALUE (?, ?, ?)");
            $stmtVermisstGefundenTier->bind_param('iss', $tierID, $vermisstGefundenTier->ort, $vermisstGefundenTier->kontaktaufnahme);

            if (!$stmtVermisstGefundenTier->execute()) {
                throw new \Exception('Fehler beim Speichern der Vermisst-/Gefunden-Meldung: ' . $stmtVermisstGefunden->error);
            }

            $this->db->commit();
        } catch(mysqli_sql_exception $exception){
            $this->db->rollback();

            throw $exception;
        }
    }

}