<?php

namespace app\model;

use core\Connection;
use Exception;

class ArticlesModel extends AbstractModel
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Lädt alle Artikel mit einem Offset
     */
    public function findAllArticles(int $offset): array
    {
        $sql = "SELECT * FROM Artikel ORDER BY Datum DESC LIMIT 6 OFFSET ?";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("i", $offset);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    /**
     * Zählt die gesamte Anzahl der Artikel
     */
    public function countAllArticles(): int
    {
        $sql = "SELECT COUNT(*) AS Anzahl FROM Artikel";
        $result = $this->db->query($sql);
        $row = $result->fetch_assoc();

        return $row['Anzahl'];
    }
}
