<?php
error_reporting(E_ALL);
ini_set("display_errors", '1');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Database connection
    $conn = new mysqli("localhost", "root", "", "hospital");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Get input values and sanitize
    $email = isset($_POST['email']) ? htmlspecialchars(trim($_POST['email'])) : '';
    $cfee = isset($_POST['cfee']) ? htmlspecialchars(trim($_POST['cfee'])) : '';
    $duration = isset($_POST['duration']) ? htmlspecialchars(trim($_POST['duration'])) : '';
    $date = isset($_POST['date']) ? htmlspecialchars(trim($_POST['date'])) : '';

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO `fee`(`email`, `cfee`, `duration`, `date`) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $email, $cfee, $duration, $date);

    // Execute the statement
    $executionResult = $stmt->execute();

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Doctor Consultant Fees</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 20px;
      padding: 20px;
      background-color: #f5f5f5;
    }
    h1 {
      color: #4CAF50;
    }
    label {
      font-weight: bold;
      display: block;
      margin-top: 10px;
    }
    input, button {
      padding: 10px;
      margin: 5px 0;
      width: 100%;
      box-sizing: border-box;
    }
    button {
      background-color: #4CAF50;
      color: white;
      border: none;
      cursor: pointer;
    }
    button:hover {
      background-color: #45a049;
    }
    .container {
      max-width: 400px;
      margin: 0 auto;
      background: white;
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }
    .success-message, .error-message {
      text-align: center;
      margin-top: 10px;
      font-size: 16px;
    }
    .success-message {
      color: #4CAF50;
    }
    .error-message {
      color: red;
    }
  </style>
</head>
<body>
<div class="container">
  <h1>Hello! Doctor</h1>
  <form method="POST" action="">
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" placeholder="Enter your email" required value="<?php echo isset($email) ? htmlspecialchars($email) : ''; ?>">

    <label for="fee">Consultant Fee:</label>
    <input type="number" id="fee" name="cfee" placeholder="Enter fee" required value="<?php echo isset($cfee) ? htmlspecialchars($cfee) : ''; ?>">

    <label for="duration">Consultation Duration (Months):</label>
    <input type="number" id="duration" name="duration" placeholder="Enter duration" required value="<?php echo isset($duration) ? htmlspecialchars($duration) : ''; ?>">

    <label for="date">Date:</label>
    <input type="date" id="date" name="date" required value="<?php echo isset($date) ? htmlspecialchars($date) : ''; ?>">

    <button type="submit">Update</button>
  </form>
  <?php if ($_SERVER['REQUEST_METHOD'] === 'POST'): ?>
    <?php if ($executionResult): ?>
      <p class="success-message">Details successfully updated!</p>
    <?php else: ?>
      <p class="error-message">Error: Failed to update details.</p>
    <?php endif; ?>
  <?php endif; ?>
</div>
</body>
</html>
