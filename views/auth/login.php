<?php if (!isset($_SESSION['user'])) : ?>
  <br>
  <br>
  <br>
  <br>
  <div class="card">
      <div class="card-body">
          <h1 class="card-title">Formulaire de connexion</h1>
          <form method="POST" action="/login">
              <div class="form-group">
                  <label for="email">Adresse e-mail :</label>
                  <input type="email" name="email" id="email" class="form-control" required>
              </div>
              <div class="form-group">
                  <label for="password">Mot de passe :</label>
                  <input type="password" name="password" id="password" class="form-control" required>
              </div>
              <button type="submit" class="btn btn-primary">Envoyer</button>
          </form>
      </div>
  </div>
<?php endif; ?>
