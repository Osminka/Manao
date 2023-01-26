<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>
<div class="bord">
        <h1>Авторизация пользователя</h1>
        <hr>
        <form method="POST">
        <p><b>Login:</b></p>
        <input class="login" type="text" name="login" required /><span class="error"> * <?php echo $loginErr;?></span><br/> 
        <p><b>Password:</b></p>
        <input type="password"  id="password" required/><span class="error"> * <?php echo $passErr;?></span><br/> 
        <p><button name="butt1" type="submit" class="pure-button pure-button-primary">Отправить</button></p>

        <p id="demo"></p>
    </form>
    </div>
    <?php
        session_start();
        if(array_key_exists('butt1', $_POST)) {
            include "./User.php";
            $salt = '$2a$07$R.gJb2U2N.FmZ4hPp1y2CN$';
            $user = (object) [
                'login' => $_POST["login"],
                'pass' => passwordHash($_POST["pass"]),
            ];
            echo("<script>alert(" .passwordHash($_POST["pass"])."))!');</script>");
                
            Authorization($user);
        }
        
        function passwordHash($pass) {
            $salt = '$2a$07$R.gJb2U2N.FmZ4hPp1y2CN$';                           
            return hash('md5', $salt . $pass, false);
        } 
        
        function Authorization($data) {
            include "./Json.php";
            $dataArray = Json::getFromJson();

            foreach ($dataArray as $obj) {  
                if($obj["login"]==$data->login && $obj["pass"]==$data->pass){                
                    echo("<script>alert('вы молодец что помните пароль))!');</script>");
                    $_SESSION['user'] = $obj["name"];
                    header('Location: '.'/index.php');
                    return null; 
                }
            } 
            echo "Пароль или логин неправильные";
            return null; 
        }
    ?>
    <!-- <script src="index.js"></script> -->
</body>
</html>