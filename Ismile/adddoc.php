<?php
include("config.php"); // Ensure this includes your database connection details

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data safely using POST method
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $department = mysqli_real_escape_string($con, $_POST['spacility']);
    $phone = mysqli_real_escape_string($con, $_POST['phone']);
    $qualification = mysqli_real_escape_string($con, $_POST['qualification']);

    // Prepare SQL query to insert data into the `doctor` table
    $sql = "INSERT INTO doctor (`name`, email, department, phone, qualification) 
            VALUES ('$name', '$email', '$department', '$phone', '$qualification')";

    if (mysqli_query($con, $sql)) {
        echo "<script>alert('Doctor added successfully!');</script>";
    } else {
        echo "<script>alert('Error: " . mysqli_error($con) . "');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Doctor</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center">
    <div class="bg-white shadow-lg rounded-lg p-8 w-full max-w-md">
        <h1 class="text-2xl font-bold text-center mb-6">Add Doctor</h1>
        <form action="" method="POST" class="space-y-4">
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                <input 
                    type="text" 
                    id="name" 
                    name="name" 
                    required 
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
            </div>

            <div>
                <label for="spacility" class="block text-sm font-medium text-gray-700">Department</label>
                <select name="spacility" id="spacility" 
                        required 
                        class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                    <option value="Genrel">General</option>
                    <option value="Endodotics">Endodontics</option>
                    <option value="Periodontics">Periodontics</option>
                    <option value="Orthodontics">Orthodontics</option>
                    <option value="Pediatric">Pediatric</option>
                </select>
            </div>

            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input 
                    type="email" 
                    id="email" 
                    name="email" 
                    required 
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
            </div>

            <div>
                <label for="phone" class="block text-sm font-medium text-gray-700">Phone</label>
                <input 
                    type="tel" 
                    id="phone" 
                    name="phone" 
                    required 
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
            </div>

            <div>
                <label for="qualification" class="block text-sm font-medium text-gray-700">Qualification</label>
                <textarea 
                    id="qualification" 
                    name="qualification" 
                    rows="3" 
                    required 
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"></textarea>
            </div>

            <div class="text-center">
                <button 
                    type="submit" 
                    class="w-full bg-indigo-600 text-white py-2 px-4 rounded-md shadow-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    Add Doctor
                </button>
            </div>
        </form>
    </div>
</body>
</html>
