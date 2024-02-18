<h1>Ajouter un avis</h1>

<form action="/createavis" method="post">
    <label for="nom">Nom :</label>
    <input type="text" name="nom" id="nom" class="form-control" required><br>

    <label for="commentaire">Commentaire :</label>
    <textarea name="commentaire" id="commentaire" class="form-control" required></textarea><br>

    <label for="note">Note :</label>
    <div id="etoiles" class="etoiles">
        <input type="hidden" name="note" id="note" required>
        <span class="etoile" onclick="selectionnerEtoile(1)">&#9733;</span>
        <span class="etoile" onclick="selectionnerEtoile(2)">&#9733;</span>
        <span class="etoile" onclick="selectionnerEtoile(3)">&#9733;</span>
        <span class="etoile" onclick="selectionnerEtoile(4)">&#9733;</span>
        <span class="etoile" onclick="selectionnerEtoile(5)">&#9733;</span>
    </div><br>

    <input type="submit" value="Ajouter" class="btn btn-lg btn-primary">
</form>

<script>
    function selectionnerEtoile(note) {
        document.getElementById('note').value = note;
        let etoiles = document.getElementsByClassName('etoile');
        for (let i = 0; i < etoiles.length; i++) {
            if (i < note) {
                etoiles[i].classList.add('etoile-active');
            } else {
                etoiles[i].classList.remove('etoile-active');
            }
        }
    }
</script>

<style>
    .etoiles {
        color: #ccc;
        font-size: 30px;
    }

    .etoile {
        cursor: pointer;
    }

    .etoile-active {
        color: gold;
    }
</style>
