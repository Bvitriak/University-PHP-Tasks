<?php
function generateMenu() {
    $currentAction = $_GET['action'] ?? 'view';
    $menuItems = [
        'view' => 'Просмотр',
        'add' => 'Добавление записи',
        'edit' => 'Редактирование записи',
        'delete' => 'Удаление записи'
    ];

    $menuHtml = '<header>';
    foreach ($menuItems as $action => $title) {
        $active = ($currentAction == $action) ? 'select' : '';
        $menuHtml .= "<a href='index.php?action=$action' class='$active'>$title</a>";
    }
    $menuHtml .= '</header>';

    if ($currentAction == 'view') {
        $sort = $_GET['sort'] ?? 'default';
        $submenuItems = [
            'default' => 'По порядку',
            'last_name' => 'По фамилии',
            'birth_date' => 'По дате рождения'
        ];

        $menuHtml .= '<div class="submenu">';
        foreach ($submenuItems as $key => $value) {
            $active = ($sort == $key) ? 'select' : '';
            $menuHtml .= "<a href='index.php?action=view&sort=$key' class='$active'>$value</a>";
        }
        $menuHtml .= '</div>';
    }

    return $menuHtml;
}
?>