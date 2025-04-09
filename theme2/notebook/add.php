<?php
if (!defined('ACCESS_ALLOWED')) die('Access denied');

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
        'comment' => $_POST['comment'] ?? ''
    ];

    try {
        $stmt = $pdo->prepare("INSERT INTO contacts 
            (last_name, first_name, middle_name, gender, birth_date, phone, address, email, comment) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->execute(array_values($data));
        $message = '<div class="success">Запись успешно добавлена</div>';
    } catch (PDOException $e) {
        $message = '<div class="error">Ошибка: ' . $e->getMessage() . '</div>';
    }
}

echo '<main>';
echo $message;
include 'form.php';
echo '</main>';
?>
