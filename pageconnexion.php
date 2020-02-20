<html>
    <head>
        <meta charset="utf-8" />
        <title>Connexion</title>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
     
                 <h1>Connexion</h1>

        <form method="post" action="checkconnect.php">
    <p>
        Pseudo : <input type="text" id="username" name="username">
    </p>
    <p>
        Mot de passe : <input type="password" id="password" name="password">
    </p>
    <p>
            <input type="submit" class="btn btn-warning" id="submit" value="Se connecter">
    </p>
            <input type="hidden" name="">
        </form>
    <p>
        <a href="Accueil.php">Retourner a l'Accueil</a>
    </p>
    </body>
</html>