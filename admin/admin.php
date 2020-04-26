<?php
require(__DIR__ . "/../helpers/helper.php");
require(__DIR__ . "/../configs/connect.php");

  $reponse = $bdd->query("SELECT * FROM users");

session_start();
if (!isset($_SESSION['loggedIn'])) {
    $_SESSION['loggedIn'] = false;
}

if (isset($_POST['password'])) {
    // On compare la valeur entré dans le champ de login avec le hash défini plus haut
    foreach ($reponse as $donnees) {
        if (password_verify($_POST["password"], $donnees["hash"]) && $_POST["username"] == $donnees["username"]) {
            $_SESSION['loggedIn'] = true;
            $_SESSION['name'] = $donnees["name"];
            $_SESSION['username'] = $donnees["username"];

            $_SESSION['id'] = $donnees["id_users"];
        }
    }
}
?>

  <?php require(__DIR__ . "/../includes/header.php"); ?>

  <body>
    <section id="content">
      <?php  require(__DIR__ . "/../includes/navbar.php"); ?>
      <div class="container fadein">
        <?php if ($_SESSION['loggedIn']): ?>
        <!-- Si on passe en GET dans le paramètre de l'URL comme ceci:
        http://www.example.org/consommation-energie/admin/admin.php?cat=energies -->
        <?php if ($_GET["cat"] == "energies"): ?>
        <?php include(__DIR__ . "/../admin/edit-energy.php") ?>

        <?php elseif ($_GET["cat"] == "depenses"): ?>
        <?php include(__DIR__ . "/../admin/edit-expense.php") ?>

        <?php elseif ($_GET["cat"] == "user"): ?>
        <?php include(__DIR__ . "/../admin/edit-user.php") ?>
        <!-- SI aucune parmètre n'a été défini dans l'URL en GET, alors on affiche un tableau de bord pour accueilir l'utilisateur -->
        <?php else: ?>
        <?php include(__DIR__ . "/../admin/dashboard.php") ?>
        <?php endif; ?>


        <?php else: ?>

        <h1>Accès non autorisé
          <?php endif; ?>

      </div>
    </section>
    <?php  require(__DIR__ . "/../includes/footer.php");   ?>
