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
                        <div class="col-md-2">
                            <form id="form" method="post">
                                <span>Choisir les consommation d'énergie de la période:</span>
                                    <br><?php
                displayOptionHTML("yearStart", "ANNEE", "depense", true, "", false, true);
                ?>
                                        <span>à</span>
                                        <?php
                    displayOptionHTML("yearEnd", "ANNEE", "depense", true, "", false, true);
                    ?>
                                            <br>
                                            <span>avec le type d'énergie:</span>
                                                <?php
                    displayOptionHTML("energies", "NOM", "type_energie", true, "", false, true);
                    ?>
                                                    <br>
                                                    <br>
                                                    <input type="submit" value="Afficher" class="btn btn-primary">

                            </form>
                        </div>
                        <div id="chartCanvas" class="fadein text-center col-md-6">
                        <?php
if ($isFormSubmitted) {
                        require(__DIR__ . "/helpers/generateJson.php");

                        echo "
                         <canvas height='200vh' id='canvas'></canvas><small class='text-muted'>En millions de francs (nominal)</small>";
                    }

                ?>
                    </div>
                    <div class="col-md-4">
                   <?php  if ($isFormSubmitted) {
                    include(__DIR__ . "/helpers/displayResult.php");
                } ?>

                    </div>
                    </div>

                </div>
        </section>
        <?php require(__DIR__ . "/includes/footer.php"); ?>
