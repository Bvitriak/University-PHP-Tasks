<?php
if (!defined('ACCESS_ALLOWED')) die('Access denied');

$selectedId = $_GET['id'] ?? null;
$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = [
        'last_name' => $_POST['surname'] ?? '',
        'first_name' => $_POST['name'] ?? '',
        'middle_name' => $_POST['lastname'] ?? '',
        'gender' => $_POST['gender'] ?? 'мужской',
        'birth_date' => $_POST['date'] ?? '',
        'phone' => $_POST['phone'] ?? '',
        'address' => $_POST['location'] ?? '',
        'email' => $_POST['email'] ?? '',
        'comment' => $_POST['comment'] ?? '',
        'id' => $selectedId
    ];

    $stmt = $pdo->prepare("UPDATE contacts SET 
        last_name = ?, 
        first_name = ?, 
        middle_name = ?, 
        gender = ?, 
        birth_date = ?, 
        phone = ?, 
        address = ?, 
        email = ?, 
        comment = ? 
        WHERE id = ?");

    if ($stmt->execute(array_values($data))) {
        $message = '<div class="success">Запись обновлена</div>';
    } else {
        $message = '<div class="error">Ошибка обновления</div>';
    }
}

$contacts = $pdo->query("SELECT id, last_name, first_name FROM contacts ORDER BY last_name, first_name")->fetchAll();

echo '<main>';

echo '<div class="div-edit">';
foreach ($contacts as $contact) {
    $active = ($contact['id'] == $selectedId) ? 'currentRow' : '';
    echo "<div class='$active'><a href='index.php?action=edit&id={$contact['id']}'>
        {$contact['last_name']} {$contact['first_name']}
    </a></div>";
}
echo '</div>';

if ($selectedId) {
    $stmt = $pdo->prepare("SELECT * FROM contacts WHERE id = ?");
    $stmt->execute([$selectedId]);
    $contact = $stmt->fetch();

    $row = [
        'surname' => $contact['last_name'],
        'name' => $contact['first_name'],
        'lastname' => $contact['middle_name'],
        'gender' => $contact['gender'],
        'date' => $contact['birth_date'],
        'phone' => $contact['phone'],
        'location' => $contact['address'],
        'email' => $contact['email'],
        'comment' => $contact['comment']
    ];
    $button = 'Сохранить';

    echo $message;
    include 'form.php';
}

echo '</main>';
?>
