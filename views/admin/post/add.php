<?php if (isset($_SESSION['user']) && $_SESSION['user']->role === 'admin') : ?>

<h1>Ajouter un véhicules</h1>

<form action="/admin/posts/create" method="post" enctype="multipart/form-data">
  <label for="Title">Titre :</label>
  <input type="text" name="Title" id="Title" class="form-control" required>
  <br>
  <label for="content">Contenu :</label>
  <textarea name="content" id="content" class="form-control" required></textarea>
  <br>
  <label for="prix">Prix :</label>
  <input type="number" name="prix" id="prix" class="form-control" required>
  <br>
  <label for="circulation">Circulation :</label>
  <input type="text" name="circulation" id="circulation" class="form-control" required>
  <br>
  <label for="kilometrage">Kilométrage :</label>
  <input type="number" name="kilometrage" id="kilometrage" class="form-control" required>
  <br>
  <label for="imagePrincipale">Image Principale :</label> 
  <input type="file" name="imagePrincipale" id="imagePrincipale" class="form-control" required>
  <br>
  <label for="galerieImages">Galerie d'Images :</label>
  <input type="file" name="galerieImages[]" multiple id="galerieImages" class="form-control">
  <br>
  <label for="caracteristiques">Caractéristiques :</label>
  <input type="text" name="caracteristiques[]" id="caracteristiques" class="form-control" placeholder="Séparez les caractéristiques par des virgules">
  <br>
  <label for="equipements">Équipements :</label>
  <input type="text" name="equipements[]" id="equipements" class="form-control" placeholder="Séparez les équipements par des virgules">
  <br>
  <input type="submit" class="btn btn-primary" value="Envoyer">
</form>

<?php endif; ?>
<br>
<br>
<br>
<br>
<br>