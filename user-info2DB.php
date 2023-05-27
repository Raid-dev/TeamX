<?php

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
          $drive_license = $_POST['drive-license'];
          $passport = $_POST['passport'];
          $conn = mysqli_connect("localhost", "root", "", "test_db");

          if (mysqli_connect_errno()) {
              echo "Failed to connect to MySQL: " . mysqli_connect_error();
              exit();
          }

          $result = mysqli_query($conn, "SELECT * FROM users ORDER BY ID DESC LIMIT 1");

          $row = $result->fetch_assoc();
          
          $name = $row['Name'];
          $password = $row['Password'];

          mysqli_query($conn, "UPDATE users SET DriveLicense = '$drive_license', Passport = '$passport' WHERE Name = '$name' and Password = '$password'");

          mysqli_close($conn);
      }

      header("Location: /PHP - RAUF/TeamX/userpage/userpage.php");
      exit;

?>