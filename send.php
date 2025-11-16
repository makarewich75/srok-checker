<?php
$token = "7670556697:AAGfX_Q5c8w5_vFFfz0ZjOijFbKrkCO8xOk";
$chat_id = "-1002419152057";
if (!isset($_FILES['file'])) {
    echo "Файл не получен!";
    exit;
}
$document = new CURLFile($_FILES['file']['tmp_name'], $_FILES['file']['type'], $_FILES['file']['name']);
$url = "https://api.telegram.org/bot$token/sendDocument";
$post_fields = [
    "chat_id" => $chat_id,
    "document" => $document
];
$ch = curl_init(); 
curl_setopt($ch, CURLOPT_HTTPHEADER, ["Content-Type:multipart/form-data"]);
curl_setopt($ch, CURLOPT_URL, $url); 
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
curl_setopt($ch, CURLOPT_POSTFIELDS, $post_fields);
$result = curl_exec($ch);
curl_close($ch);
echo "Отправлено в Telegram!";
?>
