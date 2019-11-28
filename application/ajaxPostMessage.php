<?php

require 'init.php';


if (isset($_POST) && !empty($_POST)) {

    // nettoyage variables utilisateur
    $author = trim($_POST['author']);
    $message = trim($_POST['message']);


    if (!empty($message) && !empty($author)) {
        
    
        $sqlInsert = 'INSERT INTO messages (auteur, message) VALUES(:auteur, :message)';
        $arrayParams    = [
            'auteur' => urldecode( htmlspecialchars($author) ),
            'message' =>  urldecode( htmlspecialchars($message) )
        ];
        
        //enregistrement messages en bdd
        prepareExecute($sqlInsert,$arrayParams);

        // redirection en cas de désactivation de javascript par l'utilisateur
        redirectTo("../index.php");
        
        
    } else {
        
        // Redirection avec erreur en cas de désactivation de javascript par l'utilisateur
        redirectTo("../index.php?error=1");

    }
    

}
