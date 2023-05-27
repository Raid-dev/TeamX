<?php
require_once 'C:\xampp\htdocs\PHP - Rauf\TeamX\php\config.php';

if(isset($_GET['id'])) {
    $userId = $_GET['id'];

    $query = "SELECT * FROM users WHERE ID = :id";
    $stmt = $ob->conn->prepare($query);
    $stmt->bindParam(':id', $userId);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
} else {
    header("Location: adminPage.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/css/bootstrap.min.css">
    <title>User Details</title>
    <style type="text/css">
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background: url(images/image.jpg) center center fixed;
            background-size: cover;
        }
        </style>
</head>
<body>
    <div class="container">
        <h1 class="mt-5">User Details</h1>
        <div class="card mt-4">
            <div class="card-body">
                <p class="card-text">Name: <?php echo $user['Name']; ?></p>
                <p class="card-text">Email: <?php echo $user['Email']; ?></p>
                <p class="card-text">Password: <?php echo $user['Password']; ?></p>
                <p class="card-text">Role: <?php echo $user['Role']; ?></p>
                <p class="card-text">Status: <?php echo ($user['Activity'] ? 'Active' : 'Deactive'); ?></p>
                <p class="card-text">Gender: <?php echo ($user['Gender'] ? 'Male' : 'Female'); ?></p>
                <p class="card-text">FullName: <?php echo $user['FullName']; ?></p>
                <p class="card-text">Phone Number: <?php echo $user['PhoneNumber']; ?></p>
                <p class="card-text">Birth Date: <?php echo $user['BirthDate']; ?></p>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/js/bootstrap.min.js"></script>
</body>
</html>

