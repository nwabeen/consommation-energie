<?php
// Connection à la base de donnée
require(__DIR__ . "/../configs/connect.php");
// On récupère la valeur postée par les champs dans le formulaire grâce à l'attribut "name"
$yearStart = $_POST["yearStart"];
$yearEnd = $_POST["yearEnd"];
$typeEnergie = $_POST["energies"];
// On effectue la requête en SQL
$reponse = $bdd->query("SELECT depense.MONTANT AS totalDepense, depense.ANNEE AS annee, type_energie.NOM AS typeEnergie FROM depense INNER JOIN type_energie ON depense.TYPE_ENERGIE_idTYPE_ENERGIE = type_energie.idTYPE_ENERGIE WHERE depense.ANNEE <= $yearEnd AND depense.ANNEE >= $yearStart  AND type_energie.NOM = '$typeEnergie' GROUP BY depense.ANNEE, depense.MONTANT ORDER BY depense.ANNEE DESC");
// On commence le début du tableau
$tableStart = sprintf("<table class='table table-striped table-responsive'>
<thead>
<tr>
<th>Montant</th>
<th>Année</th>
<th>Type d'énergie</th>
 </tr>
 </thead>
 <tbody>
 ");
 echo $tableStart;
 // On boucle dans le tableau
foreach ($reponse as $donnees) {
    // On affiche les entrées de la base de donnée lignes par lignes et on passe  comme arguments les valeur récupérée par la requête SQL
    $tableRow = sprintf("
 <tr>
 <td>%s</td>
 <td>%s</td>
<td>%s</td>
</tr>
 ", $donnees["totalDepense"], $donnees["annee"], $donnees["typeEnergie"]);
    echo $tableRow;
}
// On affiche la fin du tableau
$tableEnd = sprintf("</tbody></table>");
 echo $tableEnd;
 // On indique que l'on a terminée la requête en cours
$reponse->closeCursor();
