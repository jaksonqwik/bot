<?php
class Bot{
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
        $this->bot('sendMessage',
            [
                'chat_id' => $chat_id,
                'text' => $text,
                'parse_mode' => 'Markdown' 
            ]
        );
    }
}
?>