<?php
require_once('db.php');

// Получение всех пользователей из базы данных с использованием подготовленного запроса для предотвращения SQL инъекций
$sql = "SELECT * FROM users1";
$stmt = $conn->prepare($sql);
$stmt->execute(); // Выполнение запроса
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Админка</title>
    <link rel="stylesheet" href="style_a.css"> <!-- Подключите свой CSS файл -->
    <style>
        .password {
            display: none;
        }
        .container {
            width:50%; /* Ширина контейнера */
            margin: 0 auto; /* Центрирование контейнера */
            padding: 20px; /* Отступы внутри контейнера */
            border: 1px solid rgba(204, 204, 204, 0.7); /* Полупрозрачная граница */
            border-radius: 5px; /* Закругление углов */
            background-color: rgba(255, 255, 255, 0.7);
            backdrop-filter: blur(3px); /* Полупрозрачный цвет фона */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Тень для контейнера */
        }
    </style>
</head>
<body>
    <div class="container"> <!-- Добавленный контейнер -->
        <h1>Управление пользователями</h1>
        <button onclick="window.location.href='admin_tool/add_user.php'">Добавить пользователя</button>

        <table border="1">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Логин</th>
                    <th>Роль в системе</th>
                    <th>Действия</th>
                </tr>
            </thead>
            <tbody> 
                <?php if ($stmt->rowCount() > 0): ?>
                    <?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($row['id']); ?></td>
                            <td><?php echo htmlspecialchars($row['login']); ?></td>
                            <td><?php echo htmlspecialchars($row['role']); ?></td>
                            <td>
                                <button onclick="window.location.href='admin_tool/edit_user.php?id=<?php echo $row['id']; ?>'">Изменить</button>
                                <form action="admin_tool/delete_user.php" method="POST" style="display:inline;">
                                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                    <button type="submit" onclick="return confirm('Вы уверены, что хотите удалить этого пользователя?')">Удалить</button>
                                </form>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="4">Нет пользователей</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>

        <button onclick="window.location.href='index.php'">Выйти из системы админа</button>
    </div> <!-- Конец контейнера -->
</body>
</html>
