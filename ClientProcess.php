<?php
include 'DataBase.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_SESSION['username'];
    $message = $_POST['message'];
    $file_type = $_POST['file_type'];

    if (isset($_FILES['file']) && $_FILES['file']['error'] == 0) {
        $file_name = $_FILES['file']['name'];
        $file_tmp = $_FILES['file']['tmp_name'];
        $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));

        $query = "SELECT COUNT(id) as count FROM documents";
        $result = mysqli_query($conn, $query);
        $row = mysqli_fetch_assoc($result);
        $count = $row['count'] + 1;
        $file_path = 'uploads/document' . $count . '.' . $file_ext;

        move_uploaded_file($file_tmp, $file_path);

        $query = "SELECT identifier FROM clientlogin WHERE username = '$username'";
        $result = mysqli_query($conn, $query);
        $row = mysqli_fetch_assoc($result);
        $client_id = $row['identifier'];

        $query = "INSERT INTO documents (client_id, message, path, file_name, file_type) VALUES ('$client_id', '$message', '$file_path', '$file_name', '$file_type')";
        mysqli_query($conn, $query);
        mysqli_close($conn);

    } else {
        echo 'Error uploading file!';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="refresh" content="2;url=Client.php">
    <meta charset="UTF-8">
    <title>File Upload Status</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f8f9fa;
        }
        .message {
            padding: 20px;
            border-radius: 5px;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="message bg-light">
        <h1>File uploaded successfully!</h1>
        <p>Redirecting to the client page...</p>
    </div>
</body>
</html>
