<?php

namespace App\Controllers\Admin;

use App\Controllers\Controller;
use App\Models\Service;

class ServiceController extends Controller
{
  public function index()
  {
    $services = (new Service($this->getDB()))->all();

    return $this->view('admin.service.index', compact('services'));
  }

  public function edit(int $id)
  {
    $Service = (new Service($this->getDB()))->findById($id);

    return $this->view('admin.service.edit', compact('Service'));
  }

  public function update(int $id)
  {
    $Service = new Service($this->getDB());

    $result = $Service->update($id, $_POST);

    if ($result) {
      return header('Location: /admin/services');
    }
  }

  public function destroy(int $id)
  {
    $Service = new Service($this->getDB());
    $result = $Service->destroy($id);

    if ($result) {
      return header('Location: /admin/services');
    }
  }
}
