<?php

function getConnection() {
    $dbname = 'pkb18161';
    $user = 'pkb18161';
    $pass = 'thi3ohd1eWa5';
    try {
        $dns = "mysql:host=devweb2020.cis.strath.ac.uk;dbname=$dbname";
        $connection = new PDO($dns, $user, $pass);
        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $connection;
    } catch (PDOException $e){
        echo $e->getMessage();
        return null;
    }
}
