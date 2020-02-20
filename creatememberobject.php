<?php
require_once("bdd.php");
class member
{
	private $username;
  private $lastname;
	private $firstname;
	private $description;
	private $email;
	private $password;


	public function __construct($data)
{	
	
  foreach ($data as $key => $value)
	{

    	$method = 'set'.ucfirst($key);

    	if (method_exists($this, $method)) 
    	{
    	
    		$this->$method($value);


    	}
    }
}


	public function getLastname()

  {

    return $this->lastname;

  }
  	public function getFirstname()

  {

    return $this->firstname;

  }

  public function getDescription()

  {

    return $this->description;

  }

    public function getEmail()

  {

    return $this->email;

  }
    public function getPassword()

  {

    return $this->password;

  }

public function setLastname($lastname)

  {

    if (is_string($lastname))

    {

      $this->lastname = $lastname;

    }

  }
  public function setFirstname($firstname)

  {

    if (is_string($firstname))

    {

      $this->firstname = $firstname;

    }

  }

  public function setDescription($description)

  {
       $this->description = $description;
  
  }

  public function setEmail($email)

  {

      $this->email = $email;

   }

     public function setPassword($password, $salt = "si tu aimes la wac tape dans tes mains")

  {   
      
      $hash = hash_hmac('ripemd160', $password, $salt);
   
      $this->password = $hash;

  }
      public function setUsername($username)

    {

      $this->username = $username;

    }
 

  function addmember()
  { 
    $db = new bdd();
    $rq = $db->getBdd()->query('SELECT username, email FROM user  WHERE username ="'.$this->username.'" OR email="'.$this->email.'"');
    $check = $rq->fetchAll();
    $test = count($check);
    if($test != 0)
    {
       echo "le pseudo ou l'adresse e-mail que vous avez entrés sont déjà associé a un compte\n";
       ?><p><a href="inscription.php">Retour au formulaire</a></p><?php
      return;
    }

    else
    {
   
      $q = $db->getBdd()->prepare('INSERT INTO user(email, password, first_name, last_name, description, username) VALUES(:email, :password, :firstname, :lastname, :description, :username)');

      $q->bindValue(':email', $this->email );
      $q->bindValue(':password', $this->password);
      $q->bindValue(':firstname',$this->firstname);
      $q->bindValue(':lastname', $this->lastname);
      $q->bindValue(':description', $this->description);
      $q->bindValue(':username', $this->username);

      $q->execute();
      echo "Votre inscription a bien été prise en compte";
      ?><p><a href="Accueil.php">Retour a l'Accueil</a></p><?php

     }
  }
}

    











 










