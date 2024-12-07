<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Penyiraman Otomatis</title>
    <!-- Link ke CSS -->
    <link rel="stylesheet" href="style.css">
    <!-- Link ke JavaScript eksternal -->
    <script src="script.js" defer></script>
    <!-- Chart.js -->
    <script src="js/chart.min.js" defer></script>
    <!-- Font Roboto -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">

</head>
<body>
    <div class="container">
        <h1>Penyiraman Tanaman Otomatis</h1>

        <div class="sensor-data">
            <h3>Data Sensor</h3>
            <!-- Data Dinamis dari JavaScript -->
            <p id="temperature">
                Suhu: <span id="tempValue">-</span>
            </p>
            <p id="humidity">
                Kelembapan Udara: <span id="humidityValue">-</span>
            </p>
            <p id="soil-moisture">
                Kelembapan Tanah: <span id="soilMoistureValue">-</span>
            </p>
            <p id="pump-status">
                Status Pompa: <span id="pumpStatusValue">-</span>
            </p>
        </div>

        <div class="pump-control">
            <h3>Kontrol Pompa Manual</h3>
            <button id="pumpOn" class="btn btn-success">Nyalakan Pompa</button>
            <button id="pumpOff" class="btn btn-danger">Matikan Pompa</button>
        </div>

        <div class="chart-container">
            <h3>Grafik Data Historis</h3>
            <canvas id="historicalChart"></canvas>
        </div>
    </div>
</body>
</html>
