<?php
/*
	Author                      : AASSOU Abdelilah.
	Creation Date               : 04/11/2013
*/
class CategorieManager{
//attributes
	private $_db;
	
	//constructor
	public function __construct($db){
		$this->_db = $db;
	}
	
	//CRUD operations
	public function add(Categorie $categorie){
		$query = $this->_db->prepare('INSERT INTO categorie (nom, detail)
								VALUES (:nom, :detail)') or die(print_r($this->_db->errorInfo()));
		$query->bindValue(':nom', $categorie->nom());
		$query->bindValue(':detail', $categorie->detail());
		$query->execute();
		$query->closeCursor();
	}
	
	public function update(Categorie $categorie){
		$query = $this->_db->prepare('UPDATE categorie SET nom=:nom, detail=:detail WHERE id=:id');
		$query->bindValue(':nom', $categorie->nom());
		$query->bindValue(':detail', $categorie->detail());
		$query->bindValue(':id', $categorie->id());
		$query->execute();
		$query->closeCursor();
	}
	
	public function delete(Annonce $annonce){
		$this->_db->exec('DELETE FROM annonce WHERE id='.$annonce->id());
	}
	
	public function getCategorieNames(){
	
		$categorieNames = array();
		
		$query = $this->_db->query('SELECT DISTINCT nom FROM categorie');
		
		while($data = $query->fetch(PDO::FETCH_ASSOC)){
			$categorieNames[] = new Categorie($data);
		}

		return $categorieNames;
		
	}

	public function getCategorieDetailsList(){
	
		$categorieDetails = array();
		
		$query = $this->_db->query('SELECT detail FROM categorie');
		
		while($data = $query->fetch(PDO::FETCH_ASSOC)){
			$categorieDetails[] = new Categorie($data);
		}

		return $categorieDetails;
		
	}
	
	public function getCategorieDetails($categorieName){
	
		$categorieDetails = array();
		
		$query = $this->_db->prepare('SELECT * FROM categorie WHERE nom =:nom');
		$query->bindValue(':nom', $categorieName);
		$query->execute();
		
		while($data = $query->fetch(PDO::FETCH_ASSOC)){
			$categorieDetails[] = new Categorie($data);
		}

		return $categorieDetails;
		
	}
}