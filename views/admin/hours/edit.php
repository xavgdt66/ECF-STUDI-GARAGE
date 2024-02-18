<?php if (isset($_SESSION['user']) && $_SESSION['user']->role === 'admin') : ?>

<h1> Modifier <?= $params['hours']->jour_semaine  ?></h1>


<form action="/admin/hours/edit/<?= $params['hours']->id ?>" method="POST">

    <div class="form-group">
        <label for="heure_debut">heure_debut</label>
        <input type="text" class="form-control" name="heure_debut" id="heure_debut" value="<?= $params['hours']->heure_debut ?>">
    </div>

    <div class="form-group">
        <label for="heure_fin">heure_fin</label>
      
       <input type="text" class="form-control" name="heure_fin" id="heure_fin" value="<?= $params['hours']->heure_fin ?>">

    </div>

<button  type="submit" class="btn btn-primary">Enregister les modifications</button>


</form>

<?php endif; ?>