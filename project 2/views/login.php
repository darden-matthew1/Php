<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <?php include ('topNavigation.php');?>
</br>
</head>
<body>
    <h2>Login</h2>
<form action="login.php" method="post">
    <label>Email Address</label>
    <input type="text" name="email_address"/><br>
    <label>Password</label>
    <input type="password" name="password"/><br>
    <label>Current Price</label>
    <label>&nbsp;</label>
    <input type="submit" name="Login"/><br>
</form>
</body>
</html>