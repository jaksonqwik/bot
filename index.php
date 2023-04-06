<?php
include_once "bot.php";
$bot = new Bot();

$update = file_get_contents('php://input');
file_put_contents('data.json', $update);
$update = json_decode($update);
$name = $update->message->from->username;
$chat_id = $update->message->chat->id;

if($update->message->text == "/start"){
    $bot->sendtext($chat_id, "Привет @" . $name);
}
?>
