<?php

require_once('db.php');

// Запись на обслуживание
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['book_appointment'])) {
    $clientName = $_POST['client_name'];
    $serviceType = $_POST['service_type'];
    $appointmentDate = $_POST['appointment_date'];

    $stmt = $conn->prepare("INSERT INTO appointments (client_name, service_type, appointment_date) VALUES (?, ?, ?)");
    $stmt->execute([$clientName, $serviceType, $appointmentDate]);
}

// Получение всех заявок клиента
$stmt = $conn->query("SELECT * FROM appointments");
$appointments = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Запись на обслуживание СТО</title>
</head>
<body>
    <h1>Запись на обслуживание</h1>
    <form method="POST">
        <label for="client_name">Имя клиента:</label>
        <input type="text" id="client_name" name="client_name" required>
        
        <label for="service_type">Тип услуги:</label>
        <input type="text" id="service_type" name="service_type" required>
        
        <label for="appointment_date">Дата и время записи:</label>
        <input type="datetime-local" id="appointment_date" name="appointment_date" required>
        
        <button type="submit" name="book_appointment">Записаться</button>
    </form>

    <h2>Ваши заявки</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Имя клиента</th>
            <th>Тип услуги</th>
            <th>Дата записи</th>
            <th>Статус</th>
        </tr>
        <?php foreach ($appointments as $appointment): ?>
        <tr>
            <td><?php echo $appointment['id']; ?></td>
            <td><?php echo htmlspecialchars($appointment['client_name']); ?></td>
            <td><?php echo htmlspecialchars($appointment['service_type']); ?></td>
            <td><?php echo $appointment['appointment_date']; ?></td>
            <td><?php echo htmlspecialchars($appointment['status']); ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>