<?php

if (isset($_POST) && (strlen($_POST['text'])> 0) && ($_POST['text'] == '/delete')) {
        file_put_contents("chat.json", json_encode());
}

else {


if (file_exists('chat.json')) {
        $jsonAr = json_decode(file_get_contents('chat.json'), true);
}



if (isset($_POST) && (strlen($_POST['text'])> 0)) {
        $text = stripslashes(htmlentities(strip_tags($_POST['text']), ENT_QUOTES));
	$chat = array("text" => $text, "size" => sizeof($jsonAr));
	$jsonAr[] = $chat;
}

$jsonAr = array_slice($jsonAr, sizeof($jsonAr) - 70);

file_put_contents("chat.json", json_encode($jsonAr));

echo json_encode($jsonAr);

}