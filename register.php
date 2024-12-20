<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Результат</title>
    <link rel="stylesheet" href="style_i.css">

<?php
require_once('db.php');
$login = $_POST['login'];
$pass = $_POST['password'];
$repeatpass = $_POST['repass'];
$email = $_POST['email'];

// Проверка наличия одинакового логина
$sql_check_login = "SELECT * FROM users1 WHERE login = '$login'";
$result_login = $conn->query($sql_check_login);
// Проверка наличия одинакового пароля
$sql_check_password = "SELECT * FROM users1 WHERE password = '$pass'";
$result_password = $conn->query($sql_check_password);

if ($result_login->num_rows > 0) {
    echo "Такой логин уже используется";
} else {
    if ($result_password->num_rows > 0) {
        echo "Такой пароль уже используется";
    } else {
        if (empty($login) || empty($pass) || empty($repeatpass) || empty($email)){
            echo "Заполните все поля";
        } else {
            if ($pass != $repeatpass){
                echo "Пароли не совпадают";
            } else {
                $sql = "INSERT INTO `users1` (login, password, email) VALUES ('$login', '$pass', '$email')";
                if ($conn -> query($sql) === true){
                    echo "Успешная регистрация";
                    // Задержка перед перенаправлением
                header("Refresh: 3; URL=index.php");
                exit();
                }
                else {
                    echo "Ошибка: " . $conn->error;
                }
                
            }
        }
    }
}