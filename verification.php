<?php

// Khalti Transaction verification
// PHP Script 

$token = $_POST['token'];
$amount = $_POST['amount'];

$args = http_build_query(array(
    'token' => $token,
    'amount'  => $amount
));

$url = "https://khalti.com/api/v2/payment/verify/";

# Make the call using API.
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $args);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

$headers = ['Authorization: Key live_secret_key_1bdb45c6293449d08a6e94db8e445278'];
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

// for debug
curl_setopt($ch, CURLINFO_HEADER_OUT, true);

// Response
$response = curl_exec($ch);

$dump = array(
    "curl" => curl_getinfo($ch),
    "khalti" => $response
);

curl_close($ch);

?>