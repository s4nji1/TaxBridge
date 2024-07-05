<?php 
include 'DataBase.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tax Bridge - Dashboard</title>
    <link rel="stylesheet" href="styles.css">
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

        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3 sidebar bg-light py-3" style="width: 50%;">
                    <table class="table table-hover">
                        <thead class="thead-dark">
                            <tr>
                                <th>Name</th>
                                <th>Message</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $data_file = 'uploads_data.json';
                            $uploads_data = [];
                            if (file_exists($data_file)) {
                                $uploads_data = json_decode(file_get_contents($data_file), true);
                            }

                            foreach ($uploads_data as $upload): ?>
                            <tr onclick="viewDocument('<?php echo htmlspecialchars($upload['file_path']); ?>')">
                                <td><?php echo htmlspecialchars($upload['name']); ?></td>
                                <td><?php echo nl2br(htmlspecialchars($upload['message'])); ?></td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <div class="col-md-9 main-content" style="width: 50%;">
                    <iframe id="document-viewer" style="width: 100%; height: calc(100vh - 120px);" frameborder="0"></iframe>
                </div>
            </div>
            <div class="row justify-content-center mt-3">
                <a href="AdminLogin.php" class="btn btn-danger mr-2">Logout</a>
                <a href="ClientSignup.php" class="btn btn-success">Create Client Account</a>
            </div>
        </div>

        <footer class="bg-dark text-white text-center py-3 mt-5">
            <div class="footer-content container">
                <div class="row">
                    <div class="col-md-6">
                        <h2>About Us</h2>
                        <p>Welcome to TaxBridge, where we simplify taxation and financial management with innovative tools and expert support for a seamless client-accountant experience.</p>
                    </div>
                    <div class="col-md-6">
                        <h2>Contact Us</h2>
                        <p>Email: contact@taxbridge.com</p>
                        <p>Phone: +212 524 88 ** **</p>
                    </div>
                </div>
            </div>
            <div class="footer-bottom mt-3">
                &copy; 2024 TaxBridge | All Rights Reserved
            </div>
        </footer>
    </div>

    <script>
        function viewDocument(filePath) {
            document.getElementById('document-viewer').src = filePath;
        }
    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
