<?php
session_start();
?>

<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Login</title>
</head>
<body>

    <div class="area-login shadow">
        <div class="text-container">
            <img src="./images/home_logo.png" alt="Logo">
            <h1 class="login-name">Área de Login</h1>
            <h3>Efetue o seu login para prosseguir</h3>
        </div>

       
        <form method="POST" action="functions/login.php">
            <div class="login-container">
                <input placeholder="Login" name="login" required>
            </div>
            <br>
            <div class="password-container">
                <input placeholder="Senha" type="password" name="senha" required>
            </div>

            <br>

            <div class="button-container">
                <button type="submit">Entrar</button>
            </div>

        </form>

    </div>
</body>
</html>