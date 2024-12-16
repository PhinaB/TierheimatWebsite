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

        try {
            $result = $this->db->query($sql);
            if (!$result) {
                throw new Exception("Fehler bei der Abfrage.");
            }
        } catch (Exception $e) {
            throw new Exception("Fehler beim Abrufen der Tierdaten: " . $e->getMessage());
        }

        $alleTiere = [];
        foreach ($result as $row) {
            $bilderSql = "SELECT * FROM  bilder AS b WHERE b.TierID = ".$row['TierID'];

            try {
                $resultBilder = $this->db->query($bilderSql);
                if (!$resultBilder) {
                    throw new Exception("Fehler bei der Abfrage der Bilder.");
                }
            } catch (Exception $e) {
                throw new Exception("Fehler beim Abrufen der Bilddaten: " . $e->getMessage());
            }

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

        return [
            'tiere' => $alleTiere,
        ];
    }
}