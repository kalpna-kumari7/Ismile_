<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patients Dashboard</title>
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
            background-color: #007BFF;
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
        .dashboard-footer {
            padding: 10px;
            text-align: center;
            background-color: #f4f4f4;
            border-radius: 0 0 8px 8px;
        }
    </style>
</head>
<body>
    <div class="dashboard">
        <div class="dashboard-header">
           Consultant Fee
        </div>
        <table class="dashboard-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>consultant fee</th>
                    <th>Duration</th>
                    <th>Email</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>400</td>
                    <td>abcd/2gmail.com</td>
                    <td>10:00-10:10</td>
                     <td>13/05/2025</td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>500</td>
                    <td>efgh@gmail.com</td>
                    <td>10:10-10:20</td>
                    <td>13/05/2025</td>
                </tr>
            </tbody>
        </table>
    </div>
</body>
</html>
