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
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
</head>
<body>
    <div class="wrapper">
        <header class="bg-dark text-white text-center py-3">
            <div class="logo">
                <img src="Images/logo.png" alt="Your Logo" class="img-fluid">
            </div>
            <div class="container">
                <div class="text-right">
                    <a href="ClientSignup.php" class="text-success">Create Client Account &nbsp; </a>
                    <?php echo " | " ?>
                    <a href="AdminLogin.php" class="text-danger"> &nbsp; Logout</a>
                </div>
            </div>
        </header>

        <div class="container-fluid">
           <h1 class="text-center mt-3 mb-3">Admin Dashboard</h1> 
            <div class="row">
                <div class="col-md-5 sidebar bg-light py-3">
                    <table id="uploadsTable" class="table table-hover">
                        <thead class="thead-dark">
                            <tr>
                                <th>Name</th>
                                <th>Message</th>
                                <th>Type</th>
                                <th>File name</th>
                                <th>Created at</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            $query = "SELECT c.username, d.message, d.file_type, d.path, d.created_at,d.file_name FROM documents d JOIN clientlogin c ON d.client_id = c.identifier";
                            $result = mysqli_query($conn, $query);
                            
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<tr onclick=\"viewDocument('{$row['path']}')\">";
                                echo "<td>" . htmlspecialchars($row['username']) . "</td>";
                                echo "<td>" . nl2br(htmlspecialchars($row['message'])) . "</td>";
                                echo "<td>" . htmlspecialchars($row['file_type']) . "</td>";
                                echo "<td>" . htmlspecialchars($row['file_name']) . "</td>";
                                echo "<td>" . htmlspecialchars($row['created_at']) . "</td>";
                                echo "</tr>";
                            }
                            mysqli_close($conn);
                            ?>
                        </tbody>
                    </table>
                </div>
                <div class="col-md-7 main-content" style="width: 50%;">
                    <iframe id="document-viewer" style="width: 100%; height: calc(100vh - 120px);" frameborder="0"></iframe>
                </div>
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
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#uploadsTable').DataTable();
        });
    </script>
</body>
</html>
