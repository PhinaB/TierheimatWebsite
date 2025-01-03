<?php

namespace app\model;

use Exception;
use InvalidArgumentException;

class UserRoleModel extends AbstractModel
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @throws Exception
     */
    public function getUserRole(){

        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }

        if (!isset($_SESSION['nutzer_id'])){
            throw new InvalidArgumentException('Nutzer ist nicht eingeloggt oder Nutzer-ID ist nicht gesetzt.');
        }

        $currentUserId = $_SESSION['nutzer_id'];
        $sql = "SELECT NutzerrollenID FROM Nutzer WHERE UserID = ?";
        $stmt = $this->db->prepare($sql);
        if (!$stmt) {
            throw new Exception('Fehler bei der Vorbereitung der SQL-Abfrage.');
        }
        $stmt->bind_param('i', $currentUserId);
        $stmt->execute();

        $userRoleArray = $stmt->get_result()->fetch_assoc();
        $userRoleId = $userRoleArray['NutzerrollenID'];

        if (!$userRoleId) {
            throw new InvalidArgumentException('Keine Nutzerrolle für diesen Nutzer gefunden.');
        }

        $sqlUserRoles = "SELECT * FROM Nutzerrollen WHERE NutzerrollenID = ?";
        $stmtUserRoles = $this->db->prepare($sqlUserRoles);
        if ($stmtUserRoles) {
            throw new Exception('Fehler bei der Vorbereitung der SQL-Abfrage.');
        }
        $stmtUserRoles->bind_param('i', $userRoleId);
        $stmtUserRoles->execute();

        $userRole = $stmtUserRoles->get_result()->fetch_assoc();

        if (!$userRole) {
            throw new InvalidArgumentException('Nutzerrolle konnte nicht geladen werden.');
        }

        return new UserRole(
            $userRole['NutzerrollenID'],
            $userRole['Rolle'],
            $userRole['kannLesen'],
            $userRole['kannSchreiben'],
            $userRole['kannEigenesBearbeitenUndLoeschen'],
            $userRole['kannAllesLoeschen']);
    }
}