<?php
class Bot{
    private $db;

    function __construct($db_host, $db_user, $db_password, $db_name){
        $this->db = mysqli_connect($db_host, $db_user, $db_password, $db_name);
        if (mysqli_connect_errno()) {
            echo "Ошибка подключения к базе данных: " . mysqli_connect_error();
            exit;
          } else {
            echo "Подключение к базе данных прошло успешно!";
          }
    }

    function bot($method, $datas = []){
        $url = "https://api.telegram.org/bot" . TOKEN . "/" . $method;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $datas);
        $res = curl_exec($ch);
        if(curl_error($ch)){
            var_dump(curl_error($ch));
        }
        else{
            return json_decode($res);
        }
    }

    function sendtext($chat_id, $text){
        bot('sendMessage',
            [
                'chat_id' => $chat_id,
                'text' => $text,
                'parse_mode' => 'Markdown' 
            ]
            );
    }

    function saveUserData($update){
        $chat_id = $update->message->chat->id;
        $name = $update->message->chat->first_name;
        $username = $update->message->chat->username;

        $sql = "INSERT INTO users (`id`, `name`, `username`) VALUES (NULL, '$name', '$username')";
        mysqli_query($this->db, $sql);
    }

}


$db_host = "localhost";
$db_user = "root";
$db_password = "";
$db_name = "tg_bot";
