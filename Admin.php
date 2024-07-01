<?php 
include 'DataBase.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
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
        <a href="ClientSignup.php"><button>Create new client account</button></a>
        <a href="AdminLogin.php"><button>Logout</button></a>
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