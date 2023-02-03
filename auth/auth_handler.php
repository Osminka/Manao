<?php
if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && !empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
    
    session_start();
    function passwordHash($pass) {
        $salt = '$2a$07$R.gJb2U2N.FmZ4hPp1y2CN$';                           
        return hash('md5', $salt . $pass, false);
    } 
    function Authorization($data) {
            include "../Json.php";
            $dataArray = Json::getFromJson('../users.json');
            foreach ($dataArray as $obj) {
                if ($obj["login"] == $data->login && $obj["pass"] == $data->pass) {
                    echo json_encode(array('success' => 1, 'message' => "успешная авторизация"), JSON_UNESCAPED_UNICODE);
                    $_SESSION['user'] = $obj["name"];
                    exit;
                }
            }
            echo json_encode(array('success'=> 0, 'message'=> 'Неверный логин или пароль', 'field'=>'pass'), JSON_UNESCAPED_UNICODE);
            exit;
            // Json::addToJson($data);
        }
        if(isset($_POST["login"])&&isset($_POST["pass"])) {
            include "../User.php";
            $salt = '$2a$07$R.gJb2U2N.FmZ4hPp1y2CN$';
            $user = new User($_POST['login'], passwordHash($_POST['password']), $_POST['email'], $_POST['name']);
            Authorization($user);
        }
        else{
        echo "Вы не ajax запрос";
        }
    }
?>

