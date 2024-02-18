<?php if (isset($_SESSION['user']) && $_SESSION['user']->role === 'employe') : ?>

<h1 class="text-center">Interface Employe</h1>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-3">
            <a href="/employe/createpost" class="btn btn-primary btndashboard">Ajouter un véhicule</a>
        </div>
        <div class="col-md-3">
            <a href="/employe/gereravis" class="btn btn-primary btndashboard">Gérer les avis</a>
        </div>
        
        <div class="col-md-3">
            <a href="/createavis" class="btn btn-primary btndashboard">Créer un avis</a>
        </div>
    </div>
</div>

<style>
    .container {
        padding: 50px;
    }

    .col-md-3 {
        margin-bottom: 20px;
    }
</style>

<?php endif; ?>
