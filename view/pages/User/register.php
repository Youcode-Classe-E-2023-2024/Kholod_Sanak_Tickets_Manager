<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../../../css/register.css">
    <title>Register</title>
</head>
<body>
<div class="background">
    <div class="shape"></div>
    <div class="shape"></div>
</div>
<form action="" method="post" enctype="multipart/form-data">
    <h3>Register Here</h3>

    <div class="flex w-full h-screen items-center justify-center bg-grey-lighter">
        <label class="w-64 flex flex-col items-center px-4 py-6 bg-white text-blue rounded-lg shadow-lg tracking-wide uppercase border border-blue cursor-pointer hover:bg-blue hover:text-white">
            <span class="mt-2 text-base leading-normal">Select a picture</span>
            <input type="file" name="profile_picture" class="hidden" accept="image/*" />
        </label>
    </div>

    <label for="username">Username</label>
    <input type="text" name="username" placeholder="Username" id="username">

    <label for="email">Email</label>
    <input type="text" name="email" placeholder="Email" id="email">

    <label for="password">Password</label>
    <input type="password" name="password" placeholder="Password" id="password">

    <button type="submit">Register</button>
</form>
</body>
</html>