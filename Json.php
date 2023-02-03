<?php
class json 
{
    //функция для добавления строки в json 
    public static function addToJson($userdata, $path) {
        $jsonArray = self::getFromJson($path);//self это местный this
        $jsonArray[] = $userdata;  // $jsonArray[] = new User($login, $pass, $email, $name);
        file_put_contents($path, json_encode($jsonArray, JSON_UNESCAPED_UNICODE));
    }
    //функция для получения данных из json                           
    public static function getFromJson($path) {
        $json = file_get_contents($path);
        $jsonArray = json_decode($json, true);
        return $jsonArray;
    }

}

?>