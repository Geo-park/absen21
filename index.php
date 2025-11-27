<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title> Login </title>
    <link rel="stylesheet" href="aset/login.css" />
</head>

<body>
    <div class="container">

        <!-- LEFT BLUE SLIDE PANEL -->
        <div class="slide-panel" id="slidePanel">
            <div class="panel-content login-panel">
                <h2>Hello, Welcome!</h2>
                <p>Don't have an account?</p>
                <button class="panel-btn" id="showRegister">Register</button>
            </div>

            <div class="panel-content register-panel">
                <h2>Welcome Back!</h2>
                <p>Already have an account?</p>
                <button class="panel-btn" id="showLogin">Login</button>
            </div>
        </div>

        <!-- LOGIN FORM -->
        <form action="login.php" method="POST" class="form-box login-box">
            <center><h2>Login</h2></center>
            <input type="text" name="username" placeholder="Username" required />
            <input type="password" name="password" placeholder="Password" required />
            <button type="submit" name="login">Login</button>
        </form>


        <!-- REGISTER FORM -->
        <form action="register.php" method="POST" class="form-box register-box">
            <center><h2>Registration</h2></center>
            <input type="text" name="username" placeholder="Username" required />
            <input type="email" name="email" placeholder="Email" required />
            <input type="password" name="password" placeholder="Password" required />
            <input type="password" name="confirm_password" placeholder="Confirm Password" required />
            <button type="submit" name="register">Register</button>
        </form>

    </div>

    <script src="aset/script.js"></script>
</body>
</html>
