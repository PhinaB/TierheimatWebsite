<?php

namespace app\Model;

use core\Connection;
use Exception;
use mysqli;

class ServiceInfoModel extends AbstractModel
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @throws Exception
     */
    public function saveServiceInfo($unterstuetzungsart, $dates, $times, $weekdays, $weekdayTimes): void
    {
        try {
            if ($dates[0] !== '' && $times[0] !== '') {
                for ($i = 0; $i < count($dates); $i++) {
                    $query = "INSERT INTO helfen (NutzerID, ArtDerHilfe, Angenommen, Zeit, Datum, Wochentag) 
                        VALUES (?, ?, ?, ?, ?, ?)";

                    $stmt = $this->db->prepare($query);

                    if ($stmt->error !== "") {
                        throw new Exception('Fehler bei der Vorbereitung der SQL-Abfrage: ' . $stmt->error);
                    }

                    $nutzerID = 1; // TODO: Nutzer hinzufügen
                    $angenommen = false;
                    $zeit = $times[$i];
                    $datum = $dates[$i];
                    $wochentag = null;

                    // Binde die Parameter an das Statement (s = string, i = integer, b = boolean)
                    $stmt->bind_param("iiisss", $nutzerID, $unterstuetzungsart, $angenommen, $zeit, $datum, $wochentag);

                    // Führe das Statement aus
                    if ($stmt->error !== "") {
                        throw new Exception('Fehler bei der Vorbereitung der SQL-Abfrage: ' . $stmt->error);
                    }

                    if (!$stmt->execute()) {
                        throw new Exception("Fehler bei der Ausführung der SQL-Abfrage: $stmt->error");
                    }
                }
            }

            if ($weekdays[0] !== '0' && $weekdayTimes[0] !== '') {
                for ($i = 0; $i < count($weekdays); $i++) {
                    $query = "INSERT INTO helfen (NutzerID, ArtDerHilfe, Angenommen, Zeit, Datum, Wochentag) 
                        VALUES (?, ?, ?, ?, ?, ?)";

                    $stmt = $this->db->prepare($query);

                    if ($stmt->error !== "") {
                        throw new Exception('Fehler bei der Vorbereitung der SQL-Abfrage: ' . $stmt->error);
                    }

                    $nutzerID = 1; // TODO: Nutzer hinzufügen
                    $angenommen = false;
                    $zeit = $weekdayTimes[$i];
                    $datum = null;
                    $wochentag = $weekdays[$i];

                    // Binde die Parameter an das Statement (s = string, i = integer, b = boolean)
                    $stmt->bind_param("iiisss", $nutzerID, $unterstuetzungsart, $angenommen, $zeit, $datum, $wochentag);

                    if ($stmt->error !== "") {
                        throw new Exception('Fehler bei der Vorbereitung der SQL-Abfrage: ' . $stmt->error);
                    }

                    if (!$stmt->execute()) {
                        throw new Exception("Fehler bei der Ausführung der SQL-Abfrage: $stmt->error");
                    }
                }
            }
        } catch (Exception) {
            // TODO: Anweisungen, die jetzt auf die db geschrieben wurden wieder rückgängig machen
        }
    }

    /**
     * @throws Exception
     */
    public function findAllHilfearten(): array
    {
        $sql = "SELECT * FROM artderhilfe;";

        $result = $this->db->executeQuery($sql);

        $alleHilfearten = [];
        foreach ($result as $rowBilder) {
            $alleHilfearten[] = [
                'artDerHilfe' => $rowBilder['ArtDerHilfe'],
            ];
        }

        return $alleHilfearten;
    }
}