<?php
$firebase_url = 'https://penyiramanotomatis-75819-default-rtdb.asia-southeast1.firebasedatabase.app/';
$firebase_secret = 'GgCYEpGKjFOz61XD3dcsg60liwQJQ6ttQqCpLHLN';

$pumpStatus = $_POST['pumpStatus'];

if (isset($pumpStatus)) {
    $url = $firebase_url . '/PumpControl.json?auth=' . $firebase_secret;
    $data = json_encode(['manual' => true, 'status' => (bool)$pumpStatus]);

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PATCH");
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    echo curl_exec($ch);
    curl_close($ch);
} else {
    echo "Invalid pump status.";
}
?>


