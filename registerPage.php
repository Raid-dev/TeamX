<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link rel="stylesheet" href="styleRegister.css">
    <link rel="shortcut icon" href="/PHP - Rauf/TeamX/logo-icon.png" type="image/x-icon">
</head>
<body>
    <form action="./registerDB.php" method="POST">
        <div class="ourForm">
            <h1>Registration:</h1>
        <div>
            <label for="nickname">Nickname:</label>
            <input type="text" name="name" placeholder="Enter a nickname" required> 
        </div><br>
        <div>
            <label for="email">Email:</label>
            <input type="email" name="email" placeholder="user@gmail.com" required>
        </div><br>
        <div>
            <label for="password">Password:</label>
            <input type="password" name="password" minlength="8" placeholder="Password" required>
        </div>
        <div class="pasCol">It should consist of minimum 8 characters</div><br>
            <label> I agree with the
                <a href="#" title="term of services">term of services</a>
            </label>
                <input type="checkbox" name="agree" value="yes" class="checking" required checked> 
            
        <button type="submit" name="submit">Submit</button><br>
        <footer>Already a member? <a href="/PHP - Rauf/TeamX/login/loginPage.php">Login here</a></footer>
        </div>
    </form>
</body>
</html>