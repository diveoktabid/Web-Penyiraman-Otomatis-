// Fetch data from fetch_data.php
function fetchData() {
    fetch("fetch_data.php")
        .then(response => response.json())
        .then(data => {
            document.getElementById("temperature").textContent = `Suhu: ${data.temperature} °C`;
            document.getElementById("humidity").textContent = `Kelembapan Udara: ${data.humidity} %`;
            document.getElementById("soil-moisture").textContent = `Kelembapan Tanah: ${data.soilMoisture} %`;
            document.getElementById("pump-status").textContent = `Status Pompa: ${data.pumpStatus ? "Hidup" : "Mati"}`;
            updateChart(data.history);
        });
}

// Update chart
function updateChart(history) {
    const labels = history.map(item => item.timestamp);
    const data = history.map(item => item.soilMoisture);

    chart.data.labels = labels;
    chart.data.datasets[0].data = data;
    chart.update();
}

// Initialize Chart.js
const ctx = document.getElementById("historicalChart").getContext("2d");
const chart = new Chart(ctx, {
    type: "line",
    data: {
        labels: [],
        datasets: [{
            label: "Kelembapan Tanah",
            backgroundColor: "rgba(75, 192, 192, 0.2)",
            borderColor: "rgba(75, 192, 192, 1)",
            borderWidth: 2,
            data: []
        }]
    },
    options: {
        responsive: true
    }
});

// Manual control buttons
document.getElementById("pumpOn").addEventListener("click", () => {
    controlPump(1);
});

document.getElementById("pumpOff").addEventListener("click", () => {
    controlPump(0);
});

function controlPump(status) {
    fetch("update_pump_status.php", {
        method: "POST",
        headers: { "Content-Type": "application/x-www-form-urlencoded" },
        body: `pumpStatus=${status}`
    }).then(response => response.text()).then(alert);
}

// Fetch data every 10 seconds
setInterval(fetchData, 10000);
fetchData();
