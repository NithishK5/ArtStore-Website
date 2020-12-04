<?php

require_once "database.php";

function getArtworks()
{
    $conexion = getConexion();
    $stmt = $conexion->prepare('select * from artwork');
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $stmt->execute();
    return $stmt->fetchAll();

}
function getOrders()
{
    $conexion = getConexion();
    $stmt = $conexion->prepare('select * from `artwork` as a inner join `order` as b on  a.id=b.artwork_id');
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $stmt->execute();
    return $stmt->fetchAll();

}

function setOrder($data)
{
    try {
        $id = (int) $data['id'];
        $conexion = getConexion();
        $stmt = $conexion->prepare('INSERT INTO  `order`(`artwork_id`, `name`, `phone_number`, `email`, `postal_address`) values (?,?,?,?,?)');
        $stmt->bindParam(1, $id);
        $stmt->bindParam(2, $data['name']);
        $stmt->bindParam(3, $data['phone_number']);
        $stmt->bindParam(4, $data['email']);
        $stmt->bindParam(5, $data['postal_address']);
        $stmt->execute();
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}

function getArtwork($id)
{
    $product = [];
    $producs = getProducts();
    for ($i = 0; count($producs) > $i; $i++) {
        if ($producs[$i]['id'] == $id) {
            $product = $producs[$i];
        }
    }
    return $product;
}
