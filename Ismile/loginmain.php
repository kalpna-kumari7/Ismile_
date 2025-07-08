<?php
include("config.php");
?>
<!DOCTYPE html>
<html lang="en">
    
<head>
    <title>Login </title>
    <link rel="stylesheet" href="login.css">
    <link rel="stylesheet" href="login.php">
</head>

<body>
    <div class="background">
        <div class="login-container">
            <div class="login-header">
                <h2> Login </h2>
                <p>You are almost done! One more step.</p>
            </div>
            <form action="" method="POST">
                <div class="progress-bar">
                    <div class="step active"></div>
                    <div class="step"></div>
                    <div class="step"></div>
                </div>
                <div class="input-group">
                    <label for="username"><i class="icon-user"></i></label>
                    <input type="text" name="username" id="username" placeholder="Username" required>
                </div>
                <div class="input-group">
                    <label for="password"><i class="icon-lock"></i></label>
                    <input type="password" name="password" id="password" placeholder="Password" required>
                </div>
                <div class="input-group">
                    <label for="role"><i class="icon-lock"></i></label>
                    <select name="role" id="role" name="role" required>
                        <option value="" disabled selected>User type</option>
                        <option value="admin">Admin</option>
                        <option value="doctor">Doctor</option>
                        <option value="patient">Patient</option>
                    </select>
                </div>
                <label>
                    <input type="checkbox" name="remember"> Remember Me
                </label><br>
                <button type="submit" class="btn-login" name="submit">LOGIN</button>

                <div class="options">

                    <a href="forgotpass.php">Forgot Password?</a>
                </div>
            </form>
            <div class="signup">
                <p>Want a new account?</p>
                <a href="register.php" class="btn-signup">Sign Up</a>
            </div>
        </div>
   <?php
if (isset($_POST['submit'])) {
    // Retrieve form inputs
    $email = trim($_POST['username']);
    $password = $_POST['password']; // Keep the raw password here
    $role = $_POST['role'];

    // Validate inputs
    if (empty($email) || empty($password) || empty($role)) {
        echo "<font color=red>All fields are required!</font>";
    } else {
        // SQL query to fetch user details based on email, role, and status
        $status = 'Active';
        $stmt = $con->prepare("SELECT * FROM login WHERE email = ? AND  role = ? AND status = ?");
        $stmt->bind_param("sss", $email, $role, $status);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($row = $result->fetch_assoc()) {
            // Use password_verify to compare raw password with hashed password
            if (password_verify($password, $row['password'])) {
                // Save user session data
                $_SESSION["loggedin-user"] = $row['email'];
                $_SESSION["user-role"] = $row['role'];

                echo "<script>window.location='docdash.php';</script>";
            } else {
               echo "<script>alert('Invalid password!');</script>";

            }
        } else {
            echo "<script>alert('Invalid username, role, or account is inactive!');</script>";
        

        $stmt->close();
    }
}
}
?>

    </div>

</body>

</html>