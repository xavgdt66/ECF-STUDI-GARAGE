<?php

namespace App\Controllers;

use App\Models\AnnonceModel;

class AnnonceController extends Controller
{
    public function search()
    {
        $minPrix = isset($_POST['min_prix']) ? $_POST['min_prix'] : null;
        $maxPrix = isset($_POST['max_prix']) ? $_POST['max_prix'] : null;
        $minKilometrage = isset($_POST['min_kilometrage']) ? $_POST['min_kilometrage'] : null;
        $maxKilometrage = isset($_POST['max_kilometrage']) ? $_POST['max_kilometrage'] : null;
        $minCirculation = isset($_POST['min_circulation']) ? $_POST['min_circulation'] : null;
        $maxCirculation = isset($_POST['max_circulation']) ? $_POST['max_circulation'] : null;

        $model = new AnnonceModel();
        $results = $model->searchAnnonces($minPrix, $maxPrix, $minKilometrage, $maxKilometrage, $minCirculation, $maxCirculation);

        echo json_encode($results);

        // return json_encode($results);
    }

    public function filter()
    {
        return $this->view('blog.search');
    }
}
