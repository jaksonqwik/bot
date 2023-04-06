<?php
set_time_limit(0);
ob_start();
const TOKEN = "6275400992:AAGkAjrq9NlJFi3g7fWxdwUMbG2cR1O8__g";

$update = file_get_contents('php://input');

file_put_contents('data.json', $update);
$update = json_decode($update);
$name = $update->message->from->username;
$chat_id = $update->message->chat->id;

if($update->message->text == "/start"){
    sendtext($chat_id, "Привет " . "@".$name);
}
?>