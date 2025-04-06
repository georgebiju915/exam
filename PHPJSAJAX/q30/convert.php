<?php
$apiKey = 'YOUR_API_KEY';
$amount = $_POST['amount'];
$fromCurrency = $_POST['fromCurrency'];
$toCurrency = $_POST['toCurrency'];

$url = "https://v6.exchangerate-api.com/v6/$apiKey/pair/$fromCurrency/$toCurrency/$amount";

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$response = curl_exec($ch);
curl_close($ch);

$data = json_decode($response, true);

if ($data['result'] == 'success') {
    $convertedAmount = $data['conversion_result'];
    echo "<p>$amount $fromCurrency is equal to $convertedAmount $toCurrency</p>";
} else {
    echo "<p>Failed to retrieve conversion rate. Please try again.</p>";
}
?>