<?php

 

class Tweet {

	// insère un tweet dans la bdd
	public function add_post($tweet) {
		session_start();
		$_SESSION["id"] = 1;
		require_once "bdd.php";
		$body = substr($tweet, 0, 139);
		$bdd = new Bdd;
		$pdo = $bdd->getBdd();
		$req = $pdo->prepare("INSERT INTO tweet SET content = ?, id_user = ?");
		$req->execute([$body, $_SESSION["id"]]);
		/*die("Réussi");
		header("Location:index.php");	*/?>
		<script>
			window.close();
		</script>
		<?php
	}

	// transforme tout les hashtags d'un tweet en lien 
	public function convert_hashtags($str){
		$regex = "/#+([a-zA-Z0-9_]+)/";
		$str = preg_replace($regex, '<a href="hashtag.php?tag=$1">$0</a>', $str);
		return($str);
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