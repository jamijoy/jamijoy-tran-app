<?php

$mockApiUrl = "http://localhost:80/jamijoy-tran-app/transaction-mock";


$headers = [
    "X-Mock-Status: 200", // instial response
    "X-Transaction-ID: 9001"
];

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