<?php 
namespace App\Models;

use PDO;

class Post extends Model
{
   protected $table = 'annonces';
   public $id, $Title, $content, $prix, $circulation, $kilometrage, $imagePrincipale, $galerieImages, $caracteristiques, $equipements, $created_at;

   public function createAnnonce()
   {
      // Vérifier si l'image principale est présente et téléchargée avec succès
      if (isset($_FILES['imagePrincipale']) && $_FILES['imagePrincipale']['error'] === UPLOAD_ERR_OK) {
         // Chemin des images
         $tmpFilePath = $_FILES['imagePrincipale']['tmp_name'];
         $fileimage = realpath(__DIR__ . '/../../public');
         $ext = pathinfo($_FILES['imagePrincipale']['name'], PATHINFO_EXTENSION);
         $PublicImage = "/images/" . gen_uuid() . ".$ext";
         $newFilePath = $fileimage . $PublicImage;
         move_uploaded_file($tmpFilePath, $newFilePath);
      }

      // Construction de la galerie d'images
      $galerieImages = '';
      if (isset($_FILES['galerieImages'])) {
         $galerieImagesArray = $_FILES['galerieImages'];

         // Parcourir les fichiers de la galerie
         foreach ($galerieImagesArray['tmp_name'] as $index => $tmpFile) {
            if ($galerieImagesArray['error'][$index] === UPLOAD_ERR_OK) {
               $galerieFilePath = $fileimage . "/images/" . gen_uuid() . "." . pathinfo($galerieImagesArray['name'][$index], PATHINFO_EXTENSION);
               move_uploaded_file($tmpFile, $galerieFilePath);

               // Ajouter l'URL de l'image à la galerie d'images
               $galerieImages .= ($galerieImages !== '') ? ',' : '';
               $galerieImages .= $galerieFilePath;
            }
         }
      }

      // Construction du tableau de caractéristiques
      $caracteristiques = '';
      if (isset($_POST['caracteristiques'])) {
         $caracteristiquesArray = $_POST['caracteristiques'];
         $caracteristiques = implode(',', $caracteristiquesArray);
      }

      // Construction de la liste des équipements
      $equipements = '';
      if (isset($_POST['equipements'])) {
         $equipementsArray = $_POST['equipements'];
         $equipements = implode(',', $equipementsArray);
      }

      // Requête
      $statement = $this->db->getPDO()->prepare("INSERT INTO annonces (Title, content, prix, circulation, kilometrage, imagePrincipale, galerieImages, caracteristiques, equipements, created_at) 
           VALUES (:Title, :content, :prix, :circulation, :kilometrage, :imagePrincipale, :galerieImages, :caracteristiques, :equipements, NOW())");

      // Exécution de la requête
      $statement->execute([
         'Title' => $_POST['Title'],
         'content' => $_POST['content'],
         'prix' => $_POST['prix'],
         'circulation' => $_POST['circulation'],
         'kilometrage' => $_POST['kilometrage'],
         'imagePrincipale' => $PublicImage,
         'galerieImages' => $galerieImages,
         'caracteristiques' => $caracteristiques,
         'equipements' => $equipements,
      ]);
   }
}
