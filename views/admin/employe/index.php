<?php if (isset($_SESSION['user']) && $_SESSION['user']->role === 'admin') : ?>



<h1>Adminitration des employes</h1> 

<a href="/admin/employe/create" class="btn btn-success my-3">Créer un nouvelle employe</a>

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
   <?php foreach($params['employes'] as $employe): ?> 
    <tr>
      <th scope="row"><?= $employe->id ?></th>
      <td><?= $employe->email ?></td>
      <td><?= $employe->password ?></td>
          <td>
              
              <a href="/admin/employe/edit/" class="btn btn-warning">Modifier</a>
              <form action="/admin/employe/delete/" method="POST" class="d-inline"  > 
                     <button type="submit"  class="btn btn-danger">Supprimer</button>
            </form>
            
    
          </td>
    </tr>

    <?php endforeach ?>

  </tbody>
</table>

<a href="/admin" class="btn btn-primary">Revenir au Dashboard</a>

<?php endif; ?>