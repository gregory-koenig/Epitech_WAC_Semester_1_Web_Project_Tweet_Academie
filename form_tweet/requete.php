<?php
require_once "bdd.php";
require_once "functions.php"; 

$tweet = new Tweet();
$placeholder = $tweet->get_last_word();
if ($placeholder[0] === "@") $tweet->start_requete_arobase();
?>