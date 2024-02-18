<br>
<br>
<br>
<br>

<h2 class="text-center">Nos services</h2>
<br>
<div class="row justify-content-center">
    <?php foreach ($params['service'] as $servic) : ?>
        <div class="col-md-4 mb-4 d-flex justify-content-center">
            <div class="card bg text-black custom-card">
                <div class="card-body text-left">
                    <h5 class="card-title"><?= $servic->title ?></h5>
                    <p class="card-text"><?= $servic->content ?></p>
                </div>
            </div>
        </div>
    <?php endforeach ?>
</div>

<br>


<br>
<h2 class="text-center">Nos derniers véhicules</h2>
<br>
<div class="row">
  <?php $counter = 0; ?>
  <?php foreach ($params['posts'] as $post) : ?>
    <div class="col-md-4 mb-4">
      <div class="card h-100">
        <img src="<?= $post->imagePrincipale ?>" class="card-img-top custom-image" alt="Image" style="object-fit: cover; height: 200px;">
        <div class="card-body">
          <h5 class="card-title"><?= substr($post->Title, 0, 15) ?></h5>
          <p class="card-text">Prix : <?= $post->prix ?>€</p>
          <a href="posts/<?= $post->id ?>" class="btn btn-primary">Voir plus</a>
        </div>
      </div>
    </div>
    <?php $counter++; ?>
    <?php if ($counter % 3 === 0) : ?>
      <div class="w-100"></div>
    <?php endif; ?>
  <?php endforeach; ?>
</div>


<br>
<br>
<br>

<h2 class="text-center" style="font-family: 'Roboto', sans-serif;">Les avis de nos clients</h2>
<br>
<div class="row justify-content-center">
    <?php foreach ($params['avis'] as $avi) : ?>
        <div class="col-md-4 mb-4 d-flex justify-content-center">
            <div class="">
                <div class="card-body text-center">
                    <h5 class="card-title" style="color: blue; text-transform: uppercase; font-family: 'Montserrat', sans-serif;"><?= $avi->nom ?></h5>
                    <p class="card-text" style="font-family: 'Roboto', sans-serif;"><?= $avi->commentaire ?></p>
                    <div class="etoiles">
                        <?php for ($i = 1; $i <= 5; $i++) : ?>
                            <?php if ($i <= $avi->note) : ?>
                                <span class="etoile etoile-active">&#9733;</span>
                            <?php else : ?>
                                <span class="etoile">&#9734;</span>
                            <?php endif; ?>
                        <?php endfor; ?>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach ?>
</div>
<br>
<br>
<h2 class="text-center">Souhaitez-vous donner votre avis ?</h2>
<br>
<div class="d-flex justify-content-center">
  <a href="/createavis"><button class="btn btn-primary">Cliquez-ici</button></a>
</div>

<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<style>
    .etoiles {
    color: #ccc;
    font-size: 30px;
}

.etoile {
    cursor: pointer;
}

.etoile-active {
    color: yellow;
}

.custom-card {
        width: 250px;
        height: 200px;
    }
    @import url('https://fonts.googleapis.com/css2?family=Roboto&display=swap');
    @import url('https://fonts.googleapis.com/css2?family=Montserrat&display=swap');

</style>

