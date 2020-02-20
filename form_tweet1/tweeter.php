<?php
require_once "functions.php";

try  {
	$tweet = new Tweet();
	$hashtag = new Hashtag();

	// $content = $hashtag->convert_hashtags($_POST["textTweet"]);
	$content = $_POST["textTweet"];
	$tweet->add_post($content);

	// sleep(1);

	$id = $tweet->get_id_last_tweet($content);
	$hashtag->check_bdd_hashtags($hashtag->get_hashtags($content), $id);
}

catch (Exception $e) {
	$e->getMessage();
}

?>