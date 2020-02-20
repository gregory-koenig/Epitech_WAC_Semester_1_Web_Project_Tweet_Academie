<?php

$id = $_POST['id'];
$content = $_POST['content'];

session_start();

$pdo = new PDO('mysql:host=localhost;dbname=twitter', 'root', '');
$sql = ('INSERT INTO directmessage VALUES (null, ?, Now(), ?, ?)');
$req = $pdo->prepare($sql)->execute([$content, $_SESSION["id"], $id]);

if ($req) {
    $json = json_encode([
        "error" => null
    ]);
} else {
    $json = json_encode([
        "error" => true,
        "data" => [
            "errorMsg" => "Une erreur s'est produite. Veuillez réessayer."
        ]
    ]);
}

echo $json;