<?php

namespace App\Controllers\AdminEmploye;

use App\Controllers\Controller;
use App\Models\Avis;   

class AvisController extends Controller
{
  
 
  // Avis create visiteur
  public function create()
  {

    return $this->view('blog.avisadd');
  }
  // Avis create visiteur

  public function createAvis()
  {

    $CreaAvis = new Avis($this->getDB()); 
    $CreaAvis->createAvis();

    if ($CreaAvis) {
      return header('Location: /');
    }
  }

  /////////////// Avis validation /////////////////
  
  // donne la vue 
  public function avismoderator()
  {
      $avisModel = new Avis($this->getDB()); 
      $avisEnAttente = $avisModel->getAvisEnAttente(); 

      $this->handleActions();
  
      // Passez les avis en attente de modération à la vue
       $this->view('Adminemploye.adminAvis', ['avis' => $avisEnAttente]);
  }
  
  public function handleActions()
  {
      if ($_SERVER['REQUEST_METHOD'] === 'POST') {
          if (isset($_POST['action']) && isset($_POST['avis_id'])) {
              $action = $_POST['action'];
              $avis_id = $_POST['avis_id'];
  
              if ($action === 'valider') {
                  (new Avis($this->getDB()))->validerAvis($avis_id);
                  
                  header('Location: /employe/gereravis');

              } elseif ($action === 'supprimer') {
                  (new Avis($this->getDB()))->supprimerAvis($avis_id);
                  header('Location: /employe/gereravis');

                  
              }
          }
      }
  }
  



}
