<?php
session_start();
require_once("profil.php");
$user = new profil($_POST["id1"]);
$user->setTheme($_POST["theme1"],$_POST["id1"]);
var_dump($_POST["id1"]);
var_dump($_POST["theme1"]);


?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<p>Votre abonnement a bien été supprimé. Vous allez être redirigé vers la page d'accueil dans 5 secondes</p>
<?php

 ?>
</body>
</html>