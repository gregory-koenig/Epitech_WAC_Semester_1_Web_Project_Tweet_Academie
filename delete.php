<?php
session_start();
include_once("bdd.php");
include_once("functions.php");
 
$idDeleteTweet = $_POST['delete'];
delete($idDeleteTweet);
 
header("Location:http://localhost/twitter/pageprofil.php");
?>