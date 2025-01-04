<?php
namespace App\Controller;

use App\Core\Controller;
use App\Model\CurrentModel;

class CurrentController extends Controller
{
    private $currentModel;

    public function __construct()
    {
        parent::__construct();
        $this->currentModel = new CurrentModel();
    }

    public function loadCurrentAction()
    {
        $js = ['aktuelles.js'];
        $this->render('page/current', [], $js);
    }

    public function getArticleAction()
    {
        $id = $_GET['id'] ?? null;
        if (!$id) {
            echo json_encode(['error' => 'Artikel-ID fehlt.']);
            return;
        }

        $article = $this->currentModel->getArticleById($id);

        if (!$article) {
            echo json_encode(['error' => 'Artikel nicht gefunden.']);
        } else {
            echo json_encode($article);
        }
    }
}
