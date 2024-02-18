<?php
namespace App\Models;

use PDO;
use PDOException;

class AnnonceModel {
    private $pdo;

    public function __construct() {
        $this->connect();
    }

    private function connect() {
        try {
            $this->pdo = new PDO("mysql:host=localhost;dbname=garage", "root", "");
            // Pour une meilleure détection des erreurs
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            // Gérer l'erreur de connexion ici
            die("Erreur de connexion à la base de données: " . $e->getMessage());
        }
    }

    public function searchAnnonces($minPrix = 0, $maxPrix = PHP_INT_MAX, $minKilometrage = 0, $maxKilometrage = PHP_INT_MAX, $minCirculation = 1900, $maxCirculation = 2023) {

        $query = "SELECT * FROM annonces WHERE 1=1";
        $params = [];

        // Prix
        if (!is_null($minPrix) && !is_null($maxPrix)) {
            $query .= " AND prix BETWEEN :minPrix AND :maxPrix";
            $params[':minPrix'] = $minPrix;
            $params[':maxPrix'] = $maxPrix;
        }

        // Kilométrage
        if (!is_null($minKilometrage) && !is_null($maxKilometrage)) {
            $query .= " AND kilometrage BETWEEN :minKilometrage AND :maxKilometrage";
            $params[':minKilometrage'] = $minKilometrage;
            $params[':maxKilometrage'] = $maxKilometrage;
        }

        // Année de circulation
        if (!is_null($minCirculation) && !is_null($maxCirculation)) {
            $query .= " AND circulation BETWEEN :minCirculation AND :maxCirculation";
            $params[':minCirculation'] = $minCirculation;
            $params[':maxCirculation'] = $maxCirculation;
        }

        try {
            $statement = $this->pdo->prepare($query);
            $statement->execute($params);
            return $statement->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            // Gérer l'erreur de requête ici
            die("Erreur lors de l'exécution de la requête: " . $e->getMessage());
        }
    }
}
