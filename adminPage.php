<?php
require_once 'C:\xampp\htdocs\PHP - Rauf\TeamX\php\config.php';

/*session_start();
if (!isset($_SESSION['loggedIn']) || !$_SESSION['loggedIn']) {
    header("Location: loginPage.php");
    exit;
} 

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['logout'])) {
    session_unset();
    session_destroy();
    header("Location: login.php");
    exit;
}*/

$query = "SELECT * FROM users";
$stmt = $ob->conn->prepare($query);
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <title>Admin</title>
    <style type="text/css">
        body{
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
        <div class="row justify-content-center">
            <div class="row justify-content-center mt-4 mb-0">
            <div class="col-lg-8">
                <div class="d-flex justify-content-between">
                    <a href="/PHP - Rauf/TeamX/homepage/homepage.php" class="btn btn-primary">Homepage</a>
                    <a href="/PHP - Rauf/TeamX/login/loginPage.php" class="btn btn-danger">Logout</a>
                </div>
            </div>
        </div>
            <div class="col-lg-8">
                <div class="card mt-5">
                    <div class="card-body">
                        <h4 class="card-title">User Table</h4>
                        <div class="table-responsive">
                            <table class="table table-striped table-hover" id="userTable">
                                <thead>
                                    <tr>
                                        <th>Photo</th>
                                        <th>Name</th>
                                        <th>Status</th>
                                        <th>Gender</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($result as $row): ?>
                                        <tr>
                                            <td><img src="images/faces/<?php echo $row['Photo']; ?>" alt="User Photo" width="50"></td>
                                            <td><?php echo $row['Name']; ?></td>
                                            <td><?php echo $row['Activity'] ? 'Active' : 'Deactive'; ?></td>
                                            <td><?php echo $row['Gender'] ? 'Male' : 'Female'; ?></td>
                                            <td>
                                                <a class="btn btn-primary btn-sm" href="admin-details.php?id=<?php echo $row['ID']; ?>">Details</a>
                                                <a class="btn btn-secondary btn-sm" href="admin-update.php?id=<?php echo $row['ID']; ?>">Update</a>
                                                <a class="btn btn-danger btn-sm" href="admin-delete_user.php?id=<?php echo $row['ID']; ?>">Delete</a>
                                                <?php
                                                $buttonText = $row['Activity'] ? 'Deactivate' : 'Activate';
                                                $buttonClass = $row['Activity'] ? 'btn-danger' : 'btn-success';
                                                $buttonAction = $row['Activity'] ? 'deactivate' : 'activate';
                                                ?>
                                                <a class="btn <?php echo $buttonClass; ?> btn-sm" href="admin-change_status.php?id=<?php echo $row['ID']; ?>&action=<?php echo $buttonAction; ?>"><?php echo $buttonText; ?></a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap5.min.js"></script>
    <script>
    $(document).ready(function() {
        $('#userTable').DataTable();
    });
    </script>
</body>
</html>
