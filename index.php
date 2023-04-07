<?php
include_once "bot.php";
$bot = new Bot();
set_time_limit(0);
ob_start();
const TOKEN = "6227378237:AAGDV5XVRTT2nbzVUDKYBsWsp9pAdJ78EJA";

$update = file_get_contents('php://input');
file_put_contents('data.json', $update);

$update = json_decode($update);
$chat_id = $update->message->chat->id;
$username = $update->message->from->username;
if($update->message->text == "/start"){
    $bot->sendtext($chat_id, "Hello @$username");
}
?>