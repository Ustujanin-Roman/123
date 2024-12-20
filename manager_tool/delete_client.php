<?php
require_once('../db.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $userId = intval($_POST['id']);
    
    // Подготовленный запрос для удаления клиента
    $stmt = $conn->prepare("DELETE FROM client WHERE id = ?");
    $stmt->bindParam(1, $userId);

    if ($stmt->execute()) {
        header('Location: ../manager.php');
        exit();
    } else {
        $errorInfo = $stmt->errorInfo();
        echo "Ошибка при удалении клиента: " . $errorInfo[2];
    }
} else {
    header('Location: ../manager.php');
    exit();
}
?>