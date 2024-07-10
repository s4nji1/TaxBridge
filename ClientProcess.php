<?php
include 'DataBase.php';
session_start();

if (!isset($_SESSION['file_counter'])) {
    $_SESSION['file_counter'] = 1;
} else {
    $_SESSION['file_counter']++;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_SESSION['username'];
    $message = $_POST['message'];
    $type = $_POST['type'];

    if (isset($_FILES['file']) && $_FILES['file']['error'] == 0) {
        $file_name = $_FILES['file']['name'];
        $file_tmp = $_FILES['file']['tmp_name'];
        $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
        $file_path = 'uploads/facture' . $_SESSION['file_counter'] . '.' . $file_ext;

        move_uploaded_file($file_tmp, $file_path);

        $data_file = 'uploads_data.json';
        $uploads_data = [];
        if (file_exists($data_file)) {
            $uploads_data = json_decode(file_get_contents($data_file), true);
        }

        $uploads_data[] = [
            'name' => $username,
            'message' => $message,
            'file_path' => $file_path,
            'type' => $type
        ];

        file_put_contents($data_file, json_encode($uploads_data));

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
