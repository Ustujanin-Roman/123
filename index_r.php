<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Форма регистрация</title>
    <style>
        .enter-button {
            display: inline-block;
            padding: 10px 20px;
            font-size: 16px;
            color: white;
            background-color: #007BFF;
            border: none;
            border-radius: 5px;
            text-decoration: none;
        }
        
        .enter-button:hover {
            background-color: #0056b3;
        }
    </style>
    <link rel="stylesheet" href="style_i.css">

</head>
<body>
    
<div class="login-container">
    <button class="close-btn" onclick="closeForm()">×</button>
    <a href="https://belovokyzgty.ru/" class="logo">
        <img src="image/x3757717-1622833430.png" alt="Логотип" width="250">
    </a>
    <form action="register.php" method="POST">
        <input type="login" name="login" placeholder="Логин" required>
        <input type="password" name="password" placeholder="Пароль" required>
        <input type="repass" name="repass" placeholder="Повторите пароль" required>
        <input type="email" name="email" placeholder="Электронная почта" required>
        <input type="submit" value="Зарегистрироваться">
        <a href="index.php" class="enter-button">Войти</a>
    </form>
</div>

<div class="dRegister-container">
     <form>
        <p><h3>Заходи на аккаунт</h3> <h2>↓</h2><a href="index.php" class="enter-button">Войти</a></p>
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