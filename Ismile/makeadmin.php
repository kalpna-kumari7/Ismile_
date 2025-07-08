<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Make Admin</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }

        input {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        button {
            width: 100%;
            padding: 10px;
            background-color: #007BFF;
            color: white;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }

        .message {
            text-align: center;
            margin-top: 10px;
            font-size: 14px;
        }

        .error {
            color: red;
        }

        .success {
            color: green;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Create Admin</h1>
        <form id="adminForm">
            <label for="username">Username</label>
            <input type="text" id="username" placeholder="Enter username" required>

            <label for="password">Password</label>
            <input type="password" id="password" placeholder="Enter password" required>

            <label for="confirmPassword">Confirm Password</label>
            <input type="password" id="confirmPassword" placeholder="Confirm password" required>

            <button type="submit">Create Admin</button>
        </form>
        <div id="message" class="message"></div>
    </div>

    <script>
        const form = document.getElementById('adminForm');
        const messageDiv = document.getElementById('message');

        form.addEventListener('submit', function (e) {
            e.preventDefault();

            const username = document.getElementById('username').value.trim();
            const password = document.getElementById('password').value.trim();
            const confirmPassword = document.getElementById('confirmPassword').value.trim();

            if (!username || !password || !confirmPassword) {
                displayMessage('All fields are required.', 'error');
                return;
            }

            if (password !== confirmPassword) {
                displayMessage('Passwords do not match.', 'error');
                return;
            }

            // Simulating an admin creation action
            displayMessage(`Admin '${username}' created successfully!`, 'success');

            // Reset the form
            form.reset();
        });

        function displayMessage(message, type) {
            messageDiv.textContent = message;
            messageDiv.className = `message ${type}`;
        }
    </script>
</body>
</html>
