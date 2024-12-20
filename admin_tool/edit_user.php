<?php
require_once('../db.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $userId = intval($_POST['id']);
    $login = $_POST['login'];
    $password = $_POST['password'];

    $sql = "UPDATE users1 SET login=:login, password=:password WHERE id=:userId";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':login', $login);
    $stmt->bindParam(':password', $password);
    $stmt->bindParam(':userId', $userId);

    if ($stmt->execute()) {
        // Успешное обновление данных, перенаправляем обратно на страницу администрирования
        header('Location: ../admin.php?message=Данные успешно обновлены');
        exit();
    } else {
        // Ошибка при обновлении данных
        echo "Ошибка: " . $stmt->errorInfo()[2];
    }
}

// Получаем данные пользователя для отображения в форме редактирования
if (isset($_GET['id'])) {
    $userId = intval($_GET['id']);
    $sql = "SELECT login FROM users1 WHERE id=:userId";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':userId', $userId);
    $stmt->execute();

    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$user) {
        // Пользователь не найден, перенаправление
        header('Location: admin.php?message=Пользователь не найден');
        exit();
    }
} else {
    // Если ID не передан, перенаправляем
    header('Location: admin.php?message=Некорректный запрос');
    exit();
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Редактировать пользователя</title>
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
    <h2>Редактировать пользователя</h2>
    <form method="POST" action="edit_user.php">
        <input type="hidden" name="id" value="<?php echo $userId; ?>">
        <label for="login">Логин:</label>
        <input type="text" name="login" id="login" value="<?php echo htmlspecialchars($user['login']); ?>" required>
        <br>
        <label for="password">Пароль:</label>
        <input type="password" name="password" id="password" placeholder="Новый пароль (оставьте пустым, если не хотите менять)">
        <br>
        <button type="submit">Сохранить изменения</button>
        <a href="../admin.php">Отмена</a>
    </form>
    </div>
</body>
</html>