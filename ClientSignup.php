<?php
include 'DataBase.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user = $_POST['username'];
    $password = $_POST['password'];
    $user = mysqli_real_escape_string($conn, $user);
    $password = mysqli_real_escape_string($conn, $password);

    if (empty($user) || empty($password)) {
        echo 'Please enter username and password!';
    } else {
        $sql = "INSERT INTO clientlogin (username, password) VALUES ('$user', '$password')";
        mysqli_query($conn, $sql);
        echo "You are registered!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tax Bridge - Client SignUp</title>
    <link rel="stylesheet" href="styles.css">
    <style>
    .back-button {
        display: block;
        margin: 0 auto;
        width: fit-content;
    }
    </style>
    <link rel="icon" type="image/png" href="Images/logo.png">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="wrapper">
    <header class="bg-dark text-white text-center py-3">
        <div class="logo">
            <img src="Images/logo.png" alt="Your Logo" class="img-fluid">
        </div>
    </header>
    <br>

    <div class="content mt-5">
        <form action="ClientSignup.php" method="post" class="mx-auto" style="max-width: 400px;">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" name="username" id="username" class="form-control">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" class="form-control">
            </div>
            <input type="submit" value="Signup" class="btn btn-dark btn-block">
        </form>
        <a href="Admin.php" class="btn btn-danger btn-block btn-sm mt-2 col-2 back-button">Back</a>
    </div>

    <footer class="bg-dark text-white text-center py-3 mt-5">
            <div class="footer-content">
                <div class="footer-section about">
                    <h2>About Us</h2>
                    <p>Welcome to TaxBridge, where we simplify taxation and financial management with innovative tools and expert support for a seamless client-accountant experience.</p>
                </div>
                <div class="footer-section contact">
                    <h2>Contact Us</h2>
                    <p>Email: contact@taxbridge.com</p>
                    <p>Phone: +212 524 88 ** **</p>
                </div>
            </div>
            <div class="footer-bottom">
                &copy; 2024 TaxBridge | All Rights Reserved
            </div>
        </footer>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
