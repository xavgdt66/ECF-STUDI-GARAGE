<?php if (isset($_SESSION['user']) && $_SESSION['user']->role === 'employe'): ?>


<h1>Ajouter un véhicule</h1>


<form action="/admin/posts/create" method="post"  enctype="multipart/form-data">
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
  <input type="number" name="kilometrage" id="kilometrage" class="form-control"  required>
  <br>
  <label for="image">Image :</label>
  <input type="file" name="image" id="image" class="form-control" required>
  <br>
  <input type="submit"  class="btn btn-primary" value="Envoyer">


</form> 

<?php endif; ?>

<h1>Ajouter un véhicule</h1>

