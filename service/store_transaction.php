<?php

use common\Entity;

include_once(dirname(__DIR__) . '/common/Entity.php');

$entity = new Entity();

$mockApiUrl = "http://localhost:80/jamijoy-tran-app/transaction-mock";

if (!isset($_GET['user_id']) or !isset($_GET['amount'])){

    $headers = [
        "X-Mock-Status: 500",
    ];
}else{
    $last_id = '';
    $sql = "INSERT INTO transaction_details (amount, user_id, status, datetime) VALUES (:amount, :user_id, :status, :datetime)";
    $statement = $entity->getConnection()->prepare($sql);
    $statement->bindValue(':amount', $_GET['amount']);
    $statement->bindValue(':user_id', $_GET['user_id']);
    $statement->bindValue(':status', 'pending');
    $statement->bindValue(':datetime', $entity->getDatetime());
    $statement->execute();
    $num = $statement->rowCount();
    if ($num == 1) {

        $last_id = $entity->getConnection()->lastInsertId();


        $headers = [
            "X-Mock-Status: 200", // instial response
            "X-Transaction-ID: ".$last_id,
            "X-Transaction-Status: pending"
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