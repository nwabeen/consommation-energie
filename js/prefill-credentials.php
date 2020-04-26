<?php
    $URL = $_SERVER['SERVER_NAME']. $_SERVER["REQUEST_URI"];
    if ($URL == (__DIR__ . "/../js/prefill-credentials.php")) {
        die();
    }
    ?>
let usernameInput = document.querySelector("#usernameInput");
let passwordInput = document.querySelector("#passwordInput");
let scriptHTML = document.querySelector("#prefill");
usernameInput.value = "demo";
passwordInput.value = "3Dy9zvZ4v27KW";
scriptHTML.innerHTML = "";
