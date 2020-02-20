<?php
session_start();
require_once("profil.php");
setcookie($_SESSION["id"],false , time() + 365*24*3600, null, null, false, true);
session_destroy();
echo '<p class="affich">Vous avez bien été deconnecté</p>';
echo "<meta http-equiv='Refresh' content='2;URL=http://localhost/twitter/Accueil.php'>";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Deconnexion</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<?php $pouf = new profil($_SESSION["id"]);
  $pouf->verifTheme($_SESSION["id"]);?>
</head>
<body>

</body>
</html>