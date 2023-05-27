<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="styleLoginFile.css">
    <link rel="shortcut icon" href="logo-icon.png" type="image/x-icon">
</head>
<body>
    <form action="./loginDB.php" method="POST">
        <div class="ourForm">
            <h1>Login:</h1>
        <div>
            <label for="username">Username:</label>
            <input type="text" name="name" placeholder="Enter your username" required> 
        </div><br>
        <div>
            <label for="password">Password:</label>
            <input type="password" name="password" placeholder="Password">
        </div>
        <button type="submit" name="submit">Log In</button><br>
        </div>
    </form>
</body>
</html>