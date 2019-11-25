<?php

//param pdo
$dataSourceName = 'mysql:host=localhost;dbname=chat_ajax';
$databaseLogin = 'root';
$databasePass = '';
$errmode_utf8 = array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION,
PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
);

$pdo = new PDO($dataSourceName, $databaseLogin, $databasePass, $errmode_utf8);



/**
 * redirectTo perform a redirection and exit the current script
 *
 * @param string $url
 *
 */
function redirectTo(string $url)
{
    header("Location:$url");
    exit();
}

/**
 * prepareExecute
 *
 * @param  string $sqlQuery
 * @param  array $array
 *
 */
function prepareExecute(string $sqlQuery, array $array = array()) 
{

    if ( !empty($array) )
    {
        foreach( $array as $key => $value )
            {
                $array[$key] = htmlspecialchars($value);
            }
    }
    
    global $pdo;
    $query = $pdo->prepare($sqlQuery);
    $query->execute($array);

    if ($query->rowCount() == 0) {
        throw new PDOException("Erreur aucune ligne traitée");
        
    }
    
}


/**
 * queryAll returns several associatives arrays of a query result with variable protection
 *  
 * @param  string $sqlQuery
 * @param  array $array
 *
 * @return array
 */
function queryAll( string $sqlQuery, array $array = array() ) :array {
    
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
	

/**
 * queryOne returns one associative array of a quary result with variables protection
 *
 * @param  string $sqlQuery
 * @param  array $array
 *
 * @return array
 */
function queryOne( string $sqlQuery, array $array = array() ) :array 
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