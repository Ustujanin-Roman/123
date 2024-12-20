<?php
require_once('../db.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $userId = intval($_POST['id']);
    $login = $_POST['login'];
    $password = $_POST['password'];
    
    $sql = "UPDATE client SET login='$login', password='$password' WHERE id=$userId";
    if ($conn->query($sql) === TRUE) {
        // Успешное обновление данных, перенаправляем обратно на страницу администрирования
        header('Location: ../maneger.php?message=Данные успешно обновлены');
        exit();
    } else {
        // Ошибка при обновлении данных
        echo "Ошибка: " . $conn->error;
    }
}

// Получаем данные пользователя для отображения в форме редактирования
if (isset($_GET['id'])) {
    $userId = intval($_GET['id']);
    $sql = "SELECT login FROM client WHERE id=$userId";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
    } else {
        // Пользователь не найден, перенаправление
        header('Location: manager.php?message=Пользователь не найден');
        exit();
    }
} else {
    // Если ID не передан, перенаправляем
    header('Location: manager.php?message=Некорректный запрос');
    exit();
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Редактировать клиента</title>
</head>
<body>
    <h2>Редактировать клиента</h2>
    <form method="POST" action="edit_user.php">
        <input type="hidden" name="id" value="<?php echo $userId; ?>">
        <label for="login">Логин:</label>
        <input type="text" name="login" id="login" value="<?php echo htmlspecialchars($user['login']); ?>" required>
        <br>
        <label for="password">Пароль:</label>
        <input type="password" name="password" id="password" placeholder="Новый пароль (оставьте пустым, если не хотите менять)">
        <br>
        <button type="submit">Сохранить изменения</button>
        <a href="../maneger.php">Отмена</a>
    </form>
</body>
</html>