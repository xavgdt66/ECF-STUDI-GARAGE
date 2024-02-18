<?php
namespace App\Controllers;

use App\Models\User;

class LoginController extends Controller
{

    public function login()
    {
        return $this->view('auth.login');
    }

    public function loginPost()
    {
        $userModel = new User($this->getDB());

        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';

        if (empty($email) || empty($password)) {
            return $this->view('auth.login', [
                'message' => 'Champs requis.'
            ]);
        }

        $user = $userModel->auth($email, $password);

        if (!$user) {
            return $this->view('auth.login', [
                'message' => 'Adresse email ou mot de passe incorrect.'
            ]);
        }

        $_SESSION['user'] = $user;

        if ($user->role === 'admin') {
            header('Location: /admin');
        } else if ($user->role === 'employe') {
            header('Location: /adminemploye');
        }
    }

    public function logout()
    {
        // Détruire la session avant de rediriger
        session_destroy();

        // Rediriger vers la page de connexion
        header("Location: /login");
    }
}
