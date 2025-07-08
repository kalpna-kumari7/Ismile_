<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION["loggedin-user"])) {
    die("Unauthorized access. Please log in.");
}

// Retrieve the email from the session
$email = $_SESSION["loggedin-user"];

// Database connection
$conn = new mysqli("localhost", "root", "", "hospital");

// Check connection
if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
}

// Get the department associated with the email from the `doctor` table
$depQuery = $conn->prepare("SELECT department FROM doctor WHERE email = ?");
$depQuery->bind_param("s", $email);
$depQuery->execute();
$depResult = $depQuery->get_result();

if ($depResult->num_rows > 0) {
    $depRow = $depResult->fetch_assoc();
    $department = $depRow['department'];
} else {
    die("No department found for the logged-in email.");
}

// Retrieve all patients associated with the retrieved department
$patientsQuery = $conn->prepare("
    SELECT id, name, dob, phone, whatsApp, email, gender, problem, department, date, time 
    FROM patient 
    WHERE department = ?
");
$patientsQuery->bind_param("s", $department);
$patientsQuery->execute();
$patients = $patientsQuery->get_result();

// Close database connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Patient Management</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet" />
</head>
<body class="bg-gray-100">
    <div class="container mx-auto p-8">
        <h1 class="text-2xl font-bold text-gray-800 text-center mb-6">Patient Details</h1>

        <!-- Display the logged-in user's email -->
        <p class="text-center text-gray-600 mb-4">Logged in as: <span class="font-semibold"><?= htmlspecialchars($email) ?></span></p>
        
        <!-- Display Patients -->
        <div class="bg-white rounded-lg shadow-lg p-6">
            <h2 class="text-lg font-semibold mb-4">Patient List</h2>
            <?php if ($patients->num_rows > 0): ?>
                <table class="table-auto w-full border-collapse border border-gray-300">
                    <thead>
                        <tr class="bg-gray-200">
                            <th class="border border-gray-300 px-4 py-2">ID</th>
                            <th class="border border-gray-300 px-4 py-2">Name</th>
                            <th class="border border-gray-300 px-4 py-2">DOB</th>
                            <th class="border border-gray-300 px-4 py-2">Phone</th>
                            <th class="border border-gray-300 px-4 py-2">WhatsApp</th>
                            <th class="border border-gray-300 px-4 py-2">Email</th>
                            <th class="border border-gray-300 px-4 py-2">Gender</th>
                            <th class="border border-gray-300 px-4 py-2">Problem</th>
                            <th class="border border-gray-300 px-4 py-2">Department</th>
                            <th class="border border-gray-300 px-4 py-2">Date</th>
                            <th class="border border-gray-300 px-4 py-2">Time</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = $patients->fetch_assoc()): ?>
                            <tr>
                                <td class="border border-gray-300 px-4 py-2"><?= htmlspecialchars($row['id']) ?></td>
                                <td class="border border-gray-300 px-4 py-2"><?= htmlspecialchars($row['name']) ?></td>
                                <td class="border border-gray-300 px-4 py-2"><?= htmlspecialchars($row['dob']) ?></td>
                                <td class="border border-gray-300 px-4 py-2"><?= htmlspecialchars($row['phone']) ?></td>
                                <td class="border border-gray-300 px-4 py-2"><?= htmlspecialchars($row['whatsApp']) ?></td>
                                <td class="border border-gray-300 px-4 py-2"><?= htmlspecialchars($row['email']) ?></td>
                                <td class="border border-gray-300 px-4 py-2"><?= htmlspecialchars($row['gender']) ?></td>
                                <td class="border border-gray-300 px-4 py-2"><?= htmlspecialchars($row['problem']) ?></td>
                                <td class="border border-gray-300 px-4 py-2"><?= htmlspecialchars($row['department']) ?></td>
                                <td class="border border-gray-300 px-4 py-2"><?= htmlspecialchars($row['date']) ?></td>
                                <td class="border border-gray-300 px-4 py-2"><?= htmlspecialchars($row['time']) ?></td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            <?php else: ?>
                <p class="text-gray-600 text-center">No patients found in this department.</p>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>
