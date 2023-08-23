<?php
    define('DB_HOST','localhost:8889');
    define('DB_USER','test');
    define('DB_PASSWORD','test');
    define('DB_NAME','code_pills');

    $hostDB = "mysql:host=".DB_HOST.";dbname=".DB_NAME.";";

    try{
        $connectDB = new PDO($hostDB,DB_USER,DB_PASSWORD);
        $connectDB->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e){
        die("ERROR: No se pudo conectar a la base de datos ".$e->getMessage());
    }
?>