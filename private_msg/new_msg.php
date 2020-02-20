<?php
session_start();
require_once("bdd.php");
$id = $_POST['id'];
$content = htmlentities($_POST['content']);

$pdo = new bdd();
$sql = ('INSERT INTO directmessage VALUES (null, ?, Now(), ?, ?)');
$req = $pdo->getBdd()->prepare($sql)->execute([$content,$_SESSION["id"], $id]);
if ($req) {
    $json = json_encode([
        "error" => null,
        "data" => [
            "id" => $id,
            "content" => $content
        ]
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