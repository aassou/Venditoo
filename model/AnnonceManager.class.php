<?php
/*
	Author                      : AASSOU Abdelilah.
	Creation Date               : 14/10/2013
*/
class AnnonceManager{
	//attributes
	private $_db;
	
	//constructor
	public function __construct($db){
		$this->_db = $db;
	}
	
	//CRUD operations
	public function add(Annonce $annonce){
		$query = $this->_db->prepare('INSERT INTO annonce (titre, description, image, image2, image3, datePublication, priority, prix, ville,idUtilisateur, idCategorie, abuse, vendu)
								VALUES (:titre, :description, :image, :image2, :image3, :datePublication, :priority, :prix, :ville, :idUtilisateur, :idCategorie, :abuse, :vendu)') or die(print_r($this->_db->errorInfo()));
		$query->bindValue(':titre', $annonce->titre());
		$query->bindValue(':description', $annonce->description());
		$query->bindValue(':image', $annonce->image());
		$query->bindValue(':image2', $annonce->image2());
		$query->bindValue(':image3', $annonce->image3());
		$query->bindValue(':datePublication', $annonce->datePublication());
		$query->bindValue(':priority', $annonce->priorite());
		$query->bindValue(':prix', $annonce->prix());
		$query->bindValue(':ville', $annonce->ville());
		$query->bindValue(':idUtilisateur', $annonce->idUtilisateur());
		$query->bindValue(':idCategorie', $annonce->idCategorie());
		$query->bindValue(':abuse', $annonce->abuse());
		$query->bindValue(':vendu', $annonce->vendu());
		$query->execute();
		$query->closeCursor();
	}
	
	public function update(Annonce $annonce){
		$query = $this->_db->prepare('UPDATE annonce SET titre=:titre, description=:description, 
		image=:image, image2=:image2, image3=:image3, prix=:prix, ville=:ville, idCategorie=:idCategorie
		WHERE id=:idAnnonce AND idUtilisateur=:idUtilisateur')or die(print_r($this->_db->errorInfo()));
		$query->bindValue(':idAnnonce', $annonce->id());
		$query->bindValue(':titre', $annonce->titre());
		$query->bindValue(':description', $annonce->description());
		$query->bindValue(':image', $annonce->image());
		$query->bindValue(':image2', $annonce->image2());
		$query->bindValue(':image3', $annonce->image3());
		$query->bindValue(':prix', $annonce->prix());
		$query->bindValue(':ville', $annonce->ville());
		$query->bindValue(':idCategorie', $annonce->idCategorie());
		$query->bindValue(':idUtilisateur', $annonce->idUtilisateur());
		$query->execute();
		$query->closeCursor();
	}
	
	public function getAnnonces(){
		$annonces = array();
		$query = $this->_db->query('SELECT a.id, a.titre, a.description, a.image, a.datePublication,
							a.prix FROM annonce a INNER JOIN utilisateur u ON a.idUtilisateur = u.id
							WHERE u.actif=1 ORDER BY a.datePublication DESC');
		//get result
		while($data = $query->fetch(PDO::FETCH_ASSOC)){
			$annonces[] = new Annonce($data);
		}
		$query->closeCursor();
		return $annonces;
	}
	
	public function getAnnoncesByLimit($start, $limit){
		$annonces = array();
		$query = $this->_db->query("SELECT a.id, a.titre, a.description, a.image, a.datePublication,
							a.prix FROM annonce a INNER JOIN utilisateur u ON a.idUtilisateur=u.id
							WHERE u.actif=1
							ORDER BY a.datePublication DESC 
							LIMIT {$start}, {$limit}");
		//get result
		while($data = $query->fetch(PDO::FETCH_ASSOC)){
			$annonces[] = new Annonce($data);
		}
		$query->closeCursor();
		return $annonces;
	}
	
	public function getAnnoncesBySearch($recherche, $ville){
		$annonces = array();
		$query = $this->_db->prepare('SELECT a.id, a.titre, a.description, a.image, a.datePublication,  
							a.priority, a.prix, a.ville FROM annonce a INNER JOIN utilisateur u
							ON (a.idUtilisateur=u.id)
							INNER JOIN categorie c ON (a.idCategorie=c.id)
							WHERE u.actif=1 AND (a.ville = :ville AND (a.description LIKE 	 
							:recherche OR a.titre LIKE :recherche OR c.nom LIKE :recherche 
													OR c.detail LIKE :recherche)) 
							OR (a.description LIKE :recherche OR a.titre LIKE :recherche 
								OR c.nom LIKE :recherche OR c.detail LIKE :recherche)
							ORDER BY a.datePublication DESC LIMIT 0, 30');
		$query->execute(array(':ville' =>$ville, ':recherche' =>'%'.$recherche.'%'));
		while($data = $query->fetch(PDO::FETCH_ASSOC)){
			$annonces[] = new Annonce($data);
		}
		$query->closeCursor();
		return $annonces;
	}
	
	public function getMostViewed(){
		$annonces = array();
		$query = $this->_db->query('SELECT * FROM annonce ORDER BY priority DESC LIMIT 0, 10');
		while($data = $query->fetch(PDO::FETCH_ASSOC)){
			$annonces[] = new Annonce($data);
		}
		$query->closeCursor();
		return $annonces;
		
	}
	
	public function getAnnonceByCategorie($cat){
		$annonces = array();
		$query = $this->_db->prepare('SELECT a.id, a.titre, a.description, a.image, a.datePublication,
							a.prix FROM annonce a INNER JOIN categorie c ON (a.idCategorie=c.id)
							INNER JOIN utilisateur u ON (a.idUtilisateur=u.id)
							WHERE (c.detail=:cat OR c.nom=:cat) AND (u.actif=1)');
		//$query->bindValue(':cat', $cat);
		$query->execute(array(':cat' => $cat));
		//get result
		while($data = $query->fetch(PDO::FETCH_ASSOC)){
			$annonces[] = new Annonce($data);
		}
		$query->closeCursor();
		return $annonces;
	}
	
	public function getSimilarAnnonce($idCat, $idAnnonce){
		$annonces = array();
		$query = $this->_db->prepare('SELECT a.id, a.titre, a.image FROM annonce a INNER JOIN utilisateur u ON a.idUtilisateur=u.id
		WHERE (a.idCategorie =:idCat AND a.id<>:idAnnonce) AND u.actif=1 ORDER BY idCategorie LIMIT 0, 8');
		$query->execute(array(':idCat' => $idCat, ':idAnnonce' => $idAnnonce));
		
		while($data = $query->fetch(PDO::FETCH_ASSOC)){
			$annonces[] = new Annonce($data);
		} 
		$query->closeCursor();
		return $annonces;
	}
	
	//this method is used to show user ads in his profil
	public function getAnnonceByUserId($idUtilisateur){
		$annonces = array();
		$query = $this->_db->prepare('SELECT * FROM annonce WHERE idUtilisateur =:idUtilisateur ORDER BY datePublication DESC ');
		$query->execute(array(':idUtilisateur' => $idUtilisateur));
		
		while($data = $query->fetch(PDO::FETCH_ASSOC)){
			$annonces[] = new Annonce($data);
		} 
		$query->closeCursor();
		return $annonces;
	}
	
	public function getCountByUserId($idUtilisateur){
		$annonces = array();
		$query = $this->_db->prepare('SELECT COUNT(*) AS nombre_annonce FROM annonce WHERE idUtilisateur =:idUtilisateur');
		$query->execute(array(':idUtilisateur' => $idUtilisateur));
		
		$data = $query->fetch(PDO::FETCH_ASSOC);
		$query->closeCursor();
		return $data['nombre_annonce'];
	}
	
	public function getAnnonceById($id){
		$query = $this->_db->prepare('SELECT * FROM annonce WHERE id=:id');
		$query->execute(array(':id' => $id));
		$data = $query->fetch(PDO::FETCH_ASSOC);
		$query->closeCursor();
		return new Annonce($data);
	}
	
	public function getCount(){
		$query = $this->_db->query('SELECT COUNT(*) AS nombre_annonce FROM annonce');
		$data = $query->fetch(PDO::FETCH_ASSOC);
		return $data['nombre_annonce'];
	}
	
	public function getLastId(){
		$query = $this->_db->query('SELECT id AS last_id FROM annonce ORDER BY id DESC LIMIT 0, 1');
		$data = $query->fetch(PDO::FETCH_ASSOC);
		$id = $data['last_id'];
		return $id;
	}
	
	//this function it help us to add 1 to the priority fiel in the 'annonce' table
	//and get the most viewed request
	public function addOneToPriority($idAnnonce){
		$query = $this->_db->prepare('UPDATE `annonce` SET priority=priority+1 WHERE id=:idAnnonce');
		$query->execute(array(':idAnnonce' => $idAnnonce));
		$query->closeCursor();
	}
	
	public function signalAbuse($idAnnonce){
		$query = $this->_db->prepare('UPDATE `annonce` SET abuse=abuse+1 WHERE id=:idAnnonce');
		$query->execute(array(':idAnnonce' => $idAnnonce));
		$query->closeCursor();
	}
	
	public function adSelled($idAnnonce, $idUtilisateur){
		$query = $this->_db->prepare("UPDATE annonce SET vendu='oui' WHERE id=:idAnnonce AND idUtilisateur=:idUtilisateur");
		$query->execute(array(':idAnnonce' => $idAnnonce, ':idUtilisateur' => $idUtilisateur));
		$query->closeCursor();
	}
	
	public function delete($idAnnonce, $idUtilisateur){
		$query = $this->_db->prepare('DELETE FROM annonce WHERE id=:idAnnonce AND idUtilisateur=:idUtilisateur');
		$query->execute(array(':idAnnonce' => $idAnnonce, ':idUtilisateur' => $idUtilisateur));
		$query->closeCursor();
	}
	
}