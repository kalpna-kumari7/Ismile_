<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color:rgb(86, 150, 125);
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            background-color:rgb(229, 235, 233);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgb(229, 235, 233);
            width: 100%;
            max-width: 400px;
           
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        form {
            display: flex;
            flex-direction: column;
        }
        label {
            margin-bottom: 5px;
            font-weight: bold;
        }
        input {
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        button {
            padding: 10px;
            background-color: #007BFF;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }
        button:hover {
            background-color: #0056b3;
        }
        .message {
            margin-top: 15px;
            text-align: center;
            color: green;
        }
        .error {
            color: red;
        }
        .back-link {
            text-align: center;
            margin-top: 10px;
        }
        .back-link a {
            text-decoration: none;
            color:rgb(20, 68, 112);
        }
        .back-link a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Forgot Password</h2>
        <form id="forgot-password-form">
            <label for="email">Enter your email address:</label>
            <input type="email" id="email" name="email" placeholder="Your email" required>
            <button type="submit">Reset Password</button>
        </form>
        <div class="message" id="message"></div>
        <div class="back-link">
            <a href="loginmain.php">Back to Login</a>
        </div>
    </div>

    <script>
        document.getElementById('forgot-password-form').addEventListener('submit', function(event) {
            event.preventDefault();

            const email = document.getElementById('email').value;
            const message = document.getElementById('message');

            // Simulated behavior for demo purposes
            if (email) {
                message.textContent = 'A password reset link has been sent to your email.';
                message.classList.remove('error');
            } else {
                message.textContent = 'Please enter a valid email address.';
                message.classList.add('error');
            }
        });
    </script>
</body>
</html>