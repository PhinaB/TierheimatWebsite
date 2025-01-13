<?php

declare(strict_types=1);

namespace app\model;

use core\Connection;
use DateTime;
use Exception;
use InvalidArgumentException;

class AbstractModel
{
    protected ?Connection $db;

    /**
     * @throws Exception
     */
    protected function __construct()
    {
        try {
            $this->db = Connection::getInstance();
        } catch (Exception $e) {
            throw new Exception("Datenbankverbindung fehlgeschlagen: " . $e->getMessage());
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
            } elseif (is_null($param)) {
                $types .='s'; //NULL wird als string behandelt
            } elseif (is_bool($param)) {
                $types .= 'i'; // Boolean als Integer behandeln
            } elseif ($param instanceof DateTime) {
                $types .= 's'; // DateTime wird als String behandelt
            } else {
                throw new InvalidArgumentException("Ungültiger Parameter-Typ: " . gettype($param));
            }
        }

        return $types;
    }
}