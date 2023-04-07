<?php
include_once "bot.php";
$bot = new Bot();
$db_host = 'localhost';
$db_name = 'tg_bot';
$db_user = 'root';
$db_pass = '';

$dbh = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);

set_time_limit(0);
ob_start();
const TOKEN = "6227378237:AAGDV5XVRTT2nbzVUDKYBsWsp9pAdJ78EJA";

$update = file_get_contents('php://input');
file_put_contents('data.json', $update);
$update = json_decode($update);
$chat_id = $update->message->chat->id;
$name = $update->message->from->first_name;
$username = $update->message->from->username;

if($update->message->text == "/start"){
    $stmt = $dbh->prepare("INSERT INTO users (`id`, `name`, `username`) VALUES (:id, :name, :username)");
    $stmt->execute([':id' => NULL, ':name' => $name, ':username' => $username]);
    $bot->sendtext($chat_id, "Hello @$username");
}
?>