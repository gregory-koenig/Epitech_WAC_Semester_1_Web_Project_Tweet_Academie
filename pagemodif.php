<?php
session_start();
require_once("profil.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<?php
$user = new profil($_SESSION["id"]);
$user->modifabo($_SESSION["id"]);
?>
<br><a href="Accueil.php">Retourner a l'accueil</a><br>

</body>
</html>