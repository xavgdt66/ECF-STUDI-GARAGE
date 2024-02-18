<?php

namespace App\Models;


class User extends Model
{    

                 
    public function auth(string $email, string $password): object|null 
    {
        $reqUser = $this->db->getPDO()->prepare("SELECT * FROM users WHERE email = :email ");
       
        $reqUser->execute([
            ':email' => $email
            //':password' => $password
        ]);

        $user = $reqUser->fetch();
var_dump($user); 

       


        if ($user === false || !password_verify($password, $user->password)) {
            return null;
        }

        unset($user->password);
        return $user;
    }


}

