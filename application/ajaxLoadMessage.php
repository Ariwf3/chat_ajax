<?php

require 'init.php';

if (  !empty($_GET['id']))  {

    $lastInsertId = (int) $_GET['id'];
    
    $sqlSelect = 'SELECT id, auteur, message FROM messages WHERE id > :id ORDER BY id DESC ';
    $array = ['id' => $lastInsertId];

    $row = queryAll($sqlSelect, $array);

    // je recup le dernier message de la BDD
    $lastSelectId = $row[0]['id'];
    
    // conversion en JSON pour faciliter le html
    $json = json_encode($row);
    
    // Si le dernier message en base est plus récent je le renvoie au script pour l'afficher
     if ($lastSelectId > $lastInsertId ) {
        echo $json;
    } 
    
}
