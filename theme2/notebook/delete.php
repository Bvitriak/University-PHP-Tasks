<?php
if (!defined('ACCESS_ALLOWED')) die('Access denied');

$message = '';
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $stmt = $pdo->prepare("SELECT last_name FROM contacts WHERE id = ?");
    $stmt->execute([$id]);
    $lastName = $stmt->fetchColumn();

    $stmt = $pdo->prepare("DELETE FROM contacts WHERE id = ?");
    if ($stmt->execute([$id])) {
        $displayName = (strlen($lastName) > 30) ? substr($lastName, 0, 30).'...' : $lastName;
        $message = "<div class='success'>Запись с фамилией $displayName удалена</div>";
    } else {
        $message = '<div class="error">Ошибка удаления</div>';
    }
}

$contacts = $pdo->query("SELECT id, last_name, first_name FROM contacts ORDER BY last_name, first_name")->fetchAll();

echo '<main><div class="div-edit">';
foreach ($contacts as $contact) {
    echo "<div><a href='index.html?action=delete&id={$contact['id']}'>
        {$contact['last_name']} {$contact['first_name']}
    </a></div>";
}
echo $message;
echo '</div></main>';
?>
