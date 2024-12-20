<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Форма входа</title>
   <style>
        .register-button {
            display: inline-block;
            padding: 10px 20px;
            font-size: 16px;
            color: white;
            background-color: #007BFF;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            margin-left: 10px;
        }
        
        .register-button:hover {
            background-color: #0056b3;
        }
    </style> 
    <link rel="stylesheet" href="style_i.css">  <!-- Подключение внешнего CSS -->
</head>
<body>

<div class="login-container">
    <button class="close-btn" onclick="closeForm()">×</button>
    <a href="https://belovokyzgty.ru/" class="logo">
        <img src="image/1.png" alt="Логотип" width="250">
    </a>
    <form action="login.php" method="POST">
        <input type="login" name="login" placeholder="Логин" required>
        <input type="password" name="password" placeholder="Пароль" required>
        <input type="submit" value="Войти">
    </form>
</div>

<div class="dRegister-container">
     <form>
        <p><h3>Создай себе аккаунт</h3> <h2>↓</h2><a href="index_r.php" class="register-button">Зарегистрироваться</a></p>
     </form>
</div>

<script>
    function closeForm() {
        const loginContainer = document.querySelector('.login-container');
        loginContainer.style.display = 'none'; // Скрывает контейнер формы
    }
</script>

</body>
</html>