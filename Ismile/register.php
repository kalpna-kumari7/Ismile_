<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $conn = new mysqli("localhost", "root", "", "hospital");

    // Check database connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Get input values and sanitize
    $name = $conn->real_escape_string($_POST['name']);
    $email = $conn->real_escape_string($_POST['email']);
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];

    $Dep = $_POST['spacility'];
    $role = $conn->real_escape_string($_POST['role']);

    // Check if passwords match
    if ($password !== $cpassword) {
        echo "<script>alert('Passwords do not match!');</script>";
    } else if (strlen($password) < 8) { // Ensure strong password
        echo "<script>alert('Password must be at least 8 characters long!');</script>";
    } else {
        // Hash the password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Insert into 'register' table
        $stmt = $conn->prepare("INSERT INTO register (`name`, email, `password`, `status`) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $name, $email, $hashed_password, $role);

        if ($stmt->execute()) {
            // Insert into 'login' table
            $stmt3 = $conn->prepare("INSERT INTO `login` (email, `password`, `role`) VALUES (?, ?, ?)");
            $stmt3->bind_param("sss", $email, $hashed_password, $role);

            if ($stmt3->execute()) {
                // Insert into 'doctor' table if the role is 'doctor'
                if ($role === 'doctor') {
                    $stmt2 = $conn->prepare("INSERT INTO doctor (`name`, email, department) VALUES (?,?, ?)");
                    $stmt2->bind_param("sss", $name, $email,$Dep);

                    if ($stmt2->execute()) {
                        echo "<script>
                            alert('Registration successful! Now you can login.');
                            window.location.href ='loginmain.php';
                        </script>";
                    } else {
                        echo "<script>alert('Failed to register in doctor table: {$stmt2->error}');</script>";
                    }
                    $stmt2->close();
                } else {
                    echo "<script>
                        alert('Registration successful! Now you can login.');
                        window.location.href ='loginmain.php';
                    </script>";
                }
            } else {
                echo "<script>alert('Failed to register in login table: {$stmt3->error}');</script>";
            }
            $stmt3->close();
        } else {
            echo "<script>alert('Failed to register in register table: {$stmt->error}');</script>";
        }
        $stmt->close();
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Registration Form</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: rgb(67, 177, 135);
    }
    .form-container {
      max-width: 500px;
      margin: 50px auto;
      padding: 20px;
      background: #fff;
      border-radius: 8px;
      background-color: rgb(242, 247, 245);
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    }
  </style>
</head>
<body>
  <div class="form-container">
    <h2 class="text-center mb-4">Register</h2>
    <form method="POST" action="">
      <div class="mb-3">
        <label for="name" class="form-label">Full Name</label>
        <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name" required>
      </div>
      <div class="mb-3">
        <label for="email" class="form-label">Email Address</label>
        <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" required>
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


      <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" required>
      </div>
      <div class="mb-3">
        <label for="cpassword" class="form-label">Confirm Password</label>
        <input type="password" class="form-control" id="cpassword" name="cpassword" placeholder="Re-enter your password" required>
      </div>
      <div class="mb-3">
        <label for="role" class="form-label">User Type</label>
        <select class="form-select" id="role" name="role" required>
          <option value="" disabled selected>Select User Type</option>
          <option value="admin">Admin</option>
          <option value="doctor">Doctor</option>
          <option value="patient">Patient</option>
        </select>
      </div>
      <div class="text-center">
        <button type="submit" class="btn btn-primary btn-lg">Register</button>
      </div>
    </form>
  </div>
</body>
</html>
