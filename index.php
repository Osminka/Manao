
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- если пользователь зарегван и тд -->
    <?php
    session_start();
    echo"<a href='auth.php'> Войти</a>
        <a href='reg.php'> Зарегистрироваться</a>";
    if (isset($_SESSION['user'])) {
        // print_r($_SESSION['user']);
        echo "<h2>Привет".$_SESSION['user']."</h2>";
    } 
    
    ?>
   
</body>
</html>