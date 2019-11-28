<?php

require 'init.php';

var_dump($_POST);

if (isset($_POST) && !empty($_POST)) {

    // var_dump($_POST);
    $author = trim($_POST['author']);
    $message = trim($_POST['message']);


    if (!empty($message) && !empty($author)) {
        
    
        $sqlInsert = 'INSERT INTO messages (auteur, message) VALUES(:auteur, :message)';
        $arrayParams    = [
            'auteur' => urldecode( htmlspecialchars($author) ),
            'message' =>  urldecode( htmlspecialchars($message) )
        ];
        
        prepareExecute($sqlInsert,$arrayParams);

        /* $queryInsertPost = $pdo->prepare($sqlInsert);
        $queryInsertPost->execute($array); */

        // redirection en cas de désactivation de javascript par l'utilisateur
        // redirectTo("../index.php");
        
        
    } else {
        var_dump($_POST);
        // Redirection avec erreur en cas de désactivation de javascript par l'utilisateur
        // redirectTo("../index.php?error=1");

    }
    

}
