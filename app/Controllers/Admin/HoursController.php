<?php

namespace App\Controllers\Admin;

use App\Controllers\Controller;
use App\Models\Hours;

class HoursController extends Controller
{
    public function index()
    {
      $hours = (new Hours($this->getDB()))->allhours(); 
  
      return $this->view('admin.hours.index', compact('hours'));
    }
    public function edithours(int $id)
    {
      $hours = (new Hours($this->getDB()))->findById($id);
  
      return $this->view('admin.hours.edit', compact('hours'));
    }

    public function updatehours(int $id)
    {
      $hours = new Hours($this->getDB());
  
      $result = $hours->update($id, $_POST);
  
      if ($result) {
        return header('Location: /admin/hours');
      }
    }
  

   




}
