<?php
session_start();
include_once("bdd.php");
include_once("functions.php");
 

$body = substr($_POST['content'],0,140);
 
add_post($_SESSION["id"]);

header("Location:pageprofil.php");
?>