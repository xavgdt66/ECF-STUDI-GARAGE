<?php

namespace App\Controllers\Admin;

use App\Controllers\Controller;
use App\Models\Employe;

class EmployeController extends Controller
{
  public function index()
  {
    $employes = (new Employe($this->getDB()))->allemploye();

    return $this->view('admin.employe.index', compact('employes'));
  }

  

 
  
  public function create()
  {

    return $this->view('admin.employe.add');
  }

  public function createEmploye()
  {

    $CreaEmploye = new Employe($this->getDB());
    $CreaEmploye->createELS();

    if ($CreaEmploye) {
      return header('Location: /admin/employes');
    }
  }


  
}
