<h1>Les dernieres services </h1>
<?php var_dump($_SESSION) ?>
<?php foreach ($params['services'] as $service) : ?>
    <div class="card mb-3">
    <div class="card-body">
       <h5 class="card-title"><?= $service->Titre ?></h5>
        <p class="card-text" ><?= $service->Content ?></p>
        </div>
    </div>
<?php endforeach ?>

