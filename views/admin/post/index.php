<?php if (isset($_SESSION['user']) && $_SESSION['user']->role === 'admin') : ?>

  <h1>Adminitration des annonces</h1>
  <a href="/admin/posts/create" class="btn btn-success my-3">Créer un nouvelle article</a>
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
      <?php foreach ($params['posts'] as $post) : ?>
        <tr>
          <th scope="row"><?= $post->id ?></th>
          <td><?= $post->Title ?></td>
          <td><?= $post->created_at ?></td>
          <td>

            <a href="/admin/posts/edit/<?= $post->id ?>" class="btn btn-warning">Modifier</a>
            <form action="/admin/posts/delete/<?= $post->id ?>" method="POST" class="d-inline">
              <button type="submit" class="btn btn-danger">Supprimer</button>
            </form>
          </td>
        </tr>
      <?php endforeach ?>
    </tbody>
  </table>
  <a href="/admin" class="btn btn-primary">Revenir au Dashboard</a>
<?php endif; ?>