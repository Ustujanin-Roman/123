<?php
require_once('../db.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $userId = intval($_POST['id']);
    
    $sql = "DELETE FROM users1 WHERE id=:userId";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':userId', $userId);

    if ($stmt->execute()) {
        header('Location: ../admin.php');
        exit();
    } else {
        echo "Ошибка: " . $stmt->errorInfo()[2];
    }
} else {
    header('Location: ../admin.php');
    exit();
}
?>