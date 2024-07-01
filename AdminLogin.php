<?php 
include 'DataBase.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $user = $_POST['username'];
    $password = $_POST['password']; 

    if (empty($user) || empty($password)) {
        echo 'Please enter username and password!';
    } else {

        $user = mysqli_real_escape_string($conn, $user);
        $password = mysqli_real_escape_string($conn, $password);


        $sql = "SELECT * FROM AdminLogin WHERE username='$user'";
        $result = mysqli_query($conn, $sql);


        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);

            if ($row['password'] == $password && $row['username'] == $user) {
                header("Location: Admin.php");
                exit;
            } else {
                echo 'Incorrect password or username!';
            }
        } else {
            echo 'User not found!';
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tax Bridge</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="icon" type="image/png" href="Images/logo.png">
</head>
<body>

    <div class="wrapper">
        <header>
            <div class="logo">
                <img src="Images/logo.png" alt="Your Logo">
            </div>
        </header>

        <br>

        <div class="content">
            <form action="AdminLogin.php" method="post">
                <label for="username">Username</label>
                <input type="text" name="username" id="username">
                <label for="password">Password</label>
                <input type="password" name="password" id="password">
                <input type="submit" value="Login">
            </form>
        </div>

        <footer>
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

</body>
</html>