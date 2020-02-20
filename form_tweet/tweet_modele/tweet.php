<!DOCTYPE html>
<html>
<head>
	<title>My_Twitter</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<META HTTP-EQUIV="CACHE-CONTROL" CONTENT="NO-CACHE">
	<link rel="shortcut icon" href="image/favicon.png">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<script src="js/jquery-3.2.1.min.js"></script>
  	<script src="test/jquery-ui-1.12.1/jquery-ui.min.js"></script>
	<link href="css/style.css" rel="stylesheet">
	<script src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
	<script src="bonne année/Mention.js-master/bootstrap-typeahead.js"></script>
	<script src="bonne année/Mention.js-master/mention.js"></script>
	<script src="js/main.js"></script>
</head>
<body>
	<div class="tweet-box">
		<img src="img/default_profile.png" id="defaultImg" enctype="multipart/form-data">
		<form method="POST" action="tweeter.php">
			<input type="text" name="textTweet" placeholder="Quoi de neuf ?" class="form-control" id="textBox" autocomplete="off">
			<div class="uploadBox">
				<i class="far fa-image" id="uploadImg"></i>
				<i class="far fa-image" id="uploadImg"></i>
				<input type="file" name="photo" id="upload">
				<input type="hidden" name="MAX_FILE_SIZE" value="1048576">
			</div>
			<img src="img/reply.png" id="replyImg">
			<img src="img/retweet.png" id="retweetImg">
			<img src="img/heart.png" id="likeImg">
			<button type="submit" class="btn btn-primary" id="btnTweeter">Tweeter</button>
		</form>
	</div>
</body>
</html>