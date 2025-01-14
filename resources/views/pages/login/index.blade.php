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

    <div class="container" id="loginContainer">
        <h2>Login</h2>
        <form method="POST" action="">
            <input type="text" name="loginUsername" placeholder="Username" required>
            <input type="password" name="loginPassword" placeholder="Password" required>
            <button type="submit" name="login">Login</button>
        </form>
        <p class="error"><?php if (isset($loginError)) echo $loginError; ?></p>
        <button class="toggle-button" onclick="toggleForms('register')">Don't have an account? Register</button>
    </div>

    <div class="container" id="registerContainer" style="display:none;">
        <h2>Register</h2>
        <form method="POST" action="">
            <input type="text" name="registerUsername" placeholder="Username" required>
            <input type="email" name="registerEmail" placeholder="Email" required>
            <input type="password" name="registerPassword" placeholder="Password" required>
            <button type="submit" name="register">Register</button>
        </form>
        <p class="error"><?php if (isset($registerError)) echo $registerError; ?></p>
        <button class="toggle-button" onclick="toggleForms('login')">Already have an account? Login</button>
    </div>

    <script>
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

    <?php
    $users = [
        ['username' => 'testuser', 'password' => 'password123'],
    ];

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['login'])) {
            $loginUsername = $_POST['loginUsername'];
            $loginPassword = $_POST['loginPassword'];
            $foundUser = false;
            foreach ($users as $user) {
                if ($user['username'] === $loginUsername && $user['password'] === $loginPassword) {
                    echo "<script>alert('Login successful!');</script>";
                    $foundUser = true;
                    break;
                }
            }
            if (!$foundUser) {
                $loginError = "Invalid username or password.";
            }
        } elseif (isset($_POST['register'])) {
            $registerUsername = $_POST['registerUsername'];
            $registerEmail = $_POST['registerEmail'];
            $registerPassword = $_POST['registerPassword'];
            if (strlen($registerPassword) < 6) {
                $registerError = "Password must be at least 6 characters long.";
            } else {
                echo "<script>alert('Registration successful!');</script>";
            }
        }
    }
    ?>
</body>
</html>
