<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <title>Send message</title>
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>

<div class="container">
    <?php if (isset($_GET) && !empty($_GET['ID'])): ?>
        <div class="jumbotron">
            <form action="" method="POST">
                <label for="textarea_content">Nouveau message :</label>
                <textarea id="textarea_content"></textarea>
                <div class="div_submit">
                    <button class="btn btn-primary" id="btn_submit" type="submit">Envoyer</button>
                </div>
               <input id="input_id" type="hidden" value="<?= $_GET['ID']; ?> "> 
            </form>
        </div>
    <?php endif; ?>
</div>

<script src="assets/js/jquery-3.3.1.js"></script>
<script src="assets/js/script.js"></script>

</body>
</html>