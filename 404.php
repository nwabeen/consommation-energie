<?php
require(__DIR__ . "/helpers/helper.php");
session_start();
$_SESSION['loggedIn'] = false;
$isFormSubmitted = $_SERVER['REQUEST_METHOD'] == 'POST';
include(__DIR__ . "/includes/header.php");
?>

    <body>
        <section id="content">

            <?php include(__DIR__ . "/includes/navbar.php");
 ?>
                <div class="container">
                    <div class="row">
                        <div class="text-center col-md-6 offset-md-3">
                            <h1>Page non trouvée!</h1>
                            <p>Impossible d’afficher la page que vous voulez consulter. Vous avez sans doute saisi une mauvaise adresse (URL), le document n’existe pas ou son nom a été modifié.</p>
<a class="btn btn-primary" href="<?php echo SITE_URL . "index.php"?>" role="button">Revenir à l'accueil</a>
                        </div>
                </div>
        </section>
        <?php require(__DIR__ . "/includes/footer.php"); ?>
