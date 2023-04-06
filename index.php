<?php
include_once "bot.php";
$bot = new Bot($db_host, $db_user, $db_password, $db_name);

$update = file_get_contents('php://input');
file_put_contents('data.json', $update);
$update = json_decode($update);
$bot->saveUserData($update);

function __destruct(){
    mysqli_close($this->db);
}

if($update->message->text == "/start"){
    $bot->sendtext($chat_id, "Привет @" . $name);
}
?>
