<?php

session_start();
require_once("connexion.php");
require_once("bdd.php");
require_once("profil.php");
?>
<!DOCTYPE html>
<html>
	<head>
		<title></title>
	</head>
<body>
<?php
$conn = new connect($_POST);
$test = $conn->checkmember();
if ($test == false) 
{
	 echo "<meta http-equiv='Refresh' content='5;URL=http://localhost/twitter/Accueil.php'>";
}
/*else
{
	setcookie($_SESSION["id"],true , time() + 365*24*3600, null, null, false, true);
}*/
?>
</body>
</html>