<?php 
include 'DataBase.php';
session_start();
$sess = $_SESSION['username'];
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
            <h1>Hello <?php echo $sess ; ?> </h1>
            <h3>Welcome to TaxBridge</h1>
            <p id="client">Your trusted partner in simplifying taxation and financial management.</p>

        <form action="ClientProcess.php" method="post" enctype="multipart/form-data">
            <label for="file">File</label>
            <input type="file" name="file" id="file"><br>
            <label for="message">Message</label>
            <textarea id="message" name="message" rows="4" ></textarea><br>
            <input type="submit" value="Upload">
        </form>

        <a href="ClientLogin.php"><button>Logout</button></a>
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