<?php if (isset($_SESSION['flash_message'])) : ?>
  <div class="alert alert-success">
    <?php
    $message = $_SESSION['flash_message'];
    unset($_SESSION['flash_message']);
    echo $message;
    ?>
  </div>
<?php endif; ?>

<br>
<br>
<br>
<br>

<div class="container">
  <div class="row">
    <div class="col-md-6">
      <img src="<?= $params['post']->imagePrincipale ?>" class="img-fluid" style="max-width: 100%;">
      <div class="row mt-3">
        <?php
        $galerieImages = explode(',', $params['post']->galerieImages??"");
        foreach ($galerieImages as $image) {
          // Conversion du chemin absolu en URL relative
          $imageURL = str_replace(realpath(__DIR__ . '/../../public'), '', $image);
          echo '<div class="col-md-4"><img src="' . $imageURL . '" class="img-fluid" style="max-width: 100%;"></div>';
        }
        ?>
      </div>
    </div>
    <div class="col-md-6">
      <div class="row">
        <div class="col">
          <p><?= $params['post']->Title ?></p>
        </div>
      </div>
      <div class="row">
        <div class="col">
          <p >Date : <?= $params['post']->created_at ?></p>
        </div>
      </div>
      <div class="row">
        <div class="col">
          <p >Prix : <?= $params['post']->prix ?> €</p>
        </div>
      </div>
      <div class="row">
        <div class="col">
          <p >Circulation : <?= $params['post']->circulation ?></p>
        </div>
      </div>
      <div class="row">
        <div class="col">
          <p >Kilométrage : <?= $params['post']->kilometrage ?></p>
        </div>
      </div>
    </div>
  </div>

  <br>

  <div class="row">
    <div class="col-md-12">
      <div class="row">
        <div class="col">
          <p >Description : <?= $params['post']->content ?></p>
        </div>
      </div>
    </div>
  </div>

  <br>

 

  <br>
  <h1 class="text-center">Ce véhicule vous intéresse ? Contactez-Nous</h1>
  <div class="row">
    <div class="col-md-12">
      <form action="/send-contact-form" method="POST">
        <input type="hidden" name="post_title" value="<?= $params['post']->Title ?>" class="form-control">
        <div class="form-group">
          <input type="text" name="name" placeholder="Votre nom" class="form-control">
        </div>
        <div class="form-group">
          <input type="email" name="email" placeholder="Votre adresse e-mail" class="form-control">
        </div>
        <div class="form-group">
          <textarea name="message" placeholder="Votre message" class="form-control"></textarea>
        </div>
        <div class="form-group text-right">
          <button type="submit" class="btn btn-success">Envoyer</button>
        </div>
      </form>
    </div>
  </div>

</div>
<br>
<br>
<br>
<br>
