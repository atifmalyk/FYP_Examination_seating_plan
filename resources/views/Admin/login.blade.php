<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css2/admin.css') }}" rel="stylesheet">

    <title>Login</title>

</head>
<body>
<div class="background">
    <div class="shape"></div>
    <div class="shape"></div>
</div>
<form action="/Admin/perform_login" method="post">
    <h3>Login</h3>
    <div class="user-box">
        @csrf
        <label for="username">Username</label>
        <input type="text" placeholder="Enter Username" id="admin_username" name="admin_username" required="">
    </div>
    <div class="user-box">
        @csrf
        <label for="password">Password</label>
        <input type="password" placeholder="Password" id="admin_password" name="admin_password" required>
    </div>
    <input type="submit" class="button"></input>
    <a class="register" href="/Student/registeration">Register</a>




    </div>
</form>


    </form>
</div>


</body>
</html>
