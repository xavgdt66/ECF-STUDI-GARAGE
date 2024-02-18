<!doctype html>
<html lang="fr">

<head>
  <meta charset="utf-8">
  <title>Mon super site</title>
  <link rel="stylesheet" href="/css/app.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


  <style>
    html,
    body {
      height: 100%;
      margin: 0;
      padding: 0;
    }

    .content {
      min-height: 100%;
      margin-bottom: -50px;
      /* Hauteur du footer */
    }

    .navbar {
      background-color: blue !important;
      /* Couleur de fond bleu */
    }

    .navbar .nav-link {
      color: white !important;
      /* Couleur du texte blanc */
    }

    .footer {
      background-color: blue !important;
      /* Couleur de fond bleu */
      color: white !important;
      /* Couleur du texte blanc */
      padding: 20px;
      margin-top: auto;
      height: 50px;
      /* Hauteur du footer */
    }
    
  </style>
</head>

<body>
  <div class="content">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="/">Garage</a>
</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link" href="/">Accueil</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/posts">Nos véhicules</a>
          </li>
  

          <?php
$utilisateurConnecte = !empty($_SESSION['user']);
?>

<!-- Votre élément HTML -->
<?php if (!$utilisateurConnecte) { ?>
  <li class="nav-item">
    <a class="nav-link" href="/login">Connexion</a>
  </li>
<?php } ?>

<?php if ($utilisateurConnecte) { ?>
  <li class="nav-item">
    <a class="nav-link" href="/logout">Déconnexion</a>
  </li>
<?php } ?>



          <li class="nav-item">
            <a class="nav-link" href="/filter">Filtre</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/contact">Contactez nous</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/adminemploye">Admin employe</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/admin">Admin</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/createavis">Créer avis</a>
          </li>
        </ul>
      </div>
    </nav>

    <div class="container">
      <?= $content ?>
    </div>
  </div>
  <footer class="bg-primary text-white text-center text-lg-start">
    <!-- Grid container -->
    <div class="container p-4">
        <!--Grid row-->
        <div class="row">
            <!--Grid column-->
            <div class="col-lg-6 col-md-12 mb-4 mb-md-0">
                <h5 class="text-uppercase">Footer Content</h5>

                <p>
                    Lorem ipsum dolor sit amet consectetur, adipisicing elit. Iste atque ea quis
                    molestias. Fugiat pariatur maxime quis culpa corporis vitae repudiandae aliquam
                    voluptatem veniam, est atque cumque eum delectus sint!
                </p>
            </div>
            <!--Grid column-->

            <!--Grid column-->
            <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                <h5 class="text-uppercase">Links</h5>

                <ul class="list-unstyled mb-0">
                    <li>
                        <a href="/posts" class="text-white">Les véhicules</a>
                    </li>
                    <li>
                        <a href="/contact" class="text-white">Contactez-nous</a>
                    </li>
                    <li>
                        <a href="/filter" class="text-white">Filtre</a>
                    </li>
                    <li>
                        <a href="/" class="text-white">Accueil</a>
                    </li>
                </ul>
            </div>
            <!--Grid column-->

            <!--Grid column-->
            <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                <h5 class="text-uppercase mb-0">Horaires</h5>

                <ul class="list-unstyled">
                    <?php
                    // Paramètres de connexion à la base de données
                    $serveur = "localhost";
                    $utilisateur = "root";
                    $motDePasse = "";
                    $baseDeDonnees = "garage";

                    // Connexion à la base de données
                    $connexion = new mysqli($serveur, $utilisateur, $motDePasse, $baseDeDonnees);

                    // Vérification de la connexion
                    if ($connexion->connect_error) {
                        die("Échec de la connexion à la base de données : " . $connexion->connect_error);
                    }

                    // Requête pour sélectionner les données de la table horaire
                    $sql = "SELECT jour_semaine, SUBSTRING(heure_debut, 1, 5) AS heure_debut, SUBSTRING(heure_fin, 1, 5) AS heure_fin FROM horaire";
                    $resultat = $connexion->query($sql);

                    // Vérification des résultats
                    if ($resultat->num_rows > 0) {
                        // Affichage des données
                        while ($ligne = $resultat->fetch_assoc()) {
                            echo "<li>";
                            echo $ligne["jour_semaine"] . " : " . $ligne["heure_debut"] . " - " . $ligne["heure_fin"];
                            echo "</li>";
                        }
                    } else {
                        echo "<li>Aucun horaire trouvé.</li>";
                    }

                    // Fermeture de la connexion
                    $connexion->close();
                    ?>
                </ul>
            </div>
            <!--Grid column-->
        </div>
    </div>

    <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
        &copy; 2023. Tous droits réservés.
        <p class="text-white">Garage</p>
    </div>
</footer>




</body>

</html> 