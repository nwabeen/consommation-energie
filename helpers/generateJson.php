
<?php
// Connection à la base de donnée
require(__DIR__ . "/../configs/connect.php");
// On récupère la valeur postée par les champs dans le formulaire grâce à l'attribut "name"
$yearStart = $_POST["yearStart"];
$yearEnd = $_POST["yearEnd"];
$typeEnergie = $_POST["energies"];
$reponse = $bdd->query("SELECT depense.MONTANT AS totalDepense, depense.ANNEE AS annee FROM depense INNER JOIN type_energie  ON depense.TYPE_ENERGIE_idTYPE_ENERGIE = type_energie.idTYPE_ENERGIE WHERE depense.ANNEE <= $yearEnd AND depense.ANNEE >= $yearStart  AND type_energie.NOM = '$typeEnergie' GROUP BY depense.ANNEE, depense.MONTANT ORDER BY depense.ANNEE ASC");
$array = $reponse->fetchAll(PDO::FETCH_ASSOC);
// On ouvre le fichier results.json
$fp = fopen('js/results.json', 'w');
// Puis on écrit dedans l'array PHP transformé en JSON
fwrite($fp, json_encode($array));
// On ferme le fichier results.json
fclose($fp);
// On indique que l'on a terminé avec notre requête
$reponse->closeCursor();

?>
