<?php
session_start();
if(isset($_SESSION['user'])){
    header('Location: ../index.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>
<noscript>
        Please, enable to js
</noscript>
<div class="bord">
        <h1>Авторизация пользователя</h1>
        <hr>
        <form action="auth_handler.php" id="form" method="POST">
            <p><b>Login:</b></p>
            <input class="login" type="text" name="login" required id="login" /><span class="error"> * <?php echo $loginErr;?></span><br/> 
            <p><b>Password:</b></p>
            <input type="password"  name="pass" id="pass" required/><span class="error"> * <?php echo $passErr;?></span><br/> 
            <p><button name="butt1" type="submit" class="pure-button pure-button-primary">Отправить</button></p>

            <p id="demo"></p>
        </form>
</div>
<script src="../script.js"></script>
</body>
</html>