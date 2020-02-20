<?php

function get_hashtags($str) {
	$tag;
	var_dump(preg_match_all("/#\w+/", $str, $tag));             //#+([a-zA-Z0-9_]+)/", $str, $tag);
	$i = 0;
	$arr_hashtags = [];
	foreach ($tag as $tag) {
		$arr_hashtags = $tag;
		$i++;
	}
	return $arr_hashtags;
}
$tet = '<a href="hashtag.php?tag=ceci">#ceci</a> est un <a href="hashtag.php?tag=test">#test</a> <a href="hashtag.php?tag=tweet">#tweet</a>';

get_hashtags($tet);

?>