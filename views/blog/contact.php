<?php 
 if(isset($_SESSION['flash_message'])) {
    $message = $_SESSION['flash_message'];
    unset($_SESSION['flash_message']);
    echo $message;
}
?>
<div class="container">
    <div class="d-flex justify-content-center">
        <div class="col-8 m-4">
            <form action="/contact" method="POST">
                <div class="form-group">
                    <div class="text-center">
                        <h1>Contactez-moi !</h1>
                    </div>

                    <div class="d-flex">
                        <input type="text" name="first_name" placeholder="Prénom" autocomplete="off" class="form-control" />
                        <input type="text" name="last_name" placeholder="Nom" autocomplete="off" class="form-control" />
                    </div>
                    <br />
                    <input type="text" name="phone_number" placeholder="Numéro de téléphone" autocomplete="off" class="form-control" />
                    <br />
                    <input type="email" name="email" placeholder="Email" autocomplete="off" class="form-control" />

                    <br />
                    <textarea rows="10" name="message" placeholder="Votre message" class="form-control"></textarea>
                    <br />
                    <button type="submit" class="btn btn-lg btn-primary">Envoyer</button>
                </div>
            </form>
        </div>
    </div>
</div>
