<?php if (isset($_SESSION['user']) && $_SESSION['user']->role === 'admin') : ?>


<h1> Modifier <?= $params['Service']->title  ?></h1>


<form action="/admin/services/edit/<?= $params['Service']->id ?>" method="POST">

    <div class="form-group">
        <label for="title">Titre du service</label>
        <input type="text" class="form-control" name="title" id="title" value="<?= $params['Service']->title ?>">
    </div>

    <div class="form-group">
        <label for="title">Contenu du service</label>
       <textarea name="content" id="content"  rows="8" class="form-control" ><?= $params['Service']->content ?></textarea>
    </div>

<button  type="submit" class="btn btn-primary">Enregister les modifications</button>


</form>

<?php endif; ?>