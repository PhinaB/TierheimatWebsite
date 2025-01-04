<?php

declare(strict_types=1);

namespace app\model;

use core\Connection;
use Exception;
use InvalidArgumentException;
use mysqli;

class UserModel extends AbstractModel
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @throws Exception
     */
    public function insertNutzer(User $nutzer){

        $this->db->begin_transaction();
        try {
            //-----------------UserRole-------------------------------------
            //wenn sie existiert wird ID ausgelesen, wenn sie nicht existiert Exception

            $sqlNutzerrolleExists = "SELECT * FROM Nutzerrollen WHERE Rolle= ?";
            $stmtNutzerrolleExists = $this->db->prepare($sqlNutzerrolleExists);
            if ($stmtNutzerrolleExists->error !== "") {
                throw new Exception('Fehler bei der Vorbereitung der SQL-Abfrage: ' . $stmtNutzerrolleExists->error);
            }
            //per default bei Anlegen User
            $defaultNutzerrolle = "Nutzer";
            $stmtNutzerrolleExists->bind_param("s", $defaultNutzerrolle);
            if (!$stmtNutzerrolleExists->execute()) {
                throw new InvalidArgumentException('Fehler bei der Ausführung der SQL-Abfrage:' . $stmtNutzerrolleExists->error);
            }

            $resultNutzerrolle = $stmtNutzerrolleExists->get_result();
            if ($resultNutzerrolle->num_rows > 0) {
                // UserRole existiert bereits -> NutzerrollenID abrufen
                $row = $resultNutzerrolle->fetch_assoc();
                $nutzerrollenID = $row['NutzerrollenID'];
                $stmtNutzerrolleExists->close();
            } else {
                //UserRole existiert nicht: wird vom Admin verwaltet, wenn nicht gesetzt Fehlermeldung
                throw new Exception('Die UserRole existiert nicht.');
            }


            //-----------------User-------------------------------------------
            $sqlNutzerExists = "SELECT * FROM Nutzer WHERE email= ?";
            $stmtNutzerExists = $this->db->prepare($sqlNutzerExists);
            if ($stmtNutzerExists->error !== "") {
                throw new Exception('Fehler bei der Vorbereitung der SQL-Abfrage: ' . $stmtNutzerExists->error);
            }
            $handedEmail = $nutzer->getEmail();
            $stmtNutzerExists->bind_param("s", $handedEmail);
            if (!$stmtNutzerExists->execute()) {
                throw new InvalidArgumentException('Fehler bei der Ausführung der SQL-Abfrage:' . $stmtNutzerExists->error);
            }

            $result = $stmtNutzerExists->get_result();
            $stmtNutzerExists->close();

            if ($result->num_rows > 0) {
                //User existiert bereits: abbruch
                throw new Exception('Der User existiert bereits!');
            } else {

                //User existiert nicht: anlegen
                $sqlNewNutzer = "INSERT INTO Nutzer (NutzerrollenID, Name, Email, Passwort) VALUES (?, ?, ?, ?)";
                $stmtNewNutzer = $this->db->prepare($sqlNewNutzer);

                $valuesNutzer = $nutzer->getValuesForInsert($nutzerrollenID);
                $typesNutzer = self::determineType($valuesNutzer);

                $stmtNewNutzer->bind_param($typesNutzer, ... $valuesNutzer);

                if (!$stmtNewNutzer->execute()) {
                    throw new InvalidArgumentException('Fehler bei der Ausführung der SQL-Abfrage:' . $stmtNewNutzer->error);
                }
                $stmtNewNutzer->close();
                $this->db->commit();
            }
        }
        catch (Exception $e) {
            // Falls ein Fehler auftritt, rollback die Transaktion
            $this->db->rollback();
            throw new Exception("Fehler bei der Registrierung: " . $e->getMessage());
        }
    }

    /**
     * @throws Exception
     */
    public function getNutzerByEmail(string $email): ?array
    {
        $sqlNutzerEmail = "SELECT * FROM Nutzer WHERE Email = ?";
        $stmtNutzerEmail = $this->db->prepare($sqlNutzerEmail);
        if ($stmtNutzerEmail ->error !== "") {
            throw new Exception('Fehler bei der Vorbereitung der SQL-Abfrage: ' . $stmtNutzerEmail ->error);
        }
        $stmtNutzerEmail->bind_param('s', $email);
        if (!$stmtNutzerEmail->execute()) {
            throw new InvalidArgumentException('Fehler bei der Ausführung der SQL-Abfrage:' . $stmtNutzerEmail->error);
        }
        $resultNutzer = $stmtNutzerEmail->get_result();

        if ($resultNutzer->num_rows === 0){
            return null;
        }
        // Daten werden als Array zurückgegeben: Array ([NutzerID] => 1 ...)
        return $resultNutzer->fetch_assoc();
    }

    public function getCurrentUserIdWithSession(){
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }

        if (!isset($_SESSION['nutzer_id'])){
            throw new InvalidArgumentException('Nutzer ist nicht eingeloggt oder Nutzer-ID ist nicht gesetzt.');
        }

        return $currentUserId = $_SESSION['nutzer_id'];
    }
}

