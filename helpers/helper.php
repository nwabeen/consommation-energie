<?php
/* Fonction permettant d'afficher des balises select en HTML,
qui reprennent en paramètres la colonne et la table pour afficher toutes les entrées de la colonne sous forme de liste */
function displayOptionHTML($name, $columnSQL, $tableSQL, $methodPOST = true, $default = "", $disableDefaultOption = false, $required = false)
{
    require(__DIR__ . "/../configs/connect.php");
    $requiredString = $required ? 'required': null;
    $disableDefaultOptionString = $disableDefaultOption ? 'disabled': null;

    $sql = "SELECT $columnSQL FROM $tableSQL GROUP BY $columnSQL";
    if ($methodPOST) {
        $selectOpenTag = sprintf("<select $requiredString name='$name'>
        <option value='' disabled selected>Choisir</option>
        ");
    } elseif (!empty($default)) {
        $selectOpenTag = sprintf("<select required name='$name'>");
    } else {
        $selectOpenTag = sprintf("<select required name='$name' onchange='showExpense(this.value)'>
        <option value='' disabled selected>Choisir</option>
        ");
    }
    echo $selectOpenTag;
    $reponse = $bdd->query($sql);

    while ($donnees = $reponse->fetch()) {
        // Si l'option avait déjà été choisi avant, on mémorise le choix fait précedemment et le sélectionne par défaut
        if ($default == $donnees[$columnSQL] && !empty($default) || $_POST[$name] == $donnees[$columnSQL]) {
            $html = sprintf("
           <option $disableDefaultOptionString selected='%s' value='%s'>%s</option>", $donnees[$columnSQL], $donnees[$columnSQL], $donnees[$columnSQL]);
            echo $html;
        }

        // Sinon, on affiche la première entrée par défaut
        else {
            echo $columnSQL;
            $html = sprintf("
            <option value='%s'>%s</option>", $donnees[$columnSQL], $donnees[$columnSQL]);
            echo $html;
        }
    }

    $reponse->closeCursor();
    $selectClosingTag = sprintf("</select>");
    echo $selectClosingTag;
}

    function displayTableHTML($columnSQL, $tableSQL, $id)
    {
        require(__DIR__ . "/../configs/connect.php");
        $sql = "SELECT $columnSQL, $id FROM $tableSQL GROUP BY $columnSQL, $id";
        echo "<form class='container' method='post' action='feedback.php'>";
        $reponse = $bdd->query($sql);

        $tableStart = sprintf("<table class='table table-responsive'><tbody>");


        echo $tableStart;
        foreach ($reponse as $donnees) {
            $input1 = "<input placeholder='$donnees[$columnSQL]' class='form-control' type='text' name=\"update[$donnees[$id]]\">";
            $inputDelete = "<label class='form-check-label'><input type='checkbox' class='form-check-input'  value=\"$donnees[$id]\" name=\"delete[$donnees[$id]]\" class='form-control' id='input1'>Supprimer</label>";
            $tableRowStart = sprintf("
                <tr>
                <td>%s</td>
                <td>%s</td>
            </tr>", $input1, $inputDelete);
            echo $tableRowStart;
        }
        echo "</tbody></table>";

        $tableClosingTag = sprintf("
        <br><button class='ml-md-3 btn btn-primary pull-right' type='submit'>Modifier</button></tbody>");
        echo $tableClosingTag;
        $reponse->closeCursor();
    }
