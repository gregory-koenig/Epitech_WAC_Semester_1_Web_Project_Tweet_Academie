<?php
class bdd
{
private $bdd;

	public function getBdd()

  {

    return $this->bdd;

  }

  function __construct() {
  
	try
	{
	 $this->bdd = new PDO('mysql:host=localhost;dbname=twitter;charset=utf8', 'root', '');
		
	}
	catch (Exeption $e)
	{
		die('Erreur : ' . $e->getMessage());
	} 
  }
}