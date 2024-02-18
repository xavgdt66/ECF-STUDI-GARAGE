<?php if (isset($_SESSION['user']) && $_SESSION['user']->role === 'admin') : ?>

<h1> Modifier <?= $params['post']->Title  ?></h1>


<form action="/admin/posts/edit/<?= $params['post']->id ?>" method="POST">

   
       <div class="form-group">
      

    <label for="Title">Titre :</label>
  <input type="text" name="Title" id="Title" class="form-control" required value="<?= $params['post']->Title ?>" >
  <br>
  <label for="content">Contenu :</label>
  <textarea name="content" id="content"  rows="8" class="form-control" ><?= $params['post']->content ?> </textarea>
  <br>
  <label for="prix">Prix :</label>
  <input type="number" name="prix" id="prix" class="form-control" required value="<?= $params['post']->prix ?>"  >
  <br>
  <label for="circulation">Circulation :</label>
  <input type="text" name="circulation" id="circulation" class="form-control" value="<?= $params['post']->circulation ?>" >
  <br>
  <label for="kilometrage">Kilométrage :</label>
  <input type="number" name="kilometrage" id="kilometrage" class="form-control" value="<?= $params['post']->kilometrage ?>" >
  <br>
  
  <br>
<button  type="submit" class="btn btn-primary">Enregister les modifications</button>


</form> 

<?php endif; ?>