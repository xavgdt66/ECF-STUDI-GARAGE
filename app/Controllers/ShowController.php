<?php

namespace App\Controllers;

use App\Models\Post;
use Mailjet\Client;
use Mailjet\Resources;

class ShowController extends Controller
{
  public function show(int $id)
  {
    $post = new Post($this->getDB());
    $post = $post->findbyID($id);

    return $this->view('blog.show', compact('post'));
  }

  public function sendContactForm()
  {
    $name = htmlspecialchars($_POST['name']);
    $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
    $message = htmlspecialchars($_POST['message']);
    $postTitle = htmlspecialchars($_POST['post_title']);

    // Charger les clés d'API depuis un fichier de configuration sécurisé
    $apiKey = 'Votre key public mailjet';
    $apiSecret = 'Votre key private mailjet';

    // API Mailjet
    $mj = new Client($apiKey, $apiSecret, true, ['version' => 'v3.1']);
    $body = [
      'Messages' => [
        [
          'From' => [
            'Email' => 'votremail@gmail.com',
            'Name' => 'Your Name'
          ],
          'To' => [
            [
              'Email' => 'votremail@gmail.com',
              'Name' => 'Recipient Name'
            ]
          ],
          'Subject' => 'Nouveau message de contact pour l\'annonce ' . $postTitle,
          'TextPart' => "$message, $email, $name"
        ]
      ]
    ];

    $response = $mj->post(Resources::$Email, ['body' => $body]);

    // Traitez la réponse de l'API Mailjet comme vous le souhaitez

    // Redirigez l'utilisateur vers une page de confirmation ou revenez à l'annonce
    header('Location: /posts');
  }
}
