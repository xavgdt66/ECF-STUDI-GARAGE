<?php if (isset($_SESSION['user']) && $_SESSION['user']->role === 'admin') : ?>

        <h1>Ajouter un Employé</h1>
        <form action="/admin/employe/create" method="post">
                <label for="email">Email :</label><br>
                <input type="email" id="email" name="email" class="form-control" required><br><br>

                <label for="password">Mots de passe :</label><br>
                <textarea id="password" name="password" rows="5" class="form-control" required></textarea>
                <br>
                <br>

                <input type="submit" name="addemploye" class="btn btn-primary" value="Ajouter">

        </form>

<?php endif; ?>