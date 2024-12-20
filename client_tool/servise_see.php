<?php

require_once('../db.php'); // Подключение к базе данных

// Получение всех услуг СТО
try {
    $stmt = $conn->query("SELECT * FROM services");
    $services = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Ошибка при получении услуг: " . htmlspecialchars($e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Услуги СТО</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #000;
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>Услуги СТО</h1>
    <table>
        <tr>
            <th>Название услуги</th>
            <th>Описание</th>
        </tr>
        <?php foreach ($services as $service): ?>
        <tr>
            <td><?php echo htmlspecialchars($service['service_name']); ?></td>
            <td><?php echo nl2br(htmlspecialchars($service['description'])); ?></td> <!-- Используем nl2br -->
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>