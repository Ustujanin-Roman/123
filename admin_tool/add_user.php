<?php
require_once('../db.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $login = htmlspecialchars($_POST['login']);
    $password = htmlspecialchars($_POST['password']);
    $role = htmlspecialchars($_POST['role']);

    if (empty($login) || empty($password)) {
        echo "Пожалуйста, заполните все поля.";
    } else {
        $stmtLogin = $conn->prepare("SELECT id FROM users1 WHERE login = :login");
        $stmtLogin->bindParam(':login', $login);
        $stmtLogin->execute();

        if ($stmtLogin->rowCount() > 0) {
            echo "Пользователь с таким логином уже существует.";
        } else {
            // Подготовленный запрос для добавления нового пользователя с указанием роли
            $sql = "INSERT INTO users1 (login, password, role) VALUES (:login, :password, :role)";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':login', $login);
            $stmt->bindParam(':password', $password);
            $stmt->bindParam(':role', $role);

            if ($stmt->execute()) {
                header('Location: ../admin.php');
                exit();
            } else {
                echo "Ошибка при выполнении запроса: " . $stmt->errorInfo()[2];
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Добавить пользователя</title>
    <link rel="stylesheet" href="../style_a.css"> <!-- Подключите свой CSS файл -->
    <style>
        .password {
            display: none;
        }
        .container {
            width: 30%; /* Ширина контейнера */
            margin: 0 auto; /* Центрирование контейнера */
            padding: 20px; /* Отступы внутри контейнера */
            border: 1px solid rgba(204, 204, 204, 0.7); /* Полупрозрачная граница */
            border-radius: 5px; /* Закругление углов */
            background-color: rgba(255, 255, 255, 0.7);
            backdrop-filter: blur(3px); /* Эффект размытия фона */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Тень для контейнера */
        }
        input[type="text"], input[type="password"], select {
            width: 100%; /* Ширина полей ввода */
            padding: 10px; /* Отступы внутри полей */
            margin: 10px 0; /* Отступы между полями */
            border: 1px solid #ccc; /* Граница полей */
            border-radius: 4px; /* Закругление углов */
        }
    </style>
</head>
<body>
<div class="container">
    <h1>Добавить пользователя</h1>
    <form method="POST">
        <label for="login">Логин:</label>
        <input type="text" name="login" required><br>
        <label for="password">Пароль:</label>
        <input type="password" name="password" required><br>
        <label for="role">Роль в системе:</label>
        <select name="role" required>
            <option value="admin">Администратор</option>
            <option value="station_worker">Работник станции</option>
            <option value="manager">Менеджер</option>
        </select><br>
        <input type="submit" value="Добавить">
    </form>
    <button onclick="window.location.href='../admin.php'">Назад</button>
</div>
</body>
</html>
