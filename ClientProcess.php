<?php 
include 'DataBase.php';

$filename = $_FILES['file']['name'];
$destination = "Uploads/" . $filename;
$uploadOk = 1;
$fileType = strtolower(pathinfo($filename, PATHINFO_EXTENSION));

if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
} else {
    if (move_uploaded_file($_FILES['file']['tmp_name'], $destination)) {
        echo "The file " . htmlspecialchars(basename($filename)) . " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
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
            <a href="Client.php"><button>Back</button></a>
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