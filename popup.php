<?php
session_start();
 require_once("profil.php");?>
<!DOCTYPE html>
<html>
<head>
	  <script src="https://code.jquery.com/jquery.js"></script>
	<title></title>
	 <link rel="stylesheet" type="text/css" href="style.css">
  <?php $pouf = new profil($_SESSION["id"]);
  $pouf->verifTheme($_SESSION["id"]);?>
</head>
<body>
<div class="tweetbox1">
          <?php
if (isset($_SESSION['message'])){
    echo "<b>". $_SESSION['message']."</b>";
    unset($_SESSION['message']);
}

?>
<form method='post' action='add.php'>
<p class="txt1">Votre opinion dispensable:</p>
<div class="bou">
<textarea name='content' id="text" class="box" rows='6' cols='60' wrap=VIRTUAL></textarea>

</div>
<p><input type='submit' class="butbox" id="formbut" value='Envoyer' /></p>
</form>


</body>
</html>

