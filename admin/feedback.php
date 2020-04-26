<?php
require(__DIR__ . "/../helpers/helper.php");
session_start();
?>

    <?php include(__DIR__ . "/../includes/header.php"); ?>

    <body>
        <section id="content">
            <?php include(__DIR__ . "/../includes/navbar.php"); ?>
            <div class="container">

                <?php if ($_SESSION['loggedIn']): ?>
                <?php
      // Modifier les énergies
require(__DIR__ . "/../configs/connect.php");
        if ($_POST["update"]) {
            $toupdateEnergy = $_POST["update"];
            foreach ($toupdateEnergy as $key => $value) {
                if (!empty($value)) {
                    $valueEscaped = htmlspecialchars($value);
                    $stmt = $bdd->prepare("UPDATE type_energie SET NOM = :value WHERE idTYPE_ENERGIE = :key");
                    $stmt->bindParam(':value', $valueEscaped, PDO::PARAM_STR, 12);
                    $stmt->bindParam(':key', $key, PDO::PARAM_STR, 12);
                    $stmt->execute();
                    $stmt->closeCursor();
                }
            }
        }
        if ($_POST["NomEnergie"]) {
            // Ajouter une énergie
            $toAddEnergieNom = $_POST["NomEnergie"];
            $valueEscaped = htmlspecialchars($toAddEnergieNom);
            $stmt = $bdd->query("INSERT INTO type_energie(NOM) VALUES ('$valueEscaped')");
            $stmt->closeCursor();
        }

        if ($_POST["delete"]) {
            $toDeleteEnergy = $_POST["delete"];
            foreach ($toDeleteEnergy as $key => $value) {
                if (!empty($value)) {
                    $valueEscaped = htmlspecialchars($value);
                    $stmt = $bdd->prepare("DELETE FROM type_energie WHERE idTYPE_ENERGIE = :key");
                    $stmt->bindParam(':key', $valueEscaped, PDO::PARAM_STR, 12);
                    $stmt->execute();
                    if (!$stmt->execute()) {
                        echo "<div class='alert alert-danger'>Impossible de supprimer une énergie qui contient déjà des données. Videz d'abord son contenu et réessayez à nouveau</div>";
                    }
                    $stmt->closeCursor();
                }
            }
        }
        if ($_POST["updateDepenseMontant"]) {
            // Modifier les dépense (Montant)
            $toupdateDepenseMontant = $_POST["updateDepenseMontant"];
            foreach ($toupdateDepenseMontant as $key => $value) {
                if (!empty($value)) {
                    $valueEscaped = htmlspecialchars($value);
                    $stmt = $bdd->prepare("UPDATE depense SET MONTANT = :value WHERE idDEPENSE = :key");
                    $stmt->bindParam(':value', $valueEscaped, PDO::PARAM_STR, 12);
                    $stmt->bindParam(':key', $key, PDO::PARAM_STR, 12);
                    $stmt->execute();
                    $stmt->closeCursor();
                }
            }
        }
        if ($_POST["updateDepenseAnnee"]) {
            // Modifier les années des dépense (Année)
            $toupdateDepenseAnnee = $_POST["updateDepenseAnnee"];
            foreach ($toupdateDepenseAnnee as $key => $value) {
                if (!empty($value)) {
                    $valueEscaped = htmlspecialchars($value);
                    $stmt = $bdd->prepare("UPDATE depense SET ANNEE = :value WHERE idDEPENSE = :key");
                    $stmt->bindParam(':value', $valueEscaped, PDO::PARAM_STR, 12);
                    $stmt->bindParam(':key', $key, PDO::PARAM_STR, 12);
                    $stmt->execute();
                    $stmt->closeCursor();
                }
            }
        }
        if ($_POST["updateExpenseEnergy"]) {
            // Modifier les énergie des dépense
            $toUpdateExpenseEnergy = $_POST["updateExpenseEnergy"];

            foreach ($toUpdateExpenseEnergy as $key => $value) {
                $getIdEnergyFromName = $bdd->query("SELECT idTYPE_ENERGIE as idEnergy FROM type_energie WHERE NOM = '$value'");
                foreach ($getIdEnergyFromName as $donnees) {
                    $stmt = $bdd->query("UPDATE depense SET TYPE_ENERGIE_idTYPE_ENERGIE = $donnees[idEnergy] WHERE idDEPENSE = $key");
                }
                $getIdEnergyFromName->closeCursor();
                $stmt->closeCursor();
            }
        }


        if ($_POST["deleteDepense"]) {
            // Supprimer une dépense
            $toDeleteExpense = $_POST["deleteDepense"];
            foreach ($toDeleteExpense as $key => $value) {
                if (!empty($value)) {
                    $valueEscaped = htmlspecialchars($value);
                    $stmt = $bdd->prepare("DELETE FROM depense WHERE idDEPENSE = :key");
                    $stmt->bindParam(':key', $key, PDO::PARAM_STR, 12);
                    $stmt->execute();
                    $stmt->closeCursor();
                }
            }
        }
        if ($_POST["addAmountExpense"]) {
            // Ajouter une dépense
            $toAddExpenseAmount = htmlspecialchars($_POST["addAmountExpense"]);
            $toAddExpenseYear = htmlspecialchars($_POST["addYearExpense"]);
            $toAddExpenseEnergy = htmlspecialchars($_POST["addEnergyExpense"]);
            $getIdEnergyFromName = $bdd->query("SELECT idTYPE_ENERGIE as idEnergy FROM type_energie WHERE NOM = '$toAddExpenseEnergy'");
            foreach ($getIdEnergyFromName as $id) {
                $stmt = $bdd->query("INSERT INTO depense(MONTANT, ANNEE, TYPE_ENERGIE_idTYPE_ENERGIE) VALUES ('$toAddExpenseAmount','$toAddExpenseYear', '$id[idEnergy]')");
                $stmt->closeCursor();
            }

            $getIdEnergyFromName->closeCursor();
        }
        if ($_POST["newName"]) {
            // Modifier le nom
            $newName = htmlspecialchars($_POST["newName"]);
            $id = $_SESSION["id"];
            $stmt = $bdd->query("UPDATE users SET name = '$newName' WHERE id_users = $id");
            $stmt->closeCursor();
            $_SESSION["name"] = $newName;
        }
        if ($_POST["newUsername"]) {
            // Modifier le nom d'utilisateur
            $newUsername = htmlspecialchars($_POST["newUsername"]);
            $id = $_SESSION["id"];
            $stmt = $bdd->query("UPDATE users SET username = '$newUsername' WHERE id_users = $id");
            $stmt->closeCursor();
            $_SESSION["username"] = $newUsername;
        }
        if ($_POST["newPassword"]) {
            // Modifier le mot de passe
            $newPassword = htmlspecialchars($_POST["newPassword"]);
            $oldPassword = htmlspecialchars($_POST["oldPassword"]);
            $hashedNewPassword = password_hash($newPassword, PASSWORD_DEFAULT);
            $id = $_SESSION["id"];
            $getHash = $bdd->query("SELECT hash FROM users WHERE id_users = $id");
            foreach ($getHash as $hash) {
                if (password_verify($oldPassword, $hash["hash"])) {
                    $stmt = $bdd->query("UPDATE users SET hash = '$hashedNewPassword' WHERE id_users = $id");
                    $stmt->closeCursor();
                }
            }
        }
    ?>

                    <h1>Merci!</h1>

                    <a class="btn btn-primary" href="admin.php">Revenir à l'édition</a>
                    <?php else: ?>
                    <h1>Petit curieux! Tu n'es pas au bon endroit...
                        <?php endif; ?>
            </div>
        </section>
        <?php include(__DIR__ . "/../includes/footer.php"); ?>
