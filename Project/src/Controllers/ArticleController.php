<?php
namespace src\Controllers;

use src\View\View;
use src\Models\Articles\Article;
use src\Models\Comments\Comment;
use src\Exceptions\NotFoundException;
use Exception;

class ArticleController
{
    private $view;

    public function __construct()
    {
        $this->view = new View(dirname(__DIR__, 2).'/templates');
    }

    public function index()
    {
        $articles = Article::findAll();
        $this->view->renderHtml('main/main', ['articles' => $articles]);
    }

    public function create()
    {
        $this->view->renderHtml('article/create');
    }

    public function store()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header("HTTP/1.1 405 Method Not Allowed");
            exit;
        }

        try {
            $article = new Article();
            $article->setName($_POST['name']);
            $article->setText($_POST['text']);
            $article->setAuthorId(1);
            $article->save();

            header("Location: " . BASE_URL . "/article/" . $article->getId());
            exit;
        } catch (Exception $e) {
            error_log($e->getMessage());
            header("Location: " . BASE_URL . "/article/create?error=1");
            exit;
        }
    }

    public function show(int $id)
    {
        try {
            $article = Article::getById($id);
            if (!$article) {
                throw new NotFoundException("Article not found");
            }

            $comments = Comment::findByArticleId($id);

            $this->view->renderHtml('article/show', [
                'article' => $article,
                'comments' => $comments,
                'title' => $article->getName()
            ]);
        } catch (NotFoundException $e) {
            $this->view->renderHtml('errors/404', ['error' => $e->getMessage()], 404);
        }
    }

    public function edit(int $id)
    {
        try {
            $article = Article::getById($id);

            if ($article === null) {
                throw new NotFoundException("Article not found");
            }

            $this->view->renderHtml('article/edit', ['article' => $article]);
        } catch (NotFoundException $e) {
            $this->view->renderHtml('errors/404', ['error' => $e->getMessage()], 404);
        }
    }

    public function update(int $id)
    {
        try {
            $article = Article::getById($id);

            if (!$article) {
                throw new NotFoundException("Article not found");
            }

            $article->setName($_POST['name']);
            $article->setText($_POST['text']);
            $article->save();

            header("Location: " . BASE_URL . "/article/" . $id);
            exit;
        } catch (NotFoundException $e) {
            $this->view->renderHtml('errors/404', ['error' => $e->getMessage()], 404);
        }
    }

    public function delete(int $id)
    {
        try {
            $article = Article::getById($id);

            if ($article === null) {
                throw new NotFoundException("Article not found");
            }

            $article->delete();
            header('Location: /');
            exit;
        } catch (NotFoundException $e) {
            $this->view->renderHtml('errors/404', ['error' => $e->getMessage()], 404);
        }
    }
}
