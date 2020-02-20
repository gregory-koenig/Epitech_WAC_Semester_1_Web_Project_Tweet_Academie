<?php
session_start();
$username = strlen($_POST["username"]);
$password = strlen($_POST["password"]);
if ($username < 5)
{
	echo "Votre pseudo doit faire au moins 5 caractères";
	echo "<meta http-equiv='Refresh' content='5;URL=http://localhost/twitter/inscription.php'>";
	return;
}
elseif ($password < 6) {
	echo "Votre mot de passe doit comporter au moins 6 caractères";
	echo "<meta http-equiv='Refresh' content='5;URL=http://localhost/twitter/inscription.php'>";
	return;
}
	
require_once("creatememberobject.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	 <link rel="stylesheet" type="text/css" href="style.css">
  <script src="https://code.jquery.com/jquery.js"></script>
</head>
<body>
<p>
	<?php 
	$membre = new member($_POST); 
	$membre->addmember();
	?>
</p>
<script type="text/javascript" src="test.js"></script>
</body>
</html>