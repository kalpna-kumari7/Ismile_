<?php  
session_start();
$doctor_name = "Dr. Aman"; // You can dynamically fetch or set this value.
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Doctor Dashboard</title>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="doc.css">
  <style>
    body {
      margin: 0;
      font-family: Arial, sans-serif;
    }

    .sidebar {
      background-color: #343a40;
      color: white;
      width: 100%;
      padding: 15px 20px;
      position: relative;
    }

    .sidebar .profile-pic img {
      width: 50px;
      height: 50px;
      border-radius: 50%;
    }

    .sidebar h2 {
      color: #fff;
      margin: 10px 0 15px;
    }

    .sidebar ul {
      list-style-type: none;
      padding: 0;
      display: flex;
      flex-wrap: wrap;
      gap: 20px;
    }

    .sidebar ul li {
      display: inline;
    }

    .sidebar ul li a {
      color: #fff;
      text-decoration: none;
      padding: 10px 15px;
      display: inline-block;
    }

    .sidebar ul li a:hover {
      background-color: #495057;
      border-radius: 5px;
    }

    .main-content {
      padding: 20px;
    }

    .footer {
      background-color: rgb(67, 177, 135);
      color: #fff;
      padding: 10px 10px;
      width: 100%;
      text-align: center;
      position: static;
      bottom: 0;
      margin-top: 30px;
    }
  </style>
</head>

<body>

  <!-- Sidebar -->
  <nav class="sidebar">
    <div class="d-flex align-items-center">
      <div class="profile-pic me-3">
        <img src="docpic.jpg" alt="Profile Picture">
      </div>
      <h2><?php echo $doctor_name; ?></h2>
    </div>
    <ul>
      <li><a href="docdash.php"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
      <li><a href="#"><i class="fas fa-user-md"></i> Profile</a></li>
      <li><a href="viewpatient.php"><i class="fas fa-newspaper"></i> View Patient</a></li>
      <li><a href="#"><i class="fas fa-envelope"></i> Requests</a></li>
      <li><a href="#"><i class="fas fa-star"></i> Reviews</a></li>
      <li><a href="fees.php"><i class="fas fa-edit"></i> Consultant Fee</a></li>
      <li><a href="patientform.php"><i class="fas fa-calendar-alt"></i> Appointment</a></li>
      <li><a href="loginmain.php"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
    </ul>
  </nav>

  <!-- Main Content -->
  <div class="main-content">
    <header>
      <h1>Welcome Back, <?php echo $doctor_name; ?>!</h1>
      <p>Manage your doctor profile, check stats, or write an article directly from here.</p>
    </header>

    <!-- Stats Section -->
    <div class="row mt-4">
      <div class="col-md-4">
        <div class="card text-center p-3">
          <h5>Total Patients</h5>
          <p class="display-4">2000+</p>
          <p>Till Today</p>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card text-center p-3">
          <h5>Today Patients</h5>
          <p class="display-4">68</p>
          <p>21 Dec 2021</p>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card text-center p-3">
          <h5>Today Appointments</h5>
          <p class="display-4">85</p>
          <p>21 Dec 2021</p>
        </div>
      </div>
    </div>

    <!-- Additional Cards -->
    <div class="row mt-4">
      <div class="col-md-6">
        <div class="card text-center p-3">
          <h5>Today's Appointment </h5>
          <p class="display-6">Upcoming: 45</p>
          <p>Completed: 40</p>
        </div>
      </div>
      <div class="col-md-6">
        <div class="card text-center p-3">
          <h5>Appointment Requests</h5>
          <p class="display-6">Pending: 12</p>
          <p>New Requests Today: 8</p>
        </div>
      </div>
    </div>

    <!-- Footer Section -->
    <footer class="footer">
      <p>&copy; All rights reserved SSS company.</p>
    </footer>
  </div>
</body>

</html>
