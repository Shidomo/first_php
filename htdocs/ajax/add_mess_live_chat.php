<?php
$mess = trim(filter_var($_POST['chat'], FILTER_SANITIZE_SPECIAL_CHARS));

$error = '';
if (strlen($mess) < 2)
    $error = 'Введите текст';
    
if ($error != '') {
    echo $error;
    exit();
}

require_once "../lib/mysql.php";

$sql ='INSERT INTO chat(message) VALUES (?)';
$query = $pdo->prepare($sql);
$query->execute([$mess]);

echo "Done";