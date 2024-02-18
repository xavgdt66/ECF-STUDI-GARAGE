<?php

namespace App\Controllers;

use \Mailjet\Resources;




class ContactController extends Controller
{
    private $mj;

    public function __construct()
    {
        define('API_PUBLIC_KEY', 'Votre key public mailjet');
        define('API_PRIVATE_KEY', 'Votre key private mailjet');
        $this->mj = new \Mailjet\Client(API_PUBLIC_KEY, API_PRIVATE_KEY, true, ['version' => 'v3.1']);
    }

    public function sendEmail()
    {
        if (
            !empty($_POST['last_name']) &&
            !empty($_POST['first_name']) &&
            !empty($_POST['email']) &&
            !empty($_POST['phone_number']) &&
            !empty($_POST['message'])
        ) {
            $lastname = htmlspecialchars($_POST['last_name']);
            $firstname = htmlspecialchars($_POST['first_name']);
            $phonenumber = htmlspecialchars($_POST['phone_number']);
            $email = htmlspecialchars($_POST['email']);
            $message = htmlspecialchars($_POST['message']);

            if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $body = [
                    'Messages' => [
                        [
                            'From' => [
                                'Email' => 'votremail@gmail.com',
                                'Name' => 'xavier'
                            ],
                            'To' => [
                                [
                                    'Email' => 'votremail@gmail.com',
                                    'Name' => 'xavier'
                                ]
                            ],

                            'Subject' => 'Demande de renseignement',
                            'HTMLPart' => '<div style="text-align: center;">
                    <h1 style="text-align: left;">Demande de renseignement</h1>
                    <p style="text-align: left;">
                        <strong>Nom:</strong> ' . $lastname . ' ' . $firstname . '<br>
                        <strong>Email:</strong> ' . $email . '<br>
                        <strong>Téléphone:</strong> ' . $phonenumber . '<br>
                        <strong>Message:</strong> ' . $message . '
                    </p>
                </div>'

                        ]
                    ]
                ];

                $response = $this->mj->post(Resources::$Email, ['body' => $body]);
                $response->success();
                $_SESSION['flash_message'] = "Email envoyer avec succés";

                header('Location: /contact');
            } else {
                echo "Email non valide";
            }
        } else {
            header('Location: /contact');
            die();
        }
    }

    public function showForm()
    {
        return $this->view('blog.contact');
    }
}
