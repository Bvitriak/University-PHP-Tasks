<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);


define('BASE_PATH', dirname(__DIR__));
define('BASE_URL', 'http://' . $_SERVER['HTTP_HOST'] . '/php/Project');
define('APP_PATH', BASE_PATH . '/src');


require __DIR__ . '/../src/autoload.php';

use src\Controllers\ArticleController;
use src\Controllers\MainController;
use src\Controllers\CommentController;
use src\Exceptions\NotFoundException;
use src\View\View;

if (!class_exists('src\Services\Database')) {
    die('Database class still not loaded. Check autoloader.');
}
try {
    $requestUri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    $basePath = '/php/Project';
    $route = str_replace($basePath, '', $requestUri);

    switch ($route) {
        case '/':
            (new ArticleController())->index();
            break;
        case '/hello':
            (new MainController())->sayHello('Guest');
            break;
        case '/bye':
            (new MainController())->sayBye('Guest');
            break;
        case '/article/create':
            (new ArticleController())->create();
            break;
        case '/article/store':
            (new ArticleController())->store();
            break;
        case '/article/update':
            (new ArticleController())->update($_POST['id']);
            break;
        case preg_match('~^/comment/(\d+)/edit$~', $route, $matches) ? true : false:
            (new CommentController())->edit($matches[1]);
            break;
        case preg_match('~^/comment/(\d+)/update$~', $route, $matches) ? true : false:
            (new CommentController())->update($matches[1]);
            break;
        case preg_match('~^/comment/(\d+)/delete$~', $route, $matches) ? true : false:
            (new CommentController())->delete($matches[1]);
            break;
        default:
            if (preg_match('~^/article/(\d+)/comments$~', $route, $matches)) {
                (new CommentController())->addComment($matches[1]);
            } elseif (preg_match('~^/article/(\d+)$~', $route, $matches)) {
                (new ArticleController())->show($matches[1]);
            } elseif (preg_match('~^/article/(\d+)/edit$~', $route, $matches)) {
                (new ArticleController())->edit($matches[1]);
            } elseif (preg_match('~^/article/(\d+)/update$~', $route, $matches)) {
                (new ArticleController())->update($matches[1]);
            } elseif (preg_match('~^/article/(\d+)/delete$~', $route, $matches)) {
                (new ArticleController())->delete($matches[1]);
            } else {
                throw new NotFoundException();
            }
    }
} catch (NotFoundException $e) {
    header("404 Not Found");
    (new View(APP_PATH . '/../templates'))->renderHtml('errors/404', [], 404);
} catch (Exception $e) {
    header("500 Internal Server Error");
    (new View(APP_PATH . '/../templates'))->renderHtml('errors/500', ['error' => $e->getMessage()], 500);
}