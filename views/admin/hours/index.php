<?php if (isset($_SESSION['user']) && $_SESSION['user']->role === 'admin') : ?>


<h1>Adminitration des horaires</h1> 



<table class="table">
  <thead>
    <tr>
      <th scope="col">Jour de la semaine</th>
      <th scope="col">Heure début</th>
      <th scope="col">Heure fin</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
   <?php foreach($params['hours'] as $hours): ?> 
    <tr>
      <th scope="row"><?= $hours->jour_semaine ?></th>
      <td><?= $hours->heure_debut ?></td>
      <td><?= $hours->heure_fin ?></td>
          <td>
              
              <a href="/admin/hours/edit/<?= $hours->id ?>" class="btn btn-warning">Modifier</a>
             
    
          </td>
    </tr>

    <?php endforeach ?>

  </tbody>
</table>

<a href="/admin" class="btn btn-primary">Revenir au Dashboard</a>

<?php endif; ?>