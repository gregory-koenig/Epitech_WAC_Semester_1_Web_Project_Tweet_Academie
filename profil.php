<?php
require_once("bdd.php");
class profil
{
	private $id;
	public function __construct($id)
{	
	
$this->id = $id;

}

public function getId()

  {

    return $this->id;

  }

  public function setPassword($password, $salt = "si tu aimes la wac tape dans tes mains")
{

        $hash = hash_hmac('ripemd160', $password, $salt);
   
        $this->password = $hash;

 }

function myprofil()

   { 
        $db = new bdd();
        $rq = $db->getBdd()->query('SELECT * FROM user  WHERE id ="'.$this->id.'"');
        $info = $rq->fetchAll();
        foreach ($info as $key => $value) {
        	?><strong><?php echo '<p class="pseudo">'.$value["username"].'</p>';?></strong><?php
            echo '<img src='.$value["picture"].' class="david">';
        	/*echo '<p class= "test">Nom: '.$value["last_name"].'</p>';
        	echo '<p class= "test">Prenom: '.$value["first_name"].'</p>';*/
        	echo '<p class= "test">Description: '.$value["description"].'</p>';
        	echo '<p class= "test">Adresse e-mail : '.$value["email"].'</p>';
        	
        	}
    }

    function allMyProfil()

   { 
        $db = new bdd();
        $rq = $db->getBdd()->query('SELECT * FROM user  WHERE id ="'.$this->id.'"');
        $info = $rq->fetchAll();
        foreach ($info as $key => $value) {
            ?><strong><?php echo '<p class="pseudo">'.$value["username"].'</p>';?></strong><?php
           
            echo '<p class= "test">Nom: '.$value["last_name"].'</p>';
            echo '<p class= "test">Prenom: '.$value["first_name"].'</p>';
            echo '<p class= "test">Description: '.$value["description"].'</p>';
            echo '<p class= "test">Adresse e-mail : '.$value["email"].'</p>';
            
            }
        	

    }

    function profilmembre()

   { 
        $db = new bdd();
        $rq = $db->getBdd()->query('SELECT * FROM user  WHERE id ="'.$this->id.'"');
        $info = $rq->fetchAll();
        foreach ($info as $key => $value) {
            echo '<img src='.$value["picture"].' class="david">';
        	?><br><strong><?php echo '<p class="test">'.$value["username"].'</p>';?></strong><?php
        	echo '<p class= "test">Nom : '.$value["first_name"].'</p>';
        	echo '<p class= "test">Prenom : '.$value["last_name"].'</p>';
        	echo '<p class= "test">Description : '.$value["description"].'</p>';
        	
        	
        	}
        	

    }

   function modifabo($id)
  {
	$bdd = new bdd();

	if (($_POST["picture"] != ""))
    {
        
        $bdd->getBdd()->exec('UPDATE user SET picture  = "'.($_POST["picture"]).'" WHERE id= "'.$id.'"');
    }

    if (($_POST["password"] != ""))
	{
		
		$bdd->getBdd()->exec('UPDATE user SET password  = "'.setPassword($_POST["password"]).'" WHERE id= "'.$id.'"');
	}
	
	
	if (($_POST["lastname"] != ""))
	{
		$bdd->getBdd()->exec('UPDATE user SET last_name  = "'.$_POST["lastname"].'" WHERE id= "'.$id.'"');
	}

	
	if (($_POST["firstname"] != "")) 
	{
		
		$bdd->getBdd()->exec('UPDATE user SET first_name  = "'.$_POST["firstname"].'" WHERE id= "'.$id.'"');
	}
	
	if (($_POST["description"]) != "") 
	{
		
		$bdd->getBdd()->exec('UPDATE user SET description  = "'.$_POST["description"].'" WHERE id= "'.$id.'"');
	}
	
	if (($_POST["email"]) != "") 
	{
		
		$bdd->getBdd()->exec('UPDATE user SET email = "'.$_POST["email"].'"WHERE id= "'.$id.'"');
	}
	
	
		echo "Profil modifié avec succès\n";
  }

	function supabo($id)
	{
		
		$bdd = new bdd();
		$bdd->getBdd()->exec('DELETE FROM user WHERE id= "'.$id.'"');
		
	}

	function getUsername($id)
	{
		$bdd = new bdd();
		$user = $bdd->getBdd()->query('SELECT username FROM user  WHERE id ="'.$this->id.'"');
		$info = $user->fetchAll();
        foreach ($info as $key => $value)
        {
        	$username = $value["username"];
        }
        	return $username;

	}

	function follow($id_user, $id_user_follow)
	{
		
		$bdd = new bdd();
		 $q = $bdd->getBdd()->prepare('INSERT INTO follow(id_user, id_user_follow) VALUES(:id, :id_user_follow)');

      $q->bindValue(':id', $id_user );
      $q->bindValue(':id_user_follow', $id_user_follow);
    
      $q->execute();
  		
	}

	function unfollow($id_user, $id_user_follow)
	{
		$bdd = new bdd();
		$bdd->getBdd()->exec('DELETE FROM follow WHERE id_user ="'.$id_user.'" AND id_user_follow = "'.$id_user_follow.'"');
	}

	function verif_follow($id_user, $id_user_follow)
	{
		$bdd = new bdd();
		$user = $bdd->getBdd()->query('SELECT * FROM follow  WHERE id_user ="'.$id_user.'" AND id_user_follow = "'.$id_user_follow.'"');
		$check = $user->fetchAll();
        $test = count($check);
    	if($test == 0)
    	{
    		return "non";
    	}
    	else
    	{
    		return "oui";
    	}
    }

    function abonnements($id_user)
    {
    	$bdd = new bdd();
    	$user = $bdd->getBdd()->query('SELECT id FROM follow  WHERE id_user ="'.$id_user.'"');
		$check = $user->fetchAll();
        $test = count($check);
        return $test;
    }

    function abonnés($id_user)
    {
    	$bdd = new bdd();
    	$user = $bdd->getBdd()->query('SELECT id FROM follow  WHERE id_user_follow ="'.$id_user.'"');
		$check = $user->fetchAll();
        $test = count($check);

        return $test;
    }

    function listabonnements($id_user)
    {
       $bdd = new bdd();
        $user = $bdd->getBdd()->query('SELECT id_user_follow FROM follow  WHERE id_user ="'.$id_user.'"');
        $check = $user->fetchAll();
       foreach ($check as $key => $value)
        {
            $id_follow = $value["id_user_follow"];
        
        $user = $bdd->getBdd()->query('SELECT * FROM user  WHERE id ="'.$id_follow.'"');
        $check = $user->fetchAll();
            foreach ($check as $key => $value)
            {
            echo '<div class= "searchbox">';
            echo '<a class="lien5" href="profilmembre.php?ID='.$value['id'].'" >';
            echo '<img src='.$value["picture"].' class="david"><br>'; ?>
            <strong><?php echo '<p class="lien5">'. $value["username"];'</p>'?></strong><br>
            </div><?php
            
            }
        }

    }

    function setTheme($val,$id)
    {   
        $bdd = new bdd();
        $bdd->getBdd()->exec('UPDATE user SET theme = "'.$val.'" WHERE id= "'.$id.'"');
    }

    function verifTheme($id)
    {
        $bdd = new bdd();
        $user = $bdd->getBdd()->query('SELECT theme FROM user  WHERE id ="'.$id.'"');
        $check = $user->fetchAll();
        foreach ($check as $key => $value)
        {
            $theme = $value["theme"];
        }
        if ($theme == "defaut") {
            echo '<link rel="stylesheet" type="text/css" href="style.css">';
            
        }
        elseif ($theme == "dark") {
             echo '<link rel="stylesheet" type="text/css" href="styleda.css">';
           
        }
        elseif ($theme == "dora") {
             echo '<link rel="stylesheet" type="text/css" href="styledo.css">';
            
        }
        elseif ($theme == "eco") {
             echo '<link rel="stylesheet" type="text/css" href="styleeco.css">';
            
        }



    }




        function listabonnés($id_user)
    {
       $bdd = new bdd();
        $user = $bdd->getBdd()->query('SELECT id_user FROM follow  WHERE id_user_follow ="'.$id_user.'"');
        $check = $user->fetchAll();
       foreach ($check as $key => $value)
        {
            $id_uti = $value["id_user"];
        
        $user = $bdd->getBdd()->query('SELECT * FROM user  WHERE id ="'.$id_uti.'"');
        $check = $user->fetchAll();
            foreach ($check as $key => $value)
            {
            
             echo '<div class= "searchbox">';
            echo '<a class="lien5" href="profilmembre.php?ID='.$value['id'].'" >';
            echo '<img src='.$value["picture"].' class="david"><br>'; ?>
            <strong><?php echo '<p class="lien5">'. $value["username"];'</p>'?></strong><br>
            </div><?php
            }
        }
    }	

}