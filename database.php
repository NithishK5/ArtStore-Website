<?php

function getConexion() {
    $dbname = 'cara_art_db';
    $user = 'root';
    $pass = 'letmein';
    try {
        $dns = "mysql:host=localhost;dbname=$dbname";
        $conexion = new PDO($dns, $user, $pass);
        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conexion;
    } catch (PDOException $e){
        echo $e->getMessage();
        return null;
    }
}
