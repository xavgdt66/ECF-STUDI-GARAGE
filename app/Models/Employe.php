<?php

namespace App\Models;

class Employe extends Model{

      public function allemploye(): array
    {

        return $this->query("SELECT * FROM users");
    }
 


    public function createELS()
    {
        // Prépare la requête
        $statement = $this->db->getPDO()->prepare("INSERT INTO users (email, password, role) VALUES (:email, :password, :role)");
    
        // Hash du mot de passe
        $hashedPassword = password_hash($_POST['password'], PASSWORD_BCRYPT);
    
        $role = 'employe';
        // Execute
        $statement->execute([
            'email' => $_POST['email'],
            'password' => $hashedPassword,
            'role' => $role,
        ]);
    }
    










}