<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Health Monitoring</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php include 'navbar.html'; ?>
    <div class="container">
        <!-- Image Upload Section -->
        <section class="upload-section">
            <label for="imageUpload" class="upload-label">Upload Image</label>
            <input type="file" id="imageUpload" accept="image/*" class="upload-input">
        </section>

        <!-- Live Camera Detection Section -->
        <section class="camera-section">
            <h2>Live Camera Feed</h2>
            <div class="camera-preview">
                <video id="liveCamera" autoplay></video>
            </div>
        </section>

        <!-- Results Section (Health Monitoring) -->
        <section class="results-section">
            <!-- Heart Rate Box -->
            <div class="metric-box heart-rate-box">
                <h2>Heart Rate</h2>
                <p id="heartRate">75 BPM</p>
            </div>

            <!-- Blood Pressure Box -->
            <div class="metric-box blood-pressure-box">
                <h2>Blood Pressure</h2>
                <p id="bloodPressure">120/80 mmHg</p>
            </div>

            <!-- Stress Level Box -->
            <div class="metric-box stress-level-box">
                <h2>Stress Level</h2>
                <p id="stressLevel">30%</p>
            </div>
        </section>
    </div>

    <script>
        // Access the live camera feed
        const liveCamera = document.getElementById('liveCamera');

        // Check for media devices support
        if (navigator.mediaDevices && navigator.mediaDevices.getUserMedia) {
            navigator.mediaDevices.getUserMedia({ video: true })
                .then(stream => {
                    liveCamera.srcObject = stream;
                })
                .catch(error => {
                    console.error("Error accessing the camera: ", error);
                });
        } else {
            alert("Camera access is not supported by your browser.");
        }
    </script>
</body>
</html>
