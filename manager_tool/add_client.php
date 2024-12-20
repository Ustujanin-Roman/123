<?php
require_once('../db.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $login = $_POST['login'];
    $password = $_POST['password'];

    if (empty($login) || empty($password)) {
        echo "Пожалуйста, заполните все поля.";
    } else {
        $stmtLogin = $conn->prepare("SELECT id FROM client WHERE login = ?");
        $stmtLogin->bindParam(1, $login);
        $stmtLogin->execute();

        if ($stmtLogin->rowCount() > 0) {
            echo "Пользователь с таким логином уже существует.";
        } else {
            // Подготовленный запрос для добавления нового пользователя
            $sql = "INSERT INTO client (login, password) VALUES (:login, :password)";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':login', $login);
            $stmt->bindParam(':password', $password);

            if ($stmt->execute()) {
                header('Location: ../manager.php');
                exit();
            } else {
                echo "Ошибка: " . $conn->errorInfo()[2];
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Добавить клиента</title>
</head>
<body>
    <h1>Добавить клиента</h1>
    <form method="POST">
        <label for="login">Логин:</label>
        <input type="text" name="login" required><br>
        <label for="password">Пароль:</label>
        <input type="password" name="password" required><br>
        <input type="submit" value="Добавить">
    </form>
    <button onclick="window.location.href='manager.php'">Назад</button>
</body>
</html>
