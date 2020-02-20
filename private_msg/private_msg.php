<?php
require_once("bdd.php");
$pdo = new bdd();
session_start();
$sql_nav = ('SELECT * FROM directmessage
            LEFT JOIN user ON directmessage.id_user = user.id
            WHERE NOT directmessage.id_user = ?
            UNION
            SELECT * FROM directmessage
            LEFT JOIN user ON directmessage.id_dest = user.id
            WHERE NOT directmessage.id_dest = ?
            ORDER BY created_date ASC');
$req_nav = $pdo->getBdd()->prepare($sql_nav);
$req_nav->execute([$_SESSION["id"], $_SESSION["id"]]);
$data_nav = $req_nav->fetchAll();

$array_nav = [];

foreach ($data_nav as $value_nav) {
    $array_nav[$value_nav['username']] = [
        'id' => $value_nav['id'],
        'username' => $value_nav['username'],
        'created_date' => $value_nav['created_date']];
}

if (isset($_GET) && !empty($_GET['id'])) {
    $sql_directmessage = ('SELECT * FROM directmessage
            LEFT JOIN user ON directmessage.id_user = user.id
            WHERE (directmessage.id_user = ? AND directmessage.id_dest = ?)
              OR (directmessage.id_user = ? AND directmessage.id_dest = ?)
            ORDER BY created_date ASC');
    $req_directmessage = $pdo->getBdd()->prepare($sql_directmessage);
    $req_directmessage->execute([$_SESSION["id"],$_GET['id'], $_GET['id'],$_SESSION["id"]]);
}
?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="https://vignette.wikia.nocookie.net/xmenfirstclass/images/3/36/Twitter_favicon.png/revision/latest?cb=20160613131732&path-prefix=fr">

    <title>Private message</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="assets/css/style.css" rel="stylesheet">
</head>

<body>

<nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <a class="navbar-brand" href="private_msg.php">Navbar</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
            <?php foreach ($array_nav as $value_nav): ?>
                <li class="nav-item">
                    <a class="nav-link" href="private_msg.php?id=<?= $value_nav['id'] ?>"><?= $value_nav['username'] ?></a>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</nav>


<?php if (isset($_GET) && !empty($_GET['id'])): ?>
    <div class="container">
        <div id="conversation">
            <?php while ($data_directmessage = $req_directmessage->fetch(PDO::FETCH_ASSOC)): ?>
                <?php $date_directmessage = strftime('%A %e %B %G à %H:%M', strtotime($data_directmessage['created_date'])); ?>
                <?php if ($data_directmessage['id_user'] == $_SESSION["id"]): ?>
                    <div class="user_directmessage">
                        <div class="user_content">
                            <p class="p-2 user_theme"><?= $data_directmessage['content'] ?></p>
                        </div>
                        <div class="user_created_date">
                            <p class="p_user_created_date">
                                <small>(<?= $date_directmessage ?>)</small>
                            </p>
                        </div>
                    </div>
                <?php else: ?>
                    <div class="dest_directmessage">
                        <p class="dest_username"><strong><?= $data_directmessage['username'] ?></strong></p>
                        <p class="p-2 dest_theme"> <?= $data_directmessage['content'] ?></p>
                        <div class="dest_created_date">
                            <p>
                                <small>(<?= $date_directmessage ?>)</small>
                            </p>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endwhile; ?>
        </div>
    </div>
<?php endif; ?>

<div class="container">
    <?php if (isset($_GET) && !empty($_GET['id'])): ?>
        <div class="jumbotron">
            <form action="" method="POST">
                <label for="textarea_content">Nouveau message :</label>
                <textarea id="textarea_content"></textarea>
                <div class="div_submit">
                    <button class="btn btn-primary" id="btn_submit" type="submit">Envoyer</button>
                </div>
                <input id="input_id" type="hidden" value="<?= $_GET['id'] ?>">
            </form>
        </div>
    <?php endif; ?>
</div>

<!-- Bootstrap core JavaScript
    ================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
<script>window.jQuery || document.write('<script src="assets/js/jquery-3.3.1.js"><\/script>')</script>
<script src="assets/js/popper.min.js"></script>
<script src="assets/js/bootstrap.js"></script>
<script src="assets/js/script.js"></script>

</body>
</html>