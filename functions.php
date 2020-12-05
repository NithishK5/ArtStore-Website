<?php

require_once "database.php";

function getArtworks($limit, $currentPage)
{
    $connection = getConnection();
    $stmt = $connection->prepare('select * from artwork limit ? offset ?');
    $stmt->bindParam(1, $limit, PDO::PARAM_INT);
    $stmt->bindParam(2, $currentPage, PDO::PARAM_INT);
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $stmt->execute();
    return $stmt->fetchAll();

}

function getOrders()
{
    $connection = getConnection();
    $stmt = $connection->prepare('select *, a.name as name1 from `artwork` as a inner join `order` as b on  a.id=b.artwork_id');
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $stmt->execute();
    return $stmt->fetchAll();

}

function getAppointments()
{
    $connection = getConnection();
    $stmt = $connection->prepare('select * from `appointment`');
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $stmt->execute();
    return $stmt->fetchAll();

}

function setOrder($data)
{
    try {
        $id = (int)$data['id'];
        $connection = getConnection();
        $stmt = $connection->prepare('INSERT INTO  `order`(`artwork_id`, `name`, `phone_number`, `email`, `postal_address`) values (?,?,?,?,?)');
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

function setAppointment($data)
{
    try {
        $connection = getConnection();
        $stmt = $connection->prepare('INSERT INTO  `appointment`(`name`, `phone_number`, `date`, `postal_address`) values (?,?,?,?)');
        $stmt->bindParam(1, $data['name']);
        $stmt->bindParam(2, $data['phone_number']);
        $stmt->bindParam(3, $data['date']);
        $stmt->bindParam(4, $data['postal_address']);
        $stmt->execute();
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}

function getArtwork($id)
{
    $connection = getConnection();
    $stmt = $connection->prepare('select * from artwork where id =?');
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $stmt->bindParam(1, $id);
    $stmt->execute();
    $data = $stmt->fetch();

    $stmt2 = $connection->prepare('select TO_BASE64(image) as image from `artwork_images` where artwork_id = ?');
    $stmt2->setFetchMode(PDO::FETCH_ASSOC);
    $stmt2->bindParam(1, $data['id'], PDO::PARAM_INT);
    $stmt2->execute();
    return ['data' => $data, 'images' => $stmt2->fetchAll()];
}
