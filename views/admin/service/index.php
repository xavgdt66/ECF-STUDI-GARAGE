<?php if (isset($_SESSION['user']) && $_SESSION['user']->role === 'admin') : ?>


<h1>Adminitration des services</h1> 

<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Titre</th>
      <th scope="col">Publié le</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
   <?php foreach($params['services'] as $service): ?> 
    <tr>
      <th scope="row"><?= $service->id ?></th>
      <td><?= $service->title ?></td>
      <td><?= $service->content ?></td>
          <td>
              
              <a href="/admin/services/edit/<?= $service->id ?>" class="btn btn-warning">Modifier</a>
              <form action="/admin/services/delete/<?= $service->id ?>" method="POST" class="d-inline"  > 
                     <button type="submit"  class="btn btn-danger">Supprimer</button>
            </form>
            
    
          </td>
    </tr>

    <?php endforeach ?>

  </tbody>
</table>

<a href="/admin" class="btn btn-primary">Revenir au Dashboard</a>

<?php endif; ?>