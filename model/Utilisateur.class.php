<?php
/*
	Author                      : AASSOU Abdelilah.
	Creation Date               : 15/10/2013
*/
class Utilisateur{
	//attributes
	private $_id;
	private $_nom;
	private $_prenom;
	private $_telefon;
	private $_ville;
	private $_email;
	private $_password;
	private $_image;
	private $_dateInscription;
	private $_dateDerniereVisite;
	private $_cle;
	private $_actif;
	
	//constructor	
	//public function __construct(){}
	public function __construct($data){
		$this->hydrate($data);
	}
	
	//la focntion hydrate sert à attribuer les valeurs en utilisant les setters 
	//d'une façon dynamique!
	public function hydrate($data){
		foreach ($data as $key => $value){
			$method = 'set'.ucfirst($key);
			
			if (method_exists($this, $method)){
				$this->$method($value);
			}
		}
	}
	
	//setters
	public function setCle($cle){
		$this->_cle = $cle;
	}
	public function setActif($actif){
		$this->_actif = $actif;
	}
	public function setId($id){
		$id = (int) $id;
		
		if ($id > 0){
			$this->_id = $id;
		}
	}
	
	public function setNom($nom){
		if (is_string($nom)){
			$this->_nom = $nom;
		}
	}
	
	public function setPrenom($prenom){
		if (is_string($prenom)){
			$this->_prenom = $prenom;
		}
	}
	
	public function setTelefon($telefon){
		if (is_string($telefon)){
			$this->_telefon = $telefon;
		}
	}
	
	public function setVille($ville){
		if (is_string($ville)){
			$this->_ville = $ville;
		}
	}
	
	public function setEmail($email){
		if (is_string($email)){
			$this->_email = $email;
		}
	}
	
	public function setPassword($password){
		if (is_string($password)){
			$this->_password = $password;
		}
	}
	
	public function setImage($image){
		if (is_string($image)){
			$this->_image = $image;
		}
	}
	
	public function setDateInscription($dateInscription){
		if(is_string($dateInscription)){
			$this->_dateInscription = $dateInscription;
		}
	}
	
	public function setDateDerniereVisite($dateDerniereVisite){
		if(is_string($dateDerniereVisite)){
			$this->_dateDerniereVisite = $dateDerniereVisite;
		}
	}
	
	//getters
	public function id(){
		return $this->_id;
	}
	
	public function nom(){
		return $this->_nom;
	}
	
	public function prenom(){
		return $this->_prenom;
	}
	
	public function telefon(){
		return $this->_telefon;
	}
	
	public function ville(){
		return $this->_ville;
	}
	
	public function email(){
		return $this->_email;
	}
	
	public function password(){
		return $this->_password;
	}
	
	public function image(){
		return $this->_image;
	}
	
	public function dateInscription(){
		return $this->_dateInscription;
	}
	
	public function dateDerniereVisite(){
		return $this->_dateDerniereVisite;
	}

	public function cle(){
		return $this->_cle;
	}

	public function actif(){
		return $this->_actif;
	}
}