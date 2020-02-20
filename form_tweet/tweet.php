<?php session_start(); ?> 
<!DOCTYPE html>
<html>
<head>
	<title>My_Twitter</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<script src="js/jquery-3.2.1.min.js"></script>
  	<script src="js/test/jquery-ui-1.12.1/jquery-ui.min.js"></script>
	<script src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
	<script src="js/Mention.js-master/bootstrap-typeahead.js"></script>
	<script src="js/Mention.js-master/mention.js"></script>
	<script src="js/main.js"></script>
	<link href="css/style.css" rel="stylesheet">
</head>
<body>
	<div class="background-box">
		<div class="tweet-box">
			<img src="img/default_profile.png" id="defaultImg" enctype="multipart/form-data">
			<form>
				<textarea rows="10" cols="50" placeholder="Quoi de neuf ?" class="form-control" id="textBox" autocomplete="off"></textarea>
				<div class="uploadBox">
					<i class="far fa-image" id="uploadImg"></i>
					<!-- <input type="file" name="photo" id="upload">
					<input type="hidden" name="MAX_FILE_SIZE" value="1048576"> -->
				</div>
				<img src="img/reply.png" id="replyImg">
				<img src="img/retweet.png" id="retweetImg">
				<img src="img/heart.png" id="likeImg">
				<img src="img/heart_full.png" id="likeImgFull" class="hidden">
				<button class="btn btn-primary" id="btnTweeter">Tweeter</button>
				<div class="s alert alert-success hidden"><p id="good">Succès</p></div>
				<div class="err alert alert-danger hidden"><p id="bad">Une erreur s'est protweet</p></div>
				<div class="tweetChar hidden"><p id="warning">Votre tweet dépasse les 140 caractères (<span id="lTweet">0</span>)</p>
			</form>
		</div>
	</div>
</body>
</html>