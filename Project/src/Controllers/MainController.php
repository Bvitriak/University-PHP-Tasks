<?php
namespace src\Controllers;

use src\View\View;

class MainController
{
    private $view;

    public function __construct()
    {
        $this->view = new View(dirname(__DIR__, 2) . '/templates');
    }

    public function sayHello(string $name)
    {
        $this->view->renderHtml('main/hello', [
            'name' => $name,
            'title' => 'Приветствие'
        ]);
    }

    public function sayBye(string $name)
    {
        $this->view->renderHtml('main/bye', [
            'name' => $name,
            'title' => 'Прощание'
        ]);
    }
}
