<?php

session_start();
$pdo = new PDO('mysql:host=localhost;dbname=common-database', 'root', '');
$sql = 'INSERT INTO favoris VALUES (null, 1, 1)';
$req = $pdo->prepare($sql)->execute();

if ($req) {
    $json = json_encode([
        'error' => null,
    ]);
} else {
    $json = json_encode([
        'error' => true,
        'data' => [
            'errorMsg' => "Une erreur s'est produite. Veuillez réessayer."
        ]
    ]);
}

echo $json;