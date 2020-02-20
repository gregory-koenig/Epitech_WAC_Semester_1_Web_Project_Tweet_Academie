<?php
session_start();
include_once("bdd.php");
include_once("functions.php");
 
$id = $_SESSION["id"];
$tweetid = $_POST['retweet'];
retweet($id, $tweetid);
 
header("Location:pageprofil.php");
?>