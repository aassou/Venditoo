<?php
/*
	Author                      : AASSOU Abdelilah.
	Creation Date               : 14/10/2013
*/
class Annonce{
	//attributes
	private $_id;
	private $_titre;
	private $_description;
	private $_image;
	private $_image2;
	private $_image3;
	private $_datePublication;
	private $_priorite;
	private $_prix;
	private $_ville;
	private $_vendu;
	private $_abuse;
	private $_idUtilisateur;
	private $_idCategorie;
	
	//le constructeur
	public function __construct($data){
		$this->hydrate($data);
	}
	
	//la focntion hydrate sert à attribuer les valeurs en utilisant les setters d'une façon dynamique!
	public function hydrate($data){
		foreach ($data as $key => $value){
			$method = 'set'.ucfirst($key);
			
			if (method_exists($this, $method)){
				$this->$method($value);
			}
		}
	}
	
	//setters
	public function setId($id){
		$id = (int) $id;
		if ($id > 0){
			$this->_id = $id;
		}
	}
	
	public function setTitre($titre){
		if (is_string($titre)){
			$this->_titre = $titre;
		}
	}
	
	public function setDescription($description){
		if (is_string($description)){
			$this->_description = $description;
		}
	}
	
	public function setImage($image){
		if (is_string($image)){
			$this->_image = $image;
		}
	}
	
	public function setImage2($image2){
		if (is_string($image2)){
			$this->_image2 = $image2;
		}
	}
	
	public function setImage3($image3){
		if (is_string($image3)){
			$this->_image3 = $image3;
		}
	}
	
	public function setDatePublication($datePublication){
		if (is_string($datePublication)){
			$this->_datePublication = $datePublication;
		}
	}
	
	public function setPriorite($priorite){
		$priorite = (int) $priorite;
		
		if ($priorite > 0){
			$this->_priorite = $priorite;
		}
	}
	
	public function setPrix($prix){
		if ($prix > 0){
			$this->_prix = $prix;
		}
		else{
			$this->_prix = abs($prix);
		}
	}
	
	public function setVille($ville){
		if (is_string($ville)){
			$this->_ville = $ville;
		}
	}
	
	public function setIdutilisateur($idUtilisateur){
		$idUtilisateur = (int) $idUtilisateur;
		
		if ($idUtilisateur > 0){
			$this->_idUtilisateur = $idUtilisateur;
		}
	}
	
	public function setIdCategorie($idCategorie){
		$this->_idCategorie = $idCategorie;
	}
	
	public function setVendu($vendu){
		if(is_string($vendu)){
			$this->_vendu = $vendu;
		}
	}
	
	public function setAbuse($abuse){
		$this->_abuse = $abuse;
	}
	
	//getters
	public function id(){
		return $this->_id;
	}
	
	public function titre(){
		return $this->_titre;
	}
	
	public function description(){
		return $this->_description;
	}
	
	public function image(){
		return $this->_image;
	}
	
	public function image2(){
		return $this->_image2;
	}
	
	public function image3(){
		return $this->_image3;
	}
	
	public function datePublication(){
		return $this->_datePublication;
	}
	
	public function priorite(){
		return $this->_priorite;
	}
	
	public function prix(){
		return $this->_prix;
	}
	
	public function ville(){
		return $this->_ville;
	}
	
	public function idUtilisateur(){
		return $this->_idUtilisateur;
	}
	
	public function idCategorie(){
		return $this->_idCategorie;
	}
	
	public function vendu(){
		return $this->_vendu;
	}
	
	public function abuse(){
		return $this->_abuse;
	}
	
}