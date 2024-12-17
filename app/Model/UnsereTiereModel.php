<?php

namespace app\model;

use core\Connection;
use Exception;

class UnsereTiereModel
{
    private ?Connection $db;

    /**
     * @throws Exception
     */
    public function __construct()
    {
        try {
            $this->db = Connection::getInstance();
        } catch (Exception $e) {
            throw new Exception("Datenbankverbindung fehlgeschlagen: " . $e->getMessage());
        }
    }

    /**
     * @throws Exception
     */
    public function findAllTiere(): array
    {
        $sql = "SELECT * FROM Tiere AS t JOIN tierart AS ta ON t.TierartID = ta.TierartID;";

        $result = $this->db->executeQuery($sql);

        $alleTiere = [];
        foreach ($result as $row) {
            $bilderSql = "SELECT * FROM  bilder AS b WHERE b.TierID = ".$row['TierID'];

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