<?php

namespace App\Controllers\AdminEmploye;

use App\Controllers\Controller;
use App\Models\Post;

class EmployePostController extends Controller
{

  
  ///////////////////////////////////////////////////////
  public function create()
  {

    return $this->view('Adminemploye.post.add');
  }

  public function createPost()
  {

    $Creapost = new Post($this->getDB());
    $Creapost->createAnnonce();
    
    if ($Creapost) { 
      return header('Location: /posts'); 
    }
  } 
  /////////////////////////////////////////////////////////////
 
  public function adminemploye()
  {

    return $this->view('Adminemploye.adminemploye');
  }


  
}
