<?php

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {

        $name = $_POST['name'];
        $password = $_POST['password'];

        $conn = mysqli_connect("localhost","root","","test_db");

        if (mysqli_connect_errno()) {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
            exit();
        }

        $result = (mysqli_query($conn, "SELECT * FROM users WHERE Name = '$name' and Password = '$password'"));

        $row = $result->fetch_assoc();

        if ($row['Activity'] == true) {
            if(mysqli_num_rows($result) > 0 && $row['Role'] == 'Admin') {
                echo "<script>alert('Welcome, dear Admin !')</script>";
                echo "<script>window.location.href='/PHP - Rauf/TeamX/admin/adminPage.php'</script>";
            } 
            else if (mysqli_num_rows($result) > 0) {
                if (!$row['Passport']) {
                    header("Location: /PHP - Rauf/TeamX/user-info2/user-info2.php");
                }
                else {
                    header("Location: /PHP - Rauf/TeamX/userpage/userpage.php");
                }
            }
            else{
                echo "<script>alert('Name or Password is incorrect!')</script>";
                echo "<script>window.location.href='/PHP - Rauf/TeamX/login/loginPage.php'</script>";
            }
            mysqli_close($conn);
        }
        else {
            echo "<script>alert('This user is Blocked !')</script>";
            echo "<script>window.location.href='/PHP - Rauf/TeamX/login/loginPage.php'</script>";
        } 
        exit;
    }   

?>