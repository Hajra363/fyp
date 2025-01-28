<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Smart Attendance Tracker</title>
    <link rel="stylesheet" href="attend.css">
</head>
<body>
    <?php include 'navbar.html'; ?>
    <div class="container">
        <!-- Attendance Section with Border -->
        <section id="attendance-section" class="section-border">
            <h2>Mark Attendance</h2>

            <!-- Live Camera Feed Section -->
            <section id="camera-section" class="section-border">
                <h3>Live Camera Feed</h3>
                <div class="camera-preview">
                    <video id="liveCamera" autoplay></video>
                </div>
                <button id="mark-attendance-button">Mark Attendance</button>
            </section>

            <hr>

            <!-- Attendance Record Table with Border -->
            <h3>Attendance Records</h3>
            <div class="table-border">
                <table>
                    <thead>
                        <tr>
                            <th>Timestamp</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody id="attendance-list-body">
                        <!-- List of attendance records will be displayed here -->
                    </tbody>
                </table>
            </div>
        </section>
    </div>

    <script>
        // Live Camera Feed
        const liveCamera = document.getElementById('liveCamera');
        const markAttendanceButton = document.getElementById('mark-attendance-button');
        const attendanceListBody = document.getElementById('attendance-list-body');

        // Access the camera feed
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

        // Mark Attendance
        markAttendanceButton.addEventListener('click', () => {
            // Get the current timestamp
            const timestamp = new Date().toLocaleString();

            // Add a new row to the attendance records table
            const newRow = `
                <tr>
                    <td>${timestamp}</td>
                    <td>Present</td>
                </tr>
            `;
            attendanceListBody.innerHTML += newRow;
        });
    </script>
</body>
</html>
