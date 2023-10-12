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
if ($num == 1) {
    $row = $statement->fetch(PDO::FETCH_ASSOC);
    $status = $row['status'];
}
echo 'status for payment > '.$status . ' at ' . $entity->getDatetime();