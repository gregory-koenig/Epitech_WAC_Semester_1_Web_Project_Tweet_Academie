<?php

session_start();
$_SESSION['id_msg'] = $_GET['id'];

$db = new PDO('mysql:host=localhost;dbname=test_msg', 'root', '');
$sql = ('SELECT * FROM msg
        LEFT JOIN users ON msg.id_user = users.id
        WHERE (id_user = 1 OR id_user = ?) AND (id_dest = ? OR id_dest = 1)');
$req = $db->prepare($sql);
$req->execute([$_SESSION['id_msg'], $_SESSION['id_msg']]);
$_SESSION['msg'] = $req->fetchAll(PDO::FETCH_ASSOC);
?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Private message</title>
    <link href="../maquette/assets/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

<nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="private_msg.php?id=3">Jeanne</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="private_msg.php?id=6">Marc</a>
            </li>
        </ul>
    </div>
</nav>

<?php foreach($_SESSION['msg'] as $value): ?>
    <p class="jumbotron"><?= $value['prenom'] . ' : ' . $value['content'] ?></p>
<?php endforeach; ?>

<form action="new_msg.php" method="POST">
    <label id="new_msg" for="new_msg">Nouveau message :</label>
    <textarea id="new_msg" name="new_msg" rows="4" cols="130"></textarea>
    <button class="btn btn-primary" type="submit">Envoyer</button>
</form>

</body>
</html>