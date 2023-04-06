<?php
include "bot.php";
$bot = new Bot();

set_time_limit(0);
ob_start();
const TOKEN = "5725545827:AAGLGigkviXCMh5RiqgQy-iQUr8QV7Odw-k";

$bot->bot();
$bot->sendtext();

$update = file_get_contents('php://input');

file_put_contents('data.json', $update);
$update = json_decode($update);
$name = $update->message->from->username;
$chat_id = $update->message->chat->id;

if($update->message->text == "/start"){
    sendtext($chat_id, "Привет " . "@".$name);
}
?>