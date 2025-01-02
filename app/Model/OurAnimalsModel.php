<?php

declare(strict_types=1);

namespace app\model;

use Exception;

class OurAnimalsModel extends AbstractModel
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @throws Exception
     */
    public function findAllAnimals($species, $offset, $breed, $gender): array
    {
        $sql = "SELECT * FROM Tiere AS t JOIN rasse AS r ON t.RasseID = r.RasseID JOIN tierart AS ta ON r.TierartID = ta.TierartID";

        $conditions = [];
        $params = [];
        $types = "";

        if ($species !== "Alle Tiere" && $species !== "0") {
            $conditions[] = "ta.Tierart = ?";
            $params[] = $species;
            $types .= "s";
        }

        if ($breed !== "0") {
            $conditions[] = "r.Rasse = ?";
            $params[] = $breed;
            $types .= "s";
        }

        if ($gender !== "0" && $gender !== "") {
            $conditions[] = "t.Geschlecht = ?";
            $params[] = $gender;
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

        return $this->formatAnimals($result);
    }

    /**
     * @throws Exception
     */
    public function countAllAnimalsInThisCategory($species, $breed, $gender): string
    {
        $sql = "SELECT COUNT(*) AS Anzahl FROM tiere AS t JOIN rasse AS r ON t.RasseID = r.RasseID
                    JOIN tierart AS ta ON ta.TierartID = r.TierartID ";

        $conditions = [];
        $params = [];
        $types = "";

        if ($species !== "Alle Tiere" && $species !== "0") {
            $conditions[] = "ta.Tierart = ?";
            $params[] = $species;
            $types .= "s";
        }

        if ($breed !== "0") {
            $conditions[] = "r.Rasse = ?";
            $params[] = $breed;
            $types .= "s";
        }

        if ($gender !== "0" && $gender !== "") {
            $conditions[] = "t.Geschlecht = ?";
            $params[] = $gender;
            $types .= "s";
        }

        if (!empty($conditions)) {
            $sql .= " WHERE " . implode(" AND ", $conditions);

            $stmt = $this->db->prepare($sql);

            $stmt->bind_param($types, ...$params);

            $stmt->execute();
            $result = $stmt->get_result();

            $row = $result->fetch_assoc();
            return (string)$row['Anzahl'];
        } else {
            $result = $this->db->executeQuery($sql);

            return $result[0]['Anzahl'];
        }
    }

    /**
     * @throws Exception
     */
    public function findAllSpeciesAndBreeds(): array
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
    public function findAllGender(): array
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

    /**
     * @throws Exception
     */
    public function findThreeRandomAnimals(): array
    {
        $sql = "SELECT * FROM Tiere AS t JOIN rasse AS r ON t.RasseID = r.RasseID JOIN tierart AS ta ON ta.TierartID = r.TierartID ORDER BY RAND() LIMIT 3;";

        $stmt = $this->db->prepare($sql);

        $stmt->execute();

        $result = $stmt->get_result();
        return $this->formatAnimals($result);
    }

    /**
     * @throws Exception
     */
    private function formatAnimals($animalResult): array
    {
        $allAnimals = [];
        foreach ($animalResult as $row) {
            $pictureSql = "SELECT * FROM  bildertiere AS b WHERE b.TierID = ".$row['TierID'];

            $resultPictures = $this->db->executeQuery($pictureSql);

            $allPictures = [];
            foreach ($resultPictures as $rowPicture) {
                $allPictures[] = [
                    'Hauptbild' => $rowPicture['Hauptbild'],
                    'Bildadresse' => $rowPicture['Bildadresse'],
                    'Alternativtext' => $rowPicture['Alternativtext'],
                ];
            }

            $allAnimals[] = [
                'TierID' => $row['TierID'],
                'Name' => $row['Name'],
                'Beschreibung' => $row['Beschreibung'],
                'Geschlecht' => $row['Geschlecht'],
                'Geburtsjahr' => $row['Geburtsjahr'],
                'Charakter' => $row['Charakter'],
                'Datum' => $row['Datum'],
                'Tierart' => $row['Tierart'],
                'Bilder' => $allPictures,
            ];
        }

        return $allAnimals;
    }
}