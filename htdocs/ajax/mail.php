<?php
$username = trim(filter_var($_POST['name'], FILTER_SANITIZE_SPECIAL_CHARS));
$email = trim(filter_var($_POST['email'], FILTER_SANITIZE_EMAIL));
$mess = trim(filter_var($_POST['mess'], FILTER_SANITIZE_SPECIAL_CHARS));

$error = '';
if (strlen($username) < 2)
    $error = 'Введите имя';
else if (strlen($email) < 5)
    $error = 'Введите email';
else if (strlen($mess) < 10)
    $error = 'Введите Сообщение';


if ($error != '') {
    echo $error;
    exit();
}

$to = "shindor.hardcore@gmail.com";
$subject = "=?utf-8?B?".base64_encode("Новое сообщение")."?=";
$message = "Пользователь: $username.<br>$mess";
$headers = "From: $email\r\nReply-to: $email\r\nContent-type: text/html; charset=utf-8\r\n";

mail($to, $subject, $message, $headers);

echo "Done";
