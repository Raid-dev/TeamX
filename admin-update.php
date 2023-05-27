<?php
require_once 'C:\xampp\htdocs\PHP - Rauf\TeamX\php\config.php';

if (isset($_GET['id'])) {
    $userId = $_GET['id'];

    $query = "SELECT * FROM users WHERE ID = :id";
    $stmt = $ob->conn->prepare($query);
    $stmt->bindParam(':id', $userId);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $newName = $_POST['name'];
        $newEmail = $_POST['email'];
        $newPassword = $_POST['password'];
        $newStatus = $_POST['status'];
        $newGender = $_POST['gender'];
        $newFirstName = $_POST['firstname'];
        $newLastName = $_POST['lastname'];
        $newPhoneNumber = $_POST['phone'];

        $newFullName = $newFirstName." ".$newLastName;

        if (!empty($_FILES['photo']['name'])) {
            $photoName = $_FILES['photo']['name'];
            $photoTmp = $_FILES['photo']['tmp_name'];
            $targetDirectory = 'images/faces/';
            $targetPath = $targetDirectory . $photoName;
            move_uploaded_file($photoTmp, $targetPath);

            $query = "UPDATE users SET Name = :name, FullName = :fullname, PhoneNumber = :phonenumber, Email = :email, Password = :password, Activity = :status, Gender = :gender, Photo = :image WHERE ID = :id";
            $stmt = $ob->conn->prepare($query);
            $stmt->bindParam(':image', $photoName);
        } else {
            $query = "UPDATE users SET Name = :name, FullName = :fullname, PhoneNumber = :phonenumber, Email = :email, Password = :password, Activity = :status, Gender = :gender WHERE ID = :id";
        }
        $stmt = $ob->conn->prepare($query);
        $stmt->bindParam(':name', $newName);
        $stmt->bindParam(':email', $newEmail);
        $stmt->bindParam(':password', $newPassword);
        $stmt->bindParam(':status', $newStatus);
        $stmt->bindParam(':gender', $newGender);
        $stmt->bindParam(':id', $userId);
        $stmt->bindParam(':fullname', $newFullName);
        $stmt->bindParam(':phonenumber', $newPhoneNumber);
        $stmt->execute();

        header("Location: /PHP - Rauf/TeamX/admin/adminPage.php");
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/css/bootstrap.min.css">
    <title>Update User</title>
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
        <h1 class="mt-5">Update User</h1>
        <form method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="name" class="form-label">Nickname</label>
                <input type="text" class="form-control" id="name" name="name" value="<?php echo $user['Name']; ?>">
            </div>
            <div class="mb-3">
                <label for="username" class="form-label">Full Name</label>
                <input type="text" class="form-control" id="firstname" name="firstname" value="<?php echo $user['FullName']; ?>">
            </div>
            <div class="mb-3">
                <label for="username" class="form-label">Phone Number</label>
                <input type="text" class="form-control" id="phone" name="phone" value="<?php echo $user['PhoneNumber']; ?>">
            </div>
            <div class="mb-3">
                <label for="photo" class="form-label">Photo</label>
                <input type="file" class="form-control" id="photo" name="photo">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="<?php echo $user['Email']; ?>">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" value="<?php echo $user['Password']; ?>">
            </div>
            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <select class="form-select" id="status" name="status">
                    <option value="1" <?php if ($user['Activity']) echo "selected"; ?>>Active</option>
                    <option value="0" <?php if (!$user['Activity']) echo "selected"; ?>>Inactive</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="gender" class="form-label">Gender</label>
                <select class="form-select" id="gender" name="gender">
                    <option value="1" <?php if ($user['Gender']) echo "selected"; ?>>Male</option>
                    <option value="0" <?php if (!$user['Gender']) echo "selected"; ?>>Female</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/js/bootstrap.min.js"></script>
</body>
</html>