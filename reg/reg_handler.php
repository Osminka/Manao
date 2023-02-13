<?php
if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && !empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
    
    session_start();
    function passwordHash($pass) {
        $salt = '$2a$07$R.gJb2U2N.FmZ4hPp1y2CN$';                           
        return hash('md5', $salt . $pass, false);
    } 
    function Registration($data) {
            if ($_POST["pass"]!= $_POST["conf_pass"]) {
                echo json_encode(array('success'=> 0, 'message'=> 'Пароли не совпадают.', 'field'=>'conf_pass'));
                exit;
            }
            else if (!preg_match('/\w+@\w+\.\w+/', $_POST['email'])) {
                echo json_encode(array('success'=> 0, 'message'=> 'Неккоректный емайл', 'field'=>'email'));
                exit;
            }
            else if (!preg_match('/^(?=.*\d)(?=.*[a-z])[a-z0-9]+$/i', $_POST['pass'])) {
                echo json_encode(array('success'=> 0, 'message'=> 'Неккоректный пароль', 'field'=>'pass'));
                exit;
            }
            else if (preg_match("|\s|", $_POST['login'])){
                echo json_encode(array('success'=> 0, 'message'=> 'Логин содержит пробелы', 'field'=>'login'));
                exit;
            }
            else{
                include "../Json.php";
                $dataArray = json::getFromJson('../users.json');
                foreach ($dataArray as $obj) {   
                    if($obj["login"]==$data->login){                
                        echo json_encode(array('success'=> 0, 'message' => "Пользователь с таким логином есть",'field'=>'login'), JSON_UNESCAPED_UNICODE);
                        exit;
                    }else if ($obj["email"]==$data->email) {
                        echo json_encode(array('success'=> 0, 'message' => "Пользователь с таким емаилом есть",'field'=>'email'), JSON_UNESCAPED_UNICODE);
                        exit;
                    }
                }
                $_SESSION['user'] = $obj["name"];
                Json::addToJson($data, '../users.json');
                echo json_encode(array('success'=> 1, 'message' => "успешная регистрация"), JSON_UNESCAPED_UNICODE);
            }
            
        }
        if(isset($_POST["login"])&&isset($_POST["pass"])&&isset($_POST["conf_pass"])&&isset($_POST["email"])&&isset($_POST["name"])) {
            include "../User.php";
            $salt = '$2a$07$R.gJb2U2N.FmZ4hPp1y2CN$';
            $user = new User($_POST['login'], passwordHash($_POST['pass']), $_POST['email'], $_POST['name']);

            Registration($user);
            // echo json_encode(array('success'=> 1, 'message' => "успешная регистрация"), JSON_UNESCAPED_UNICODE);
    
        }
        else{
        echo "Вы не ajax запрос";
        }
    }
    
    
?>
