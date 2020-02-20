<?php

class Tweet {

	// insère un tweet dans la bdd
	public function add_post($tweet) {
		
		require_once "bdd.php";
		// $body = substr($tweet, 0, 139);
		$bdd = new Bdd;
		$pdo = $bdd->getBdd();
		$req = $pdo->prepare("INSERT INTO tweet SET content = ?, id_user = ?");
		var_dump($req);
		$req->execute([$tweet, $_SESSION["id"]]);

	}

	// récupère le tweet qui viens d'être poster lors de l'insertion du tweet dans la bdd
	public function get_id_last_tweet($txt_tweet) {
		require_once "bdd.php";
		$bdd = new Bdd;
		$pdo = $bdd->getBdd();
		$req = $pdo->query("SELECT id FROM tweet WHERE content LIKE '$txt_tweet'");
		$req = $req->fetch();
		$req = $req->id;
		return $req;
	}

	// récupère le dernier mot du tweet
	public function get_last_word() {
		$recherche = $_POST["textTweet"];
		$exploded = explode(" ", $recherche);
		$exploded_c = count($exploded);
		$str = $exploded[$exploded_c - 1];
		return $str;
	}

	// requête dans la bdd -- @
	public function start_requete_arobase() {
		$str = trim($this->get_last_word() , "@");
		$bdd = new Bdd;
		$pdo = $bdd->getBdd();
		$req = $pdo->prepare("SELECT username FROM user WHERE username LIKE ? or first_name LIKE ? or last_name LIKE ?");
		$req->execute(["%" . $str . "%", "%" . $str . "%", "%" . $str . "%"]);
		$arr = $req->fetchAll();
		try  {
			$json_arr = json_encode($arr);
			echo $json_arr;
		}
		catch (Exception $e) {
			echo $e->getMessage();
		}
	}

	public function display_tweet($tweet) {
		$converted_tweet = convert_hashtags($tweet);
		// $converted_tweet = convert_arobase($converted_tweet);
	}
}

class Hashtag {

	public function get_hashtags($str) {
		$tag;
		preg_match_all("/#\w+/", $str, $tag);
		$i = 0;
		$arr_hashtags = [];
		foreach ($tag as $tag) {
			$arr_hashtags = $tag;
			$i++;
		}
		return $arr_hashtags;
	}

	public function check_tag() {
		if (isset($_GET["tag"])) {
			$tag = preg_replace('#[^a-z0-9_]#i', '', $_GET["tag"]);
			$fulltag = "#" . $tag;
			echo "Votre recherche d'après l'hashtag $fulltag :" . "<br>";
			$hashtag_tweet = new Hashtag();
			$content_tweets = $hashtag_tweet->get_tweets_by_hashtag($fulltag);
			return $content_tweets;
		}
	}

	// récupère le contenu d'un tweet d'après l'hashtag passé en paramètre
	public function get_tweets_by_hashtag($fulltag) {
		require_once "bdd.php";
		$bdd = new Bdd;
		$pdo = $bdd->getBdd();
		$id_hashtag = $pdo->query("SELECT id FROM hashtag WHERE name LIKE '$fulltag'");
		$id_hashtag = $id_hashtag->fetch();
		$id_hashtag = $id_hashtag->id;
		$id_tweet = $pdo->query("SELECT id_tweet, content FROM hashtagontweets LEFT JOIN tweet ON tweet.id = hashtagontweets.id_tweet WHERE id_hashtag LIKE '$id_hashtag'");
		$arr_content_tweets = $id_tweet->fetchAll();
		$arr_length = count($arr_content_tweets);
		for ($i=0; $i<$arr_length ; $i++) {
			$id = $arr_content_tweets[$i]->id_tweet;
			$query = $pdo->query("SELECT content FROM tweet WHERE id = '$id'");
			$fetch = $query->fetch();
			$arr_content_tweets[$i] = $fetch->content;
		}
		return $arr_content_tweets;
	}

	// transforme tout les hashtags d'un tweet en lien 
	public function convert_hashtags($str){
		$regex = "/#+([a-zA-Z0-9_]+)/";
		$str = preg_replace($regex, '<a href="hashtag.php?tag=$1">$0</a>', $str);
		return($str);
	}

	// vérifie si un hashtag exite déjà ou pas
	public function check_bdd_hashtags($arr, $id) {
		require_once "bdd.php";
		$test = new Tweet();
		$id_last_tweet = $id;
		$bdd = new Bdd;
		$pdo = $bdd->getBdd();
		foreach ($arr as $hashtag) {
			$req = $pdo->query("SELECT COUNT(*) AS text FROM hashtag WHERE name LIKE '$hashtag'");
			$req = $req->fetch();
			if ($req->text === "1") {
				$req = $pdo->query("SELECT id FROM hashtag WHERE name LIKE '$hashtag'");
				$req = $req->fetch();
				$req = $req->id;
				$req_2 = $pdo->query("INSERT INTO hashtagontweets SET id_tweet = '$id_last_tweet', id_hashtag = '$req'");
			} else {
				$req = $pdo->query("INSERT INTO hashtag SET name = '$hashtag'");
				$req = $pdo->query("SELECT id FROM hashtag WHERE name LIKE '$hashtag'");
				$req = $req->fetch();
				$req = $req->id;
				$req_2 = $pdo->query("INSERT INTO hashtagontweets SET id_tweet = '$id_last_tweet', id_hashtag = '$req'");
			}
		}
	}

	// requête dans la bdd -- #
	public function start_requete_hashtag() {
		$str = trim($this->get_last_word() , "#");
		$bdd = new Bdd;
		$pdo = $bdd->getBdd();
		$req = $pdo->prepare("SELECT username FROM hashtag WHERE username LIKE ?");
		$req->execute(["%" . $str . "%"]);
		$arr = $req->fetchAll();
		try  {
			$json_arr = json_encode($arr);
			echo $json_arr;
		}
		catch (Exception $e) {
			echo $e->getMessage();
		}
	} 

}