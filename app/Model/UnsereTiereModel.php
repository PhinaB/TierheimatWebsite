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
    public function findAllTiere($tierart): array
    {
        $sql = "SELECT * FROM Tiere AS t JOIN rasse AS r ON t.RasseID = r.RasseID JOIN tierart AS ta ON r.TierartID = ta.TierartID";

        $order = " ORDER BY t.Name";

        if ($tierart !== "Alle Tiere") {
            // TODO richtige Tierart ID suchen und nach allen Tieren suchen, die diese Tierart haben
            $sql .= " WHERE ta.Tierart = ?".$order.";";

            $stmt = $this->db->prepare($sql);
            $stmt->bind_param("s", $tierart);

            $stmt->execute();
            $result = $stmt->get_result();
        } else {
            $sql .= "$order;";

            $result = $this->db->executeQuery($sql);
        }

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