<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Maney Manager | K-MECH</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <div class="container_auth">
        <p class="error1">{{session('messege')}}</p>
        <form action="/login" method="post">
            @csrf
            <h1>Login</h1>
            <div class="user">
                <input type="text" name="username" id="" placeholder="Enter Your Username or Email">
                @if ($errors->has('username'))
                    <p class="error">{{ $errors->first('username') }}</p>
                @endif
            </div>
            <div class="pwd">
                <input type="password" name="password" id="" placeholder="Enter Your Password">
                @if ($errors->has('password'))
                    <p class="error">{{ $errors->first('password') }}</p>
                @endif
            </div>
            <button type="submit">Login</button>
            <p>Already haven't an account? <a href="/register">Register</a></p>
            <p>Forgot Password? <a href="/forgetPassword">Reset Password</a></p>
        </form>
    </div>
</body>
</html>