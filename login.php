<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Результат</title>
    <link rel="stylesheet" href="style_i.css">

    <?php
require_once('db.php');

session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $login = $_POST['login'];
    $password = $_POST['password'];

    $sql = "SELECT id, role FROM users1 WHERE login = :login AND password = :password";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':login', $login);
    $stmt->bindParam(':password', $password);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($result) {
        $_SESSION['role'] = $result['role'];
        echo "Добро пожаловать, $login!<br>";
        switch ($_SESSION['role']) {
            case 'admin':
                header("Refresh: 3; URL=admin.php");
                exit();
                break;
            case 'station_worker':
                header("Refresh: 3; URL=station_worker.php");
                exit();
                break;
            case 'manager':
                header("Refresh: 3; URL=manager.php");
                exit();
                break;
            case 'client':
                header("Refresh: 3; URL=client.php");
                exit();
                break;    
            default:
                echo "Неверная роль пользователя.";
        }
    } else {
        echo "Неправильный логин или пароль.";
        header("Refresh: 3; URL=index.php");
    }
}
?>
