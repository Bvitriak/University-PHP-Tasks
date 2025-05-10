<?php

namespace src\Controllers;

use src\Exceptions\NotFoundException;
use src\Models\Comments\Comment;
use src\Models\Articles\Article;
use src\View\View;
use RuntimeException;
use Exception;

class CommentController
{
    private $view;

    public function __construct()
    {
        $this->view = new View(dirname(__DIR__, 2).'/templates');
    }

    public function addComment(?int $articleId = null): void
    {
        if (!$articleId) {
            $articleId = (int)$_POST['article_id'];
        }

        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header("405 Method Not Allowed");
            exit;
        }

        if (empty($_POST['comment_text'])) {
            header("Location: " . BASE_URL . "/article/" . $articleId . "?error=empty_comment");
            exit;
        }

        $comment = new Comment();
        $comment->setArticleId($articleId);
        $comment->setAuthorId(1);
        $comment->setText($_POST['comment_text']);
        $comment->save();

        header("Location: " . BASE_URL . "/article/" . $articleId . "#comment-" . $comment->getId());
        exit;
    }

    public function edit(int $commentId): void
    {
        try {
            $comment = Comment::getById($commentId);

            if (!$comment) {
                throw new NotFoundException('Комментарий не найден');
            }

            $article = Article::getById($comment->getArticleId());

            if (!$article) {
                throw new NotFoundException('Статья не найдена');
            }

            $this->view->renderHtml('comment/edit', [
                'article' => $article,
                'comment' => $comment,
                'title' => 'Редактирование комментария'
            ]);
        } catch (NotFoundException $e) {
            $this->view->renderHtml('errors/404', ['error' => $e->getMessage()], 404);
        }
    }

    public function update(int $commentId): void
    {
        try {
            $comment = Comment::getById($commentId);

            if (!$comment) {
                throw new NotFoundException('Комментарий не найден');
            }

            if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
                throw new RuntimeException('Метод не поддерживается');
            }

            $comment->setText($_POST['text']);
            $comment->save();

            header("Location: " . BASE_URL . "/article/" . $comment->getArticleId());
            exit;
        } catch (Exception $e) {
            $this->view->renderHtml('errors/500', ['error' => $e->getMessage()], 500);
        }
    }

    public function delete(int $commentId): void
    {
        try {
            $comment = Comment::getById($commentId);

            if (!$comment) {
                throw new NotFoundException('Комментарий не найден');
            }

            $articleId = $comment->getArticleId();
            $comment->delete();

            header("Location: " . BASE_URL . "/article/" . $articleId);
            exit;
        } catch (Exception $e) {
            $this->view->renderHtml('errors/500', ['error' => $e->getMessage()], 500);
        }
    }
}
