<?php

namespace App\Model;

use core\Connection;

class CurrentModel
{
    // Holt alle Artikel aus der Datenbank
    public function getAllArticles($offset = 0, $limit = 8)
    {
        $pdo = Connection::getInstance()->getPDO();
        $stmt = $pdo->prepare('SELECT * FROM Artikel ORDER BY Datum DESC LIMIT :limit OFFSET :offset');
        $stmt->bindValue(':limit', (int)$limit, \PDO::PARAM_INT);
        $stmt->bindValue(':offset', (int)$offset, \PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    // Holt einen einzelnen Artikel anhand der ID
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
