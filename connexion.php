<?php
require_once("bdd.php");
require_once("creatememberobject.php");
class connect
{
    private $username;
    private $password;
    
    public function __construct($data)
    {   
    
        foreach ($data as $key => $value)
        {

        $user = 'set'.ucfirst($key);

            if (method_exists($this, $user)) 
            {
        
            $this->$user($value);


            }
        }

    }

public function getUsername()
{

    return $this->username;

}
public function getPassword()
{

    return $this->password;

}
public function setUsername($username)
{

      $this->username = $username;

}


public function setPassword($password, $salt = "si tu aimes la wac tape dans tes mains")
{

        $hash = hash_hmac('ripemd160', $password, $salt);
   
        $this->password = $hash;
}

    function checkmember()
    {

        $db1 = new bdd();
        $rq = $db1->getBdd()->query('SELECT username, password, id FROM user  WHERE username ="'.$this->username.'"');
        $check = $rq->fetchAll();
        $test = count($check);
        if ($test == 0) 
        {
            echo "mauvais nom d'utilisateur ou mot de passe";
            echo "<meta http-equiv='Refresh' content='3;URL=http://localhost/twitter/Accueil.php'>";
            return false;


        }
        
        foreach ($check as $value) 
        {
           $mdp1 = $value['password'];
           $pseudo1 = $value["username"];
           $id = $value["id"];
           
        } 

        
        if( $mdp1 == $this->password && $pseudo1 == $this->username)
        { 
                        $_SESSION['id'] = $id;
                        header('Location:http://localhost/twitter/pageprofil.php');
                        setcookie($_SESSION["id"],true , time() + 365*24*3600, null, null, false, true);
            
        }

        else
        { 

            echo "mauvais nom d'utilisateur ou mot de passe";
           echo "<meta http-equiv='Refresh' content='3;URL=http://localhost/twitter/Accueil.php'>";
           return false;
            

        }


    }

    function searchMember()
    {
            $db = new bdd();
            $rq = $db->getBdd()->query('SELECT * FROM user  WHERE username LIKE "%'.$this->username.'%"');
            $info = $rq->fetchAll();
            foreach ($info as $key => $value) 
            {
            echo '<div class= "searchbox">';
            echo '<a class="lien5" href="profilmembre.php?ID='.$value['id'].'" >';
            echo '<img src='.$value["picture"].' class="david"><br>'; ?>
            <strong><?php echo '<p class="lien5">'. $value["username"];'</p>'?></strong><br>
            </div>
            <?php
            $_SESSION["idcible"] = $value["id"];
            
            }
    }









}

    

















    /*if( isset($_POST['pseudo']) && isset($_POST['mdp']) ){


        if($_POST['pseudo'] == $pseudo && $_POST['mdp'] == $mdp){ 

            session_start();

            $_SESSION['user'] = $pseudo;

            echo "Success";        

        }

        else{ 

            echo "Failed";

        }


    }*/


