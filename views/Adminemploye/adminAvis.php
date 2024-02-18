<?php if (isset($_SESSION['user']) && $_SESSION['user']->role === 'employe'): ?>

<h1>Avis en attente de modération</h1>
<?php var_dump($_SESSION) ?>

<table class="table">
    <tr>
        <th>Nom</th>
        <th>Commentaire</th>
        <th>Note</th>
        <th>Action</th>
    </tr>
    <?php foreach ($params['avis'] as $avi): ?>
        <tr>
            <td><?= $avi->nom ?></td>
            <td><?= $avi->commentaire ?></td>
            <td>
                <div class="etoiles">
                    <?php for ($i = 1; $i <= 5; $i++) : ?>
                        <?php if ($i <= $avi->note) : ?>
                            <span class="etoile etoile-active">&#9733;</span>
                        <?php else : ?>
                            <span class="etoile">&#9734;</span>
                        <?php endif; ?>
                    <?php endfor; ?>
                </div>
            </td>
            <td>
                <form method="post" action="">
                    <input type="hidden" name="avis_id" value="<?= $avi->id ?>">
                    <button type="submit" name="action" value="valider" class="btn btn-success">Valider</button>
                    <button type="submit" name="action" value="supprimer" class="btn btn-danger">Supprimer</button>
                </form>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
<?php endif; ?>
