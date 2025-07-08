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
    $date = $_POST['appointment_date'];
    $time = $_POST['appointment_time'];

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO `patient`(`name`, `date`, `time`) VALUES (?,?,?)");
    $stmt->bind_param("sss", $name, $date, $time);

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
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

</head>
<style>
  .heading {
    background-color: black;
  }

  .footer {
    background-color: green;
    color: #fff;
    padding: 20px 30px;
    width: 100%;
    height: 50px;
    text-align: center;
    position: static;
    bottom: 0;
    margin-top: 200px;

  }
</style>

<body>
  <header>
    <div>
      <nav class="heading">
        <a><img src="head.jpg" class="img-fluid" alt="image"></a>
      </nav>
    </div>
  </header>

  <div class="container-fluid">
    <div class="row">
      <!-- Sidebar -->
      <div class="col-md-3 bg-light sidebar">
        <div class="text-center py-4">
          <img src="docpic.jpg" alt="Doctor" class="rounded-circle" width="150">
          <h4 class="mt-3">Dr. Nausherwan Nehal</h4>
          <p> BDS (BIDSH)</p>
        </div>
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link active" href="admindash.php">
              <i class="fas fa-tachometer-alt"></i> Dashboard
            </a>
          </li><br>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <i class="fas fa-user"></i> Profile
            </a>
          </li><br>
          <li class="nav-item">
            <a class="nav-link" href="forgotpass.php">
              <i class="fas fa-key"></i> Password change
            </a>
          </li><br>
          <li class="nav-item">
            <a class="nav-link" href="patientdata.php">
              <i class="fas fa-calendar-alt"></i> Appointment
            </a>
          </li><br>

          <li class="nav-item">
            <a class="nav-link" href="fees.php">
              <i class="fas fa-edit"></i> Consultant Fee
            </a>
          </li><br>
          <li class="nav-item">
            <a class="nav-link" href="docstatus.php">
              <i class="fas fa-user-md"></i>  Doctor Status
            </a>
          </li><br>
          <li class="nav-item">
            <a class="nav-link" href="adddoc.php">
              <i class="fas fa-user-plus"></i> Add Doctor
            </a>
          </li><br>
          <li class="nav-item">
            <a class="nav-link" href="makeadmin.php">
              <i class="fas fa-user-shield"></i> Make Admin
            </a>
          </li><br>
          <li class="nav-item">
            <a class="nav-link" href="loginmain.php">
              <i class="fas fa-sign-out-alt"></i> Logout
            </a>
          </li><br>
        </ul>
      </div>

      <!-- Main Content -->
      <div class="col-md-9">
        <!-- Header -->
        <div class="d-flex justify-content-between align-items-center p-3 bg-white shadow-sm">
          <h3> Welcome to Admin Dashboard</h3>
          <div>
            <button class="btn btn-light"><i class="fas fa-bell"></i></button>
            <button class="btn btn-light"><i class="fas fa-search"></i></button>
          </div>
        </div>

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

        <!-- Charts and Details -->
        <div class="row mt-3">
          <!-- Chart -->
          <div class="col-md-4">
            <div class="card p-3">
              <h5>Patients Summary January 2025</h5>
              <canvas id="patientChart"></canvas>
            </div>
          </div>

          <!-- Today Appointments -->
          <div class="col-md-4">
            <div class="card p-6">
              <h5>Today Appointments</h5>
              <ul class="list-group">
                <li class="list-group-item d-flex justify-content-between align-items-center">
                  Kalpna
                  <span class="badge bg-primary">On Going</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                  Muskan singh
                  <span>12:30 PM</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                  Suhail khan
                  <span>01:00 PM</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                  Kalpna
                  <span class="badge bg-primary">On Going</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                  Muskan singh
                  <span>12:30 PM</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                  Suhail khan
                  <span>01:00 PM</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                  Kalpna
                  <span class="badge bg-primary">On Going</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                  Muskan singh
                  <span>12:30 PM</span>
                </li>

              </ul>
            </div>
          </div>
          <!-- Appointment Request-->
          <div class="col-md-4">
            <div class="card p-6">
              <h5> Appointment Request</h5>
              <ul class="list-group">
                <li class="list-group-item d-flex justify-content-between align-items-center">
                  Kalpna singh
                  <span class="badge bg-primary">On Going</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                  Muskan singh
                  <span>12:30 PM</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                  Suhail khan
                  <span>01:00 PM</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                  Kalyan
                  <span class="badge bg-primary">On Going</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                  Muskan singh
                  <span>12:30 PM</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                  Suhail khan
                  <span>01:00 PM</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                  Kalpna
                  <span class="badge bg-primary">On Going</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                  Muskan singh
                  <span>12:30 PM</span>
                </li>

              </ul>
            </div>
          </div>


          <script>
            const ctx = document.getElementById('patientChart').getContext('2d');
            new Chart(ctx, {
              type: 'doughnut',
              data: {
                labels: ['New Patients', 'Old Patients', 'Total Patients'],
                datasets: [{
                  data: [40, 30, 70],
                  backgroundColor: ['#42a5f5', '#66bb6a', '#ffa726'],
                }]
              }
            });
          </script>

        </div>

        <!-- Footer Section -->

        <footer class="footer">
          <p>&copy; All rights reserved SSS company.</p>

        </footer>
      </div>
    </div>
  </div>

</body>

</html>