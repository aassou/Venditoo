<?php
/*
	Author                      : AASSOU Abdelilah.
	Creation Date               : 15/10/2013
*/
class UtilisateurManager{
	//attributes
	private $_db;
	
	//constructor
	public function __construct($db){
		$this->_db = $db;
	}
	
	//CRUD operations
	public function add(Utilisateur $utilisateur){
		$query = $this->_db->prepare('INSERT INTO utilisateur (nom, prenom, telefon, ville, email, password, image, date_inscription, date_derniere_visite, cle, actif)
		VALUES (:nom,:prenom, :telefon, :ville, :email, :password, :image, :date_inscription, :date_derniere_visite, :cle, :actif)') or die(print_r($bd->errorInfo()));
		$query->bindValue(':nom', $utilisateur->nom());
		$query->bindValue(':prenom', $utilisateur->prenom());
		$query->bindValue(':telefon', $utilisateur->telefon());
		$query->bindValue(':ville', $utilisateur->ville());
		$query->bindValue(':email', $utilisateur->email());
		$query->bindValue(':password', sha1($utilisateur->password()));
		$query->bindValue(':image', $utilisateur->image());
		$query->bindValue(':date_inscription', $utilisateur->dateInscription());
		$query->bindValue(':date_derniere_visite', $utilisateur->dateDerniereVisite());
		$query->bindValue(':cle', $utilisateur->cle());
		$query->bindValue(':actif', $utilisateur->actif());
		$query->execute();
		$query->closeCursor();
	}
	
	public function update(Utilisateur $utilisateur){
		$query = $this->_db->prepare('UPDATE utilisateur SET nom=:nom, prenom=:prenom, 
		telefon=:telefon, ville=:ville, email=:email, image=:image 
		WHERE id=:idUtilisateur')or die(print_r($this->_db->errorInfo()));
		$query->bindValue(':idUtilisateur', $utilisateur->id());
		$query->bindValue(':nom', $utilisateur->nom());
		$query->bindValue(':prenom', $utilisateur->prenom());
		$query->bindValue(':image', $utilisateur->image());
		$query->bindValue(':telefon', $utilisateur->telefon());
		$query->bindValue(':email', $utilisateur->email());
		$query->bindValue(':ville', $utilisateur->ville());
		$query->execute();
		$query->closeCursor();
	}
	
	public function updatePassword($id, $password){
		$query = $this->_db->prepare('UPDATE utilisateur SET password=:password 
		WHERE id=:id')or die(print_r($this->_db->errorInfo()));
		$query->bindValue(':id', $id);
		$query->bindValue(':password', sha1($password));
		$query->execute();
		$query->closeCursor();
	}
	
	public function delete(Utilisateur $utilisateur){
		$this->_db->exec('DELETE FROM utilisateur WHERE id='.$utilisateur->id());
	}
	
	public function getUtilisateur($email, $password){
		$query1 = $this->_db->prepare('UPDATE utilisateur SET date_derniere_visite=NOW() 
		WHERE email=:email AND password=:password');
		$query1->bindValue(':email', $email);
		$query1->bindValue(':password', sha1($password));
		//$query->bindValue(':derniere_visite', date("Y-m-d H:i:s"));
		$query1->closeCursor();
		$query = $this->_db->prepare('SELECT * FROM utilisateur WHERE email=:email AND password=:password');
		$query->bindValue(':email', $email);
		$query->bindValue(':password', sha1($password));
		$query->execute();
		//get result
		$data = $query->fetch(PDO::FETCH_ASSOC);
		
		return new Utilisateur($data);
	}

	
	public function getUserByEmail($email){
		$query = $this->_db->prepare('SELECT * FROM utilisateur WHERE email=:email');
		$query->bindValue(':email', $email);
		$query->execute();
		//get result
		$data = $query->fetch(PDO::FETCH_ASSOC);
		
		return new Utilisateur($data);
	}
	
	public function getPassword($email){
		$query = $this->_db->prepare('SELECT password FROM utilisateur WHERE email=:email');
		$query->bindValue(':email', $email);
		$query->execute();
		$data = $query->fetch(PDO::FETCH_ASSOC);
		return $data;
	}
	
	public function getUtilisateur2($id){
		$query = $this->_db->prepare('UPDATE utilisateur SET date_derniere_visite=:derniere_visite WHERE id=:id');
		$query->bindValue(':id', $id);
		$query->bindValue(':derniere_visite', date("Y-m-d H:i:s"));
		$query->closeCursor();
		$query = $this->_db->prepare('SELECT * FROM utilisateur WHERE id=:id');
		$query->bindValue(':id', $id);
		$query->execute();
		//get result
		$data = $query->fetch(PDO::FETCH_ASSOC);
		
		return new Utilisateur($data);
	}
	
	public function exists($email, $password){
		//return (bool) $this->_db->query('SELECT COUNT(*) FROM utilisateur WHERE email = '.$email)->fetchColumn();
		$query = $this->_db->prepare('SELECT COUNT(*) FROM utilisateur WHERE email=:email AND password=:password');
		$query->execute(array(':email' => $email, ':password' => sha1($password)));
		//get result
		return (bool) $query->fetchColumn();
	}
	
	public function isActive($email){
		$query = $this->_db->prepare('SELECT COUNT(*) FROM utilisateur WHERE email=:email AND actif=1');
		$query->execute(array(':email' => $email));
		//get result
		return (bool) $query->fetchColumn();
	}

	public function emailExist($email){
		//return (bool) $this->_db->query('SELECT COUNT(*) FROM utilisateur WHERE email = '.$email)->fetchColumn();
		$query = $this->_db->prepare('SELECT COUNT(*) FROM utilisateur WHERE email=:email');
		$query->execute(array(':email' => $email));
		//get result
		return (bool) $query->fetchColumn();
	}
}