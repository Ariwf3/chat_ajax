<?php

//param pdo
$dataSourceName = 'mysql:host=localhost;dbname=chat_ajax';
$databaseLogin = 'root';
$databasePass = '';
$errmode_utf8 = array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION,
PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
);

$pdo = new PDO($dataSourceName, $databaseLogin, $databasePass, $errmode_utf8);


// requête préparée
function prepareExecute($sqlQuery, array $array = array()) {

    if ( !empty($array) )
    {
        foreach( $array as $keys => $values )
            {
                $values = htmlspecialchars($values);
            }
    }
    
    global $pdo;
    $query = $pdo->prepare($sqlQuery);
    $query->execute($array);

    if ($query->rowCount() == 0) {
        die("Erreur : aucune ligne traitée");
    }

    return $query;
}

// requête fetchAll
function queryAll( $sqlQuery, array $array = array() ) :array {
    
    if ( !empty($array) )
    {
        foreach( $array as $keys => $values )
            {
                $values = htmlspecialchars($values);
            }
    }
    
    global $pdo;
    $query = $pdo->prepare($sqlQuery);
    $query->execute($array);

    return $query->fetchAll(PDO::FETCH_ASSOC);
}
	
// requête fetch
function queryOne( $sqlQuery, array $array = array() ) 
    {
        if ( !empty($array) )
        {
            foreach( $array as $keys => $values )
                {
                    $values = htmlspecialchars($values);
                }
        }
        
        global $pdo;
        $query = $pdo->prepare($sqlQuery);
        $query->execute($array);

        return $query->fetch(PDO::FETCH_ASSOC);
    }