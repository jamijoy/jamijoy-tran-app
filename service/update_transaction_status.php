<?php

use common\Entity;

include_once(dirname(__DIR__) . '/common/Entity.php');

$entity = new Entity();

$mockApiUrl = "http://localhost:80/jamijoy-tran-app/transaction-mock";

$status = '';

if (!isset($_GET['transaction_id']) or !isset($_GET['status'])){

    $headers = [
        "X-Mock-Status: 500",
    ];
}else if (!in_array($_GET['status'],['accepted','failed'])){

    $headers = [
        "X-Mock-Status: 500",
    ];
}else{
    $last_id = '';
    $sql = "UPDATE transaction_details t SET t.status=:status, t.datetime=:datetime WHERE t.transaction_id=:transaction_id";
    $statement = $entity->getConnection()->prepare($sql);
    $statement->bindValue(':status', $_GET['status']);
    $statement->bindValue(':transaction_id', $_GET['transaction_id']);
    $statement->bindValue(':datetime', $entity->getDatetime());
    $statement->execute();
    $num = $statement->rowCount();
    if ($num == 1) {

        $row = $statement->fetch(PDO::FETCH_ASSOC);
        $status = $_GET['status'];
        $transaction_id = $_GET['transaction_id'];


        $headers = [
            "X-Mock-Status: 200",
            "X-Transaction-ID: ".$transaction_id,
            "X-Transaction-Status: ".$status
        ];
    }else{

        $headers = [
            "X-Mock-Status: 400",
        ];
    }

}


$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $mockApiUrl);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);


$response = curl_exec($ch);


if (curl_errno($ch)) {
    echo 'cURL error: ' . curl_error($ch);
}


curl_close($ch);


echo $response;