<!DOCTYPE html>
<html>
<head>
	<title>hashtag</title>
</head>
<body>

	<form method="GET" action="hashtag.php">
		<input type="text" name="tag" placeholder="Quoi de neuf ?" id="textBox">
		<button type="submit" id="btnTweeter">Rechercher par hashtag</button>
	</form>

	<?php
	//if (!empty($_GET["tag"])) {
		require_once "functions.php";
		$get_content = new Hashtag();
		$content_tweets = $get_content->check_tag();
		foreach ($content_tweets as $content) {
	?>

	<p> <?php echo $content . "<br>"; ?> </p>
		
	<?php
		}
	// }
	?>

</body>
</html>