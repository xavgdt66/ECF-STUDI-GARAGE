<?php

namespace App\Models;
use PDO;
class Avis extends Model{

      public function allavis(): array
    {

        return $this->query("SELECT * FROM avis");
    }
    public function createAvis()
    {
 
 // Prépare la requete 
      $statement = $this->db->getPDO()->prepare("INSERT INTO avis (nom, commentaire, note) VALUES (:nom, :commentaire, :note)");
//Execute  
       $statement->execute([
         'nom' => $_POST['nom'],
         'commentaire' => $_POST['commentaire'],
         'note' => $_POST['note']
       ]);
    } 

    //////////Valider avis////////////////
    //Avis en attente 
    public function getAvisEnAttente()
{
    $query = $this->db->getPDO()->prepare("SELECT * FROM avis WHERE valide = 0");
    $query->execute();
    return $query->fetchAll(PDO::FETCH_OBJ);
}


  public function validerAvis($avis_id) {
      $query = $this->db->getPDO()->prepare("UPDATE avis SET valide = 1 WHERE id = :id");
      $query->bindParam(':id', $avis_id);
      $query->execute(); 
  }
  
  public function supprimerAvis($avis_id) {
      $query = $this->db->getPDO()->prepare("DELETE FROM avis WHERE id = :id");
      $query->bindParam(':id', $avis_id);
      $query->execute();
  }
  
  public function getAvisValides() {
      $query = $this->db->getPDO()->prepare("SELECT * FROM avis WHERE valide = 1");
      $query->execute();
      return $query->fetchAll(PDO::FETCH_OBJ);
  }
  
  public function getAvisValidesdesc() {
    $query = $this->db->getPDO()->prepare("SELECT * FROM avis WHERE valide = 1 ORDER BY id DESC LIMIT 3");
    $query->execute();
    return $query->fetchAll(PDO::FETCH_OBJ);
}

    
}