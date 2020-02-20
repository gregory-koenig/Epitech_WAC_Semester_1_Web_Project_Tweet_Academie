<?php
require_once "functions.php";

$tweet = new Tweet();
$content = $tweet->convert_hashtags($_POST["textTweet"]);
$tweet->add_post($content);
?>