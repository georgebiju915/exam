<?php
$apiKey = "YOUR_API_KEY"; // Replace with your OpenWeatherMap API key
$city = $_GET['city'];
$apiUrl = "http://api.openweathermap.org/data/2.5/weather?q=" . urlencode($city) . "&appid=" . $apiKey . "&units=metric";

$response = file_get_contents($apiUrl);
if ($response === FALSE) {
    die('Error occurred while fetching weather data.');
}

$data = json_decode($response, true);
if ($data['cod'] !== 200) {
    echo "City not found.";
    exit();
}

$temperature = $data['main']['temp'];
$weatherCondition = $data['weather'][0]['description'];

echo "<p>Temperature: " . $temperature . "°C</p>";
echo "<p>Condition: " . ucfirst($weatherCondition) . "</p>";
?>