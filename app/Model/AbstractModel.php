<?php

namespace app\model;

require_once './app/core/Connection.php';

use app\core\Connection;
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

            $stmt = $db->prepare($sql);
            $stmt->execute($whereParameter);

            if ($limit === 1){
                return $stmt->fetch();
            }

            return $stmt->fetchAll();
        } catch (Throwable $exception){
            die ("Fehler beim Holen der Daten {$className}");
        }
    }

    private static function getClassname (): string
    {
        return strtolower(str_replace('Model\\', '', get_called_class()));
    }

}