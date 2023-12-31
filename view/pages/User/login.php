
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../../../css/login.css">
    <title>Login</title>
</head>
<body>
<div class="background">
    <div class="shape"></div>
    <div class="shape"></div>
</div>
<form action="../../../controller/User/login.php" method="post">
    <h3>Login Here</h3>

    <label for="username">Email</label>
    <input type="text" name="email" placeholder="Email" id="email">

    <label for="password">Password</label>
    <input type="password" name="password" placeholder="Password" id="password">

    <button type="submit">Log In</button>
    <a href="register.php" class="register">Register</a>
</form>
</body>
</html>