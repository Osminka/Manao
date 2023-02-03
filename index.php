<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php if(isset($_SESSION['user'])) :?>
        <?= "<h2>Привет, " .$_SESSION['user']."</h2>"?>
        <form method="POST" action="/">
            <input type="submit" value="Выход" name="exit"> 
        </form>
    <!-- если пользователь зарегван и тд -->
    <!-- в противном случапее -->
    <?php else: ?>
    <a href="auth/auth.php"> Войти</a>
    <a href="reg/reg.php"> Зарегистрироваться</a>
    <?php endif; ?>
    <?php
    echo $_SESSION['user'];
        if(array_key_exists('exit', $_POST)) {
            exitFun();
        }
        function exitFun() {
            unset($_SESSION['user']);
        }
    ?>
</body>
</html>