<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Database connection
    $conn = new mysqli("localhost", "root", "", "hospital");

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Get form data
    $name = $_POST['full_name'];
    $dob = $_POST['dob'];
    $phone = $_POST['contact_number'];
    $whatsApp = $_POST['whatsApp_number'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];
    $problem = $_POST['problem'];
    $Dep = $_POST['Dep'];
    $date = $_POST['appointment_date'];
    $time = $_POST['appointment_time'];

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO `patient`(`name`,`dob`, `phone`, `whatsApp`,`email`, `gender`, `problem`, `department`, `date`, `time`) VALUES (?, ?, ?, ?, ?, ?, ?, ?,?,?)");
    $stmt->bind_param("ssssssssss", $name, $dob, $phone, $whatsApp, $email, $gender, $problem, $Dep, $date, $time);

    // Execute the query
    if ($stmt->execute()) {
        echo "<p class='text-green-600 font-semibold text-center my-4'>Appointment successfully scheduled!</p>";
        // Redirect to another page after successful submission
        header("Location: https://www.ismiledentalcare.in/best-tooth-implants-in-patna.php");
        exit();
    } else {
        echo "<p class='text-red-600 font-semibold text-center my-4'>Error: " . $stmt->error . "</p>";
    }

    // Close connections
    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Appointment Form</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet" />
</head>
<body class="bg-green-100">
    <div class="container mx-auto p-8">
        <div class="max-w-lg mx-auto bg-white p-6 rounded-lg shadow-lg">
            <h2 class="text-2xl font-bold text-gray-800 text-center mb-6">Appointment Form</h2>
            <form action="" method="POST">
                <!-- Full Name -->
                <div class="mb-4">
                    <label for="full_name" class="block text-gray-700 font-medium mb-2">Full Name</label>
                    <input
                        type="text"
                        id="full_name"
                        name="full_name"
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                        required
                    />
                </div>

                <!-- Date of Birth -->
                <div class="mb-4">
                    <label for="dob" class="block text-gray-700 font-medium mb-2">DOB</label>
                    <input
                        type="date"
                        id="dob"
                        name="dob"
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                        required
                    />
                </div>

                <!-- Gender -->
                <div class="mb-4">
                    <label class="block text-gray-700 font-medium mb-2">Gender</label>
                    <div class="flex items-center space-x-4">
                        <label class="inline-flex items-center">
                            <input type="radio" name="gender" value="Male" class="form-radio" required />
                            <span class="ml-2">Male</span>
                        </label>
                        <label class="inline-flex items-center">
                            <input type="radio" name="gender" value="Female" class="form-radio" required />
                            <span class="ml-2">Female</span>
                        </label>
                        <label class="inline-flex items-center">
                            <input type="radio" name="gender" value="Other" class="form-radio" required />
                            <span class="ml-2">Other</span>
                        </label>
                    </div>
                </div>

                <!-- Contact Number -->
                <div class="mb-4">
                    <label for="contact_number" class="block text-gray-700 font-medium mb-2">Contact Number</label>
                    <input
                        type="tel"
                        id="contact_number"
                        name="contact_number"
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                        required
                    />
                </div>

                <!-- WhatsApp Number -->
                <div class="mb-4">
                    <label for="whatsApp_number" class="block text-gray-700 font-medium mb-2">WhatsApp Number</label>
                    <input
                        type="tel"
                        id="whatsApp_number"
                        name="whatsApp_number"
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                        required
                    />
                </div>

                <!-- Email -->
                <div class="mb-4">
                    <label for="email" class="block text-gray-700 font-medium mb-2">Email</label>
                    <input
                        type="email"
                        id="email"
                        name="email"
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                        required
                    />
                </div>

                <!-- Problem -->
                <div class="mb-4">
                    <label for="problem" class="block text-gray-700 font-medium mb-2">Problem</label>
                    <input
                        type="text"
                        id="problem"
                        name="problem"
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                        required
                    />
                </div>

                <!-- Appointment Date and Time -->
                <div class="mb-4">
                    <label for="appointment_date" class="block text-gray-700 font-medium mb-2">Appointment Date</label>
                    <input
                        type="date"
                        id="appointment_date"
                        name="appointment_date"
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                        required
                    />
                </div>
                <div class="mb-4">
                    <label for="appointment_time" class="block text-gray-700 font-medium mb-2">Appointment Time</label>
                    <input
                        type="time"
                        id="appointment_time"
                        name="appointment_time"
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                        required
                    />
                </div>

                <!-- Department -->
                <div class="mb-4">
                    <label for="Dep" class="block text-gray-700 font-medium mb-2">Department</label>
                    <select name="Dep" id="Dep" 
                            class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                            required>
                        <option value="">Select</option>
                        <option value="General">General</option>
                        <option value="Orthodontics">Orthodontics</option>
                        <option value="Periodontics">Periodontics</option>
                        <option value="Pediatric">Pediatric</option>
                        <option value="Endodontics">Endodontics</option>
                    </select>
                </div>

                <!-- Submit Button -->
                <div class="text-center">
                    <button
                        type="submit"
                        class="bg-blue-500 text-white px-6 py-2 rounded-lg shadow hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400"
                    >
                        Submit
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
