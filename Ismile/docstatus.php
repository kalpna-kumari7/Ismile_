<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update and Check Doctor Status</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color:rgb(67, 177, 135);
        }
        .container {
            background: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 400px;
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        form {
            display: flex;
            flex-direction: column;
        }
        label {
            margin-bottom: 5px;
            font-weight: bold;
        }
        input, select, button {
            margin-bottom: 15px;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 16px;
        }
        button {
            background-color: #007bff;
            color: #ffffff;
            cursor: pointer;
        }
        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Update Doctor Status</h2>
        <form id="updateStatusForm">
            <label for="doctorId">Doctor ID:</label>
            <input type="text" id="doctorId" name="doctorId" placeholder="Enter Doctor ID" required>

            <label for="status">Status:</label>
            <select id="status" name="status" required>
                <option value="">--Select Status--</option>
                <option value="Available">Available</option>
                <option value="Unavailable">Unavailable</option>
                <option value="On Leave">On Leave</option>
            </select>

            <button type="submit">Update Status</button>
        </form>

        <h2>Check Doctor Status</h2>
        <form id="checkStatusForm">
            <label for="checkDoctorId">Doctor ID:</label>
            <input type="text" id="checkDoctorId" name="checkDoctorId" placeholder="Enter Doctor ID" required>

            <button type="button" onclick="checkStatus()">Check Status</button>
        </form>

        <div id="statusResult" style="margin-top: 20px; font-weight: bold;"></div>
    </div>

    <script>
        document.getElementById('updateStatusForm').addEventListener('submit', function(event) {
            event.preventDefault();

            const doctorId = document.getElementById('doctorId').value;
            const status = document.getElementById('status').value;

            // Here, you would send an update request to your server
            console.log(`Updating Doctor ID: ${doctorId} with Status: ${status}`);
            alert(`Doctor ID: ${doctorId} status updated to: ${status}`);
        });

        function checkStatus() {
            const doctorId = document.getElementById('checkDoctorId').value;

            // Here, you would fetch the doctor's status from your server
            console.log(`Checking status for Doctor ID: ${doctorId}`);
            // Mocked response for demonstration
            const mockedStatus = "Available";

            document.getElementById('statusResult').textContent = `Doctor ID: ${doctorId} is currently: ${mockedStatus}`;
        }
    </script>
</body>
</html>