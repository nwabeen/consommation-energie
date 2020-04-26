<?php

require('config.php');

// Connexion à la base de données
try {
    $bdd = new PDO('mysql:host=' . SERVER . ';dbname=' . DATABASE . ';charset=utf8', USER, PWD);
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}
