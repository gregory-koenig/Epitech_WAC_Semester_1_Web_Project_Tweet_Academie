
<!DOCTYPE html>
<html>
<head>
	<title>
		Accueil
	</title>
	<meta charset="utf-8">
 
  <link rel="stylesheet" type="text/css" href="style.css">
  
</head>
<body>
  <div id="image"></div>
  <div class="form1" id="div">
    <form method="post" action="inscriconfirm.php">
  <p>Formulaire d'inscription:</p>
         <input type="hidden" name="test1">
  <p>Nom:</p>
         <input type="text" placeholder="Entrez votre nom" name="lastname" id="lastname" required>
  <p>Prenom:</p>
         <input type="text" placeholder="Entrez votre prenom" name="firstname" id="firstname" required>
  <p>Adresse E-mail:</p>
         <input type="email" placeholder="Entrez votre adresse mail" name="email" id="email" required>
    <p>Pseudo:</p>
         <input type="text" placeholder="Entrez votre pseudo" name="username" id="username" required>
    <p>Mot de passe:</p>
         <input type="password" placeholder="Entrez votre mot de passe" name="password" id="password" required>
      <br><label for="description">Votre présentation :</label><br />
        <textarea name="description" id="description"></textarea><br>
  <br>   <input type="submit" id="inscriconfirm" class="btn btn-warning" value="Inscription">
    </form>
    <br>
  </div>
    <p>
      <div id="lien"><a href="Accueil.php">Retourner a l'Accueil</a></div>
    </p>
  </body>
</html>