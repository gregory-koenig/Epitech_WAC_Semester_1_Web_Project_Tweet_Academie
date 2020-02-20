<?php

session_start();

$pdo = new PDO('mysql:host=localhost;dbname=common-database', 'root', '');
$sql = 'SELECT DISTINCT COUNT(id_user) AS  count_like FROM favoris WHERE id_tweet = 1';
$req = $pdo->query($sql);

if ($req) {
    $data = $req->fetch(PDO::FETCH_ASSOC);
    $json = json_encode([
        'error' => null,
        'data' => [
            'count' => $data['count_like']
        ]
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