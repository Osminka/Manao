<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
    <script src="./jquery-3.6.0.min.js" ></script>
</head>
<body>
<div class="bord">
        <h1>Регистрация пользователя</h1>
        <hr>
        <form action="" id="reg" method="POST">
        <p><b>Login:</b></p>
        <input class="login" type="text" name="login" minlength="6" required /><span class="error"> * <?php echo $loginErr;?></span><br/> 
        <p><b>Password:</b></p>
        <input type="password"  id="password" minlength="6" pattern="^[0-9A-Za-zА-Яа-яЁё]+$" required/><span class="error"> * <?php echo $passErr;?></span><br/> 
        <p><b>Confirm password:</b></p>
        <input type="password" id="confirm_password" required/><span class="error"> * <?php echo $confpassErr;?></span><br/> 
        <p><b>Email:</b></p>
        <input class="email" type="email" name="email" required /><span class="error"> * <?php echo $emailErr;?></span><br/>
        <p><b>Name:</b></p>
        <input class="age" type="text" name="name" minlength="2" pattern="^[A-Za-zА-Яа-яЁё]+$" required/><span class="error"> * <?php echo $nameErr;?></span><br/> 
    
        <p><button name="butt1" type="submit" class="pure-button pure-button-primary">Отправить</button></p>

        <p id="demo"></p>
    </form>
    </div>
    <?php
        session_start();
        if(array_key_exists('butt1', $_POST)) {
            include "./User.php";
            $salt = '$2a$07$R.gJb2U2N.FmZ4hPp1y2CN$';
            $user = new User($_POST['login'], passwordHash($_POST['password']), $_POST['email'], $_POST['name']);
            Registration($user);
        }
        function passwordHash($pass) {
            $salt = '$2a$07$R.gJb2U2N.FmZ4hPp1y2CN$';                           
            return hash('md5', $salt . $pass, false);
        } 
        
        function Registration($data) {
            include "./Json.php";
            $dataArray = Json::getFromJson();

            foreach ($dataArray as $obj) {   
                if($obj["login"]==$data->login){                
                    echo json_encode(array('success'=> 0, 'message' => "Такой пользователь есть"));
                    return null; 
                }else if ($obj["email"]==$data->email) {
                    // echo("<script>alert('Пользователь с таким email уже существует!');</script>");
                    return null;
                }
                else{
                    $_SESSION['user'] = $obj["name"];
                    header('Location: '.'/index.php');
                }
            }
            
            Json::addToJson($data); 
        }
    ?>
    <script src="index.js"></script>
</body>
</html>