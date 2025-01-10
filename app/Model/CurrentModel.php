<?php

declare(strict_types=1);

namespace app\Model;

use Exception;

class CurrentModel extends AbstractModel
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @throws Exception
     */
    public function findAllArticles(): array
    {
        $sql = "SELECT * FROM artikel ORDER BY Datum DESC";

        $result = $this->db->executeQuery($sql);

        $allArticles = [];
        foreach ($result as $row) {
            $allArticles[] = [
                'ArtikelID' => $row['ArtikelID'],
                'Ueberschrift' => $row['Ueberschrift'],
                'Text' => $row['Text'],
                'Datum' => $row['Datum'],
                'Bildadresse' => $row['Bildadresse'],
            ];
        }

        return $allArticles;
    }
}