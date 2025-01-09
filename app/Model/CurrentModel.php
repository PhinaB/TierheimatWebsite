<?php

declare(strict_types=1);

namespace app\Model;

use core\Database;
use Exception;

class CurrentModel extends AbstractModel
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Holt Artikel mit Limit und Offset
     * @param int $offset
     * @return array
     * @throws Exception
     */
    public function findAllArticles(int $offset): array
    {
        $sql = "SELECT ArtikelID, Ueberschrift, Text, Datum, Bildadresse 
                FROM Artikel 
                ORDER BY Datum DESC 
                LIMIT 8 OFFSET ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$offset]);
        return $stmt->fetchAll();
    }

    /**
     * Holt Details eines einzelnen Artikels
     * @param int $articleId
     * @return array|false
     * @throws Exception
     */
    public function findArticleById(int $articleId): array|false
    {
        $sql = "SELECT ArtikelID, Ueberschrift, Text, Datum, Bildadresse 
                FROM Artikel 
                WHERE ArtikelID = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$articleId]);
        return $stmt->fetch();
    }
}




/*
declare(strict_types=1);

namespace app\Model;

use core\Database;
use Exception;

class CurrentModel extends AbstractModel
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Holt Artikel mit Limit und Offset
     * @param int $offset
     * @return array
     * @throws Exception
     */
   /* public function findAllArticles(int $offset): array
    {
        $sql = "SELECT ArtikelID, Ueberschrift, Text, Datum, Bildadresse 
                FROM Artikel 
                ORDER BY Datum DESC 
                LIMIT 8 OFFSET ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$offset]);
        return $stmt->fetchAll();
    }

    /**
     * Holt Details eines einzelnen Artikels
     * @param int $articleId
     * @return array
     * @throws Exception
     */
  /*  public function findArticleById(int $articleId): array
    {
        $sql = "SELECT ArtikelID, Ueberschrift, Text, Datum, Bildadresse 
                FROM Artikel 
                WHERE ArtikelID = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$articleId]);
        return $stmt->fetch();
    }
}


/*

declare(strict_types=1);

namespace app\Model;

use core\Database;
use Exception;

class CurrentModel extends AbstractModel
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Holt Artikel mit einem Offset
     * @param int $offset
     * @return array
     * @throws Exception
     */
   /* public function findAllArticles(int $offset): array
    {
        $sql = "SELECT * FROM Artikel ORDER BY Datum DESC LIMIT 8 OFFSET ?";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param('i', $offset);
        $stmt->execute();
        $result = $stmt->get_result();

        $articles = [];
        while ($row = $result->fetch_assoc()) {
            $articles[] = $row;
        }

        return $articles; // wird als array gespeichert und gibt artikel zurück
    }

    /**
     * Holt einen einzelnen Artikel anhand der ID
     * @param int $articleId
     * @return array|null
     * @throws Exception
     */
  /*  public function findArticleById(int $articleId): ?array
    {
        $sql = "SELECT * FROM Artikel WHERE ArtikelID = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param('i', $articleId);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc() ?: null; // wenn der artikel nicht gefunden wird, wird null ausgegeben
    }
}



/*
namespace App\Model;

use core\Connection;

class CurrentModel
{
    // Holt alle Artikel aus der Datenbank
    public function getAllArticles($offset = 0, $limit = 7)
    {
        $pdo = Connection::getInstance()->getPDO();
        $stmt = $pdo->prepare('SELECT * FROM Artikel ORDER BY Datum DESC LIMIT :limit OFFSET :offset');
        $stmt->bindValue(':limit', (int)$limit, \PDO::PARAM_INT); //begrenzt dieanzahl der zurücgegeben artikel auf den wert von limit
        $stmt->bindValue(':offset', (int)$offset, \PDO::PARAM_INT); //offset gibt an ab welchen eintrag in der tabelle mit der abfrage begonnen wird
        $stmt->execute();
        return $stmt->fetchAll();
    }

    // Holt einen einzelnen Artikel anhand der ID
    // ID ist in der DB auf Auto_Increment
    public function getArticleById($id)
    {
        $pdo = Connection::getInstance()->getPDO();
        $stmt = $pdo->prepare('SELECT * FROM Artikel WHERE ArtikelID = :id');
        $stmt->execute(['id' => $id]);
        return $stmt->fetch();
    }

    // Zählt die Gesamtanzahl der Artikel
    public function countAllArticles()
    {
        $pdo = Connection::getInstance()->getPDO();
        $stmt = $pdo->query('SELECT COUNT(*) FROM Artikel');
        return $stmt->fetchColumn();
    }
}






// das war ein Versuch welcher sich an deiner Vorlage Orientiert hat, das übergeordnete war eine smarte Lösung von youtube um den code einzugrenzen





/*

namespace App\Model;

use core\Connection;
use PDO;
use PDOException;

class CurrentModel
{
    /**
     * Holt alle Artikel aus Datenbank mit nummerierung.
     *
     * @param int $offset Startpunkt für die Abfrage.
     * @param int $limit Anzahl der Artikel, die abgerufen werden sollen.
     * @return array Liste der Artikel.
     * @throws PDOException
     */
   /* public function getAllArticles($offset = 0, $limit = 7): array
    {
        $pdo = Connection::getInstance()->getPDO();

        $sql = 'SELECT * FROM Artikel ORDER BY Datum DESC LIMIT :limit OFFSET :offset';
        $stmt = $pdo->prepare($sql);

        $stmt->bindValue(':limit', (int)$limit, PDO::PARAM_INT);
        $stmt->bindValue(':offset', (int)$offset, PDO::PARAM_INT);

        $stmt->execute();

        $articles = $stmt->fetchAll(PDO::FETCH_ASSOC); //Assoc bewirkt, dass die zurückgegebenen werte als array vorliegen

        return $articles ?: []; // Gibt immer ein leeres Array zurück, falls keine Artikel gefunden wurden
    }

    /**
     * Holt einen einzelnen Artikel anhand der ID.
     *
     * @param int $id ID des Artikels.
     * @return array|null Der Artikel oder null, falls nicht gefunden.
     * @throws PDOException
     */
   /* public function getArticleById(int $id): ?array
    {
        $pdo = Connection::getInstance()->getPDO();

        $sql = 'SELECT * FROM Artikel WHERE ArtikelID = :id';
        $stmt = $pdo->prepare($sql);

        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        $article = $stmt->fetch(PDO::FETCH_ASSOC);

        return $article ?: null; // Gibt null zurück, falls der Artikel nicht existiert
    }

    /**
     * Zählt die Gesamtanzahl der Artikel in der Datenbank.
     *
     * @return int Anzahl der Artikel.
     * @throws PDOException
     */
   /* public function countAllArticles(): int
    {
        $pdo = Connection::getInstance()->getPDO();

        $sql = 'SELECT COUNT(*) FROM Artikel';
        $stmt = $pdo->query($sql);

        return (int)$stmt->fetchColumn(); // Immer als Integer zurückgeben laut stackOverflow
    }

    /**
     * Formatiert eine Liste von Artikeln in eine einheitliche Struktur
     *
     * @param array $articles die ursprünglichen Artikeldaten
     * @return array Formatierte Artikeldaten
     */
    /* private function formatArticles(array $articles): array
    {
        return array_map(function ($article) {
            return [
                'id' => $article['ArtikelID'],
                'title' => $article['Ueberschrift'],
                'content' => $article['Text'],
                'date' => $article['Datum'],
                'image' => $article['Bildadresse'],
            ];
        }, $articles);
    }

}
