<h1>Recherche un vehicules</h1>

<form action="/filter" method="POST">
    <!-- Prix -->
    <label for="min_prix">Prix minimum : <span id="min_prix_val">10</span></label>
    <input type="range" name="min_prix" id="min_prix" min="10" max="10000" step="10" value="10" oninput="updateValue('min_prix', 'min_prix_val')">

    <label for="max_prix">Prix maximum : <span id="max_prix_val">10000</span></label>
    <input type="range" name="max_prix" id="max_prix" min="10" max="10000" step="10" value="10000" oninput="updateValue('max_prix', 'max_prix_val')">

    <!-- Kilométrage -->
    <label for="min_kilometrage">Kilométrage minimum : <span id="min_kilometrage_val">0</span></label>
    <input type="range" name="min_kilometrage" id="min_kilometrage" min="0" max="500000" step="1000" value="0" oninput="updateValue('min_kilometrage', 'min_kilometrage_val')">

    <label for="max_kilometrage">Kilométrage maximum : <span id="max_kilometrage_val">500000</span></label>
    <input type="range" name="max_kilometrage" id="max_kilometrage" min="0" max="500000" step="1000" value="500000" oninput="updateValue('max_kilometrage', 'max_kilometrage_val')">

    <!-- Année de Circulation -->
    <label for="min_circulation">Année de circulation minimum : <span id="min_circulation_val">1900</span></label>
    <input type="range" name="min_circulation" id="min_circulation" min="1900" max="2023" step="1" value="1900" oninput="updateValue('min_circulation', 'min_circulation_val')">

    <label for="max_circulation">Année de circulation maximum : <span id="max_circulation_val">2023</span></label>
    <input type="range" name="max_circulation" id="max_circulation" min="1900" max="2023" step="1" value="2023" oninput="updateValue('max_circulation', 'max_circulation_val')">

    <button type="submit">Rechercher</button>
</form>

<div id="resultats">


</div>

<script>
    $(document).ready(function() {
        $('form').submit(function(event) {
            event.preventDefault();
            var formData = $(this).serialize();

            $.ajax({
                url: '/filter',
                type: 'POST',
                data: formData,
                success: function(response) {
                    var results = JSON.parse(response);

                    var html = '';

                    for (let result of results) {

                        html += '<div class="card">';
                        html += '<div class="card-body">';
                        html += '<h5 class="card-title">' + result.Title + '</h5>';
                        html += '<p class="card-text">' + result.content + '</p>';
                        html += '<p class="card-text">' + result.prix + ' €</p>';
                        html += '<a href="/posts/' + result.id + '" class="btn btn-primary">Voir l\'annonce</a>';
                        html += '</div>';
                        html += '</div>';

                    }

                    if(results.length === 0) {
                        html += '<p style="font-weight:bold; margin-top:2em">Aucun résultat</p>';
                    }


                    $('#resultats').html(html);

                },
                error: function(error) {
                    // Implémentation de la gestion des erreurs
                }
            });
        });
    });
</script>