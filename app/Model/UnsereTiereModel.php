<?php

namespace app\model;

use core\Connection;
use Exception;

class UnsereTiereModel
{

    public function __construct()
    {
    }

    /**
     * @throws Exception
     */
    public function findAllTiere()
    {
        $db = Connection::getInstance();

        $sql = "SELECT * FROM Tiere AS t
            JOIN tierart AS ta ON t.TierartID = ta.TierartID;
        ";

        $result = $db->query($sql);



        $alleTiere = [];
        foreach ($result as $row) {
            $bilderSql = "SELECT * FROM  bilder AS b
                WHERE b.TierID = ".$row['TierID'];

            /* TODO
            $stmt = $db->prepare($bilderSql);

            if ($stmt->error !== "") {
                throw new Exception('Fehler bei der Vorbereitung der SQL-Abfrage: ' . $stmt->error);
            }*/

            $resultBilder = $db->query($bilderSql);

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

        $response = [
            'tiere' => $alleTiere,
        ];

        return $response;

    }
}