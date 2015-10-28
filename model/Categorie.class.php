<?php
/*
	Author                      : AASSOU Abdelilah.
	Creation Date               : 04/11/2013
*/
class Categorie{
	
	//attributes
	private $_id;
	private $_nom;
	private $_detail;
	
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
	
	public function setNom ($nom){
		if (is_string($nom)){
			$this->_nom = $nom;
		}
	}
	
	public function setDetail($detail){
		if (is_string($detail)){
			$this->_detail = $detail;
		}
	}
	
	//getters
	public function id(){
		return $this->_id;
	}
	
	public function nom(){
		return $this->_nom;
	}
	
	public function detail(){
		return $this->_detail;
	}
	
}