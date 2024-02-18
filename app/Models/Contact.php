<?php

namespace App\Models;

use PDO;
use App\Models\PDOException;

class Contact extends Model
{
    public function saveContact($lastname, $firstname, $phonenumber, $email, $message)
    {
        // Code pour sauvegarder les données du contact en base de données
        $dsn = 'mysql:host=localhost;dbname=garage';
        $username = 'max dev';
        $password = 'myphpadmin';

        try {
            $db = new PDO($dsn, $username, $password);

            $query = 'INSERT INTO contacts (first_name, last_name, email, phone_number, message) VALUES (:first_name, :last_name, :email, :phone_number, :message)';
            $statement = $db->prepare($query);
            $statement->execute([
                'first_name' => $firstname,
                'last_name' => $lastname,
                'phone_number' => $phonenumber,
                'email' => $email,
                'message' => $message
            ]);

            // Vous pouvez également effectuer d'autres opérations, telles que l'envoi de données à d'autres services, etc.

        } catch (PDOException $e) {  
            // Gérer les erreurs de la base de données
            echo 'Une erreur est survenue lors de la sauvegarde du contact : ' . $e->getMessage();
        }
    }

    // Méthode pour valider un email
    public function validateEmail($email)
    {
        // Code pour valider l'email
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }

















    
}
