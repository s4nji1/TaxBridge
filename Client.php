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
    <title>Tax Bridge - <?php echo $sess ; ?> </title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="icon" type="image/png" href="Images/logo.png">
</head>
<body>
<div>
    <header class="bg-dark text-white text-center py-3">
        <div class="logo">
            <img src="Images/logo.png" alt="Your Logo" class="img-fluid" style="height: 60px;">
        </div>
        <div class="container">
            <div class="text-right">
                <?php echo "session opened by " . $sess . "&nbsp;  | "; ?>
                <a href="ClientLogin.php" class="text-danger">&nbsp; Logout</a>
            </div>
        </div>
    </header>

    <div class="content mt-5 text-center">
        <h3>Welcome to TaxBridge</h3>
        <p id="client">Your trusted advisor for simplifying tax and finance.</p>

        <form action="ClientProcess.php" method="post" enctype="multipart/form-data" class="mx-auto" style="max-width: 600px;">
            <div class="form-group">
                <label for="file">File</label>
                <input type="file" name="file" id="file" class="form-control">
            </div>
            <div class="form-group">
                <label for="type">Type</label>
                <select id="type" name="type" class="form-control">
                    <option value="Bank statement">Bank statement</option>
                    <option value="Invoice">Invoice</option>
                    <option value="Sales receipt">Sales receipt</option>
                </select>
            </div>
            <div class="form-group">
                <label for="message">Message</label>
                <textarea id="message" name="message" rows="4" class="form-control"></textarea>
            </div>
            <input type="submit" value="Upload" class="btn btn-dark btn-block">
        </form>
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

</body>
</html>
