<?php

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {

        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        function isEmailValid($email) {
            
            // Check email format
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                return false;
            }
    
            // Extract domain from email
            $domain = substr(strrchr($email, "@"), 1);
    
            // Perform DNS lookup for MX records
            if (checkdnsrr($domain, 'MX')) {
                return true;
            }
    
            return false;
        }

        if (isEmailValid($email) == true) {

            $conn = mysqli_connect("localhost", "root", "", "test_db");

            if (mysqli_connect_errno()) {
                echo "Failed to connect to MySQL: " . mysqli_connect_error();
                exit();
            }

            mysqli_query($conn, "INSERT INTO users (Name, Email, Password) VALUES ('$name', '$email', '$password');");

            mysqli_close($conn);

            header("Location: /PHP - RAUF/TeamX/user-info1/user-info1.php");

        } else {
            echo "<script>alert('Email is invalid or domain does not exist !')</script>";
            echo "<script>window.location.href='/PHP - RAUF/TeamX/registration/registerPage.php'</script>";
        }

    }    
    


    exit;
    
?>
