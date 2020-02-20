<?php
class Bdd {
	private $bdd;
	
	public function getBdd() {
    	return $this->bdd;
	}

  	function __construct() {
		try {
			$this->bdd = new PDO('mysql:host=localhost;dbname=my_twitter;charset=utf8', 'root', 'root');	
		} catch (Exeption $e) {
			die('Erreur : ' . $e->getMessage());
		}

		$this->bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$this->bdd->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
  	}
}