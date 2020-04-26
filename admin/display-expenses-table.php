<?php
if ($_GET["energie"]) {
    require(__DIR__ . "/../configs/connect.php");
    require(__DIR__ . "/../helpers/helper.php");

    // On récupère la valeur postée par les champs dans le formulaire grâce à l'attribut name
    // On effectue la requête en SQL "name"
    $typeEnergie = $_GET["energie"];
    // $bdd-query("example"); retourne un tableau PHP avec le résultat de la requête SQL
    $reponse = $bdd->query("SELECT depense.MONTANT AS totalDepense, depense.ANNEE AS annee, type_energie.NOM AS typeEnergie, depense.idDEPENSE AS idDEPENSE, depense.TYPE_ENERGIE_idTYPE_ENERGIE AS idDEPENSEENERGY  FROM depense INNER JOIN type_energie  ON depense.TYPE_ENERGIE_idTYPE_ENERGIE = type_energie.idTYPE_ENERGIE WHERE  type_energie.NOM = '$typeEnergie' ORDER BY depense.ANNEE DESC");
    // depense.idTYPE_ENERGIE AS idTYPE_ENERGIE

    // On commence le début du tableau

    echo "<form method='post' action='feedback.php'>";
    $tableStart = sprintf("<table class='table table-responsive'>
<thead><tr>
<th>Montant</th>
<th>Année</th>
<th>Type d'énergie</th>
<th>Supprimer</th>
 </tr>
 </thead>
 <tbody>");
    echo $tableStart;
    // On boucle dans le tableau $reponse et on lui donne un alias $donnees
    foreach ($reponse as $donnees) {
        $inputTotalDepense = "<input type='number' name=\"updateDepenseMontant[$donnees[idDEPENSE]]\" class='form-control' id='input1' placeholder='$donnees[totalDepense]'>";
        $inputAnnee = "<input type='number'  name=\"updateDepenseAnnee[$donnees[idDEPENSE]]\" class='form-control' id='input1' placeholder='$donnees[annee]'>";
        $inputDelete = "<label class='form-check-label'><input type='checkbox' class='form-check-input' name=\"deleteDepense[$donnees[idDEPENSE]]\" class='form-control' id='input1'>Supprimer</label>";
        // $inputTypeEnergy = "<input type='text' name=\"updateDepenseType[$donnees[idDEPENSE]]\" class='form-control' id='input1' placeholder='$donnees[typeEnergie]'>";
        // On affiche les entrées de la base de donnée lignes par lignes et on passe  comme arguments les valeur récupérée par la requête SQL
        $tableRowStart = sprintf("
 <tr>
 <td width='200'>%s</td>
 <td width='120'>%s</td>
", $inputTotalDepense, $inputAnnee);
        echo $tableRowStart;
        echo "<td width='250'>";
        displayOptionHTML("updateExpenseEnergy[$donnees[idDEPENSE]]", "NOM", "type_energie", true, $donnees["typeEnergie"], true);
        echo "</td>";
        $tableRowEnd = sprintf("
 <td>%s</td></tr>", $inputDelete);
        echo $tableRowEnd;
    }
    // On affiche la fin du tableau
    echo "</tbody></table>";
    $tableClosingTag = sprintf("<button class='btn btn-primary pull-right mr-3' type='submit'>Modifier</button></form>");
    echo $tableClosingTag;
    // On indique que l'on a terminée la requête en cours
    $reponse->closeCursor();
}
