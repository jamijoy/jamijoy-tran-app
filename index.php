<?php

use common\Entity;

include_once(dirname(__DIR__) . '/jamijoy-tran-app/common/Entity.php');

$entity = new Entity();


$status = '';

$sql = "SELECT status FROM transaction_details";
$statement = $entity->getConnection()->prepare($sql);
//$statement->bindValue(':id', $this->id());
$statement->execute();
$num = $statement->rowCount();

echo 'No of transaction alive > ';
print_r($num);
echo ' at ' . $entity->getDatetime();