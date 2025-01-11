<?php

declare(strict_types=1);

namespace app\Model;

use Exception;

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
                    
                    session_start();
                    $nutzerID = $_SESSION['nutzer_id']??null;
                    if(!$nutzerID){
                        throw new Exception('Keine gültige User-ID gefunden. Bitte einloggen.');
                    }
                    $angenommen = false;
                    $zeit = $times[$i];
                    $datum = $dates[$i];
                    $wochentag = null;

                    $stmt->bind_param("iiisss", $nutzerID, $unterstuetzungsart, $angenommen, $zeit, $datum, $wochentag);

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

                    session_start();
                    $nutzerID = $_SESSION['nutzer_id']??null;
                    if(!$nutzerID){
                        throw new Exception('Keine gültige User-ID gefunden. Bitte einloggen.');
                    }
                    $angenommen = false;
                    $zeit = $weekdayTimes[$i];
                    $datum = null;
                    $wochentag = $weekdays[$i];

                    $stmt->bind_param("iiisss", $nutzerID, $unterstuetzungsart, $angenommen, $zeit, $datum, $wochentag);

                    if ($stmt->error !== "") {
                        throw new Exception('Fehler bei der Vorbereitung der SQL-Abfrage: ' . $stmt->error);
                    }

                    if (!$stmt->execute()) {
                        throw new Exception("Fehler bei der Ausführung der SQL-Abfrage: $stmt->error");
                    }
                }
            }
        } catch (Exception $exception) {
            $this->db->rollback();
            throw $exception;
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

    /**
     * @throws Exception
     */
    public function findOneHilfeArtenByName($name): array
    {
        $sql = "SELECT * FROM artderhilfe WHERE ArtDerHilfe = ?;";

        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("s", $name);

        $stmt->execute();
        $result = $stmt->get_result();
        if ($result === false) {
            throw new Exception('Keine Hilfe gefunden');
        }

        return $result->fetch_assoc();
    }
}