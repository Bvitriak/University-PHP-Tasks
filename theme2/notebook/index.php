<?php
require 'config.php';
require 'menu.php';

$action = $_GET['action'] ?? 'view';
$allowedActions = ['view', 'add', 'edit', 'delete'];
$action = in_array($action, $allowedActions) ? $action : 'view';

echo '<!DOCTYPE html><html><head>
    <meta charset="UTF-8">
    <title>Контакты</title>
    <link rel="stylesheet" href="style.css">
</head><body>';

echo generateMenu();

switch ($action) {
    case 'view':
        require 'viewer.php';
        $sort = $_GET['sort'] ?? 'default';
        $page = max(1, (int)($_GET['page'] ?? 1));
        echo displayContacts($sort, $page);
        break;
    case 'add':
        require 'add.php';
        break;
    case 'edit':
        require 'edit.php';
        break;
    case 'delete':
        require 'delete.php';
        break;
}

echo '</body></html>';
?>
