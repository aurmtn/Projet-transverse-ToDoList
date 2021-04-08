<?php

$DB_DSN = 'mysql:host=localhost';
$DB_USER = 'root';
$DB_PASS = '';
$options = 

    [   //Pour être sur que les données soit en UTF8. 
        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
        //Traitement des erreurs.
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        //évite les requets preparé
        PDO:: ATTR_EMULATE_PREPARES => false,
    ];

?>