<?php
session_start();
require_once("profil.php");
$uti = new profil($_POST["id"]);
$uti->unfollow($_SESSION["id"], $_POST["id"]);
 echo "<a href=\"profilmembre.php?ID=".$_GET['ID']."\" >"; ?>