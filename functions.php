<?php
include_once('bdd.php');
function add_post(){
	$id = $_SESSION["id"];
	$content = $_POST["content"];
		$db = new bdd();
        $rq = $db->getBdd()->exec("INSERT INTO tweet (content, id_user)  VALUES  ('$content',$id)");
}

function show_posts($userid){

 $db = new bdd();
        $rq = $db->getBdd()->query('SELECT * FROM user  WHERE id ="'.$userid.'"');
        $info = $rq->fetchAll();
        foreach ($info as $key => $value)
        {
            $avatar = $value["picture"];
        }

    $posts = array();
 	$db = new bdd();
    $query = $db->getBdd()->prepare('SELECT DISTINCT tweet.content, tweet.created_date, user.username, follow.id_user, tweet.id, follow.id_user_follow, tweet.id_user FROM tweet LEFT JOIN user ON tweet.id_user = user.id LEFT JOIN follow ON  follow.id_user_follow = user.id
     GROUP BY tweet.id ORDER BY created_date desc');
    $query->execute();
	if (!$query->rowCount() == 0) {
		while ($data = $query->fetchObject()) {
			 $posts[] = array('created_date' => $data->created_date,
                            'username' => $data->username, 
                            'content' => $data->content,
                            'id' => $data->id,
                            'picture' => $avatar
                    );
		}
	}
    return $posts;
}
function retweet($id, $tweetid){
    $posts = array();
    $db = new bdd();
    $query = $db->getBdd()->prepare("INSERT INTO retweets (id_user, id_tweet) VALUES ('$id', '$tweetid')");
    $query->execute();
    $query = $db->getBdd()->prepare("INSERT INTO tweet (id_user, id) VALUES ('$id', '$tweedtid')");
    $query->execute();
}

function delete($idDeleteTweet){

    $db = new bdd();
    $query = $db->getBdd()->prepare("DELETE FROM tweet WHERE id = '$idDeleteTweet'");
    $res = $query->execute();
}
?>