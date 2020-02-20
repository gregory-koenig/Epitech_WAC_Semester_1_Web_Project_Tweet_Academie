<?php

session_start();
require_once("connexion.php");
require_once("bdd.php");
require_once("profil.php");
include_once('functions.php');

if (!isset($_SESSION["id"]) || !isset($_COOKIE[$_SESSION["id"]]))
{
  header('Location:Accueil.php');
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Mon profil</title>
        <link rel="stylesheet" type="text/css" href="style.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <script src="form_tweet/js/jquery-3.2.1.min.js"></script>
    <script src="form_tweet/js/test/jquery-ui-1.12.1/jquery-ui.min.js"></script>
  <script src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
  <script src="form_tweet/js/Mention.js-master/bootstrap-typeahead.js"></script>
  <script src="form_tweet/js/Mention.js-master/mention.js"></script>
  <script src="form_tweet/js/main.js"></script>
  <link href="form_tweet/css/style.css" rel="stylesheet">
        <?php 
            $pouf = new profil($_SESSION["id"]);
            $pouf->verifTheme($_SESSION["id"]);
        ?>
        <script src="https://code.jquery.com/jquery.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>

    <body>
        <div class = "conteneur">
            <div class="poi">
                <div> 
                    <a href="pageprofil.php"  id="lienprofil">Mon profil</a>
                </div>
                <div>
                    <a href="decopage.php" id="deco">Deconnection</a>
                </div>
            </div>
            <div>
                <input type="image" src="mess.png" name="messagerie" id="messagerie">
            </div>

            <div>
                <?php 
                    $u = new profil($_SESSION["id"]);
                    echo $u->getUsername($_SESSION["id"]);
                ?>
            </div>
            <div class = money></div>
            <div>
                <form method="post" action="resultat.php" id="form">
                <input type="text" name="username" id="username" placeholder="Rechercher un membre">
                </form>
            </div>
            <div>
                <input type="submit" class="tweetbut" name="bouton" id="tweet" value="Tweeter" onclick="test()">
            </div>
        </div>
        <div id="profil">
            <?php
                $user = new profil($_SESSION["id"]);
                $user->myprofil();?> 
                <p>
                    <?php echo '<a href="abonnements.php" class="test">Abonnements: '. $user->abonnements($_SESSION["id"]).'</a>'; ?> 
                </p>
                <p><?php echo '<a href="abonnés.php" class="test">Abonnés: '. $user->abonnés($_SESSION["id"]).'</a>'; ?> 
                </p>

<button type="button" class="but" onclick="showhistorique();">Modifier votre compte</button>
      <div id="infos" style="display:none;">
       <?php $user->allMyProfil();?>
       <form method="post" action="theme.php" id="theme1">
        <label for="theme" class="test">Changer le thème</label><br>
       <br><select name="theme" id="theme">
            <option value="defaut">Thème par défaut</option>
            <option value="dark">Dark</option>
            <option value="dora">Dora</option>
            <option value="eco">Eco</option>
      </select>
      <?php echo "<input type=\"hidden\" id=\"test1\" value=\"".$_SESSION["id"]."\" >";?>
      <input type="submit" name="valid" id="buto" value="Valider">
    </form>
    <form method="post" action="pagemodif.php">
          <input type="hidden" name="var2" value="<?php echo "".$_SESSION["$id"]."" ?>"></input> 
    <p class="test">Changer votre image de profil:</p>
          <input type="text" name="picture" placeholder="Entrez l'url de votre image">
  <p class="test">Changer votre mot de passe:</p>
          <input type="text" placeholder="Entrez le nouveau mot de passe" name="password">
  <p class="test">Nom:</p>
         <input type="text" placeholder="Entrez le nouveau nom" name="lastname">
  <p class="test">Prenom:</p>
         <input type="text" placeholder="Entrez le nouveau prenom" name="firstname">
  <p class="test">Adresse E-mail:</p>
         <input type="email" placeholder="Entrez la nouvelle adresse email" name="email">
         <p class="test>"><label for="description">Votre nouvelle présentation :</label><br />
        <textarea name="description" id="description"></textarea><br></p>
  <p><br><input type="submit" class="but" value="Modifier"></p>
    </form>

  </div>

      <form method="post" action="supabopage.php" >
         <input type="hidden" name="var" value="<?php echo "".$_SESSION["id"]."" ?>"></input>
         <br> <input type="submit" class="but" value="Supprimer votre compte ">
      </form>
<br>
        <form method="post" action="decopage.php">
          <input type="submit" id="deco1" class="but" value="Se deconnecter">
        </form>
        </div>
<?php
 if (isset($_SESSION['message'])){
    echo "<b>". $_SESSION['message']."</b>";
    unset($_SESSION['message']);
}
?>
<div id="timeline" name="timeline">
  <div class="tweetbox">
  <form method='post' action='add.php'>
    <!-- <div class="bou"> -->
       <textarea rows="10" cols="50" placeholder="Quoi de neuf ?" class="form-control" id="textBox" autocomplete="off"></textarea>
       <button class="btn btn-primary" id="btnTweeter">Tweeter</button>
      <div class="s alert alert-success hidden"><p id="good">Succès</p></div>
      <div class="err alert alert-danger hidden"><p id="bad">Une erreur s'est protweet</p></div>
      <div class="tweetChar hidden"><p id="warning">Votre tweet dépasse les 140 caractères (<span id="lTweet">0</span>)</p>
      <div class="imagetw"></div>
    <!-- </div> -->
  </form>
</div>
 <?php
$posts = show_posts($_SESSION['id']);

 
if (count($posts)){
?>
<table border='1' cellspacing='0' cellpadding='5' width='500'>

<?php
foreach ($posts as $key => $list){

    echo "<tr valign='top'>\n";
    echo "<td>".$list['id'] ."</td>\n";
    echo "<td>".$list['content'] ."<br/>\n";
    echo "<small>".$list['created_date'] . "</small></td>\n";
    echo "<td>";
    echo "<form action='retweet.php' method='post'>
    <input type='submit' value='Retweeter'>";
    echo "<input id='retweet' name='retweet' type='hidden' value='" . $list['id'] . "'>";
    echo "<input type='hidden' name='userId' value='" . $_SESSION['id'] . "'>";
    echo "</td>";

    ?>

    </form>
    <form method='post' action='delete.php'>
        <td>
            <?php echo "<input id='delete' name='delete' type='hidden' value='" . $list['id'] . "'>"; ?>
            <input type='submit' value='del'>
        </td>
    </form>
    <form method='post' action='repondre.php'>
        <td>
            <?php echo "<input id='repondre' name='repondre' type='hidden' value='" . $list['id'] . "'>"; ?>  
        <input type='submit' value='repondre'>
        </td>  
    </form>
    <form>
        <td>
        <?php echo "<input id='likeBtn' name='like' type='hidden' value='" . $list['id'] . "'>"; ?>
        <div class="fa fa-heart-o" id="like"></div>
        </td>
        </tr>
    </form>
<?php
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
</div>


   
</body>
</html>
        </div>
         <script type="text/javascript" src="redi.js"></script>
         <script type="text/javascript" src="messagerie.js"></script>
        <script type="text/javascript" src="popup.js"></script>
        <script type="text/javascript" src="theme.js"></script>
        <script type="text/javascript" src="modifprofil.js"></script>
        <script type="text/javascript" src="like 3/script.js"></script>
       
  </body>
</html>