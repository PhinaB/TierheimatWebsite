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
