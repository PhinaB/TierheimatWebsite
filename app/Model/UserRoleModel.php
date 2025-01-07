<?php

namespace app\model;

use Exception;
use InvalidArgumentException;

require_once __DIR__ . '/AbstractModel.php';

class UserRoleModel extends AbstractModel
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @throws Exception
     */
    public function getUserRoles(int $currentUserId){

        if ($currentUserId <= 0) {
            throw new InvalidArgumentException('Ungültige Nutzer-ID.');
        }

        $sql = "SELECT NutzerrollenID FROM Nutzer WHERE NutzerID = ?";
        $stmt = $this->db->prepare($sql);
        if (!$stmt) {
            throw new Exception('Fehler bei der Vorbereitung der SQL-Abfrage.');
        }
        $stmt->bind_param('i', $currentUserId);
        $stmt->execute();

        $userResult = $stmt->get_result();

        if ($userResult->num_rows === 0) {
            throw new InvalidArgumentException('Keine Nutzerrolle für diesen Nutzer gefunden.');
        }

        $userArray = $userResult->fetch_assoc();
        $userRoleId = $userArray['NutzerrollenID'];

        $sqlUserRoles = "SELECT * FROM Nutzerrollen WHERE NutzerrollenID = ?";
        $stmtUserRoles = $this->db->prepare($sqlUserRoles);
        if (!$stmtUserRoles) {
            throw new Exception('Fehler bei der Vorbereitung der SQL-Abfrage.');
        }
        $stmtUserRoles->bind_param('i', $userRoleId);
        $stmtUserRoles->execute();

        $userRoleResult = $stmtUserRoles->get_result();


        return $userRoleResult->fetch_assoc();
    }

}