<?php
$firebase_url = 'https://penyiramanotomatis-75819-default-rtdb.asia-southeast1.firebasedatabase.app/';
$firebase_secret = 'GgCYEpGKjFOz61XD3dcsg60liwQJQ6ttQqCpLHLN';

$url = $firebase_url . '/SensorData.json?auth=' . $firebase_secret;
$response = file_get_contents($url);
$data = json_decode($response, true);

echo json_encode([
    "temperature" => $data['Temperature'] ?? 0,
    "humidity" => $data['Humidity'] ?? 0,
    "soilMoisture" => $data['SoilMoisture'] ?? 0,
    "pumpStatus" => $data['PumpStatus'] ?? false,
    "history" => $data['History'] ?? []
]);
?>
