<?php
session_start();
require_once("connexion.php");
require_once("bdd.php");
require_once("profil.php");
include_once('functions.php');
if (!isset($_SESSION["id"]) || !isset($_COOKIE[$_SESSION["id"]]))

{
  header('Location:http://localhost/twitter/Accueil.php');
}
elseif ($_SESSION["id"] == $_GET["ID"])
{
   header('Location:http://localhost/twitter/pageprofil.php');
}
?>
<!DOCTYPE html>
<html>
  <head>
      <script src="https://code.jquery.com/jquery.js"></script>
	   <title>Mon profil</title>
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
     <div><input type="image" src="mess.png" name="messagerie" id="messagerie"> </div>
    <div><?php $u = new profil($_SESSION["id"]);
       echo $u->getUsername($_SESSION["id"]);?></div>
       <div class = money></div>
      <div><form method="post" action="resultat.php" id="form">
        <input type="text" name="username" id="username" placeholder="Rechercher un membre">
      </form></div>
      <div><input type="submit" class="tweetbut" name="bouton" id="tweet" value="Tweeter" onclick="test()"></div>
     </div>
  <div id="profil">

<?php
$id = $_GET["ID"];
$user = new profil($_GET["ID"]);
$user->profilmembre();
$username = $user->getUsername($_GET["ID"]);
?>
<p><?php echo '<a class="test" href="abomembres.php?ID='.$_GET['ID'].'">Abonnements: '. $user->abonnements($_GET["ID"]).'</a>'; ?> </p>
<p><?php echo '<a class="test" href="abonnesmembre.php?ID='.$_GET['ID'].'">Abonnés: '. $user->abonnés($_GET["ID"]).'</a>'; ?> </p>
  <div id="verif" >
    <?php
    $verif_follow = $user->verif_follow($_SESSION["id"], $_GET["ID"]);
    echo "<input type=\"hidden\" id=\"verif_follow\" value=\"".$verif_follow."\" >";
    ?>
  </div>
  <div id="followdiv" >
    <input type='submit' id='follow' class='but' value='Suivre <?php echo $username; ?>' >
    <?php echo "<input type=\"hidden\" id=\"test\" value=\"".$_GET["ID"]."\" >";
    echo "<a href=\"follow.php?ID=".$_GET['ID']."\" > </a>";
    ?>
  </div>
  <form action="">
    <button class="but" id="btn_send">Envoyer un message</button>
    <input id="input_id" type="hidden" value="<?= $_GET['ID']; ?> "> 
</form>
  </div>
  <?php 
  $posts = show_posts($_GET['ID']);

 
if (count($posts)){
?>
<table border='1' cellspacing='0' cellpadding='5' width='500' class="tweets">

<?php
foreach ($posts as $key => $list){
  

    echo "<tr valign='top'>\n";
   echo '<td><img src='.$list["picture"].' class="david1"></td>';
    echo "<td>".$list['content'] ."<br/>\n";
       echo '<br><br><small class="date">'.$list['created_date'] .'</small></td>';
    echo "<td>";
    ?>
    <?php
     echo "<form action='retweet.php' method='post'>
    <input type='submit' class='but10' value='Retweeter'>";
    echo "<input id='retweet' name='retweet' type='hidden' value='" .$list['id'] . "'>";
    echo "<input type='hidden' name='userId' value='" .$_GET['ID'] . "'>";
    echo "</td>";
    echo "<td>";

        ?>

    </form>
   
    <form method='post' action='repondre.php'>
        <?php
    echo "<input id='repondre' name='repondre' type='hidden' value='" .$list['id'] . "'>";
    echo "<form action='repondre.php' method='post'>
    <input type='submit' class='but10' value='repondre'>"; 
    ?>    
    </form>
    <?php
    echo "</td>";
    echo "</tr>\n";
}
?>


</table>
<?php
}else{
?>
<p><b>Il n'y a rien à voir ici...</b></p>
<?php
}
?>
<script src="send_msg/assets/js/script.js"></script>
<script type="text/javascript" src="messagerie.js"></script>
  <script type="text/javascript" src="checkfollow.js"></script>
  <script type="text/javascript" src="requete.js"></script>
  </body>
</html>