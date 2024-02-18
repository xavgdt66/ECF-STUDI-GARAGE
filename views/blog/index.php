<br>
<br>
<br>
<br>
<h1 class="text-center">Nos véhicules</h1>
<?php var_dump($_SESSION) ?>
<?php foreach ($params['posts'] as $post) : ?>
    <div class="card mb-3">
        <div class="row g-0">
            <div class="col-md-4">
                <img src="<?= $post->imagePrincipale ?>" alt="" class="card-img img-thumbnail" style="height: 300px;">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title"><?= substr($post->Title, 0, 20) ?></h5>
                    <table class="table">
                        <tbody>
                            <tr>
                                <th scope="row">Prix</th>
                                <td><?= $post->prix ?> €</td>
                            </tr>
                            <tr>
                                <th scope="row">Année de circulation</th>
                                <td><?= $post->circulation ?></td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="text-end">
                        <a href="posts/<?= $post->id ?>" class="btn btn-primary">Voir plus</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endforeach ?>
<br><br><br><br><br>
