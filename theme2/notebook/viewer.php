<?php
if (!defined('ACCESS_ALLOWED')) die('Access denied');

function displayContacts($sort = 'default', $page = 1) {
    global $pdo;

    $limit = 10;
    $offset = ($page - 1) * $limit;

    $orderBy = match($sort) {
        'last_name' => 'last_name ASC, first_name ASC',
        'birth_date' => 'birth_date ASC',
        default => 'id ASC'
    };

    $stmt = $pdo->prepare("SELECT * FROM contacts ORDER BY $orderBy LIMIT :limit OFFSET :offset");
    $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
    $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
    $stmt->execute();
    $contacts = $stmt->fetchAll();

    $total = $pdo->query("SELECT COUNT(*) FROM contacts")->fetchColumn();
    $pages = ceil($total / $limit);

    $html = '<main><table>
        <tr>
            <th>Фамилия</th>
            <th>Имя</th>
            <th>Отчество</th>
            <th>Пол</th>
            <th>Дата рождения</th>
            <th>Телефон</th>
            <th>Адрес</th>
            <th>Email</th>
            <th>Комментарий</th>
        </tr>';

    foreach ($contacts as $contact) {
        $html .= '<tr>';
        foreach (['last_name', 'first_name', 'middle_name', 'gender', 'birth_date', 'phone', 'address', 'email', 'comment'] as $field) {
            $html .= '<td>' . htmlspecialchars($contact[$field] ?? '') . '</td>';
        }
        $html .= '</tr>';
    }
    $html .= '</table>';

    if ($pages > 1) {
        $html .= '<div class="pagination">';
        for ($i = 1; $i <= $pages; $i++) {
            $current = ($i == $page) ? 'style="font-weight: bold;"' : '';
            $html .= "<a href='index.php?action=view&sort=$sort&page=$i' $current>$i</a> ";
        }
        $html .= '</div>';
    }

    $html .= '</main>';
    return $html;
}
?>

