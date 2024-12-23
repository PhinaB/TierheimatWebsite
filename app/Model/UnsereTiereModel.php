<?php

namespace app\model;

use core\Connection;
use Exception;

class UnsereTiereModel extends AbstractModel
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @throws Exception
     */
    public function findAllTiere($tierart, $offset, $rasse, $geschlecht): array
    {
        $sql = "SELECT * FROM Tiere AS t JOIN rasse AS r ON t.RasseID = r.RasseID JOIN tierart AS ta ON r.TierartID = ta.TierartID";

        $conditions = [];
        $params = [];
        $types = "";

        if ($tierart !== "Alle Tiere" && $tierart !== "0") {
            $conditions[] = "ta.Tierart = ?";
            $params[] = $tierart;
            $types .= "s";
        }

        if ($rasse !== "0") {
            $conditions[] = "r.Rasse = ?";
            $params[] = $rasse;
            $types .= "s";
        }

        if ($geschlecht !== "0" && $geschlecht !== "") {
            $conditions[] = "t.Geschlecht = ?";
            $params[] = $geschlecht;
            $types .= "s";
        }

        if (!empty($conditions)) {
            $sql .= " WHERE " . implode(" AND ", $conditions);
        }

        $sql .= " ORDER BY t.Name LIMIT 8 OFFSET ?";

        $params[] = $offset;
        $types .= "i";

        $stmt = $this->db->prepare($sql);

        $stmt->bind_param($types, ...$params);

        $stmt->execute();
        $result = $stmt->get_result();

        $alleTiere = [];
        foreach ($result as $row) {
            $bilderSql = "SELECT * FROM  bildertiere AS b WHERE b.TierID = ".$row['TierID'];

            $resultBilder = $this->db->executeQuery($bilderSql);

            $alleBilder = [];
            foreach ($resultBilder as $rowBilder) {
                $alleBilder[] = [
                    'Hauptbild' => $rowBilder['Hauptbild'],
                    'Bildadresse' => $rowBilder['Bildadresse'],
                    'Alternativtext' => $rowBilder['Alternativtext'],
                ];
            }

            $alleTiere[] = [
                'TierID' => $row['TierID'],
                'Name' => $row['Name'],
                'Beschreibung' => $row['Beschreibung'],
                'Geschlecht' => $row['Geschlecht'],
                'Geburtsjahr' => $row['Geburtsjahr'],
                'Charakter' => $row['Charakter'],
                'Datum' => $row['Datum'],
                'Tierart' => $row['Tierart'],
                'Bilder' => $alleBilder,
            ];
        }

        return $alleTiere;
    }

    /**
     * @throws Exception
     */
    public function countAllAnimalsInThisCategory($tierart, $rasse, $geschlecht): int // TODO: auch nach rasse & geschlecht filtern
    {
        $sql = "SELECT COUNT(*) AS Anzahl FROM tiere AS t JOIN rasse AS r ON t.RasseID = r.RasseID
                    JOIN tierart AS ta ON ta.TierartID = r.TierartID ";

        $conditions = [];
        $params = [];
        $types = "";

        if ($tierart !== "Alle Tiere" && $tierart !== "0") {
            $conditions[] = "ta.Tierart = ?";
            $params[] = $tierart;
            $types .= "s";
        }

        if ($rasse !== "0") {
            $conditions[] = "r.Rasse = ?";
            $params[] = $rasse;
            $types .= "s";
        }

        if ($geschlecht !== "0" && $geschlecht !== "") {
            $conditions[] = "t.Geschlecht = ?";
            $params[] = $geschlecht;
            $types .= "s";
        }

        if (!empty($conditions)) {
            $sql .= " WHERE " . implode(" AND ", $conditions);

            $stmt = $this->db->prepare($sql);

            $stmt->bind_param($types, ...$params);

            $stmt->execute();
            $result = $stmt->get_result();

            $row = $result->fetch_assoc();
            return $row['Anzahl'];
        } else {
            $result = $this->db->executeQuery($sql);

            return $result[0]['Anzahl'];
        }
    }

    /**
     * @throws Exception
     */
    public function findAllTierartenAndRassen(): array
    {
        $sql = "SELECT Tierart, Rasse FROM tierart AS t JOIN rasse AS r ON r.TierartID = t.TierartID;";

        $result = $this->db->executeQuery($sql);

        $alleTierarten = [];
        foreach ($result as $row) {
            if (!isset($alleTierarten[$row['Tierart']])) {
                $alleTierarten[$row['Tierart']] = [
                    'name' => $row['Tierart'],
                    'rassen' => [],
                ];
            }

            $alleTierarten[$row['Tierart']]['rassen'][] = ['name' => $row['Rasse']];
        }

        return array_values($alleTierarten);
    }

    /**
     * @throws Exception
     */
    public function findAllGeschlechter(): array
    {
        $sql = "SELECT DISTINCT Geschlecht FROM tiere;";

        $result = $this->db->executeQuery($sql);

        $alleGeschlechter = [];
        foreach ($result as $row) {
            $alleGeschlechter[] = [
                'name' => $row['Geschlecht'],
            ];
        }

        return $alleGeschlechter;
    }
}