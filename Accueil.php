<?php session_start() ?>
<!DOCTYPE html>
<html>
<head>
	<title>Accueil</title>
	<meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="style.css">
  <script src="https://code.jquery.com/jquery.js"></script>
</head>
<body class="co">

<?php
if (isset($_SESSION["id"]) && isset($_COOKIE[$_SESSION["id"]]))
{
  header('Location:http://localhost/twitter/pageprofil.php');
}
?>

  <div class = "conteneur1">
    <div class="titre">
      <h1>Twit-Twit</h1>
    </div>
    <div class="content_titre1">
      Vos données sont notre richesse!
</div>
  </div>
   <div class="alert alert-warning" role="alert">
  &#9888; Déjà plus de 3 utilisateurs dans le monde! &#9888;
</div>
  <div id="image"></div>
  <div class="form" id="div">
    <p><input type="submit" id="inscri" class="btn btn-warning" value="Devenir notre produit"></p>
     <br>
      <p class="pa">Déjà membre?</p>
   <p> <input type="submit" id="connexion" class="btn btn-warning" value="Se connecter"></p>
  </div>

 
       
      
  <script type="text/javascript" src="redi.js"></script>
</body>
</html>