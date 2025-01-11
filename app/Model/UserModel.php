<?php

declare(strict_types=1);

namespace app\model;

use app\Model\Entity\User;
use Exception;
use InvalidArgumentException;

class UserModel extends AbstractModel
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @throws Exception
     */
    public function insertNutzer(User $nutzer): void
    {
        $this->db->begin_transaction();
        try {
            $sqlNutzerrolleExists = "SELECT * FROM nutzerrollen WHERE Rolle= ?";
            $stmtNutzerrolleExists = $this->db->prepare($sqlNutzerrolleExists);
            if ($stmtNutzerrolleExists->error !== "") {
                throw new Exception('Fehler bei der Vorbereitung der SQL-Abfrage: ' . $stmtNutzerrolleExists->error);
            }
            $defaultNutzerrolle = "Nutzer";
            $stmtNutzerrolleExists->bind_param("s", $defaultNutzerrolle);
            if (!$stmtNutzerrolleExists->execute()) {
                throw new InvalidArgumentException('Fehler bei der Ausführung der SQL-Abfrage:' . $stmtNutzerrolleExists->error);
            }

            $resultNutzerrolle = $stmtNutzerrolleExists->get_result();
            if ($resultNutzerrolle->num_rows > 0) {
                $row = $resultNutzerrolle->fetch_assoc();
                $nutzerrollenID = $row['NutzerrollenID'];
                $stmtNutzerrolleExists->close();
            } else {
                throw new Exception('Die UserRole existiert nicht.');
            }

            $sqlNutzerExists = "SELECT * FROM nutzer WHERE email= ?";
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
                throw new Exception('Der Nutzer existiert bereits!');
            } else {
                $sqlNewNutzer = "INSERT INTO nutzer (NutzerrollenID, Name, Email, Passwort) VALUES (?, ?, ?, ?)";
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
            $this->db->rollback();
            throw new Exception("Fehler bei der Registrierung: " . $e->getMessage());
        }
    }

    /**
     * @throws Exception
     */
    public function getNutzerByEmail(string $email): ?array
    {
        $sqlNutzerEmail = "SELECT * FROM nutzer WHERE Email = ?";
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

        return $resultNutzer->fetch_assoc();
    }

    public function getCurrentUserIdWithSession(){
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }

        if (!isset($_SESSION['nutzer_id'])){
            throw new InvalidArgumentException('Nutzer ist nicht eingeloggt oder Nutzer-ID ist nicht gesetzt.');
        }

        return $_SESSION['nutzer_id'];
    }
}

