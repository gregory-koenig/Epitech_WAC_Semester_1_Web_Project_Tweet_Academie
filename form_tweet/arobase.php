<!DOCTYPE html>
<html>
<head>
	<title>allo</title>
</head>
<body>
<?php

// function check_tag() {
// 	if (isset($_GET["tag"])) {
// 		$tag = preg_replace('@[^a-z0-9_]@i', '', $_GET["tag"]);
// 		$fulltag = "#" . $tag;
// 		echo $fulltag . "<br>";
// 		$hashtag_tweet = new Hashtag();
// 		$content_tweets = $hashtag_tweet->get_tweets_by_hashtag($fulltag);
// 		return $content_tweets;
// 	}
// }

// // récupère le contenu d'un tweet d'après l'hashtag passé en paramètre
// function get_tweets_by_arobase($fulltag) {
// 	require_once "bdd.php";
// 	$bdd = new Bdd;
// 	$pdo = $bdd->getBdd();
// 	$id_hashtag = $pdo->query("SELECT id FROM hashtag WHERE name LIKE '$fulltag'");
// 	$id_hashtag = $id_hashtag->fetch();
// 	$id_hashtag = $id_hashtag->id;
// 	$id_tweet = $pdo->query("SELECT id_tweet, content FROM hashtagontweets LEFT JOIN tweet ON tweet.id = hashtagontweets.id_tweet WHERE id_hashtag LIKE '$id_hashtag'");
// 	$arr_content_tweets = $id_tweet->fetchAll();
// 	$arr_length = count($arr_content_tweets);
// 	for ($i=0; $i<$arr_length ; $i++) {
// 		$id = $arr_content_tweets[$i]->id_tweet;
// 		$query = $pdo->query("SELECT content FROM tweet WHERE id = '$id'");
// 		$fetch = $query->fetch();
// 		$arr_content_tweets[$i] = $fetch->content;
// 	}
// 	return $arr_content_tweets;
// }

function convert_hashtags($str){
	$regex = "/@+([a-zA-Z0-9_]+)/";
	$str = preg_replace($regex, '<a href="profilemembre.php?ID=' . $_SESSION["ID"] . '">$0</a>', $str);
	return($str);
}

?>
</body>
</html>