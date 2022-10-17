<?php

header('Content-Type: application/json');

$API_KEY = '1936594972:AAGOeDpbb3gBuffGIkDzMcNAtNuE-gooXm4';

define('API_KEY', $API_KEY);
function bot($method, $datas = [])
{
    $url = "https://api.telegram.org/bot" . API_KEY . "/" . $method;
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $datas);
    $res = curl_exec($ch);
    if (curl_error($ch)) {
        var_dump(curl_error($ch));
    } else {
        return json_decode($res);
    }
}


$update = json_decode(file_get_contents('php://input'));
$message = $update->message;
$from_id = $message->from->id;
$chat_id = $message->chat->id;
$text = $message->text;

if (preg_match('/^\/([Ss]tart)/', $text)) {
    echo '{"method":"sendMessage","chat_id": $chat_id,"text":$text}';
}
