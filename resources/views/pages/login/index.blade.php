<?php
// Start the session to manage login states
session_start();

// Simple in-memory "database" to store users (for demo purposes only, replace with a real database in production)
$users = [
    ["username" => "john", "email" => "john@example.com", "password" => "password123"],
];

// Handle Registration
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['register'])) {
    $username = $_POST['registerUsername'];
    $email = $_POST['registerEmail'];
    $password = $_POST['registerPassword'];

    // Simple password validation (ensure password length is at least 6 characters)
    if (strlen($password) < 6) {
        $registerError = 'Password must be at least 6 characters long.';
    } else {
        // Check if username already exists
        foreach ($users as $user) {
            if ($user['username'] === $username) {
                $registerError = 'Username already taken.';
                break;
            }
        }

        // If no errors, add the new user to the "database"
        if (!isset($registerError)) {
            $users[] = ['username' => $username, 'email' => $email, 'password' => $password];
            $registerSuccess = 'Registration successful!';
        }
    }
}

// Handle Login
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login'])) {
    $username = $_POST['loginUsername'];
    $password = $_POST['loginPassword'];

    // Check if the credentials match any user in the "database"
    $loginError = null;
    $loginSuccess = null;
    foreach ($users as $user) {
        if ($user['username'] === $username && $user['password'] === $password) {
            $_SESSION['username'] = $username;  // Store username in session for login state
            $loginSuccess = 'Login successful!';
            break;
        }
    }

    if (is_null($loginSuccess)) {
        $loginError = 'Invalid username or password.';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login and Registration</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            background-image: url('file:///C:/Users/HP/Downloads/Background.jpg');
            background-size: cover;
            background-position: center;
        }
        .container {
            width: 300px;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            background: rgba(255, 255, 255, 0.8);
            border-radius: 8px;
        }
        h2 {
            text-align: center;
        }
        input[type="text"],
        input[type="password"],
        input[type="email"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        button {
            width: 100%;
            padding: 10px;
            background: #28a745;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        button:hover {
            background: #218838;
        }
        .error {
            color: red;
            text-align: center;
        }
        .success {
            color: green;
            text-align: center;
        }
        .toggle-button {
            background: #007bff;
            color: white;
            border: none;
            border-radius: 4px;
            padding: 10px;
            cursor: pointer;
            margin-bottom: 20px;
            width: 100%;
        }
        .toggle-button:hover {
            background: #0056b3;
        }
    </style>
</head>
<body>

    <!-- Login Form -->
    <div class="container" id="loginContainer" <?php if (isset($_POST['register']) || isset($_POST['login'])) { echo 'style="display:none;"'; } ?>>
        <h2>Login</h2>
        <form action="" method="POST">
            <input type="text" name="loginUsername" placeholder="Username" required>
            <input type="password" name="loginPassword" placeholder="Password" required>
            <button type="submit" name="login">Login</button>
        </form>
        <?php if (isset($loginError)) { echo '<p class="error">' . $loginError . '</p>'; } ?>
        <?php if (isset($loginSuccess)) { echo '<p class="success">' . $loginSuccess . '</p>'; } ?>
        <button class="toggle-button" onclick="toggleForms('register')">Don't have an account? Register</button>
    </div>

    <!-- Registration Form -->
    <div class="container" id="registerContainer" <?php if (!isset($_POST['register']) && !isset($_POST['login'])) { echo 'style="display:none;"'; } ?>>
        <h2>Register</h2>
        <form action="" method="POST">
            <input type="text" name="registerUsername" placeholder="Username" required>
            <input type="email" name="registerEmail" placeholder="Email" required>
            <input type="password" name="registerPassword" placeholder="Password" required>
            <button type="submit" name="register">Register</button>
        </form>
        <?php if (isset($registerError)) { echo '<p class="error">' . $registerError . '</p>'; } ?>
        <?php if (isset($registerSuccess)) { echo '<p class="success">' . $registerSuccess . '</p>'; } ?>
        <button class="toggle-button" onclick="toggleForms('login')">Already have an account? Login</button>
    </div>

    <script>
        // Toggle between login and registration forms
        function toggleForms(form) {
            if (form === 'register') {
                document.getElementById('loginContainer').style.display = 'none';
                document.getElementById('registerContainer').style.display = 'block';
            } else {
                document.getElementById('loginContainer').style.display = 'block';
                document.getElementById('registerContainer').style.display = 'none';
            }
        }
    </script>

</body>
</html>
