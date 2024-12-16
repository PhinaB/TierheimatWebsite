<?php

namespace app\model;

require_once '../../app/core/Connection.php';

use core\Connection;
use PDO;
use Throwable; /* genutzt um Ausnahmen und Fehler zu behandeln*/

class AbstractModel
{


    protected static function read(string $where = '', array $whereParameter = [], string $selector = '*', int $limit= -1): array
    {
        $db= Connection::getInstance()->getConnection();
        $className= self::getClassname();

        try{

            $sql = "SELECT {$selector} FROM {$className} {$className[0]}"; //$className[0] verwendet ersten Buchstaben der Klasse

            if($where !== '')
            {
                $sql .= " WHERE {$where}"; //{$where} übergebener string
            }
            if ($limit !== -1)
            {
                $sql .= " LIMIT {$limit}";
            }

            // Statement vorbereiten
            $stmt = $db->prepare($sql);
            if (!$stmt) {
                throw new \RuntimeException("Fehler beim Vorbereiten des Statements: " . $db->error);
            }

            // Typen der Parameter dynamisch bestimmen
            if (!empty($whereParameter)) {
                $types = self::determineType($whereParameter);

                // Parameter binden
                $stmt->bind_param($types, ...$whereParameter);
            }

            // Statement ausführen
            $stmt->execute();
            $result = $stmt->get_result();

            if ($limit === 1) {
                return $result->fetch_assoc(); // Einzelner Datensatz
            }

            $rows = [];
            while ($row = $result->fetch_assoc()) {
                $rows[] = $row;
            }
            return $rows;

        }
        catch (Throwable $exception){
            error_log("Fehler beim Holen der Daten {$className}: " . $exception->getMessage());
            die ("Fehler beim Holen der Daten {$className} :" . $exception->getMessage());
        }
    }



    /*INSERT INTO users (username, email, password)
    VALUES ('MaxMuster', 'max@example.com', 'passwort123');*/
    protected function insert(array $data)
    {
        //TO DO: implement
    }

    protected static function delete(string $where = '', array $whereParameter = []): bool
    {
        $db = Connection::getInstance()->getConnection();
        $className = self::getClassname();

        try {
            // Prüfen, ob eine WHERE-Bedingung übergeben wurde
            if (empty($where)) {
                throw new \InvalidArgumentException("WHERE-Klausel erforderlich, um DELETE auszuführen.");
            }

            $sql = "DELETE FROM {$className} WHERE {$where}";
            $stmt = $db->prepare($sql);
            if (!$stmt) {
                throw new \RuntimeException("Fehler beim Vorbereiten des Statements: " . $db->error);
            }

            if (!empty($whereParameter)) {

                $types = self::determineType($whereParameter);
                $stmt->bind_param($types, ...$whereParameter);
            }
            // SQL-Statement ausführen
            $stmt->execute();
            if (!$stmt->execute()){
                throw new \RuntimeException("Fehler beim Löschen der Daten: " . $stmt->error);
            }

            if ($stmt->affected_rows === 0){
                error_log ("Keine Datensätze wurde gelöscht aus {$className}");
                return false;
            }

            return true;

        } catch (Throwable $exception) {
            die ("Fehler beim Löschen der Daten der Tabelle {$className} :" . $exception->getMessage());
        }
    }

    public static function determineType (array $whereParameter = []): string
    {
        $types = ''; // String für Typen: 's', 'i', 'd', 'b'
        foreach ($whereParameter as $param) {
            if (is_int($param)) {
                $types .= 'i'; // Integer
            } elseif (is_float($param)) {
                $types .= 'd'; // Double
            } elseif (is_string($param)) {
                $types .= 's'; // String
            }
            elseif (is_null($param)) {
                $tyes .='s'; //NULL wird als string behandelt
            }
            else {
                throw new \InvalidArgumentException("Ungültiger Parameter-Typ: " . gettype($param));
            }
        }
            return $types;
    }
    private static function getClassname (): string
    {
        return strtolower(str_replace('Model\\', '', get_called_class()));
    }

}