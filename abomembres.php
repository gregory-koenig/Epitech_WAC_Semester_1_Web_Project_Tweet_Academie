<?php
session_start();
require_once("profil.php");
if (!isset($_SESSION["id"]) || !isset($_COOKIE[$_SESSION["id"]]))

{
  header('Location:http://localhost/twitter/Accueil.php');
}
?>
<!DOCTYPE html>
<html>
  <head>
	 <link rel="stylesheet" type="text/css" href="style.css">
    <?php $pouf = new profil($_SESSION["id"]);
  $pouf->verifTheme($_SESSION["id"]);?>
</head>
<body>
<div class = "conteneur">
      <div class="poi">
    <div> <a href="pageprofil.php"  id="lienprofil">Mon profil</a></div>
      <div><a  href="decopage.php"  id="deco">Deconnection</a></div>
      </div>
    
    <div><?php $u = new profil($_SESSION["id"]);
       echo $u->getUsername($_SESSION["id"]);?></div>
       <div class = money></div>
      <div><form method="post" action="resultat.php" id="form">
        <input type="text" name="username" id="username" placeholder="Rechercher un membre">
      </form></div>
      <div><input type="submit" class="tweetbut" name="bouton" id="tweet" value="Tweeter" onclick="test()"></div>
     </div>
<div class="affich">
<?php
$user = new profil($_GET["ID"]);
$user->listabonnements($_GET["ID"]);?>
</div>
<p><?php echo "<a href='profilmembre.php?ID=".$_GET['ID']."'>Retour</a>"; ?> </p>
</body>
</html>