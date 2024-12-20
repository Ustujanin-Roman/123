<?php
require_once('db.php');

// Получение всех пользователей из базы данных
$sql = "SELECT * FROM client";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Манеджер</title>
    <link rel="stylesheet" href="styles.css"> <!-- Подключите свой CSS файл -->
    <style>
        .password {
            display: none;
        }
    </style>
</head>
<body>
    <h1>Управление клиентами</h1>
    
    <button onclick="window.location.href='manager_tool/add_client.php'">Добавить клиента</button>

    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Логин</th>
                <th>Действия</th>
            </tr>
        </thead>
        <tbody> 
            <?php if ($result->rowCount() > 0): ?>
                <?php while($row = $result->fetch(PDO::FETCH_ASSOC)): ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['login']; ?></td>
                        <td>
                            <button onclick="window.location.href='manager_tool/edit_client.php?id=<?php echo $row['id']; ?>'">Изменить</button>
                            <form action="manager_tool/delete_client.php" method="POST" style="display:inline;">
                                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                <button type="submit" onclick="return confirm('Вы уверены, что хотите удалить этого пользователя?')">Удалить</button>
                            </form>
                        </td>
                    </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr>
                    <td colspan="3">Нет клиентов</td>
                </tr>
            <?php endif; ?>
            <button onclick="window.location.href='index.php'">Выйти из системы менеджера</button>
        </tbody>
    </table>
</body>
</html>