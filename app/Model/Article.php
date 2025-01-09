<?php
namespace App\Model;

use App\Core\Database;

class Article
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function findAllArticles(): array
    {
        $sql = "SELECT * FROM artikel ORDER BY Datum DESC;";
        return $this->db->executeQuery($sql);
    }

    public function findArticleById(int $articleId): array
    {
        $sql = "SELECT * FROM artikel WHERE ArtikelID = ?;";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param('i', $articleId);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }
}

/*
declare(strict_types=1);

namespace app\Model;

use PDO;

class ArticleModel
{
    private PDO $db;

{
    protected ?Connection $db;

    /**
     * @throws Exception
     */
   /* protected function __construct()
    {
        try {
            $this->db = Connection::getInstance();
        } catch (Exception $e) {
            throw new Exception("Datenbankverbindung fehlgeschlagen: " . $e->getMessage());
        }
    }

    /**
     * Lädt alle Artikel mit Limit und Offset
     */
   /* public function findAllArticles(int $offset, int $limit): array
    {
        $stmt = $this->db->prepare('SELECT * FROM Artikel ORDER BY Datum DESC LIMIT :offset, :limit');
        $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
        $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Lädt die Details anhand ID
     */
  /*  public function findArticleById(int $id): ?array
    {
        $stmt = $this->db->prepare('SELECT * FROM Artikel WHERE id = :id');
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        $article = $stmt->fetch(PDO::FETCH_ASSOC);
        return $article ?: null;
    }
}
