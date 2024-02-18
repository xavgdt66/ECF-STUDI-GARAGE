<?php if (isset($_SESSION['user']) && $_SESSION['user']->role === 'admin') : ?>

<h1>Interface administrateur</h1>
<div class="container">
    <div class="row">
        <div class="col-md-3">
            <a href="/admin/posts" class="btn btn-primary btndashboard">Ajouter une voiture</a>
        </div>
        <div class="col-md-3">
            <a href="/admin/services" class="btn btn-primary btndashboard">Services</a>
        </div>
        <div class="col-md-3">
            <a href="/admin/employes" class="btn btn-primary btndashboard">Employe</a>
        </div>
        <div class="col-md-3">
            <a href="/admin/hours" class="btn btn-primary btndashboard">Heure</a>
        </div>
    </div>
</div>

<style>
    .container {
        padding: 50px;
        text-align: center;
    }

    .col-md-3 {
        margin-bottom: 20px;
    }
</style>

<?php endif; ?>
