<?php
defined('BASEPATH') or exit('No direct script access allowed'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>LilProject.</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- AJAX REALTIME -->

    <script type="text/javascript" src="jquery/jquery.min.js"></script>

    <script>
    $(document).ready(function() {
        // Interval waktu realtime
        setInterval(function() {
            $("#temperature").load("<?= site_url('Monitoring/getTemperature'); ?>");
            $("#humidity").load("<?= site_url('Monitoring/getHumidity'); ?>");
        }, 1000);

    });
    </script>

</head>

<body class="">

    <div class="container text-center mt-5 vh-100">
        <h1>Monitoring Suhu dengan <span class="fw-semibold">Codeigniter 3</span></h1>

        <!-- Card Sensor -->
        <div class="d-flex justify-content-center align-items-center gap-3 mt-5">
            <div class="card text-center">
                <div class="card-header bg-danger text-white">
                    <h2>Temperature</h2>
                </div>
                <div class="card-body">
                    <h1><span id="temperature">0</span>°C</h1>
                </div>
            </div>
            <div class="card text-center">
                <div class="card-header bg-primary text-white">
                    <h2>Humidity</h2>
                </div>
                <div class="card-body">
                    <h1><span id="humidity">0</span>%</h1>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous">
    </script>
</body>

</html>