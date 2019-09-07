<?php
require "application/init.php";

// 10 derniers messages par ordre décroissant
$sqlSelect = 'SELECT * FROM messages ORDER BY id DESC LIMIT 0,10';

// ligne sql reçue en tableau associatif 
$rows = queryAll($sqlSelect);

// affectation de variable pour éviter erreur php
$error = null;

// Si je reçois un param d'erreur j'affiche le popup(si javascript désactivé par l'utilisateur)
if (isset($_GET['error']) && $_GET['error'] == 1) {
    $error = "<p style='color:red'>Vous ne pouvez pas envoyer un message vide où sans pseudo...</p>";
}


require "public/view/index.phtml";