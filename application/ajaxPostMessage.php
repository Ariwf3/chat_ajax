<?php

require 'init.php';


if (isset($_POST) && !empty($_POST)) {


    $auteur = trim($_POST['auteur']);
    $message = trim($_POST['message']);


    if (!empty($message) && !empty($auteur)) {
        
    
        $sql = 'INSERT INTO messages (auteur, message) VALUES(:auteur, :message)';
        $array    = [
            'auteur' => urldecode( htmlspecialchars($auteur) ),
            'message' =>  urldecode( htmlspecialchars($message) )
        ];
        

        $queryInsertPost = $pdo->prepare($sql);
        $queryInsertPost->execute($array);

        // redirection en cas de désactivation de javascript par l'utilisateur
        header('location:../index.php');
        
        
    } else {
        
        // Redirection avec erreur en cas de désactivation de javascript par l'utilisateur
        header('location:../index.php?error=1');
    }
    

}
