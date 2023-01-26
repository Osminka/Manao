<?php
class Json 
{
    //функция для добавления строки в json 
    public static function addToJson($userdata) {
        $jsonArray = self::getFromJson();//self это местный this
        $jsonArray[] = $userdata;  // $jsonArray[] = new User($login, $pass, $email, $name);
        file_put_contents('users.json', json_encode($jsonArray, JSON_UNESCAPED_UNICODE));
    }
    //функция для получения данных из json                           
    public static function getFromJson() {
        $json = file_get_contents('users.json');
        $jsonArray = json_decode($json, true);
        return $jsonArray;
    }

}

?>