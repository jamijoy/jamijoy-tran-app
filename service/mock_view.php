<?php

$mockStatus = isset($_SERVER['HTTP_X_MOCK_STATUS']) ? $_SERVER['HTTP_X_MOCK_STATUS'] : "200";
header('Content-Type: application/json');

$responseData = [
    "message" => "Mock response for transaction api - GENERAL MESSAGE",
];

if ($mockStatus === "200") {

    http_response_code(200);
    $responseData["status"] = "accepted";
    $responseData["transaction_id"] = isset($_SERVER['HTTP_X_TRANSACTION_ID']) ? $_SERVER['HTTP_X_TRANSACTION_ID'] : "N/A";
    $responseData["transaction_status"] = isset($_SERVER['HTTP_X_TRANSACTION_STATUS']) ? $_SERVER['HTTP_X_TRANSACTION_STATUS'] : "N/A";
} elseif ($mockStatus === "400") {

    http_response_code(400);
    $responseData["status"] = "failed";
    $responseData["error_message"] = "Bad Request";
} else {

    http_response_code(500);
    $responseData["status"] = "error";
    $responseData["error_message"] = "Internal Server Error";
}


echo json_encode($responseData);