<?php

namespace App\Controllers;

use App\Models\Avis;
use App\Models\Post;
use App\Models\Service;
class HomeController extends Controller
{

 
  public function welcome()
{
    $avisModel = new Avis($this->getDB());
    $avisValides = $avisModel->getAvisValidesdesc();

    $postModel = new Post($this->getDB());
    $posts = $postModel->all();

    $serviceModel = new Service($this->getDB());
    $service = $serviceModel->all();

    // Passez les avis et les posts à la vue
    return $this->view('blog.welcome', ['avis' => $avisValides, 'posts' => $posts, 'service' => $service]);
}


}
