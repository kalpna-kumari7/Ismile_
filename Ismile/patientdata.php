<?php include("config.php");










if (isset($_POST['update'])) {
    $patientId = $_POST['update'];
    $newDepartment = $_POST['department'][$patientId];

    // Update the department for the selected patient
    $stmt = $con->prepare("UPDATE patient SET department = ? WHERE id = ?");
    $stmt->bind_param("si", $newDepartment, $patientId);

    if ($stmt->execute()) {
        echo "<script>alert('Department updated successfully!'); window.location.href='patientdata.php';</script>";
    } else {
        echo "<script>alert('Failed to update department.'); window.location.href='patientdata.php';</script>";
    }

    $stmt->close();
    $con->close();
}
?>














<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointment</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
        }
        .dashboard {
            margin: 20px auto;
            width: 90%;
            max-width: 1200px;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        .dashboard-header {
            padding: 15px;
            background-color: rgb(100, 189, 174);
            color: white;
            border-radius: 8px 8px 0 0;
            text-align: center;
            font-size: 24px;
        }
        .dashboard-table {
            width: 100%;
            border-collapse: collapse;
        }
        .dashboard-table th, .dashboard-table td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        .dashboard-table th {
            background-color: #f4f4f4;
        }
        .dashboard-table tbody tr:hover {
            background-color: #f1f1f1;
        }
        .update-btn {
            background-color: #007bff;
            color: white;
            padding: 5px 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .update-btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="dashboard">
        <div class="dashboard-header">
            Appointment
        </div>
        <form method="POST" action="">
            <table class="dashboard-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>DOB</th>
                        <th>Gender</th>
                        <th>Phone No.</th>
                        <th>WhatsApp</th>
                        <th>Email</th>
                        <th>Problem</th>
                        <th>Department</th>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Update</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT * FROM `patient`";
                    $result = mysqli_query($con, $sql);
                    while ($row = mysqli_fetch_array($result)) {
                        ?>
                        <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['name']; ?></td>
                            <td><?php echo $row['dob']; ?></td>
                            <td><?php echo $row['gender']; ?></td>
                            <td><?php echo $row['phone']; ?></td>
                            <td><?php echo $row['whatsApp']; ?></td>
                            <td><?php echo $row['email']; ?></td>
                            <td><?php echo $row['problem']; ?></td>
                            <td>
                                <select name="department[<?php echo $row['id']; ?>]" required>
                                    <option value="General" <?php echo $row['department'] == 'General' ? 'selected' : ''; ?>>General</option>
                                    <option value="Endodontics" <?php echo $row['department'] == 'Endodontics' ? 'selected' : ''; ?>>Endodontics</option>
                                    <option value="Periodontics" <?php echo $row['department'] == 'Periodontics' ? 'selected' : ''; ?>>Periodontics</option>
                                    <option value="Orthodontics" <?php echo $row['department'] == 'Orthodontics' ? 'selected' : ''; ?>>Orthodontics</option>
                                    <option value="Pediatric" <?php echo $row['department'] == 'Pediatric' ? 'selected' : ''; ?>>Pediatric</option>
                                </select>
                            </td>
                            <td><?php echo $row['date']; ?></td>
                            <td><?php echo $row['time']; ?></td>
                            <td>
                                <button type="submit" name="update" value="<?php echo $row['id']; ?>" class="update-btn">Update</button>
                            </td>
                        </tr>
                        <?php
                    }
                    ?>
                </tbody>
            </table>
        </form>
    </div>
</body>
</html>
